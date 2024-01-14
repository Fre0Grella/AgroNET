INSERT INTO users (username, email, password, created_at)
SELECT
    CONCAT('utente', UUID()) AS username,
    CONCAT('utente', UUID(), '@example.com') AS email,
    "hashedpassword" AS password,
    CURRENT_TIMESTAMP AS created_at
FROM
    (SELECT (ROW_NUMBER() OVER (ORDER BY RAND())) AS id FROM information_schema.tables LIMIT 50) AS user_numbers;