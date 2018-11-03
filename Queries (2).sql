#USEFUL QUERIES

#SELECT QUEBEC AND MONTREAL FROM A LIST OF PROVINCES AND CITIES OF CANADA

#1 SHOW ALL CITIES FROM A CERTAIN PROVINCE

SELECT city_name
FROM city, province 
WHERE city.province_ID = province.province_ID AND province_name = 'Quebec';

#2 SHOW ALL COMPANIES FROM A CERTAIN CITY

SELECT company_name 
FROM client, city 
WHERE city.city_ID = client.city_ID AND city_name = 'Montreal';

#3 SELECT FROM THE LIST OF MANAGERS, THOSE ASSIGNED TO CONTRACT 7

SELECT DISTINCT first_name, last_name 
FROM manages, employee 
WHERE manages.manager_ID = employee.employee_ID AND employee.contract_ID = 7;

#4 SEE ALL CONTRACTS AS CLIENT 10024
#Two queries, first with essential information. Second with everything

#Just essentials
SELECT contract_number, start_date, first_name, last_name
FROM contract, employee
WHERE client_ID = 10024 AND employee_ID = lead_ID;

#EVERYTHING
SELECT  contract_number, start_date, first_name, last_name, service_type, ACV, contract_type, initial_amount, business_type
FROM contract, employee, lineOfBusiness
WHERE client_ID = 10024 AND employee_ID = lead_ID AND lineOfBusiness.lineOfBusiness_ID = contract.lineOfBusiness_ID;

#5 SEE NUMBER OF HOURS EMPLOYEE 10000 HAS WORKED ON CURRENT CONTRACT

SELECT TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP, contract_assignment_date), contract_number
FROM employee, contract
WHERE contract.contract_ID = employee.contract_ID AND employee_ID = 10000;

#5B NUMBER OF HOURS EMPLOYEE 10000 WORKED ON CONTRACT 12

SELECT TIMESTAMPDIFF(HOUR,employee_start_date, employee_end_date)
FROM worked_on
WHERE employee_ID = 10000 AND contract_ID = 12;

#6 Number of employees with Premium Employee plan with hours less than 60 hrs/month

SELECT COUNT(employee.employee_ID)
FROM employee, empPlan
WHERE monthly_hours < 60 AND employee.empPlanID = empPlan.empPlanID AND empPlan.plan_name = 'Premium';

#7 Number of Premium contracts delivered in more than 10 business days having more than 35 employees with “Silver Employee Plan”.

SELECT COUNT(DISTINCT contract.contract_ID)
FROM contract, deliverable
WHERE DATEDIFF(actual_completion_date, start_date) >10 AND contract.contract_type = 'Premium' AND 
contract.contract_ID = deliverable.contract_ID AND milestone_number = 3 AND
35 < (SELECT COUNT(employee.employee_ID)
					  FROM employee, empPlan, worked_on
                      WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND 
                      worked_on.contract_ID = contract.contract_ID);	

#7B VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE
SELECT COUNT(*)
FROM contract, deliverable
WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type != 'Silver' AND milestone_number = 3) OR 
(DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type = 'Silver' AND milestone_number = 4));

#7B1 VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE and Gold
SELECT COUNT(*)
FROM contract, deliverable
WHERE contract.contract_ID = deliverable.contract_ID AND DATEDIFF(actual_completion_date,start_date) > duration_days AND 
contract.contract_type = 'Gold' AND milestone_number = 3;

#7B2 VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE and having more than 35 employees with “Silver Employee Plan”
SELECT COUNT(*)
FROM contract, deliverable
WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type != 'Silver' AND milestone_number = 3) OR 
(DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type = 'Silver' AND milestone_number = 4)) AND
35 < (SELECT COUNT(employee.employee_ID)
					  FROM employee, empPlan, worked_on
                      WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND 
                      worked_on.contract_ID = contract.contract_ID);

#7C VARIATION FOR FINDING ALL DELIVERED CONTRACTS having more than 35 employees with “Silver Employee Plan”
SELECT COUNT(*)
FROM contract
WHERE 35 < (SELECT COUNT(employee.employee_ID)
					  FROM employee, empPlan, worked_on
                      WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND 
                      worked_on.contract_ID = contract.contract_ID);

#7C1 VARIATION FOR FINDING ALL DELIVERED CONTRACTS having more than 35 employees with “Silver Employee Plan” AND PREMIUM
SELECT COUNT(*)
FROM contract
WHERE 35 < (SELECT COUNT(employee.employee_ID)
					  FROM employee, empPlan, worked_on
                      WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND 
                      worked_on.contract_ID = contract.contract_ID) AND contract.contract_type = 'Premium';

