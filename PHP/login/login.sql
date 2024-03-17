CREATE TABLE login (
    userId VARCHAR(20) NOT NULL,
    -- email VARCHAR(50) NOT NULL, -- stored in profile_employee
    password VARCHAR(50) NOT NULL,
    role INT NOT NULL, -- 1 for admin, 2 for employee
    PRIMARY KEY (userId)
);


Insert into login (userId, password, role) values ('admin1', 'admin', 1);
Insert into login (userId, password, role) values ('employee1', 'employee', 2);