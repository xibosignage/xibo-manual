<!--toc=cms_upgrade-->
# Upgrade Custom/Manual installations
Upgrading a manual installation happens in 3 stages:

 1. Requirements
 2. Upgrade the CMS files
 3. Upgrade the database

Upgrading the CMS files is a manual process that should be completed by your
 web server administrator. Upgrading the CMS is completed in a wizard and can be
  done by the CMS administrator.

Please check the [release notes](release_notes.html) before starting the upgrade.

### Steps
You should always take a backup before upgrading your CMS Installation.

* If upgrading to 1.8 series, ensure your environment meets the [requirements
  for installation](manual_install.html), if it does not then correct that before
  continuing.
*   *Optionally* clone your existing [[PRODUCTNAME]] database and grant
permissions (see [Clone Database](release_notes_clonedb.html "Clone Database")
for details). It is possible to upgrade without cloning but much harder to roll
back.
*   Backup settings.php from your installation (found in `web/settings.php`)
*   Manually take a backup of your database
*   Replace your existing installation with the new version from the tar.gz or
zip file. **Do not copy over the top.**
*   Replace your backup settings.php file in your [[PRODUCTNAME]] installation
directory
*   Browse to [http://your.server/path](http://your.server/path) as normal
*   Log in as an administrator.
*   The upgrade wizard will open and show the list of upgrade steps.
*   Press start to run through them.
