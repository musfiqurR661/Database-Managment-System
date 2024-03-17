
CREATE TABLE salary (
    salaryId INT NOT NULL AUTO_INCREMENT,
    userId varchar(20) NOT NULL,
    baseSalary DECIMAL(10, 2) NOT NULL,
    bonuses DECIMAL(10, 2) DEFAULT 0,
    overtime DECIMAL(10, 2) DEFAULT 0,
    dues DECIMAL(10, 2) DEFAULT 0,
    totalSalary DECIMAL(10, 2) GENERATED ALWAYS AS (baseSalary + bonuses + overtime - dues) STORED,
    currency VARCHAR(3) NOT NULL,
    paymentFrequency VARCHAR(20) NOT NULL,
    PRIMARY KEY (salaryId,userId),
    Foreign Key (userId) references login(userId)
);

-- Overtime table
CREATE TABLE overtime (
    overtimeId INT NOT NULL AUTO_INCREMENT,
    salaryId INT NOT NULL,
    hoursWorked DECIMAL(5, 2) NOT NULL,
    overtimeRate DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (overtimeId),
    FOREIGN KEY (salaryId) REFERENCES salary(salaryId)
);



CREATE TABLE payment (
    paymentId INT NOT NULL AUTO_INCREMENT,
    salaryId INT NOT NULL,
    paymentDate DATE NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    paymentMethod VARCHAR(50) NOT NULL, -- e.g., Cash, Check, Direct Deposit
    PRIMARY KEY (paymentId),
    FOREIGN KEY (salaryId) REFERENCES salary(salaryId)
);
