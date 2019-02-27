#How to successfully create a Single Hospital in the datastore

Description: A user should be able to create a single hospital in the datastore

Precondition: Readme.md instructions have to be set on the computer

Assumption: Chrome is being used, with the RestEasy extension
Input data in JSON format with all Hospital field required (name, city, state, address)
State data field should be 2 characters or less

Test Steps:

Navigate to the RestEasy chrome extension
Enter "http://localhost/casecheckapp/public/index.php/api/v1/hospital" in the URL field
Select "POST" for the Method field 
In the Headers section, click +
Select "Content-Type" for the Name field
Enter "application/json"
In the Body section, enter name, city, state and address for the hospital in JSON format
Click the "Send" button

Expected Result: A new hospital should be added to the datastore