#10 Make a report to compare the delivery schedule of "First deliverable" of all type of contracts (Premium/Diamond etc.) in each month of year 2017.

SELECT contract.contract_ID, MONTH(actual_completion_date), contract_type, duration_days, DATEDIFF(actual_completion_date, start_date)
FROM contract, deliverable
WHERE contract.contract_ID = deliverable.contract_ID AND milestone_number = 1 AND YEAR(actual_completion_date) = 2017;

#10B Query for silver milestone 3

SELECT contract.contract_ID, MONTH(actual_completion_date), contract_type, duration_days, DATEDIFF(actual_completion_date, start_date)
FROM contract, deliverable
WHERE contract.contract_ID = deliverable.contract_ID AND milestone_number = 3 AND YEAR(actual_completion_date) = 2017 AND contract.contract_type = 'Silver';

#10C Variation for a specific manager 10002

SELECT DISTINCT contract.contract_ID, MONTH(actual_completion_date), contract_type, duration_days, DATEDIFF(actual_completion_date, start_date)
FROM contract, deliverable, worked_on, manages
WHERE contract.contract_ID = deliverable.contract_ID AND worked_on.contract_ID = contract.contract_ID AND milestone_number = 1 AND 
YEAR(actual_completion_date) = 2017 AND worked_on.employee_ID = 10002 AND manager_ID = 10002;

#11 list of clients who have the highest number of contracts in line of business (Consumer Banking)

SELECT company_name
FROM client, contract, lineOfBusiness
WHERE lineOfBusiness.lineOfBusiness_ID = contract.lineOfBusiness_ID AND contract.client_ID = client.client_ID AND business_type = 'Consumer Banking'
GROUP by company_name
ORDER BY COUNT(contract.client_ID) DESC
LIMIT 1;

#12 Details of the contracts recorded within the last 10 days in all categories by sales associate 10005

SELECT contract.contract_ID, start_date, client_ID, service_type, ACV, contract_type, initial_amount, lead_ID, lineOfBusiness_ID
FROM contract, employee
WHERE DATEDIFF(CURRENT_TIMESTAMP, start_date) <=10 AND 10005 = employee_ID AND employee.contract_ID = contract.contract_ID;

#12B Details of the contracts updated/recorded within the last 10 days in all categories by sales associate

SELECT contract.contract_ID, milestone_number, duration_days, actual_completion_date, start_date, client_ID, service_type, ACV, contract_type, initial_amount, lead_ID, lineOfBusiness_ID
FROM deliverable, contract, employee
WHERE contract.contract_ID = deliverable.contract_ID AND (DATEDIFF(CURRENT_TIMESTAMP, actual_completion_date) <=10 OR DATEDIFF(CURRENT_TIMESTAMP, start_date) <=10)
				AND 10005 = employee_ID AND employee.contract_ID = contract.contract_ID;

#13 Fetch all the details of the employees from the “Quebec” province.

SELECT employee_ID, first_name, middle_initial, last_name, department.name, contract_preference, monthly_hours, city_name, province_name, contract_assignment_date 
FROM employee, province, department, city
WHERE employee.province_ID = province.province_ID AND province_name = 'Quebec' AND department.department_ID = employee.department_ID AND city.city_ID = employee.city_ID;

#14 GIVE A LIST OF ALL CONTRACTS IN GOLD CATEGORY

SELECT *
FROM contract
WHERE contract_type = 'Gold';

#15 HIGHEST SATISFACTION SCORE BY CITY
#BASED OFF A LINE OF BUSINESS (1), RETURN FULL INFO OF BUSINESS WITH MOST CONTRACTS

SELECT  city_name, MAX(score_value)
FROM score, contract, client, city
WHERE contract.client_ID = client.client_ID AND city.city_ID = client.city_ID AND score.contract_ID = contract.contract_ID AND contract.lineOfBusiness_ID = 1
GROUP BY city_name;

#16 Find the status of a contract to see if it's completed or not
#Assuming we're looking at contract 1
#Returns a date if completed, NULL otherwise

SELECT actual_completion_date
FROM deliverable, contract
WHERE deliverable.contract_ID = contract.contract_ID AND contract.contract_ID = 1 AND
((milestone_number = 3 AND contract_type != 'Silver') OR (milestone_number = 4 AND contract_type = 'Silver'));