<!--toc=getting_started-->
# [[PRODUCTNAME]] Docker

[Docker](https://docker.com/) is an application to package and run any
application in a pre-configured container making it much easier to deploy a [[PRODUCTNAME]]
CMS with recommended configuration.

## Before you start

The easiest and fastest way to get started with [[PRODUCTNAME]] is to
install Docker and use `launcher` to bootstrap and run your [[PRODUCTNAME]]
environment.

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

```
wget -qO- https://get.docker.com/ | sh
```

You can [manually install Docker](https://docs.docker.com/installation/) if you
prefer.

### Bootstrap [[PRODUCTNAME]]
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


## Running without launcher
If you have your own docker environment you may want to run without the
automation provided by launcher. If this is the case you will be responsible
for pulling the docker containers, starting them and manually installing [[PRODUCTNAME]].

The structure expected by the containers is outlined below.

#### /containers

web and xmr Dockerfiles and associated configuration. These are built by Docker
Hub and packaged into `[[PRODUCTNAME]]signage/[[PRODUCTNAME]]-cms` and `[[PRODUCTNAME]]signage/[[PRODUCTNAME]]-xmr`.

#### DATA_DIR/shared

Data folders for the [[PRODUCTNAME]] installation.

 - The Library storage can be found in `/shared/cms/library`
 - The database storage can be found in `/shared/db`
 - Automated daily database backups can be found in `/shared/backup`
 - Custom themes should be placed in `/shared/cms/web/theme/custom`
 - Custom modules should be placed in `/shared/cms/custom`
 - Any user generated PHP or resources external to [[PRODUCTNAME]] that you want hosted
   on the same webserver go in `/shared/cms/web/userscripts`. They will then
   be available to you at `http://localhost/userscripts/`
