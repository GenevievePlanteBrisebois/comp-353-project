INSERT INTO lineOfBusiness (lineOfBusiness_ID, business_type)
VALUES(1, 'Cloud Services'),(2, 'Bisiness Development And Reserach'),
      (3, 'Marketing'),(4, 'Business Analysis'),(5, 'Consumer Banking');


INSERT INTO province (province_name)
VALUES('Ontario'),('Quebec'),('British Columbia'),('Alberta'),('Manitoba'),
      ('Saskatchewan'),('Nova Scotia'),('New Brunswick'),('Newfoundland and Labrador'),
      ('Prince Edward island'),('Northwest Territories'),('Nunavut'),('Yukon');

INSERT INTO city (city_name, province_ID)
VALUES('Calgary', 4),('Edmonton', 4),('Vancouver', 3),('Surrey', 3),
('Winnipeg', 5),('Brandon', 5),('Moncton', 8),('Saint John', 8),('St. Johns', 9),
('Conception Bay South', 9),('Yellowknife', 11),('Hay River', 11),('Halifax', 7),('Sydney', 7),
('Iqaluit', 12),('Arviat', 12),('Toronto', 1),('Ottawa', 1),('Charlottetown', 10),
('Summerside', 10),('Montreal', 2),('Quebec city', 2),('Saskatoon', 6),('Regina', 6),
('Whitehorse', 13),('Dawson City', 13);


INSERT INTO empPlan(empPlanID, plan_name, reimbursed_amount_percent)
VALUES (1, 'Premium', 0.90),
       (2, 'Silver', 0.80),
       (3, 'Normal', 0.70);


INSERT INTO department(department_ID, name)
VALUES (1, 'Development'),(2, 'QA'),
      (3, 'UI'),(4, 'Design'),(5, 'Networking'),
      (6, 'Business Intelligence');

INSERT INTO user(username, password)
VALUES ('empl_1','1111'),('empl_2','1111'),('empl_3','1111'),('empl_4','1111'),
      ('empl_5','1111'),('empl_6','1111'),('empl_7','1111'),('empl_8','1111'),
      ('empl_9','1111'),('empl_10','1111'),('empl_11','1111'),('empl_12','1111'),
      ('empl_13','1111'),('empl_14','1111'),('empl_15','1111'),('empl_16','1111'),
      ('empl_17','1111'),('empl_18','1111'),('empl_19','1111'),('empl_20','1111'),
      ('empl_21','1111'),('empl_22','1111'),('empl_23','1111'),('empl_24','1111'),
      ('empl_25','1111'),('empl_26','1111'),('empl_27','1111'),('empl_28','1111'),
      ('empl_29','1111'),('empl_30','1111'),('empl_31','1111'),('empl_32','1111'),
      ('empl_33','1111'),('empl_34','1111'),('empl_35','1111'),('empl_36','1111'),
      ('empl_37','1111'),('empl_38','1111'),('empl_39','1111'),('empl_40','1111'),
      ('empl_41','1111'),('empl_42','1111'),('empl_43','1111'),('empl_44','1111'),
	  ('empl_45','1111'),('empl_46','1111'),('empl_47','1111'),('empl_48','1111'),
	  ('empl_49','1111'),('empl_50','1111'),('empl_51','1111'),('empl_52','1111'),
      ('empl_53','1111'),('empl_54','1111'),('empl_55','1111'),('empl_56','1111'),
      ('empl_57','1111'),('empl_58','1111'),('empl_59','1111'),('empl_60','1111');



INSERT INTO employee(employee_ID, first_name, last_name, middle_initial, department_ID,
            contract_preference, monthly_hours, city_ID, province_ID, contract_ID,
            empPlanID, contract_assignment_date)
