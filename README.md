# productsApi
Since there is some issue in hosted PHP app, here is documentation for starting it locally.
Issue only occurs on POST and DELETE methods and I assume that it is caused by headers.

Steps for local PHP app:
1. Download and install XAMPP - https://www.apachefriends.org/download.html
2. Download project and extract it to C:\xampp\htdocs
3. Open XAMPP and press "Start" on Apache

Database is hosted on 000webhosting. 
If there is some problems with database, please import products.sql to phpMyAdmin

Steps for setting up the database locally:
1. Open XAMPP and press "MySQL"
2. Then press on "Admin" or open http://localhost/phpMyAdmin in browser
3. Press import and Choose file products.sql
4. Press go
5. In code, go to config/Database.php
6. Change 'db_name' to 'products'
7. Change 'username' to 'root'
8. Change 'password' to '' (empty string)
