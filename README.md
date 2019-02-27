# Casecheck Coding Challenge

## General
First, we will be building a simple RESTful API using Slip 3.0 PHP Framework for API development. 
We will use XAMPP, an Apache distribution containing notably the Apache web server, PHP and MariaDB (MySQL) and phpMyAdmin.
We will use the Composer dependency manager for php to declare and manage the libraries for us.
We will use the RestEASY tool for Chrome to make our API calls.

## Set up
Please download from the Git repository the casecheckapp folder and hospitals.sql.

Go to https://www.apachefriends.org/download.html, choose XAMPP 7.3.2 / PHP 7.3.2 for your OS and download it

Run the xampp installer. If running on Windows, When asked, install it at the "C://" location. Launch XAMPP Control Panel.

Create a 'casecheckapp' folder in the xampp/htdocs folder and paste the whole content of the 'casecheckapp_master' folder that you just downloaded. 

On Windows, on the XAMPP Control Panel, start mysql and apache (under Actions : Start). On MAC, click Mount. Allow access to everything if needed.

Type localhost in your Chrome browser, it will take you to the XAMPP welcome page. Click Phpmyadmin on the up right hand corner.
Create a new database and call it casecheckapp. In this database (it should be empty), click Import and select 'hospitals.sql' file. Let all default parameters for the database creation.

If you navigate to the Browse section of phpmyadmin in the casecheck database, you can see that the hospital database has been created. If you click on it, you'll display all elements from the database.

Please download the RestEasy extension for Chrome and launch it. You can now make your functional tests from there as described in the Functional tests folder.

## Unit testing

### Set up

In your htdocs/casecheckapp folder, please run :
'''
composer require phpunit/phpunit
composer require guzzlehttp/guzzle
'''
Composer should be available thanks to the Slim Framework.

Please include the tests (casecheckCC/casecheckapp/tests) folder at the root of your project at htdocs/casecheckapp.
Please make sure you also download the phpunit.xml file in your htdocs/casecheckapp folder.

### Run tests
Run '''phpunit''' from a command line in xampp/htdocs/casecheckapp folder.

## Discussion

## Unit testing

The unit testing provided is not exhaustive and would need additional testing, as the assertion of IDs for example.