VALUES(10000,'Jack', 'Sparrow', 'JS', 1, 'Premium', 160, 1, 4, NULL, 3, NULL),
      (10001,'Mary', 'Scott', 'MS', 2, 'Silver', 160, 2, 4, NULL, 3, NULL),
      (10002,'David', 'Sanchez', 'DS', 3, 'Silver', 160, 3, 3, NULL, 3, NULL),
      (10003,'Louis', 'Paladin', 'LP', 4, 'Premium', 160, 4, 3, NULL, 2, NULL),
      (10004,'Kratos', 'Vegas', 'KV', 5, 'Gold', 160, 5, 5, NULL, 3, NULL),
      (10005,'George', 'Tremblay', 'GT', 6, 'Gold', 160, 6, 5, NULL, 2, NULL),
      (10006,'Shin-Ae', 'Yoo', 'SY', 1, 'Gold', 160, 17, 1, NULL, 2, NULL),
      (10007,'Aria', 'Stark', 'AT', 2, 'Silver', 160, 17, 1, NULL, 2, NULL),
      (10008,'Joey', 'Saporo', 'JS', 3, 'Premium', 160, 17, 1, NULL, 2, NULL),
      (10009,'Elizabeth', 'Swan', 'ES', 4, 'Silver', 160, 17, 1, NULL, 2, NULL),
      (10010,'Paul', 'Brahms', 'PB', 5, 'Gold', 160, 18, 1, NULL, 1, NULL),
      (10011,'James', 'Gad', 'JG', 6, 'Silver', 160, 17, 1, NULL, 1, NULL),
      (10012,'Dominic', 'Gad', 'DG', 1, 'Premium', 160, 17, 1, NULL, 1, NULL),
      (10013,'Mimir', 'Talker', 'MT', 2, 'Silver', 160, 18, 1, NULL, 1, NULL),
      (10014,'Vivian', 'Witch', 'VW', 3, 'Premium', 160, 21, 2, NULL, 2, NULL),
      (10015,'Hajar', 'Malik', 'HM', 4, 'Silver', 160, 21, 2, NULL, 2, NULL),
      (10016,'Belle', 'Lafleur', 'BL', 5, 'Gold', 160, 21, 2, NULL, 3, NULL),
      (10017,'Blaine', 'Marquis', 'BM', 6, 'Silver', 160, 21, 2, NULL, 3, NULL),
      (10018,'Annick', 'Jodoin', 'AJ', 1, 'Gold', 160, 21, 2, NULL, 2, NULL),
      (10019,'Yan', 'Carni', 'YC' , 2, 'Gold', 160, 21, 2, NULL, 3, NULL),
      (10020,'Hermione', 'Granger', 'HG', 3, 'Gold', 160, 22, 2, NULL, 3, NULL),
      (10021,'Bruce', 'Willis', 'BW', 3, 'Gold', 160, 22, 2, NULL, 2, NULL),
      (10022,'Freya', 'Midgard', 'FM', 4, 'Silver', 160, 22, 2, NULL, 3, NULL),
      (10023,'Abe', 'Buttercream', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10024,'Maxwell', 'Bullet', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10025,'Heliet', 'Quill', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10026,'Salvo', 'Delmont', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10027,'Miro', 'Squeel', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10028,'Jessice', 'Slice', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10029,'Chris', 'Karter', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10030,'Koulash', 'Kylal', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10031,'Christina', 'Konta', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10032,'Korin', 'Cleamwater', 'AB', 1, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10033,'Spalish', 'Bo', 'AB', 2, 'Premium', 40, 21, 2, NULL, 2, NULL),
      (10034,'Nick', 'Norway', 'AB', 2, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10035,'Spike', 'Spiegal', 'AB', 2, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10036,'Drek', 'Salamai', 'AB', 2, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10037,'Damian', 'Gollit', 'AB', 2, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10038,'Shelly', 'Buam', 'AB', 2, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10039,'Max', 'Bug', 'AB', 3, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10040,'Crumb', 'Bubgg', 'AB', 4, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10041,'Alex', 'Fontana', 'AB', 5, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10042,'Maxime', 'Lozer', 'AB', 5, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10043,'Sami', 'Zueam', 'AB', 5, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10044,'Simon', 'Lomm', 'AB', 5, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10045,'Andrew', 'Dream', 'AB', 5, 'Premium', 50, 21, 2, NULL, 2, NULL),
      (10046,'Hector', 'Banagaras', 'AB', 5, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10047,'Victor', 'Butch', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10048,'Laurence', 'Levin', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10049,'Mark', 'Dutercream', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10050,'Stinky', 'Pete', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10051,'Dank', 'Memes', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10052,'Pepe', 'Lefrog', 'AB', 4, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10053,'Samus', 'Aran', 'AB', 3, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10054,'Mario', 'Mario', 'AB', 3, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10055,'Sonic', 'Hedgis', 'AB', 3, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10056,'Monsieur', 'Roberto', 'AB', 3, 'Premium', 60, 21, 2, NULL, 2, NULL),
      (10057,'Fanny', 'Buttercream', 'AB', 1, 'Premium', 100, 21, 2, NULL, 2, NULL),
      (10058,'Crab', 'King', 'AB', 1, 'Premium', 80, 21, 2, NULL, 2, NULL),
      (10059,'Alex', 'Saber', 'AS', 1, 'Premium', 90, 21, 2, NULL, 2, NULL);


