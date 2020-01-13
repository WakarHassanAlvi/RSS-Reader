# RSS-Reader
Simple RSS Reader Web Application

<h4>For the installation process you must follow these steps:</h4>

<p><b>1.</b> Download and Unzip the zip file at your php root directory.</p>

<p><b>2.</b> Rename the extracted folder as 'feed'.</p>

<p><b>3.</b> Open the .env file in the project root directory. (This file can be hidden in your syatem, check for hidden files also).</p>

<p><b>4.</b> Change the database and smtp credentials in .env file.</p>

<p><b>5.</b> Create the same named database in phpmyadmin which you have saved in .env file.</p>

<p><b>6.</b> Now open terminal in the project root directory.</p>

<p><b>7.</b> Run the command "php artisan migrate".</p>

<p>Thats all, now you can access the project on http://localhost/feed.</p>


<h4>Prerequisites:</h4>

<p><b>-</b> PHP Installed.</p>
<p><b>-</b> Some localhost server installed (e.g. Wamp, Xamp, Lamp etc.).</p>

<h4>Importanat Notes:</h4>

<p><b>-</b> I have used the Laravel version 6.2 and PHP version 7.2.</p>
<p><b>-</b> I am searching for most frequent words only from Author Name, Title , Summary and contents. I am not searching for words in any links.</p>
