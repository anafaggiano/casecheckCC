# How to successfully delete a Single Hospital from the datastore

Description: A user should be able to delete a single hospital from the datastore

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospital/ID" in the URL field with ID being the ID of the hospital to delete from the datastore
Select "DELETE" for the Method field 
Click the "Send" button


Expected Result: The hospital with the matching ID should be deleted from the datastore