INSERT INTO manages(manager_ID, employee_ID)
VALUES(10000, 10005), (10000, 10006), (10000, 10007), (10000, 10008),
      (10001, 10009), (10001, 10010), (10001, 10011), (10001, 10012),
      (10002, 10013), (10002, 10014), (10002, 10015), (10002, 10016),
      (10003, 10017), (10003, 10018), (10003, 10019), (10003, 10020),
      (10004, 10021), (10004, 10022), (10004, 10023),
      (10000, 10024), (10000, 10025), (10000, 10026), (10000, 10027),
      (10000, 10028), (10000, 10029), (10000, 10030), (10000, 10031),
      (10000, 10032), (10000, 10033), (10000, 10034), (10000, 10035),
      (10000, 10036), (10000, 10037), (10000, 10038), (10000, 10039),
      (10000, 10040), (10000, 10041), (10000, 10042), (10000, 10043),
      (10000, 10044), (10000, 10045), (10000, 10046), (10000, 10047),
      (10000, 10048), (10000, 10049), (10000, 10050), (10000, 10051),
      (10000, 10052), (10000, 10053), (10000, 10054), (10000, 10055),
      (10000, 10056), (10000, 10057), (10000, 10058), (10000, 10059);


INSERT INTO user (username, password)
VALUES('client_1','2222'),('client_2','2222'),('client_3','2222'),('client_4','2222'),
      ('client_5','2222'),('client_6','2222'),('client_7','2222'),('client_8','2222'),
      ('client_9','2222'),('client_10','2222');

INSERT INTO client (client_ID, f_name, l_name, initials, phone_number, street_address,
        postal_code, city_ID, province_ID, company_name, email)
VALUES(10060, 'Daniel','Ayers','DA','(403)520-7536','1104 184th Street', 'T4N 2A6', 1, 4, 'Golddex', 'monkeydo@live.com'),
      (10061, 'Adam','Riggs','AR','(416)340-1985','4770 Princess St', 'K7L 1C2', 2, 4, 'Donware', 'tfinniga@outlook.com'),
      (10062, 'Akeem','Sexton','AS','(514)433-8939','18 Kinchant St', 'V2P 4H8', 3, 3, 'Iselectrics', 'chrwin@me.com'),
      (10063, 'Tobias','Lopez','TL','(450)491-4839','4054 Hardy Street', 'V1Y 8H2', 4, 3, 'Statholdings', 'josephw@yahoo.ca'),
      (10064, 'Helen','Gilmore','HG','(604)781-2739','89 rue des Champs', 'G7H 4N3', 17, 1, 'Konex', 'pereinar@hotmail.com'),
      (10065, 'Justine','Wilkins','JW','(306)652-1751','3212 Birkett Lane', 'N3T 2Z8', 17, 1, 'Zoomit', 'scarlet@mac.com'),
      (10066, 'Nolan','James','NJ','(705)395-8915','4780 49th Avenue', 'X0E 1J0', 18, 1, 'Betatech', 'esbeck@outlook.com'),
      (10067, 'Jakeem','Hoover','JH','(204)699-7331','757 Reserve St', 'K0H 2W0', 21, 2, 'Scottech', 'leakin@live.com'),
      (10068, 'Quinlan','Koch','QK','(226)852-6357','709 Blanshard', 'V8W 2H9', 22, 2, 'Doncon', 'mhoffman@comcast.net'),
      (10069, 'Molly','Soto','MS','(226)822-6567','415 Granville St', 'B3J 3N2', 21, 2, 'Opentech', 'evilopie@icloud.com');


