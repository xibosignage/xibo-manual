<!--toc=getting_started-->
# Docker
[Docker](https://docker.com/) is an application to package and run any
application in a pre-configured container making it much easier to deploy a
[[PRODUCTNAME]] CMS with recommended configuration.

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

## Bootstrap [[PRODUCTNAME]]

Bootstrapping is a term used to describe setting up the overall environment. It
is a simple process which involves setting some options and running 1 command.

### Configure

Adjust the settings at the top of the `launcher` file so that we can configure
your instance correctly. The settings are documented in detail and consist
of things like Email Configuration and persistent data storage.


### Run Launcher

```
./launcher bootstrap
```

This will bootstrap and start your [[PRODUCTNAME]] CMS. The CMS will be fully
installed with the default credentials.

The `launcher` process will output the MySQL credentials at the end of the
process. These will never be output again and you should make a note of them
in your password manager of choice.

Once bootstrapping has been completed you will have a complete CMS installation
with CMS, Database and XMR configured to default settings. The CMS will be
accepting connections on the host machine Port 80 (default web server port).

## Ongoing tasks

It may be necessary to start/stop/upgrade or destroy your CMS instance. These
commands are also available through `launcher`.

### Start/Stop/Destroy

Pass start/stop or destroy into launcher to take the corresponding action:

 - start: Run the CMS
 - stop: Stop the CMS
 - destroy: Remove the CMS

```
./launcher start
./launcher stop
./launcher destroy
```

## Upgrading [[PRODUCTNAME]]

Download the new version of `launcher`, extract it over the top of your current
files and then run `./launcher upgrade`.
