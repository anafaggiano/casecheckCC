#How to successfully Get the collection of Hospitals

Description: A user should be able to get all hospitals from database

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospitals" in the URL field
Select "GET" for the Method field 
Click the "Send" button

Expected Result: All hospitals data contained in the MySQL database should be displayed in JSON format

##How to successfully Get the collection of Hospitals and filter result by city

Description: A user should be able to get all hospitals filtered by city from database

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospitals/"Cityname"" in the URL field, with Cityname between quotation marks
Select "GET" for the Method field 
Click the "Send" button

Expected Result: All hospitals data which city is Cityname contained in the MySQL database should be displayed in JSON format