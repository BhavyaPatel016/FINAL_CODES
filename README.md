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
