<!--toc=getting_started-->
#CMS Installation
**Content Management System**
The [[PRODUCTNAME]] CMS is a PHP web application which sits on a MySQL database. The PHP / MySQL combination is very popular as a web platform and can be run on Linux or Windows servers.

We have provided some basic instructions for installing your own web server [here](install_environment.html).

## Installation
Beyond this point we assume you have a web server running with PHP and MySQL and that you have the compressed archive (ZIP or Tarball) of the CMS installation package.

The screen shots and instructions below assume a windows installation - however the same is true for Linux.

The basic process is as follows:
1. Download and extract the archive
2. Starting the Installation
3. Pre-requisites
4. Creating the database
5. Database details
6. Starting the Installation
7. Final Configuration
8. Complete

###Download and extract the archive
The CMS archive contains a sub folder called Xibo-server-1.7.0-beta, copy this folder into your web root and rename as necessary. In the simplest of web server configurations the name of this folder will be the name of the URL you use to access the CMS. For example: `http://localhost/your target folder name`

![Screen shot of extracted archive](img/win32_install_extracted.png)

At this point we should also make a folder for the CMS library. This will be used to store images, videos and other file based media that is uploaded to the CMS. Once created make a note of the path as the CMS installation will require this information.

###Starting the Installation
Now open your web browser (Mozilla Firefox, Internet Explorer etc). In the address bar, enter `http://localhost/your target folder name`. You should see the Xibo Installer start screen. Click "Next".

###Pre-requisites
The installer contains a detailed check list of all the items required for a successful installation. Each item will have either:

* A tick - the item is present and correct
* An exclamation mark - the item is present but may not be configured correctly.
* A cross - the item is missing.


