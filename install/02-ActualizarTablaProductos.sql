ALTER TABLE products
ADD num_views BIGINT DEFAULT 0;
ALTER TABLE products
ADD creation_date DATETIME DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE products
ADD modification_date DATETIME DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE products
ADD num_likes BIGINT DEFAULT 0;

ALTER TABLE products
ADD INDEX idx_num_views (num_views ASC);
ALTER TABLE products
ADD INDEX idx_creation_date (creation_date ASC);
ALTER TABLE products
ADD INDEX idx_modification_date (modification_date ASC);
ALTER TABLE products
ADD INDEX idx_num_likes (num_likes ASC);