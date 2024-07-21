-- Account Types
CREATE TABLE account_types (
    account_type_id int PRIMARY KEY AUTO_INCREMENT,
    account_type_name varchar(50) NOT NULL
);

-- Users
CREATE TABLE users (
    user_id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    phone_number varchar(20) NOT NULL,
    account_type_id int DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    fullname varchar(100) DEFAULT NULL,
    user_address varchar(200) DEFAULT NULL,
    state varchar(100) DEFAULT NULL,
    about text DEFAULT NULL,
    facebook varchar(200) DEFAULT NULL,
    avatar_url varchar(200) DEFAULT NULL,
    status varchar(50) DEFAULT NULL,
    FOREIGN KEY (account_type_id) REFERENCES account_types(account_type_id)
);

-- Property Types
CREATE TABLE property_types (
    type_id int PRIMARY KEY AUTO_INCREMENT,
    type_name varchar(50) NOT NULL
);

-- Genders (giới tính người thuê)
CREATE TABLE genders (
    gender_id int PRIMARY KEY AUTO_INCREMENT,
    gender_name varchar(100) NOT NULL
);

-- Properties
CREATE TABLE properties (
    property_id int PRIMARY KEY AUTO_INCREMENT,
    user_id int DEFAULT NULL,
    type_id int DEFAULT NULL,
    gender_id int DEFAULT 1,
    property_name varchar(100) NOT NULL,
    description text DEFAULT NULL,
    address varchar(200) NOT NULL,
    price float DEFAULT NULL,
    status varchar(50) NOT NULL DEFAULT 'unknown',
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    age int DEFAULT NULL,
    real_area decimal(10,0) NOT NULL,
    unit varchar(50) DEFAULT NULL,
    view_count int DEFAULT 0,
    CONSTRAINT fk_property_user FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT fk_property_type FOREIGN KEY (type_id) REFERENCES property_types(type_id),
    CONSTRAINT fk_property_gender FOREIGN KEY (gender_id) REFERENCES genders(gender_id)
);

-- Property Images
CREATE TABLE property_images (
    image_id int PRIMARY KEY AUTO_INCREMENT,
    property_id int DEFAULT NULL,
    image_url varchar(200) NOT NULL,
    CONSTRAINT fk_property_image FOREIGN KEY (property_id) REFERENCES properties(property_id)
);

-- Utilities
CREATE TABLE utilities (
    utility_id int PRIMARY KEY AUTO_INCREMENT,
    utility_name varchar(100) NOT NULL
);

-- Property - Utilities
CREATE TABLE property_utilities (
    property_id int NOT NULL,
    utility_id int NOT NULL,
    PRIMARY KEY (property_id, utility_id),
    FOREIGN KEY (property_id) REFERENCES properties(property_id),
    FOREIGN KEY (utility_id) REFERENCES utilities(utility_id)
);

-- Bedrooms
CREATE TABLE bedrooms (
    bedroom_id int PRIMARY KEY AUTO_INCREMENT,
    bedroom_count int NOT NULL
);

-- Bathrooms
CREATE TABLE bathrooms (
    bathroom_id int PRIMARY KEY AUTO_INCREMENT,
    bathroom_count int NOT NULL
);

-- Areas (diện tích ước tính)
CREATE TABLE areas (
    area_id int PRIMARY KEY AUTO_INCREMENT,
    area varchar(50)
);

-- Property Details
CREATE TABLE property_details (
    detail_id int PRIMARY KEY AUTO_INCREMENT,
    property_id int DEFAULT NULL,
    bedroom_id int DEFAULT NULL,
    bathroom_id int DEFAULT NULL,
    area_id int DEFAULT NULL,
    CONSTRAINT fk_property_detail_property FOREIGN KEY (property_id) REFERENCES properties(property_id),
    CONSTRAINT fk_property_detail_bedroom FOREIGN KEY (bedroom_id) REFERENCES bedrooms(bedroom_id),
    CONSTRAINT fk_property_detail_bathroom FOREIGN KEY (bathroom_id) REFERENCES bathrooms(bathroom_id),
    CONSTRAINT fk_property_detail_area FOREIGN KEY (area_id) REFERENCES areas(area_id)
); 

-- Locations
CREATE TABLE locations (
    location_id int PRIMARY KEY AUTO_INCREMENT,
    property_id int DEFAULT NULL,
    latitude decimal(10,8) DEFAULT NULL,
    longitude decimal(11,8) DEFAULT NULL,
    address varchar(200) DEFAULT NULL,
    district varchar(100) DEFAULT NULL,
    CONSTRAINT fk_location_property FOREIGN KEY (property_id) REFERENCES properties(property_id)
);


-- Favorites
CREATE TABLE favorites (
    favorite_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT DEFAULT NULL,
    property_id INT DEFAULT NULL,
    CONSTRAINT fk_favorite_user FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT fk_favorite_property FOREIGN KEY (property_id) REFERENCES properties(property_id)
);

-- News/Blogs
CREATE TABLE news_blog (
    news_id INT PRIMARY KEY AUTO_INCREMENT,
    title varchar(200) NOT NULL,
    content TEXT DEFAULT NULL,
    author_id INT DEFAULT NULL,
    publish_date DATE DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    view_count int DEFAULT 0,
    news_image varchar(200) DEFAULT NULL,
    CONSTRAINT fk_news_author FOREIGN KEY (author_id) REFERENCES users(user_id)
);
-- Tags của blog
CREATE TABLE tags (
    tags_id int PRIMARY KEY AUTO_INCREMENT,
    tags_name varchar(50) NOT NULL
);

-- Tag - New
CREATE TABLE news_tags (
    news_id INT,
    tags_id INT,
    PRIMARY KEY (news_id, tags_id),
    FOREIGN KEY (news_id) REFERENCES news_blog(news_id),
    FOREIGN KEY (tags_id) REFERENCES tags(tags_id)
);

INSERT INTO account_types (account_type_name) VALUES
('Admin'),
('User')

INSERT INTO utilities (utility_name) VALUES
('Ban công'),
('Điều hòa'),
('Máy giặt'),
('Máy sấy quần áo'),
('Máy nước nóng lạnh'),
('Bếp gas'),
('Bếp điện từ'),
('Tivi'),
('Tủ lạnh'),
('Internet(Wi-fi)'),
('Cho phép vật nuôi'),
('Nội thất đầy đủ'),
('Chỗ để xe'),
('Sân vườn'),
('Mặt tiền'),
('Gần biển'),
('Gần sông'),
('Gần bệnh viện'),
('Gần trường học'),
('Trung tâm thành phố');

INSERT INTO property_types (type_name) VALUES
('Phòng trọ'),
('Nhà nguyên căn'),
('Căn hộ chung cư'),
('Tìm người ở ghép');

INSERT INTO bathrooms (bathroom_count) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

INSERT INTO bedrooms (bedroom_count) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

INSERT INTO areas (area) VALUES
(10),
(20),
(30),
(40),
(50),
(100),
(150),
(200),
(250),
(300),
(350),
(400),
(450),
(500),
(600),
(700),
(800),
(900),
(1000);

INSERT INTO tags (tags_name) VALUES
('Tin tức'),
('Blog'),
('Tư vấn'),
('Chính sách'),
('Kinh nghiệm'),
('Phong cách sống'),
('Thiết kế nội thất'),
('Cải tạo nhà cửa'),
('Xây dựng nhà'),
('Đầu tư'),
('Pháp lý'),
('Hướng dẫn'),
('Phân tích thị trường');

INSERT INTO genders (gender_name) VALUES
('Tất cả'),
('Nam'),
('Nữ');