<!--toc=getting_started-->
# Install on Linux

> This is intended as a getting started guide only - the documentation provided by the software vendor
 should always be used in preference.
 
Linux makes a good home for a [[PRODUCTNAME]] server. All of the software it needs to support it is provided by the major Linux distributions. We'll cover Ubuntu in detail here, as it's what I use. There are some notes further down for other distributions, however the whole procedure is very similar.

###  <span id="Setup_Apache_and_PHP"> Setup Apache and PHP </span>

####  <span id="Ubuntu"> Ubuntu </span>

*   Install Apache 2.x Webserver
```
 sudo apt-get install apache2
```

*   Install MySQL Server
```
 sudo apt-get install mysql-server
```

*   Install PHP5&#160;:
```
 sudo apt-get install php5 php5-mysql php5-gd
```

_On Ubuntu, DOM, libXML, gettext and JSON extension is already compiled on PHP5_

*   Restart Apache 2 Webserver if necessary
```
 sudo /etc/init.d/apache2 restart
```

####  <span id="CentOS_5.x_.2F_Redhat_RHEL_5.x"> CentOS 5.x / Redhat RHEL 5.x </span>

JSON extension is not include in CentOS 5.x or Redhat RHEL 5.x but you can install it with this steps&#160;:

*   Install JSON PHP Extension
```
 yum install php-devel
```

_If you have more than 8MB of memory limit for PHP, install with PEAR&#160;:_

```
 pear install pecl/json
```

_If you have less than 8MB of memory limit for PHP, PEAR failed to install... Use PECL&#160;: _

```
 pecl install json
```

*   Active JSON extension&#160;:
```
 vim /etc/php.d/json.ini
```
```
 # Json Extension
 extension=json.so
```

*   Save file and restart the Apache webserver&#160;:
```
 /etc/init.d/httpd restart
```

####  <span id="SuSe"> SuSe </span>

*   during web install library location says 'full path' but means relative to document root on suse linux
```
for me this is /srv/www/htdocs/xlib   in the box for full path, i put "xlib"
```

###  <span id="Install_Xibo"> Install Xibo </span>

*   Extract the tarball you downloaded inside your webserver's document root (eg /var/www/xibo) and ensure the webserver has permissions to read and write those files:
```
 cd /var/www
 sudo tar zxvf ~/xibo-1.0.5-server.tar.gz
 sudo mv xibo-1.0.5-server xibo
 sudo chown www-data.www-data -R xibo
```

*   Make a directory for the server library. Make sure the webserver has permission to write to this location:
```
 sudo mkdir /xibo-library
 sudo chown www-data.www-data -R /xibo-library
```

*   You should now use a webbrowser to visit your webserver - eg [http://myserver/xibo](http://myserver/xibo)

*   The process is fairly self explanatory. Follow the final part of the [Windows instructions](install_cms.html) for greater detail.

