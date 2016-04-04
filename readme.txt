XI-IT1 assignment - Mads Riisom and Henrik Frank

In order to run this project, a database with at least one user must be created. Following structure is needed:

-imagedb (database name)
--users (table name)
--images (table name)

The database structure is provided by sql file in root folder (database.sql)

The database must be accessable with user; root, and password; pw

Should it be nessasary to change these information, a database connection file has been created in \App\Kernel\DatabaseConnection.php. Futher instruction are commented in the file.

Dummy data has been provided by the .sql file, where two users has been created (vonfrank and mads), each with password 1234.

To start a server, go to the project root folder from command promt or terminal. In my case following command was needed. Your command is not the same, as your file structure might not be the same:


C:\Users\Von Frank>cd Documents\PhpStorm\Projects\IT_01


Php must be set as a path variable in both windows and mac, in order to run the next command:


php -S 127.0.0.1:8080 server.php


Other ports can also be used. Now the server is running at localhost, port 8080. If python is installed on your machine, just click the PHPServer.py file, in order to start the php server.

Should any problems occour, please contact us on either marii13@student.sdu.dk or hefra13@student.sdu.dk