DROP DATABASE IF EXISTS `final_prj`;
CREATE DATABASE IF NOT EXISTS `final_prj`;
USE final_prj;

CREATE TABLE user (
  ID INT(5) NOT NULL AUTO_INCREMENT,
  username VARCHAR(10) NOT NULL,
  password VARCHAR (10) NOT NULL,
  privilege CHAR(10) NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE dbadmin (
  ID INT(5) NOT NULL
) ENGINE = INNODB;

CREATE TABLE employee (
  employee_ID INT (5) NOT NULL,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  middle_initial CHAR(2) NOT NULL,
  department_ID CHAR(20) NOT NULL,
  contract_preference CHAR(7),
  monthly_hours INT(3) NOT NULL DEFAULT 160,
  city_ID INT (5) NOT NULL,
  province_ID INT (5) NOT NULL,
  contract_ID INT(5),
  empPlanID INT(5),
  contract_assignment_date DATE
) ENGINE = INNODB;

CREATE TABLE client (
  client_ID INT(5) NOT NULL,
  f_name VARCHAR(20) NOT NULL,
  l_name VARCHAR(20) NOT NULL,
  initials CHAR (2),
  phone_number VARCHAR(15),
  street_address VARCHAR (30) NOT NULL,
  postal_code VARCHAR(7) NOT NULL,
  city_ID INT (5) NOT NULL,
  province_ID INT (5) NOT NULL,
  company_name VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL
) ENGINE = INNODB;


CREATE TABLE contract (
  contract_ID INT(5) NOT NULL AUTO_INCREMENT,
  contract_number VARCHAR(10) NOT NULL,
  start_date DATE,
  client_ID INT (5) NOT NULL,
  service_type VARCHAR(12),
  ACV DECIMAL (9, 2) NOT NULL DEFAULT 0.00,
  contract_type CHAR(7) NOT NULL,
  initial_amount DECIMAL (9, 2) NOT NULL DEFAULT 0.00,
  lead_ID INT (5) NOT NULL,
  lineOfBusiness_ID INT (5) NOT NULL,
  PRIMARY KEY (contract_ID)
) ENGINE = INNODB;


CREATE TABLE manages (
  manager_ID INT (5) NOT NULL,
  employee_ID INT(5) NOT NULL
) ENGINE = INNODB;


CREATE TABLE empPlan (
  empPlanID INT (5) NOT NULL,
  plan_name CHAR(7) NOT NULL,
  reimbursed_amount_percent DECIMAL (6, 2) NOT NULL DEFAULT 0.00
) ENGINE = INNODB;


CREATE TABLE department (
  department_ID INT (5) NOT NULL,
  name VARCHAR(25) NOT NULL
) ENGINE = INNODB;


CREATE TABLE city (
  city_ID INT (5) NOT NULL AUTO_INCREMENT,
  city_name VARCHAR (20) NOT NULL,
  province_ID INT(5) NOT NULL,
  PRIMARY KEY (city_ID)
) ENGINE = INNODB;


CREATE TABLE province (
  province_ID INT (5) NOT NULL AUTO_INCREMENT,
  province_name VARCHAR(30) NOT NULL,
  PRIMARY KEY (province_ID)
) ENGINE = INNODB;


CREATE TABLE lineOfBusiness (
  lineOfBusiness_ID INT (5) NOT NULL,
  business_type VARCHAR(50)
) ENGINE = INNODB;


CREATE TABLE score (
  client_ID INT (5) NOT NULL,
  contract_ID INT (5) NOT NULL,
  score_value INT (2)
) ENGINE = INNODB;


CREATE TABLE deliverable (
  contract_ID INT(5) NOT NULL,
  milestone_number INT(2) NOT NULL,
  duration_days INT(3) NOT NULL,
  actual_completion_date DATE
) ENGINE = INNODB;

CREATE TABLE worked_on (
employee_ID INT(5) NOT NULL,
contract_ID INT(5) NOT NULL,
employee_start_date DATE NOT NULL,
employee_end_date DATE
) ENGINE = INNODB;

ALTER TABLE dbadmin ADD PRIMARY KEY (ID);
ALTER TABLE employee ADD PRIMARY KEY (employee_ID);
ALTER TABLE client ADD PRIMARY KEY (client_ID);
ALTER TABLE manages ADD PRIMARY KEY (employee_ID, manager_ID);
ALTER TABLE empPlan ADD PRIMARY KEY (empPlanID);
ALTER TABLE department ADD PRIMARY KEY (department_ID);
ALTER TABLE lineOfBusiness ADD PRIMARY KEY (lineOfBusiness_ID);
ALTER TABLE score ADD PRIMARY KEY (client_ID, contract_ID);
ALTER TABLE deliverable ADD PRIMARY KEY (contract_ID, milestone_number);
ALTER TABLE worked_on ADD PRIMARY KEY(employee_ID, contract_ID);




ALTER TABLE user auto_increment = 10000;
ALTER TABLE dbadmin
ADD FOREIGN KEY (ID) REFERENCES user (ID);
ALTER TABLE employee
ADD FOREIGN KEY (employee_ID) REFERENCES user (ID),
ADD FOREIGN KEY (contract_ID) REFERENCES contract (contract_ID),
ADD FOREIGN KEY (city_ID) REFERENCES city (city_ID),
ADD FOREIGN KEY (empPlanID) REFERENCES empPlan (empPlanID),
ADD FOREIGN KEY (province_ID) REFERENCES province (province_ID);
ALTER TABLE client
ADD FOREIGN KEY (city_ID) REFERENCES city (city_ID),
ADD FOREIGN KEY (province_ID) REFERENCES province (province_ID);
ALTER TABLE contract
ADD FOREIGN KEY (lead_ID) REFERENCES employee(employee_ID),
ADD FOREIGN KEY (client_ID) REFERENCES client(client_ID),
ADD FOREIGN KEY (lineOfBusiness_ID) REFERENCES lineOfBusiness(lineOfBusiness_ID);
ALTER TABLE manages
ADD FOREIGN KEY (employee_ID) REFERENCES employee (employee_ID),
ADD FOREIGN KEY (manager_ID) REFERENCES employee(employee_ID);
ALTER TABLE city
ADD FOREIGN KEY (province_ID) REFERENCES province (province_ID);
ALTER TABLE deliverable
ADD FOREIGN KEY (contract_ID) REFERENCES contract (contract_ID);
ALTER TABLE worked_on
ADD FOREIGN KEY (contract_ID) REFERENCES contract (contract_ID);
ALTER TABLE worked_on
ADD FOREIGN KEY (employee_ID) REFERENCES employee (employee_ID);