INSERT INTO user (username, password)
VALUES('admin_1','0000'),('admin_2','0000');

INSERT INTO dbadmin ()
VALUES (10070), (10071);


INSERT INTO contract (contract_number, start_date, client_ID, service_type, ACV, contract_type,
            initial_amount, lead_ID, lineOfBusiness_ID)
VALUES('3495879745', '2017-10-24', 10060, 'Cloud', 100000.00, 'Silver', 9500.00, 10000 , 1),
      ('5748930345', '2017-6-10', 10061, 'Cloud', 200000.00, 'Silver', 7500.00, 10000, 2),
      ('2345708678', '2017-3-14', 10062, 'Cloud', 300000.00, 'Diamond', 5500.00, 10000, 3),
      ('9384675695', '2017-2-24', 10063, 'On-Premises', 500000.00, 'Silver', 10000.00, 10001, 4),
      ('5782559236', '2016-8-16', 10064, 'Cloud', 400000.00, 'Gold', 9000.00, 10001, 5),
      ('2928465756', '2016-4-18', 10065, 'Cloud', 100000.00, 'Gold', 6000.00, 10001, 1),
      ('0298465684', '2018-08-06', 10066, 'On-Premises', 200000.00, 'Silver', 5000.00, 10002, 2),
      ('4849376539', '2018-1-24', 10067, 'Cloud', 200000.00, 'Silver', 3000.00, 10002, 3),
      ('2922484347', '2016-6-24', 10068, 'Cloud', 700000.00, 'Gold', 4000.00, 10003, 4),
      ('2958567383', '2017-10-24', 10069, 'On-Premises', 800000.00, 'Silver', 90000.00, 10004, 5),
      ('4885776757', '2017-3-24', 10069, 'On-Premises', 900000.00, 'Diamond', 100000.00, 10004, 5),
      ('2922484347', '2016-6-24', 10064, 'Cloud', 1000000.00, 'Gold', 500000.00, 10004, 4),
      ('2958567383', '2017-10-24', 10060, 'On-Premises', 400000.00, 'Silver', 5000.00, 10004, 3),
      ('4885776757', '2017-3-24', 10064, 'Cloud', 900000.00, 'Silver', 5000.00, 10005, 2),
      ('4885776800', '2018-06-01',10060,'Cloud', 1200500, 'Premium', 250000, 10000, 2),
      ('5005776255', '2018-08-08',10061,'Cloud', 1300200, 'Premium', 280000, 10000, 1),
	  ('3005776600', '2018-08-05',10066,'On-Premises', 540000, 'Gold', 8000, 10001, 3);


INSERT INTO score (client_ID, contract_ID, score_value)
VALUES(10060, 1, 5), (10061, 2, 6), (10062, 3, 2), (10063, 4, 5), (10064, 5, 7),
      (10065, 6, 8),(10066, 7, NULL),(10067, 8, 4),(10068, 9, 5),(10069, 10, 7),
      (10069, 11, 1),(10064, 12, 3),(10060, 13, 6),(10064, 14, 10),(10060, 15, 3),
      (10061,16,NULL),(10066,17,NULL);

