#How to successfully update a Single Hospital in the datastore

Description: A user should be able to update a single hospital by ID in the datastore

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension
Input data in JSON format with all Hospital field required (name, city, state, address)
State data field should be 2 characters or less

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospital/ID" in the URL field
Select "PUT" for the Method field 
In the Headers section, click +
Select "Content-Type" for the Name field
Enter "application/json"
In the Body section, enter new name, city, state and address for the hospital in JSON format
Click the "Send" button

Expected Result: The hospital with the matching ID should be updated with the input from user in the datastore