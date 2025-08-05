CREATE VIEW best_products_by_category AS
SELECT
    p.*,
    get_product_monthly_payment(p.id, 12,10) msi12,
    get_product_monthly_payment(p.id, 6,10) msi6
FROM products AS p
ORDER BY RAND()
LIMIT 10;
