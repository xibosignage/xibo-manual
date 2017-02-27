<!--toc=getting_started-->
# CMS Installation

The [[PRODUCTNAME]] CMS is a web application run through Docker.

Alternatively there are a number of service providers that will install [[PRODUCTNAME]] for
you, or even run [[PRODUCTNAME]] on their architecture. If you are unfamiliar
with Docker and just want to use the application, then a service provider
solution may be preferable.

Should you want to install and run [[PRODUCTNAME]] yourself then we strongly
encourage you to use a [Docker](install_docker.html) environment.

## Requirements

 - A server/machine capable of running Docker and Docker Compose
 - If HTTPS is required, a web server capable of being a reverse proxy (nginx, apache, iis)

### No Docker?
If Docker is not available please refer to a [Custom Installation](manual_install.html).

**Please note** that while every effort will be made to assist with custom installations, 
Docker is the supported method of running [[PRODUCTNAME]] and it may not be possible to help 
with your custom installation without opening a paid support incident from a company offering
commercial support.

## Installation

The easiest and fastest way to get started with [[PRODUCTNAME]] is to use `launcher` to 
bootstrap Docker and run your [[PRODUCTNAME]] environment. 

`launcher` is a small shell script used to provide base functionality - its features
are described below.

### Download and extract the [[PRODUCTNAME]] Docker archive

