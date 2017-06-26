<!--toc=cms_upgrade-->
# Upgrade with Docker
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
the top of your existing installation, replacing any existing files.
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

substituting the second command there for the appropriate `up` command if you're
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
