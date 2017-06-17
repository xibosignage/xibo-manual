<!--toc=cms_upgrade-->
# Switching to Docker
Installations prior to 1.8 will be "Custom/Manual" installations and should be migrated
to Docker during the upgrade. Please follow the below instructions:

* Download the Xibo Release Archive and extract it - The archive should be
 extracted in a suitable location on your host machine - the choice of location
 is up to you. The only requirement is that the Docker installation can
 read/write to it.
* In the same directory,
* Make a directory shared
* Make directory shared/backup
* Make directory shared/cms
* Make directory shared/cms/library
* Put the library files from your existing install in to shared/cms/library
* Empty your log table using the CMS Web Portal OR `TRUNCATE log` from a MySQL
  prompt
* Export your database from your old installation,
  e.g. `mysqldump -u user -p database-name > import.sql`
* Put your 1.7 (or 1.8) database export in to shared/backup/import.sql

## Exporting your existing database

The example above uses `mysqldump`, however if your environment does not have
`mysqldump` it is possible to use `phpmyadmin` to generate a backup. Care must
be taken to ensure that a database is selected in the left hand pane **before**
going to the export tab. Failure to do this will result in the export containing
the existing database name, which may not match the new name in Docker.

Step 1:

![Truncate Logs](img/phpmyadmin_backup_1.png)

Step 2:

![Export Database](img/phpmyadmin_backup_2.png)
