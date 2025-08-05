CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    model VARCHAR(32),
    specifications TEXT,
    price DECIMAL(10,2) NOT NULL,
    brand VARCHAR(64),
    main_category_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL,
    user_name VARCHAR(64) NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY(product_id) REFERENCES products(id)

);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    parent_category_id INT,
    FOREIGN KEY(parent_category_id) REFERENCES categories(id)
);


ALTER TABLE comments
ADD product_rate TINYINT NOT NULL;
-- CATEGORIAS
INSERT INTO categories (name, parent_category_id)
VALUES ('Equipos de Cómputo', NULL);

INSERT INTO categories (name, parent_category_id)
VALUES ('Periféricos', NULL);

INSERT INTO categories (name, parent_category_id)
VALUES ('Pantallas', NULL);

INSERT INTO categories (name, parent_category_id)
VALUES ('Dispositivos de Salida', NULL);

INSERT INTO categories (name, parent_category_id)
VALUES ('Computadoras de Escritorio', 1);

INSERT INTO categories (name, parent_category_id)
VALUES ('Laptops', 1);

INSERT INTO categories (name, parent_category_id)
VALUES ('Teclados', 2);

INSERT INTO categories (name, parent_category_id)
VALUES ('Ratones', 2);

INSERT INTO categories (name, parent_category_id)
VALUES ('Monitores', 3);

INSERT INTO categories (name, parent_category_id)
VALUES ('Impresoras', 4);


-- PRODUCTS
INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Laptop Gaming', 'ASUS ROG Zephyrus G14', 'AMD Ryzen 9, 16GB RAM, 1TB SSD, NVIDIA RTX 3060', 35999, 'ASUS', 6);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Computadora de Escritorio', 'HP Pavilion TP01-2000', 'Intel Core i5, 8GB RAM, 512GB SSD, Windows 11', 18999, 'HP', 5);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Monitor', 'Dell UltraSharp U2720Q', '27", 4K UHD, IPS, 99% sRGB, USB-C', 12499, 'DELL', 9);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Teclado Mecánico', 'Corsair K70 RGB', 'Switches Cherry MX, retroiluminado RGB, USB 2.0', 2999, 'Corsair', 7);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Ratón Inalámbrico', 'Logitech MX Master 3', 'Conexión Bluetooth, 4000 DPI, batería recargable', 2199, 'Logitech', 8);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Impresora', 'HP LaserJet Pro M15w', 'Impresora láser, Wi-Fi, impresión a doble cara, compacta', 3499, 'HP', 10);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Monitor', 'Samsung Odyssey G5', '27", QHD, 144Hz, curvo, FreeSync', 8999, 'Samsung', 9);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Teclado Inalámbrico', 'Logitech K830', 'Teclado y touchpad, retroiluminado, conexión Bluetooth', 1899, 'Logitech', 7);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Ratón Gaming', 'Razer DeathAdder V2', '20,000 DPI, ergonómico, RGB, cable flexible', 1499, 'Razer', 8);

INSERT INTO products (name, model, specifications, price, brand, main_category_id )
VALUES ('Computadora Todo en Uno', 'Lenovo IdeaCentre AIO', 'Intel Core i5, 16GB RAM, 1TB HDD, pantalla táctil de 23.8"', 24999, 'Lenovo', 5);


-- COMMENTS
INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Excelente rendimiento para juegos, muy recomendable.', 'Juan Pérez', 1, 5);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Buena computadora, pero el ventilador es un poco ruidoso.', 'María López', 2, 4);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('La calidad de imagen es impresionante, ideal para diseño gráfico.', 'Carlos Ruiz', 3, 5);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Teclado muy cómodo y con buena respuesta.', 'Ana Martínez', 4, 4);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('El ratón es muy preciso, perfecto para juegos.', 'Luis Gómez', 5, 5);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Impresora compacta y fácil de usar, pero un poco lenta.', 'Sofía Torres', 6, 3);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Gran monitor, la curvatura mejora la experiencia de juego.', 'Javier Sánchez', 7, 5);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('Teclado inalámbrico muy práctico, aunque la batería dura poco.', 'Patricia Díaz', 8, 3);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('El ratón es ergonómico y se siente bien en la mano.', 'Fernando Silva', 9, 4);

INSERT INTO comments (text, user_name, product_id, product_rate )
VALUES ('omputadora todo en uno muy funcional, ideal para el hogar.', 'Gabriela Jiménez', 10, 4);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('La laptop es increíble, la mejor que he tenido.', 'Laura Fernández', 1, 5);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('El monitor tiene una calidad de imagen excepcional.', 'Roberto Martínez', 3, 5);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('El teclado es muy cómodo, pero el precio es un poco alto.', 'Elena González', 4, 4);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('La impresora es rápida y eficiente, la recomiendo.', 'Miguel Torres', 6, 4);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('El ratón es muy preciso, ideal para juegos.', 'Ana María Pérez', 5, 5);

INSERT INTO comments (text, user_name, product_id, product_rate)
VALUES ('La computadora de escritorio es potente, pero ocupa mucho espacio.', 'Javier López', 2, 3);


CREATE VIEW IF NOT EXISTS best_products AS
SELECT 
    p.id, 
    p.name,
    c.text,
    AVG(c.product_rate) as rate
FROM products AS p
INNER JOIN comments AS c ON c.product_id = p.id
GROUP BY p.id;


ALTER TABLE products
ADD INDEX idx_product_id (id ASC);
ALTER TABLE products
ADD INDEX idx_name (name ASC);
ALTER TABLE products
ADD INDEX idx_model (model ASC);
ALTER TABLE products
ADD INDEX idx_specifications (specifications ASC);
ALTER TABLE products
ADD INDEX idx_price (price ASC);
ALTER TABLE products
ADD INDEX idx_brand (brand ASC);
ALTER TABLE products
ADD INDEX idx_category (main_category_id ASC);


ALTER TABLE comments
ADD INDEX idx_comment_id (id ASC);
ALTER TABLE comments
ADD INDEX idx_text (text(128) ASC);
ALTER TABLE comments
ADD INDEX user_name (user_name ASC);
ALTER TABLE comments
ADD INDEX idx_product_id (product_id ASC);
ALTER TABLE comments
ADD INDEX idx_product_rate (product_rate ASC);


ALTER TABLE categories
ADD INDEX idx_category_id (id ASC);
ALTER TABLE categories
ADD INDEX idx_category_name (name ASC);
ALTER TABLE categories
ADD INDEX idx_parent_category_id (parent_category_id ASC);


CREATE TABLE IF NOT EXISTS accesories (
    product_id INT,
    category_id INT,
    PRIMARY KEY(product_id, category_id),
    FOREIGN KEY(product_id) REFERENCES products(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