INSERT INTO deliverable (contract_ID, milestone_number, duration_days, actual_completion_date)
VALUES(1, 1, 5, '2017-10-29'), (1, 2, 15, '2017-11-8'), (1, 3, 20, '2017-11-13'), (1, 4, 28, '2017-11-22'),
      (2, 1, 5, '2017-6-15'), (2, 2, 15, '2017-6-25'), (2, 3, 20, '2017-6-30'), (2, 4, 28, '2017-7-8'),
      (3, 1, 6, '2017-3-20'), (3, 2, 11, '2017-3-25'), (3, 3, 18, '2017-4-01'),
      (4, 1, 5, '2017-3-01'), (4, 2, 15, '2017-3-11'), (4, 3, 20, '2017-3-16'), (4, 4, 28, '2017-3-27'),
      (5, 1, 8, '2016-8-24'), (5, 2, 14, '2016-8-29'), (5, 3, 20, '2016-8-04'),
      (6, 1, 8, '2016-4-26'), (6, 2, 14, '2016-5-2'), (6, 3, 20, '2016-5-08'),
      (7, 1, 5, NULL), (7, 2, 15, NULL), (7, 3, 20, NULL), (7, 4, 28, NULL),
      (8, 1, 5, '2018-1-29'), (8, 2, 15, '2018-2-8'), (8, 3, 20, '2018-2-13'), (8, 4, 28, '2018-2-22'),
      (9, 1, 8, '2016-7-02'), (9, 2, 14, '2016-7-8'), (9, 3, 20, '2016-7-14'),
      (10, 1, 5, '2017-10-29'), (10, 2, 15, '2017-11-8'), (10, 3, 20, '2017-11-13'), (10, 4, 28, '2017-11-22'),
      (11, 1, 6, '2017-3-30'), (11, 2, 11, '2017-4-7'), (11, 3, 18, '2017-4-27'),
      (12, 1, 5, '2016-6-29'), (12, 2, 15, '2016-7-8'), (12, 3, 20, '2016-7-23'),
      (13, 1, 5, '2017-10-29'), (13, 2, 15, '2017-11-8'), (13, 3, 20, '2017-11-13'), (13, 4, 28, '2017-11-22'),
      (14, 1, 5, '2017-3-29'), (14, 2, 15, '2017-4-8'), (14, 3, 20, '2017-4-13'), (14, 4, 28, '2017-4-22'),
      (15, 1, 3, '2018-06-04'), (15, 2, 5, '2018-06-07'), (15, 3, 10, '2018-06-13'),
      (16, 1, 3, '2018-08-11'), (16, 2, 5, '2018-08-13'), (16, 3, 10, NULL),
      (17, 1, 8, '2018-08-13'), (17, 2, 14, NULL), (17, 3, 20, NULL);
 
#ASSIGN EMPLOYEES TO THEIR CURRENT CONTRACTS 
UPDATE EMPLOYEE SET contract_ID = 7, contract_assignment_date = '2018-08-06' WHERE employee_ID = 10013 OR employee_ID = 10014 OR
employee_ID = 10015 OR employee_ID = 10016 OR employee_ID = 10002;

UPDATE EMPLOYEE SET contract_ID = 16, contract_assignment_date = '2018-08-08' WHERE employee_ID = 10000 OR employee_ID = 10005 OR
employee_ID = 10006 OR employee_ID = 10007 OR employee_ID = 10008 OR employee_ID > 10023;

UPDATE EMPLOYEE SET contract_ID = 17, contract_assignment_date = '2018-08-05' WHERE employee_ID = 10001 OR employee_ID = 10009 OR
employee_ID = 10010 OR employee_ID = 10011 OR employee_ID = 10012 OR employee_ID = 10003 OR employee_ID = 10004 OR
(employee_ID > 10016 AND employee_ID < 10024);
