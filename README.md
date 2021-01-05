# Apartment-Manager-System
CSE305 Ravan SADIGLI 20160807005
REPORT – CSE305 
There are two users in the system: admin and residents. These have different abilities.

Admin
•	Admin can create new resident. In this section, admin need to insert resident data about username, password, email, blocktype, apartment number, phonenumber, and date of the when moved in apartment. There are also some validation rules about the password, the phone number, and etc. And, there are only one block and 50 apartments available. For example, if the admin inserts data block type as B or apartment number as 100, it gives an error. If there are more block types and apartment numbers, it can be added.
•	The admin can create new monthly fees for residents. Also, the admin must add a monthly fee to all users once a year. In this section, if the monthly fee is increased after one year, the admin can also increase it in the system. Also, note that the monthly fee increased only once a year.
•	The manager can view the residents' lists and data. In this section, the admin can update and delete data. There is also information about moved in and moved out dates to the apartment. If someone has moved, the manager can update their information about their living status and moved out dates. In addition, the manager can delete the residents' data.
•	Also, the admin can see for which month residents did not pay their fares. For example, if the manager wants to know who has not paid due for September, the manager can list who has not paid fares for September.
•	The admin can add fare to the proper resident. For example, if the resident has a debt to the apartment manager, the manager can add the payment to the resident. Also, note that this section is not for the monthly fare.
•	Admin can add expense details and expense amounts to the resident.
•	The admin can pay resident's monthly fare.
•	Also, the admin can view incoming messages from non-residents.
•	The admin can send an announcement to any user. And, if the resident sees the announcement, the announcement is deleted automatically form database.
•	Admin can view annual reports. In this section, the manager can also view the residents' annual debt. In addition, the admin can view residents' past annual debt.
•	The admin can change his password. Also, all passwords are stored in the database in md5 format, including residents.

Residents
•	Residents can pay their monthly fees. If the manager of the apartment increases the monthly fee, it automatically increases there as well. And residents can see their new monthly debt in the infobox.
•	Residents can see which month he paid or not. For example, if the resident wants to know if he has paid for July or not, he can see if he is not paid.
•	Residents can view their payment history with dates. Residents can also download payment history as pdf.
•	Residents can pay other payments. If the manager of the apartment adds another payment to the resident, the resident can pay it.
•	Residents can view annual income for the monthly fees that collected.
•	The resident can view the expense details and the expense amount for the apartments.
•	Also, the residents can change their password. And, the residents can see the their profile information.

Non-resident
•	Non-residents can send phone number and their message to contact the manager of the apartment.

How to run
First make sure you start Apache and Mysql, then follow the steps below.
1.	Extract file
2.	Copy main project folder and paste it in xampp/htdocs/
3.	Then, go to  http://localhost/phpmyadmin/
4.	Create database name as “mydb”
5.	And, import “mydb.sql”(located in database folder)
6.	Then, go to http://localhost/Apartment-Manager-System-main/