<nonwhite>
The latest [[PRODUCTNAME]] Docker installation files can be [downloaded
from our website](https://github.com/xibosignage/xibo-docker/releases).
</nonwhite>

<white>
Ask your service provider for the [[PRODUCTNAME]] Docker installation files. 
</white>

The archive should be extracted in a suitable location on your host machine - the
choice of location is up to you. The only requirement is that the Docker
installation can read/write to it. By default your library content and database will be
written under this folder.

## Bootstrap [[PRODUCTNAME]]

The first time [[PRODUCTNAME]] is installed a configuration file is needed to tell Docker how the 
environment is configured. This file is called `config.env`. This covers where you want files to be stored,
email config, etc.
 
A template file with detailed instructions is provided in the release archive and is 
called `config.env.template`. Take a copy of this file, renaming to `config.env` and then edit the file
in a text editor (Notepad/TextEdit/Nano and not a Word processor).

If you don't want [[PRODUCTNAME]] to be able to send email messages, then you can omit to
configure those options.

Docker will map data folders to contain database data and any custom files for the CMS. These will default appear 
in the folder containing the release archive in a `/shared` sub-folder.

Once you've made your changes to `config.env` and have saved the file, Open a terminal/command window 
in the folder where you extracted the archive. As a user who has permissions to run the `docker` 
command, simply run:

```
docker-compose up -d
```

This will bootstrap and start your [[PRODUCTNAME]] CMS. The CMS will be fully installed
with the default credentials.

```
Username: [[PRODUCTNAME]]_admin
Password: password
```

You should log on to the CMS straight away and change the password on that
account.

You can log on to the CMS at `http://localhost`. If you configured an
alternative port number (see [below](#using_different_ports)), then be sure to add that to the URL - so for example
`http://localhost:8080`

Please note that if you are running Docker Toolbox on Windows the CMS will not be accessible
at `localhost`, instead you should use the IP address assigned to the Docker Toolbox Virtual Machine.
This will be shown to you when Docker Toolbox starts.

#### Configuration of XMR public address

Docker cannot reasonably know the DNS name or IP address of your host machine, and therefore
it is necessary to configure the XMR Public Address in CMS Settings when first logged in. **This
only needs to be done on the first bootstrap**.

This can be found on the CMS Settings page under Administration, on the Display tab.

The format of the address is:

```
tcp://<ip_address>:<port>
```

The default `<port>` is 9505 and should be set to that unless you have modified the `XMR_PLAYER_PORT` setting
 in your `config.env` file.


### Start/Stop/Down

Pass start/stop or down (destroy completely) into launcher to take the corresponding action

```
docker-compose XXX
```

The `stop` command will stop the [[PRODUCTNAME]] CMS services running. If you want to start
them up again, issue the `start` command.

If you suspect there are problems with the containers running your [[PRODUCTNAME]] CMS, then
you can safely run

```
docker-compose down
docker-compose up -d
```

Providing your keep your `config.env` file and your `DATA_DIR` directory intact,
the CMS will be run using your existing data.

## Upgrading [[PRODUCTNAME]]

Before attempting an upgrade, it's strongly recommended to take a full backup of
your [[PRODUCTNAME]] system. So `stop` your CMS by issuing the command

```
docker-compose stop
```

and then, backup `config.env` and `DATA_DIR` and keep
them somewhere safe.

**What about `launcher`?**

`launcher` was used for 1.8.0-alpha, beta, rc1 and rc2, but since then we have switched to Docker Compose. Further
details are available in the [1.8.0-rc3 release notes](release_notes_1.8.0-rc3.html#requirements).

<nonwhite>
Next download the [appropriate version of the Docker files](https://github.com/xibosignage/xibo-docker/releases), replace the 
version of launcher on your system leaving your config.env file intact, and run
</nonwhite>

<white>
Next download the appropriate version of Docker files from your service provider, replace the version of
launcher on your system leaving your config.env file intact, and run
</white>

```
docker-compose down
docker-compose up -d
```

The CMS containers will be destroyed, and rebuilt with the newer [[PRODUCTNAME]] version.

A database backup will be automatically run for you as part of this process.

If you need to roll back to the older [[PRODUCTNAME]] version for some reason, you can do
so by running

```
docker-compose stop
```

Restoring your original copy of `launcher`, `config.env` and the complete
contents of `DATA_DIR`, and then running

```
docker-compose up -d
```

The original version of the CMS will be restored for you.

## Using different ports

By default, [[PRODUCTNAME]] will start a web server listening on port 80. If you already have a web server listening 
on port 80, or would prefer to use an alternative port number, then you need to copy the 
`cms_custom-ports.yml.template` file and change the `ports` section for `cms-web`. The file should be saved
as `cms_custom-ports.yml`.

Similarly, [[PRODUCTNAME]]'s XMR server will be started listening on port 9505. If you would prefer to use an 
alternative port number, then you'll need to do so by copying the `cms_custom-ports.yml.template` file 
and changing the `ports` section for `cms-xmr`.

To use this file replace any `docker-compose up -d` commands in the above instructions 
with `docker-compose -f cms.custom-ports.yml up -d`. 


## Remote MySQL 

The default `docker-compose.yml` file includes a container for MySQL, however it is possible to run with an 
external / remote MySQL instance as the database for [[PRODUCTNAME]].

To do this base the `config.env` file on the template `config.evn.template-remote-mysql` and replace any 
`docker-compose up -d` commands in the above instructions 
with `docker-compose -f cms_remote-mysql.yml up -d`. 


## HTTPS/SSL

[[PRODUCTNAME]] should be run over SSL if running on anything other than a secure private 
network. The Docker containers do not provide SSL and this must be provided by an external 
web server which handles SSL termination and reverse proxy into the `cms-web` container.

There are many good resources for achieving this architecture - for example a 
[nginx-proxy container](https://github.com/jwilder/nginx-proxy) could be used.

If you already have a web server running on your Host machine, configuring a reverse proxy should 
be straightforward, an example `VirtualHost` for Apache is below:

```
Listen 443

NameVirtualHost *:443
<VirtualHost *:443>

    SSLEngine On
    ProxyPreserveHost On

    # Set the path to SSL certificate
    # Usage: SSLCertificateFile /path/to/cert.pem
    SSLCertificateFile /etc/apache2/ssl/file.pem


    # Servers to proxy the connection, or;
    # List of application servers:
    # Usage:
    # ProxyPass / http://[IP Addr.]:[port]/
    # ProxyPassReverse / http://[IP Addr.]:[port]/
    # Example: 
    ProxyPass / http://0.0.0.0:8080/
    ProxyPassReverse / http://0.0.0.0:8080/

</VirtualHost>
```
