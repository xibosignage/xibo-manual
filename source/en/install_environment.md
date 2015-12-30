<!--toc=getting_started-->
# Choosing your Environment
The [[PRODUCTNAME]] CMS can be run on any operating system that supports PHP/MySQL, the most common installation being "LAMP" (Linux, Apache, MySQL and PHP).

The CMS installation will present a list of requirements on the first installation
 screen. To get that far a web server running PHP 5.5 or later must be available and the CMS files must be served via a web server.

The following pages contain basic guides to configuring the most common environments.

- [Docker](install_docker.html)
- [Install on Linux](install_environment_linux.html)
- [Install on Windows using XAMPP](install_environment_windows_xampp.html)
- [Install on Windows using IIS](install_environment_windows_iis.html)

If using Docker, the below considerations have been addressed and everything is
 already running according to the recommendations.

## Placing CMS Files
Secure by design, the CMS has a folder structure which intends for only the `web` folder to be in a location served by the web server. This means the web server / hosting must allow files to be placed outside the web location.

There are several strategies for achieving this (this is not an exhaustive list):

### 1. Modify the DocumentRoot
If your document root is `/var/www`, copy the CMS into that folder and then modify the document root to be `/var/www/web`.

### 2. Use a symlink
If your document root is `/var/www`, copy the CMS into a different folder (for example `/home/user/xibo-cms`) and then create a link between `/home/user/xibo-cms/web` and `/var/www/web`. Change the ownership of `/home/user/xibo-cms/web` to www-data (or the user your web server runs under).

### 3. Use a Virtual Host
 > TODO

### 4. Use an Alias
The CMS can be run under an alias - this is an example for Apache:

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

## URL Rewriting
The CMS should be run on a web server that supports URL rewriting. If this is not possible you will need to access the application by specifying `index.php` in the URL.

A `.htaccess` file has been provided in `web/.htaccess`. This file assumes that the CMS is being served from the web server document root or from a virtual host.

### Rewrite Rules with an Alias
If an alias is required then the `.htaccess` file will need to be modified to include a `RewriteBase` directive that matches
the alias.

For example, if the alias is `/xibo` the `.htaccess` should have: `RewriteBase /xibo`.

#### nginx
A sample `nginx` config is provided below:

```
location / {
    try_files $uri /index.php?$args;
}

location /api/authorize {
    try_files $uri /api/authorize/index.php?args;
}

location /api {
    try_files $uri /api/index.php?$args;
}

location /install {
    try_files $uri /install/index.php?$args;
}

location /maint {
    try_files $uri /maint/index.php?$args;
}

location /maintenance {
    try_files $uri /index.php?$args;
}

```

<a id="zeroMQ"></a>
## ZeroMQ
[ZeroMQ](http://zeromq.org/) is a low level library used by [[PRODUCTNAME]] to
 manage push messaging between the CMS and Players. The ZeroMQ PHP bindings are
 required for this to function. XMR will not run without ZeroMQ installed.

Installation of the ZeroMQ bindings can be complicated - we've included an example
 of installation on Ubuntu 14.04. We recommend using our Docker container for
 easy installation.

### Install the ZeroMQ core and PHP bindings from PPA
Installation via `apt-get`.

```bash
sudo add-apt-repository ppa:chris-lea/zeromq
sudo add-apt-repository ppa:alexharrington/php-zmq
sudo apt-get update
sudo apt-get install php5-zmq
```

### Install the ZeroMQ PHP bindings manually
If you can't install from the PPA directly, then you can do the following to
install the zmq extension.

Installation via `PECL`.

```bash
sudo add-apt-repository ppa:chris-lea/zeromq
sudo apt-get install libzmq3 libzmq3-dev libzmq3-dbg pkg-config php5-dev build-essential php-pear
sudo pecl install zmq-beta
```

Add the `extension=zmq.so` directive to your `php.ini` file and restart your
 web server.
