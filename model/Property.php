<?php
require_once 'config/db.php';

class ModelHome extends Mastermodel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProperties($district, $propertyType, $price, $area)
    {
        $query = "SELECT DISTINCT p.*, pt.type_name, bd.bedroom_count, ba.bathroom_count, l.district, pi.image_url, p.view_count
        FROM properties p
        INNER JOIN property_types pt ON p.type_id = pt.type_id
        INNER JOIN property_details pd ON p.property_id = pd.property_id
        INNER JOIN bedrooms bd ON pd.bedroom_id = bd.bedroom_id
        INNER JOIN bathrooms ba ON pd.bathroom_id = ba.bathroom_id
        LEFT JOIN locations l ON p.property_id = l.property_id
        LEFT JOIN property_utilities pu ON p.property_id = pu.property_id
        LEFT JOIN utilities u ON pu.utility_id = u.utility_id
        LEFT JOIN (
            SELECT property_id, MIN(image_url) AS image_url
            FROM property_images
            GROUP BY property_id
        ) pi ON p.property_id = pi.property_id";


        $conditions = array();
        $params = array();

        if (!empty($propertyType)) {
            $conditions[] = "p.type_id = ?";
            $params[] = $propertyType;
        }

        if (!empty($district)) {
            $conditions[] = "l.district = ?";
            $params[] = $district;
        }

        if (!empty($price)) {
            switch ($price) {
                case '1000000':
                    $conditions[] = "p.price < 1000000";
                    break;
                case '2000000':
                    $conditions[] = "p.price BETWEEN 1000000 AND 2000000";
                    break;
                case '3000000':
                    $conditions[] = "p.price BETWEEN 2000000 AND 3000000";
                    break;
                case '5000000':
                    $conditions[] = "p.price BETWEEN 3000000 AND 5000000";
                    break;
                case '7000000':
                    $conditions[] = "p.price BETWEEN 5000000 AND 7000000";
                    break;
                case '10000000':
                    $conditions[] = "p.price BETWEEN 7000000 AND 10000000";
                    break;
                case '15000000':
                    $conditions[] = "p.price BETWEEN 10000000 AND 15000000";
                    break;
                case '15000001':
                    $conditions[] = "p.price > 15000000";
                    break;
            }
        }

        if (!empty($area)) {
            switch ($area) {
                case '20':
                    $conditions[] = "p.real_area < 20";
                    break;
                case '30':
                    $conditions[] = "p.real_area BETWEEN 20 AND 30";
                    break;
                case '50':
                    $conditions[] = "p.real_area BETWEEN 30 AND 50";
                    break;
                case '70':
                    $conditions[] = "p.real_area BETWEEN 50 AND 70";
                    break;
                case '100':
                    $conditions[] = "p.real_area BETWEEN 70 AND 100";
                    break;
                case '101':
                    $conditions[] = "p.real_area > 100";
                    break;
            }
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $query .= " ORDER BY p.property_id DESC LIMIT 50";

        $result = $this->db->getList($query, $params);

        return $result;
    }

    public function getLimitedProperties($keyword, $district, $propertyType, $utilities, $offset, $limit)
    {
        $query = "SELECT p.property_id, p.property_name, p.price, p.district, pt.property_type
                FROM properties AS p
                INNER JOIN property_types AS pt ON p.property_type_id = pt.property_type_id
                WHERE 1 = 1";

        $params = array();

        if ($keyword) {
            $query .= " AND p.property_name LIKE :keyword";
            $params[':keyword'] = '%' . $keyword . '%';
        }

        if ($district) {
            $query .= " AND p.district = :district";
            $params[':district'] = $district;
        }

        if ($propertyType) {
            $query .= " AND pt.property_type = :propertyType";
            $params[':propertyType'] = $propertyType;
        }

        if (!empty($utilities)) {
            $utilityConditions = array();
            foreach ($utilities as $utility) {
                $utilityConditions[] = "p.utilities LIKE :utility" . $utility;
                $params[':utility' . $utility] = '%' . $utility . '%';
            }
            $query .= " AND (" . implode(" OR ", $utilityConditions) . ")";
        }

        $query .= " ORDER BY p.property_id DESC LIMIT :offset, :limit";
        $params[':offset'] = $offset;
        $params[':limit'] = $limit;

        $result = $this->db->getList($query, $params);

        return $result;
    }

    public function rentRoomProperties($keyword, $district, $propertyType, $price, $bedroom, $bathroom, $utilities)
    {
        $query = "SELECT DISTINCT p.*, pt.type_name, bd.bedroom_count, ba.bathroom_count, l.district, pi.image_url, p.view_count
            FROM properties p
            INNER JOIN property_types pt ON p.type_id = pt.type_id
            INNER JOIN property_details pd ON p.property_id = pd.property_id
            INNER JOIN bedrooms bd ON pd.bedroom_id = bd.bedroom_id
            INNER JOIN bathrooms ba ON pd.bathroom_id = ba.bathroom_id
            LEFT JOIN locations l ON p.property_id = l.property_id
            LEFT JOIN property_utilities pu ON p.property_id = pu.property_id
            LEFT JOIN utilities u ON pu.utility_id = u.utility_id
            LEFT JOIN (
                SELECT property_id, MIN(image_url) AS image_url
                FROM property_images
                GROUP BY property_id
            ) pi ON p.property_id = pi.property_id
            WHERE p.type_id = $propertyType";

        $conditions = array();
        $params = array();

        if (!empty($keyword)) {
            $conditions[] = "p.property_name LIKE ?";
            $params[] = "%$keyword%";
        }

        if (!empty($district)) {
            $conditions[] = "l.district = ?";
            $params[] = $district;
        }

        if (!empty($propertyType)) {
            $conditions[] = "p.type_id = ?";
            $params[] = $propertyType;
        }

        if (!empty($price)) {
            switch ($price) {
                case '1000000':
                    $conditions[] = "p.price < 1000000";
                    break;
                case '2000000':
                    $conditions[] = "p.price BETWEEN 1000000 AND 2000000";
                    break;
                case '3000000':
                    $conditions[] = "p.price BETWEEN 2000000 AND 3000000";
                    break;
                case '5000000':
                    $conditions[] = "p.price BETWEEN 3000000 AND 5000000";
                    break;
                case '7000000':
                    $conditions[] = "p.price BETWEEN 5000000 AND 7000000";
                    break;
                case '10000000':
                    $conditions[] = "p.price BETWEEN 7000000 AND 10000000";
                    break;
                case '15000000':
                    $conditions[] = "p.price BETWEEN 10000000 AND 15000000";
                    break;
                case '15000001':
                    $conditions[] = "p.price > 15000000";
                    break;
            }
        }

        if (!empty($area)) {
            switch ($area) {
                case '20':
                    $conditions[] = "p.real_area < 20";
                    break;
                case '30':
                    $conditions[] = "p.real_area BETWEEN 20 AND 30";
                    break;
                case '50':
                    $conditions[] = "p.real_area BETWEEN 30 AND 50";
                    break;
                case '70':
                    $conditions[] = "p.real_area BETWEEN 50 AND 70";
                    break;
                case '100':
                    $conditions[] = "p.real_area BETWEEN 70 AND 100";
                    break;
                case '101':
                    $conditions[] = "p.real_area > 100";
                    break;
            }
        }

        if (!empty($bedroom)) {
            $conditions[] = "bd.bedroom_count = ?";
            $params[] = $bedroom;
        }

        if (!empty($bathroom)) {
            $conditions[] = "ba.bathroom_count = ?";
            $params[] = $bathroom;
        }

        if (!empty($utilities)) {
            $utilitiesConditions = array();
            foreach ($utilities as $utility) {
                $utilitiesConditions[] = "pu.utility_id = ?";
                $params[] = $utility;
            }
            $utilitiesConditionsStr = implode(" OR ", $utilitiesConditions);
            $conditions[] = "($utilitiesConditionsStr)";
        }

        if (!empty($conditions)) {
            $conditionsStr = implode(" AND ", $conditions);
            $query .= " AND $conditionsStr";
        }

        $query .= " ORDER BY p.created_at DESC";

        $result = $this->db->getList($query, $params);
        return $result;
    }

    public function rentPropertiesDistrict($keyword, $district, $propertyType, $price, $bedroom, $bathroom, $utilities)
    {
        $query = "SELECT DISTINCT p.*, pt.type_name, bd.bedroom_count, ba.bathroom_count, l.district, pi.image_url, p.view_count
            FROM properties p
            INNER JOIN property_types pt ON p.type_id = pt.type_id
            INNER JOIN property_details pd ON p.property_id = pd.property_id
            INNER JOIN bedrooms bd ON pd.bedroom_id = bd.bedroom_id
            INNER JOIN bathrooms ba ON pd.bathroom_id = ba.bathroom_id
            LEFT JOIN locations l ON p.property_id = l.property_id
            LEFT JOIN property_utilities pu ON p.property_id = pu.property_id
            LEFT JOIN utilities u ON pu.utility_id = u.utility_id
            LEFT JOIN (
                SELECT property_id, MIN(image_url) AS image_url
                FROM property_images
                GROUP BY property_id
            ) pi ON p.property_id = pi.property_id
            WHERE l.district='$district'";

        $conditions = array();
        $params = array();

        if (!empty($keyword)) {
            $conditions[] = "p.property_name LIKE ?";
            $params[] = "%$keyword%";
        }

        if (!empty($district)) {
            $conditions[] = "l.district = ?";
            $params[] = $district;
        }

        if (!empty($propertyType)) {
            $conditions[] = "p.type_id = ?";
            $params[] = $propertyType;
        }

        if (!empty($price)) {
            switch ($price) {
                case '1000000':
                    $conditions[] = "p.price < 1000000";
                    break;
                case '2000000':
                    $conditions[] = "p.price BETWEEN 1000000 AND 2000000";
                    break;
                case '3000000':
                    $conditions[] = "p.price BETWEEN 2000000 AND 3000000";
                    break;
                case '5000000':
                    $conditions[] = "p.price BETWEEN 3000000 AND 5000000";
                    break;
                case '7000000':
                    $conditions[] = "p.price BETWEEN 5000000 AND 7000000";
                    break;
                case '10000000':
                    $conditions[] = "p.price BETWEEN 7000000 AND 10000000";
                    break;
                case '15000000':
                    $conditions[] = "p.price BETWEEN 10000000 AND 15000000";
                    break;
                case '15000001':
                    $conditions[] = "p.price > 15000000";
                    break;
            }
        }

        if (!empty($area)) {
            switch ($area) {
                case '20':
                    $conditions[] = "p.real_area < 20";
                    break;
                case '30':
                    $conditions[] = "p.real_area BETWEEN 20 AND 30";
                    break;
                case '50':
                    $conditions[] = "p.real_area BETWEEN 30 AND 50";
                    break;
                case '70':
                    $conditions[] = "p.real_area BETWEEN 50 AND 70";
                    break;
                case '100':
                    $conditions[] = "p.real_area BETWEEN 70 AND 100";
                    break;
                case '101':
                    $conditions[] = "p.real_area > 100";
                    break;
            }
        }

        if (!empty($bedroom)) {
            $conditions[] = "bd.bedroom_count = ?";
            $params[] = $bedroom;
        }

        if (!empty($bathroom)) {
            $conditions[] = "ba.bathroom_count = ?";
            $params[] = $bathroom;
        }

        if (!empty($utilities)) {
            $utilitiesConditions = array();
            foreach ($utilities as $utility) {
                $utilitiesConditions[] = "pu.utility_id = ?";
                $params[] = $utility;
            }
            $utilitiesConditionsStr = implode(" OR ", $utilitiesConditions);
            $conditions[] = "($utilitiesConditionsStr)";
        }

        if (!empty($conditions)) {
            $conditionsStr = implode(" AND ", $conditions);
            $query .= " AND $conditionsStr";
        }

        $query .= " ORDER BY p.created_at DESC";

        $result = $this->db->getList($query, $params);
        return $result;
    }

    public function getPropertyById($propertyId)
    {
        $query = "SELECT p.*, pt.type_name, bd.bedroom_count, ba.bathroom_count, l.district, pi.image_url, GROUP_CONCAT(DISTINCT u1.utility_name SEPARATOR ', ') AS utilities, u2.username, u2.fullname, u2.user_address, u2.state, u2.about, u2.phone_number, u2.facebook, u2.avatar_url, p.view_count
        FROM properties p
        INNER JOIN property_types pt ON p.type_id = pt.type_id
        INNER JOIN property_details pd ON p.property_id = pd.property_id
        INNER JOIN bedrooms bd ON pd.bedroom_id = bd.bedroom_id
        INNER JOIN bathrooms ba ON pd.bathroom_id = ba.bathroom_id
        LEFT JOIN locations l ON p.property_id = l.property_id
        LEFT JOIN property_images pi ON p.property_id = pi.property_id
        LEFT JOIN property_utilities pu ON p.property_id = pu.property_id
        LEFT JOIN utilities u1 ON pu.utility_id = u1.utility_id
        LEFT JOIN users u2 ON p.user_id = u2.user_id
        WHERE p.property_id = ?
        GROUP BY p.property_id";



        $params = array($propertyId);
        $result = $this->db->getRow($query, $params);

        return $result;
    }

    public function getPropertyImages($propertyId)
    {
        $query = "SELECT image_url FROM property_images WHERE property_id = ?";
        $params = array($propertyId);
        $result = $this->db->getList($query, $params);

        return $result;
    }

    public function getSimilarProperties($propertyId, $typeId)
    {
        $query = "SELECT p.*, pt.type_name, bd.bedroom_count, ba.bathroom_count, l.district, pi.image_url
        FROM properties p
        INNER JOIN property_types pt ON p.type_id = pt.type_id
        INNER JOIN property_details pd ON p.property_id = pd.property_id
        INNER JOIN bedrooms bd ON pd.bedroom_id = bd.bedroom_id
        INNER JOIN bathrooms ba ON pd.bathroom_id = ba.bathroom_id
        LEFT JOIN locations l ON p.property_id = l.property_id
        LEFT JOIN (
            SELECT property_id, MIN(image_url) AS image_url
            FROM property_images
            GROUP BY property_id
        ) pi ON p.property_id = pi.property_id
        WHERE p.property_id != ? AND p.type_id = ?
        ORDER BY p.property_id DESC";

        $params = array($propertyId, $typeId);
        $result = $this->db->getList($query, $params);

        return $result;
    }

    public function incrementViewCount($propertyId)
    {
        $query = 'UPDATE properties SET view_count = view_count + 1 WHERE property_id = :propertyId';
        $params = array(':propertyId' => $propertyId);
        $this->db->execute($query, $params);
    }
}
