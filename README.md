# Search Script
This is a small PHP script file which can be used as standalone application to perform search task in files.
This file is used to find a keyword in a source code in any PHP based source code. Mainly created to be used in Magento setups to find a keyword in its related files. It can be used in any PHP based setup like Magento, Wordpress, Laravel, CodeIgniter, CakePHP, etc.

How to use?<br />
Put search.php file in your system's root folder and access it with URL<br />
http:://yourhostname.com/search.php

It asks for 3 input, <br />
Search Keyword (compulsory) <br />
Name of Directory (Optional)<br />
File Extension (Optional)

![ScreenShot](https://jsutariya.files.wordpress.com/2017/01/search-script.png?w=640)

Search Keyword is the keyword you want to search in your filesystem (Keyword is case sensitive)

Name of Directory will be the name of the directory in which you want to search the keyword. If not specified, it will search in all directories of root folder in which the file is placed. It is recommeded to use directory name, if you know the location of the file. You can add sub directory with its path like, app/code/local

File Extension will be the extension of the file in which you want to seach a specific keyword. It accepts multiple values with comma separated like, "php,phtml,xml" It will search through only those files with specified extension.

When you click on search button, it will search from all files as per criteria and will display you the results with the file containing the keyword.

![ScreenShot](https://jsutariya.files.wordpress.com/2017/01/search-script2.png?w=640)
