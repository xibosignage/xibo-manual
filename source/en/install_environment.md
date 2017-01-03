<!--toc=getting_started-->
# Choosing your Environment

The [[PRODUCTNAME]] CMS can be run on any operating system that supports
PHP/MySQL, the most common installation being "LAMP" (Linux, Apache, MySQL and
PHP).

The CMS installation will present a list of requirements on the first
installation screen. To get that far a web server running PHP 5.5.9 or later must
be available and the CMS files must be served via a web server.

A Docker environment is the easiest for installation and maintenance and we encourage all users
to consider using Docker.

- [Docker](install_docker.html)

If Docker is not available the following pages contain basic guides to configuring the most common
environments. These are intended as a guide only and the latest documentation from the OS/software
vendor should be used when available.

- [Install on Linux](install_environment_linux.html)
- [Install on Windows using XAMPP](install_environment_windows_xampp.html)
- [Install on Windows using IIS](install_environment_windows_iis.html)

### Docker

If using Docker, the below considerations have been addressed and everything is
already running according to the recommendations. This means you can stop here
and get started with the [tour](tour.html).

## Placing CMS Files

Secure by design, the CMS has a folder structure which intends for only the
`web` folder to be in a location served by the web server. This means the web
server / hosting must allow files to be placed outside the web location.

There are several strategies for achieving this (this is not an exhaustive list):

### 1. Modify the DocumentRoot
If your document root is `/var/www`, copy the CMS into that folder and then modify the document 
root to be `/var/www/web`.

### 2. Use a symlink
If your document root is `/var/www`, copy the CMS into a different folder 
(for example `/home/user/xibo-cms`) and then create a link between `/home/user/xibo-cms/web` 
and `/var/www/web`. Change the ownership of `/home/user/xibo-cms/web` to www-data (or the user 
your web server runs under).

### 3. Use a Virtual Host
A virtual host may be used:

```
<VirtualHost *:80>
    DocumentRoot "/var/www/web"
    ServerName www.example.com

    # Other directives here
    AllowOverride All
    Options Indexes FollowSymLinks MultiViews
    Order allow,deny
    Allow from all
    Require all granted
</VirtualHost>
```

Any Virtual Host configuration that points to the `/web` folder of the release archive and enables
the `.htaccess` file is sufficient.

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
The CMS should be run on a web server that supports URL rewriting. If this is not possible you 
will need to access the application by specifying `index.php` in the URL.

### Apache
A `.htaccess` file has been provided in `web/.htaccess`. This file assumes that the CMS is being served from the 
web server document root or from a virtual host.

#### Rewrite Rules with an Alias
If an alias is required then the `.htaccess` file will need to be modified to include a `RewriteBase` 
directive that matches the alias.

For example, if the alias is `/xibo` the `.htaccess` should have: `RewriteBase /xibo`.

### nginx
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

### IIS

IIS includes a function to convert from `.htaccess` which creates the correct configuration for IIS. However,
the error message `Error IIS MAP RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]` may be 
received.

This rule is incompatible with IIS and can be removed.

After import the following content will be inserted into the `web.config` file.

```
<system.webServer>
    <rewrite>
        <rules>
            <rule name="Imported Rule 1" stopProcessing="true">
                <match url="^" ignoreCase="false" />
                <conditions logicalGrouping="MatchAll">
                    <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                    <add input="{URL}" pattern="^.*/authorize/.*$" ignoreCase="false" />
                </conditions>
                <action type="Rewrite" url="api/authorize/index.php" appendQueryString="true" />
            </rule>
            <rule name="Imported Rule 2" stopProcessing="true">
                <match url="^" ignoreCase="false" />
                <conditions logicalGrouping="MatchAll">
                    <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                    <add input="{URL}" pattern="^.*/api/.*$" ignoreCase="false" />
                </conditions>
                <action type="Rewrite" url="api/index.php" appendQueryString="true" />
            </rule>
            <rule name="Imported Rule 3" stopProcessing="true">
                <match url="^" ignoreCase="false" />
                <conditions logicalGrouping="MatchAll">
                    <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                    <add input="{URL}" pattern="^.*/install/.*$" ignoreCase="false" />
                </conditions>
                <action type="Rewrite" url="install/index.php" appendQueryString="true" />
            </rule>
            <rule name="Imported Rule 4" stopProcessing="true">
                <match url="^" ignoreCase="false" />
                <conditions logicalGrouping="MatchAll">
                    <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                    <add input="{URL}" pattern="^.*/maint/.*$" ignoreCase="false" />
                </conditions>
                <action type="Rewrite" url="maint/index.php" appendQueryString="true" />
            </rule>
            <rule name="Imported Rule 5" stopProcessing="true">
                <match url="^" ignoreCase="false" />
                <conditions logicalGrouping="MatchAll">
                    <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                </conditions>
                <action type="Rewrite" url="index.php" appendQueryString="true" />
            </rule>
        </rules>
    </rewrite>
</system.webServer>
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
