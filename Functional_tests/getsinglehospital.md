## How to successfully Get a Single Hospital

Description: A user should be able to get a single hospitals from database by ID

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospital/ID" in the URL field with ID being the number ID of the hospital
Select "GET" for the Method field 
Click the "Send" button

Expected Result: All data of the MySQL database concerning this Hospital should be displayed in JSON format
