<!--toc=getting_started-->
# [[PRODUCTNAME]] Docker

[Docker](https://docker.com/) is an application to package and run any
application in a pre-configured container making it much easier to deploy a [[PRODUCTNAME]]
CMS with recommended configuration.

## Before you start

The easiest and fastest way to get started with [[PRODUCTNAME]] is to
install Docker and use `launcher` to bootstrap and run your [[PRODUCTNAME]]
environment. `launcher` is a small shell script used to provide base functionality - its features
are described below.

### Download and extract the [[PRODUCTNAME]] Docker archive

The latest [[PRODUCTNAME]] docker installation files can be downloaded
from our website.

<nonwhite>
[Download](https://github.com/xibosignage/xibo-docker/archive/master.zip)
</nonwhite>

They should be extracted in a suitable location on your host machine - the
choice of location is up to you. The only requirement is that the Docker
installation can read/write to it.

### Install Docker
Docker installation documents can be found on the [Docker website](https://docs.docker.com/installation/).

#### Linux
Docker can be installed on Linux based systems using the below command:

```
wget -qO- https://get.docker.com/ | sh
```

#### Windows
There are 2 Docker products for Windows - if you want to use `launcher` on your installation then
please install [Docker Toolbox](https://www.docker.com/products/docker-toolbox).

`launcher` supports the VirtualBox providers for Docker, you may use HyperV but if you do so you
will need to [create the containers yourself](#running_without_launcher).

Please note that when running through Docker Toolbox, the Docker system will be running in a VM,
which will be created in bridged mode. The resulting Docker containers will therefore be accessible
from the IP address assigned to the Docker Toolbox VM, rather than your local machine.


## Bootstrap [[PRODUCTNAME]]
Open a terminal/command window in the folder where you extracted the archive.
As a user who has permissions to run the `docker` command, simply run:

```
./launcher bootstrap
```
The first time you run `launcher`, a new file `launcher.env` will be created in
the same directory as the `launcher` program. Edit this with a text editor to
provide the configuration needed to get your [[PRODUCTNAME]] CMS installed.

If you don't want [[PRODUCTNAME]] to be able to send email messages, then you can ommit to
configure those options.

`DATA_DIR` will default to the current directory you're in. If you want to store
your [[PRODUCTNAME]] data somewhere else, then change `DATA_DIR` to point to that place.

By default, [[PRODUCTNAME]] will start a webserver listening on port 80. If you already
have a webserver listening on port 80, or would prefer to use an alternative
port number, then you need to change the value of the `WEBSERVER_PORT` option.

Similarly, [[PRODUCTNAME]]'s XMR server will be started listening on port 9505. If you
would prefer to use an alternative port number, then you'll need to do so by
changing the `XMR_PLAYER_PORT` option.

Once you've made your changes to `launcher.env` and have saved the file, run

```
./launcher bootstrap
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
alternative port number, then be sure to add that to the URL - so for example
`http://localhost:8080`

Please note that if you are running Docker Toolbox on Windows the CMS will not be accessible
at `localhost`, instead you should use the IP address assigned to the Docker Toolbox Virtual Machine.
This will be shown to you when Docker Toolbox starts.

### Start/Stop/Destroy

Pass start/stop or destroy into launcher to take the corresponding action

```
./launcher XXX
```

The `stop` command will stop the [[PRODUCTNAME]] CMS services running. If you want to start
them up again, issue the `start` command.

If you suspect there are problems with the containers running your [[PRODUCTNAME]] CMS, then
you can safely run

```
./launcher destroy
./launcher bootstrap
```

Providing your keep your `launcher.env` file and your `DATA_DIR` directory intact,
the CMS will be run using your existing data.

## Upgrading [[PRODUCTNAME]]

Before attempting an upgrade, it's strongly recommended to take a full backup of
your [[PRODUCTNAME]] system. So `stop` your CMS by issuing the command

```
./launcher stop
```
and then, backup `launcher`, `launcher.env` and `DATA_DIR` and keep
them somewhere safe.

Next download the appropriate version of launcher, replace the version of
launcher on your system leaving your launcher.env file intact, and run

```
./launcher upgrade
```

The CMS containers will be destroyed, and rebuilt with the newer [[PRODUCTNAME]] version.

A database backup will be automatically run for you as part of this process.

If you need to roll back to the older [[PRODUCTNAME]] version for some reason, you can do
so by running

```
./launcher stop
```
Restoring your original copy of `launcher`, `launcher.env` and the complete
contents of `DATA_DIR`, and then running

```
./launcher bootstrap
```
The original version of the CMS will be restored for you.

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

## Running without launcher
If you have your own docker environment you may want to run without the
automation provided by launcher. If this is the case you will be responsible
for pulling the docker containers, starting them and manually installing [[PRODUCTNAME]].

The structure expected by the containers is outlined below.

#### Containers

There are 2 containers provided:

 - web 
 - xmr 

These are built by Docker Hub and packaged into `[[PRODUCTNAME]]signage/[[PRODUCTNAME]]-cms` 
and `[[PRODUCTNAME]]signage/[[PRODUCTNAME]]-xmr`.

[[PRODUCTNAME]] also requires a database - we recommend using the `mysql` container available on 
Docker Hub. Any MySQL based container can be used, provided it can be linked to the `cms-web`
container. It is also possible to use an external database by providing those details to the `cms-web` 
container as environment variables, as below:

 - CMS_DATABASE_HOST
 - CMS_DATABASE_PORT
 - CMS_DATABASE_USERNAME
 - CMS_DATABASE_PASSWORD
 - CMS_DATABASE_NAME

If you decide to run the containers yourself you should read and understand the `DockerFile` which can
be found for each container in the `/containers` folder.

#### Storing Data

Data folders should be mapped outside the Docker containers as volumes so that data is persisted
across Container upgrades. The following Data folders are used by `launcher` and should be configured
for your environment:

 - The Library storage can be found in `/shared/cms/library`
 - The database storage can be found in `/shared/db`
 - Automated daily database backups can be found in `/shared/backup`
 - Custom themes should be placed in `/shared/cms/web/theme/custom`
 - Custom modules should be placed in `/shared/cms/custom`
 - Any user generated PHP or resources external to [[PRODUCTNAME]] that you want hosted
   on the same webserver go in `/shared/cms/web/userscripts`. They will then
   be available to you at `http://localhost/userscripts/`
