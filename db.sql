CREATE DATABASE vagasporemail;
CREATE USER 'shadowbot'@'localhost' IDENTIFIED BY 'shadowNet@28raJ.';
GRANT ALL PRIVILEGES ON vagasporemail.* TO 'shadowbot'@'localhost';
FLUSH PRIVILEGES;