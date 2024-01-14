INSERT INTO users (username, email, password_hash, created_at)
SELECT
    CONCAT('utente', UUID()) AS username,
    CONCAT('utente', UUID(), '@example.com') AS email,
    bcrypt('password123', 10) AS password_hash,
    CURRENT_TIMESTAMP AS created_at
FROM
    (SELECT (ROW_NUMBER() OVER (ORDER BY RAND())) AS id FROM information_schema.tables LIMIT 50) AS user_numbers;