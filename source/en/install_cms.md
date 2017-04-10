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

 - A server/machine capable of running Docker (for Linux containers) and Docker Compose
 - If HTTPS is required, a web server capable of being a reverse proxy (nginx, Apache, IIS)

### No Docker?
If Docker is not available please refer to a [Custom Installation](manual_install.html).

**Please note** that while every effort will be made to assist with custom installations,
Docker is the supported method of running [[PRODUCTNAME]] and it may not be possible to help
with your custom installation without opening a paid support incident from a company offering
commercial support.

## Installation
Docker Compose is used to install [[PRODUCTNAME]] on an environment with Docker
installed. Before continuing please ensure you have Docker installed.
Guidance on which version of Docker to use, and how to install it can be found
in our [Docker Installation Guide](install_docker.html).

### Download and extract the [[PRODUCTNAME]] Docker archive

<nonwhite>
The latest [[PRODUCTNAME]] Docker installation files can be [downloaded
from our website](https://github.com/xibosignage/xibo-cms/releases). Select the release required
and download the `tar.gz`/`zip` called `xibo-docker`.
</nonwhite>

<white>
Ask your service provider for the [[PRODUCTNAME]] Docker installation files.
</white>

The archive should be extracted in a suitable location on your host machine - the
choice of location is up to you. The only requirement is that the Docker
installation can read/write to it. By default your library content and database will be
written under this folder.

On a Linux server, we'd suggest for example `/opt/xibo`. On a Windows server,
please refer to the [Docker Installation Guide](install_docker.html) for details
on the placement of the CMS installation files.

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
in the folder containing the release archive in a `shared` sub-folder.

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
alternative port number (see [below](#using_different_ports)), then be sure to
add that to the URL - so for example `http://localhost:8080`

Please note that if you are running Docker Toolbox on Windows the CMS will not
be accessible at `localhost`, instead you should use the IP address assigned to
the Docker Toolbox Virtual Machine. You can discover this IP address by running
`docker-machine ip` from the `Docker Toolbox Quickstart Terminal`. Please see
the [Install Docker Toolbox](install_docker.html#docker_toolbox) page, for
details on accessing the CMS from other computers on your network.

If you are running a firewall on your computer, either the Microsoft Windows
firewall, or an iptables based firewall on Linux, you will need to allow the
ports you've configured the CMS to run on inbound. If you haven't specifically
configured alternative ports, then the following is required:

```
Inbound TCP Port 9505 (for XMR Push Messaging)

Inbound TCP Port 80 (for HTTP Traffic) AND/OR
Inbound TCP Port 443 (for HTTPS Traffic - if you are using SSL)
```

#### Configuration of XMR public address

Docker cannot reasonably know the DNS name or IP address of your host machine, and therefore
it is necessary to configure the XMR Public Address in CMS Settings when first logged in. **This
only needs to be done on the first bootstrap**.

This can be found on the CMS Settings page under Administration, on the Display tab.

The format of the address is:

```
tcp://<ip_address>:<port>
```

The default `<port>` is 9505 and should be set to that unless you have specified
a custom port in your docker-compose configuration.


### Start/Stop/Down

Pass start/stop or down (destroy completely) into docker-compose to take the corresponding action

```
docker-compose XXX
```

The `stop` command will stop the [[PRODUCTNAME]] CMS services running. If you want to start
them up again, issue the `start` command.

** Before running docker-compose down**, please be sure that your media and
database files are being correctly written to the `shared` directory. This is
particularly important if you are running on a Windows computer. To do so,
upload for example an image in to the CMS, and check that the same image
appears in the `shared/cms/library` directory. Another good check is to make
sure that `shared/backup/db/latest.tar.gz` was created within the last 24
hours. If either of those checks fail, please do not run `docker-compose
down` as this will lead to data loss. Seek support to resolve the situation.

If you suspect there are problems with the containers running your [[PRODUCTNAME]] CMS, then
you can safely run

```
docker-compose down
docker-compose up -d
```

Providing your keep your `config.env` file and your `shared` directory intact,
the CMS will be run using your existing data.

## Upgrading [[PRODUCTNAME]]

** Before attempting an upgrade**, please be sure that your media and database
files are being correctly written to the `shared` directory. This is
particularly important if you are running on a Windows computer. To do so,
upload for example an image in to the CMS, and check that the same image
appears in the `shared/cms/library` directory. Another good check is to make
sure that `shared/backup/db/latest.tar.gz` was created within the last 24
hours. If either of those checks fail, please do not proceed with the upgrade as
this will lead to data loss. Seek support to recover the situation.

Before starting the upgrade, it's strongly recommended to take a full backup of
your [[PRODUCTNAME]] system. So `stop` your CMS by issuing the command

```
docker-compose stop
```

and then, backup `config.env`, your docker-compose files, and `shared` directory
and keep them somewhere safe. On a Linux system, you will need to be the `root`
user, or use `sudo` to make a copy of the shared directory.

If you're upgrading from an earlier 1.8.0 pre-release, you may have previously
used `launcher`. `launcher` was used for 1.8.0-alpha, beta, rc1 and rc2, but
since then we have switched to Docker Compose. Further details are available in
the [1.8.0-rc3 release notes](release_notes_1.8.0-rc3.html#requirements).

Once you have a suitable backup of your CMS files, you can proceed with the
upgrade process.

<nonwhite> Download the [appropriate version of the Docker Compose
files](https://github.com/xibosignage/xibo-docker/releases) for the version of
[[PRODUCTNAME]] you want to upgrade to. Extract the Docker Compose files over
the top of your exisiting installation, replacing any existing files.
</nonwhite>

<white> Next download the appropriate version of Docker Compose files from your
service provider. Extract the Docker Compose files over the top of your
exisiting installation, replacing any existing files. </white>

If you are running the CMS on Custom Ports, then you will need to repeat the
initial steps in the CMS installation process where you copied the template
`cms_custom-ports.yml.template` file to `cms_custom-ports.yml` and make the
appropriate modifications for the ports you want to use.

If you made any other changes to the docker-compose files, you will need to make
those modifications again. `config.env` will have been preserved, so you should
not need to make any changes there. Specifically, do not change the MySQL
password in that file.

To perform the upgrade, run

```
docker-compose down
docker-compose up -d
```

substiuting the second command there for the appropriate `up` command if you're
using custom ports, or a remote MySQL server.

The CMS containers will be destroyed, and rebuilt with the newer [[PRODUCTNAME]]
version.

A database backup will be automatically run for you as part of this process.

Please be patient. The upgrade process can take a few minutes to complete. In
the interim, the CMS will be unavailable. If the upgrade is fully successful,
you should not see the upgrade wizard at all when you go to log in to the CMS.

If you do see the upgrade wizard, you can attempt to work through it, however
please be wary of skipping upgrade steps unless you have a detailed knowledge
that it is safe to do so.

The upgrade should now be complete for you.

If you need to roll back to the older [[PRODUCTNAME]] version for some reason,
you can do so by running

```
docker-compose down
```

restoring your original copy of `config.env`, the Docker Compose files and the
`shared` directory, and finally running

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

The ports section of a Docker Compose YML file lists ports in the format <host>:<container> - to move to port 8080
the declaration would be `8080:80`.

To use this file replace any `docker-compose up -d` commands in the above instructions
with `docker-compose -f cms_custom-ports.yml up -d`.


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
<nonwhite>
A worked example for setting up an Apache reverse proxy for SSL with LetsEncrypt SSL certificates can be found [here](https://community.xibo.org.uk/t/xibo-1-8-0-with-docker-on-ubuntu-16-04/9392).
</nonwhite>
