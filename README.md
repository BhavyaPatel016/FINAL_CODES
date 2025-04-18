DELIMITER //

CREATE EVENT move_expired_committee
ON SCHEDULE EVERY 1 MINUTE
DO
BEGIN
    INSERT INTO commity1 (id, flat, name, email, created_at, ended_at,number)
    SELECT id, flat, name, email, created_at, ended_at,number
    FROM commity
    WHERE ended_at <= NOW();

    DELETE FROM commity
    WHERE ended_at <= NOW();
END //

DELIMITER ;
ADD THIS EVENT IN OUR DATABASE
TABLE SUB MOHIT KA GITHUB MA HA 



CREATE TABLE commity (
    id INT(11) NOT NULL AUTO_INCREMENT,
    flat INT(255) NOT NULL,
    name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    number BIGINT(20) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ended_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP + INTERVAL 5 MINUTE),
    PRIMARY KEY (id)
);

CREATE TABLE commity1 (
    id INT(11) NOT NULL AUTO_INCREMENT,
    flat INT(255) NOT NULL,
    name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    number BIGINT(20) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ended_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP + INTERVAL 5 MINUTE),
    PRIMARY KEY (id)
);
