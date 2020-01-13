# RSS-Reader
Simple RSS Reader Web Application

<h4>For the installation process you must follow these steps:</h4>

<b>1.</b> Unzip the shared file at your php root directory.

<b>2.</b> Open the .env file in the project root directory. (This file can be hidden in your syatem, check for hidden files also).

3. Change the database and smtp credentials in .env file.

4. Create the same named database in phpmyadmin which you have saved in .env file.

5. Now open terminal in the project root directory.

6. Run the command "php artisan migrate".

Thats all, now you can access the project on http://localhost/feed.


<h4>Prerequisites:</h4>

- PHP Installed.
- Some localhost server installed (e.g. Wamp, Xamp, Lamp etc.).

<h4>Importanat Notes:</h4>

- I have used the Laravel version 6.2 and PHP version 7.2.
- I am searching for most frequent words only from Author Name, Title , Summary and contents. I am not searching for words in any links. 
