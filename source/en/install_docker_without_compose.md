<!--toc=cms_installation-->
# Docker without Docker Compose
If you have your own docker environment you may want to run without the
automation provided by docker-compose. If this is the case you will be responsible
for pulling the docker containers, starting them and manually installing [[PRODUCTNAME]].

The structure expected by the containers is outlined below.

#### Containers

There are 2 containers provided:

 - web
 - xmr

<nonwhite>
These are built by Docker Hub and packaged into `xibo-signage/xibo-cms` and `xibosignage/xibo-xmr`.
</nonwhite>

[[PRODUCTNAME]] also requires a database - we recommend using the `mysql` container available on
Docker Hub. Any MySQL based container can be used, provided it can be linked to the `cms-web`
container. It is also possible to use an external database by providing those details to the `cms-web`
container as environment variables, as below:

 - MYSQL_HOST
 - MYSQL_PORT
 - MYSQL_DATABASE
 - MYSQL_USER
 - MYSQL_PASSWORD

If you decide to run the containers yourself you should read and understand the `DockerFile` which can
be found for each container in the `/containers` folder.

You may also want to pass in environment variables to configure SMTP in the container. All options are fully
documented in the `config.env.template` and `config.env.template-remote-mysql` files found in our archives.

#### Storing Data

Data folders should be mapped outside the Docker containers as volumes so that data is persisted
across Container upgrades. The following Data folders are used by `docker-compose` and should
be configured for your environment:

 - The Library storage can be found in `/shared/cms/library`
 - The database storage can be found in `/shared/db`
 - Automated daily database backups can be found in `/shared/backup`
 - Custom themes should be placed in `/shared/cms/web/theme/custom`
 - Custom modules should be placed in `/shared/cms/custom`
 - Any user generated PHP or resources external to [[PRODUCTNAME]] that you want hosted
   on the same webserver go in `/shared/cms/web/userscripts`. They will then
   be available to you at `http://localhost/userscripts/`
