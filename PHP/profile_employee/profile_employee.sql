CREATE TABLE profile_employee(
    userId VARCHAR(20) NOT NULL,
    name VARCHAR(50) NOT NULL,
    -- phone varchar()  use another table for multivalued attributes
    email VARCHAR(50) NOT NULL,
    dateofbirth DATE NOT NULL,
    joiningdate DATE NOT NULL,
    -- skills VARCHAR(255) NOT NULL, -- multivalued attribute
    -- address VARCHAR(255) NOT NULL, use another table for multivalued attributes
    designation VARCHAR(50) NOT NULL,
    rating INT NOT NULL,
    PRIMARY Key (userId),
    Foreign Key (userId) references login(userId)
);

CREATE TABLE address( -- composite attribute  
    userId VARCHAR(20) NOT NULL,
    streetNumber int NOT NULL,
    streetName VARCHAR(30) NOT NULL,
    apartment VARCHAR(30) NOT NULL,
    apartmentNumber int NOT NULL,
    city VARCHAR(30) NOT NULL,
    state VARCHAR(30) NOT NULL,
    zipCode int NOT NULL,
    country VARCHAR(30) NOT NULL, 
    Foreign Key (userId) references profile_employee(userId)
);

CREATE TABLE phone( -- multivalued attribute
    phoneNumberId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId VARCHAR(20) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    Foreign Key (userId) references profile_employee(userId)
);

CREATE TABLE skills( -- multivalued attribute
    skillId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId VARCHAR(20) NOT NULL,
    skill VARCHAR(30) NOT NULL,
    Foreign Key (userId) references profile_employee(userId)
);

