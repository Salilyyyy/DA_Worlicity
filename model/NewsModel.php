<?php
require_once 'config/db.php';

class NewsModel
{
    private $db;

    public function __construct()
    {
        $connect = new Connect();
        $this->db = $connect->getConnection();
    }

    public function getAllTags()
    {
        $query = "SELECT * FROM tags";
        $tags = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }

    public function getAllNews()
    {
        $query = "SELECT nb.*, u.fullname AS author_fullname, u.avatar_url,
                  GROUP_CONCAT(t.tags_name) AS tags
                  FROM news_blog nb
                  INNER JOIN users u ON nb.author_id = u.user_id
                  LEFT JOIN news_tags nt ON nb.news_id = nt.news_id
                  LEFT JOIN tags t ON nt.tags_id = t.tags_id
                  GROUP BY nb.news_id
                  ORDER BY nb.news_id DESC";
        $news = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }


// Thêm phương thức sửa bài viết
public function updateNews($newsId, $title, $content, $news_image, $tags)
{
    $query = "UPDATE news_blog SET title = :title, content = :content, news_image = :news_image WHERE news_id = :news_id";
    $stmt = $this->db->prepare($query);
    $params = array(
        ':news_id' => $newsId,
        ':title' => $title,
        ':content' => $content,
        ':news_image' => $news_image
    );
    $result = $stmt->execute($params);

    // Cập nhật tags của bài viết
    if ($result) {
        // Xóa các tags cũ
        $deleteQuery = "DELETE FROM news_tags WHERE news_id = :news_id";
        $deleteStmt = $this->db->prepare($deleteQuery);
        $deleteStmt->bindParam(':news_id', $newsId);
        $deleteStmt->execute();

        // Thêm các tags mới
        if (!empty($tags)) {
            foreach ($tags as $tag_id) {
                $insertQuery = "INSERT INTO news_tags (news_id, tags_id) VALUES (:news_id, :tags_id)";
                $insertStmt = $this->db->prepare($insertQuery);
                $insertStmt->bindParam(':news_id', $newsId);
                $insertStmt->bindParam(':tags_id', $tag_id);
                $insertStmt->execute();
            }
        }
    }
    return $result;
}

// Thêm phương thức xóa bài viết
public function deleteNews($newsId)
{
    // Xóa tags của bài viết
    $deleteTagsQuery = "DELETE FROM news_tags WHERE news_id = :news_id";
    $deleteTagsStmt = $this->db->prepare($deleteTagsQuery);
    $deleteTagsStmt->bindParam(':news_id', $newsId);
    $deleteTagsStmt->execute();

    // Xóa bài viết
    $query = "DELETE FROM news_blog WHERE news_id = :news_id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':news_id', $newsId);
    return $stmt->execute();
}

    public function getNewsWithDetails($newsId)
    {
        $query = "SELECT nb.*, u.fullname AS author_fullname, u.avatar_url
                  FROM news_blog nb
                  INNER JOIN users u ON nb.author_id = u.user_id
                  WHERE nb.news_id = :newsId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':newsId', $newsId);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);

        // Lấy danh sách các tag liên quan đến bài viết
        $tagQuery = "SELECT t.tags_name
                    FROM tags t
                    INNER JOIN news_tags nt ON t.tags_id = nt.tags_id
                    WHERE nt.news_id = :newsId";
        $tagStmt = $this->db->prepare($tagQuery);
        $tagStmt->bindParam(':newsId', $newsId);
        $tagStmt->execute();
        $tags = $tagStmt->fetchAll(PDO::FETCH_ASSOC);

        // Thêm danh sách các tag vào mảng $news
        $news['tags'] = $tags;

        return $news;
    }



    private function getUserFullName($userId)
    {
        $query = "SELECT fullname, avatar_url FROM users WHERE user_id = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }

        return '';
    }

    public function incrementNewsViewCount($newsId)
    {
        $query = 'UPDATE news_blog SET view_count = view_count + 1 WHERE news_id = :newsId';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':newsId', $newsId);
        $stmt->execute();
    }

    public function getNewsWithNewsID($newsId)
    {
        $query = "SELECT nb.*, u.fullname AS author_fullname, u.avatar_url
                FROM news_blog nb
                INNER JOIN users u ON nb.author_id = u.user_id
                WHERE nb.news_id = :newsId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':newsId', $newsId);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);

        return $news;
    }

    public function countNewsByTags()
    {
        $query = "SELECT t.tags_id, t.tags_name, COUNT(nt.news_id) AS news_count
                FROM tags t
                LEFT JOIN news_tags nt ON t.tags_id = nt.tags_id
                GROUP BY t.tags_id";
        $result = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function getAllNewsByUserId($userId)
    {
        $query = "SELECT nb.*, u.fullname AS author_fullname, u.avatar_url
                FROM news_blog nb
                INNER JOIN users u ON nb.author_id = u.user_id
                WHERE nb.author_id = :userId
                ORDER BY nb.news_id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Lấy danh sách các tag cho mỗi tin tức
        foreach ($newsList as &$news) {
            $tagQuery = "SELECT t.tags_name
                     FROM tags t
                     INNER JOIN news_tags nt ON t.tags_id = nt.tags_id
                     WHERE nt.news_id = :newsId";
            $tagStmt = $this->db->prepare($tagQuery);
            $tagStmt->bindParam(':newsId', $news['news_id']);
            $tagStmt->execute();
            $tags = $tagStmt->fetchAll(PDO::FETCH_ASSOC);

            // Thêm danh sách các tag vào mảng $news
            $news['tags'] = $tags;
        }

        return $newsList;
    }
}
