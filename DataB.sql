CREATE TABLE DataB (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    fullname VARCHAR(25) NOT NULL,
    course VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    contact VARCHAR(25) NOT NULL
);

CREATE TABLE DataA (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    confirm_password VARCHAR(25) NOT NULL   
);