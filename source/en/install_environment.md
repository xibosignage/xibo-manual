<!--toc=getting_started-->
# Choosing your Environment
The [[PRODUCTNAME]] CMS can be run on any operating system that supports PHP/MySQL, the most common installation being "LAMP" (Linux, Apache, MySQL and PHP).

The following pages contain basic guides to configuring the most common environments.

- [Install on Linux](install_environment_linux.html)
- [Install on Windows using XAMPP](install_environment_windows_xampp.html)
- [Install on Windows using IIS](install_environment_windows_iis.html)

## Placing CMS Files
Secure by design, the CMS has a folder structure which intends for only the `web` folder to be in a location served by the web server. This means the web server / hosting must allow files to be placed outside the web location.

There are several strategies for achieving this (this is not an exhaustive list):

### 1. Modify the DocumentRoot
If your document root is `/var/www`, copy the CMS into that folder and then modify the document root to be `/var/www/web`.

### 2. Use a symlink
If your document root is `/var/www`, copy the CMS into a different folder (for example `/home/user/xibo-cms`) and then create a link between `/home/user/xibo-cms/web` and `/var/www/web`. Change the ownership of `/home/user/xibo-cms/web` to www-data (or the user your web server runs under). 

### 3. Use a Virtual Host


### 4. Use an Alias



## URL Rewriting
The CMS should be run on a web server that supports URL rewriting. If this is not possible you will need to access the application by specifying `index.php` in the URL.

A `.htaccess` file has been provided in `web/.htaccess`. This file assumes that the CMS is being served from the web server document root or from a virtual host.


## Using an Alias
The CMS can be run under an alias:

```
Alias /xibo "/home/user/xibo-cms/web"

<Directory "/home/user/xibo-cms/web">
    AllowOverride All
    Options Indexes FollowSymLinks MultiViews
    Order allow,deny
    Allow from all
    Require all granted
</Directory>
```

### Rewrite Rules with an Alias
If an alias is required then the `.htaccess` file will need to be modified to include a `RewriteBase` directive that matches
the alias.

For example, if the alias is `/xibo` the `.htaccess` should have: `RewriteBase /xibo`.