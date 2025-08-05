CREATE FUNCTION get_product_monthly_payment (
    product_id INT,
    number_payments INT,
    annual_fee INT
)
RETURNS DECIMAL(10, 2)
BEGIN
    DECLARE monthly_payment DECIMAL(10, 2);
    SET monthly_payment = (
        SELECT 
        ( (price + (p.price * (annual_fee / 100))) / number_payments) 
        FROM 
            products AS p
        WHERE p.id = product_id
    );
    RETURN monthly_payment;
END;
