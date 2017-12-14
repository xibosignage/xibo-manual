<!--toc=getting_started-->
# Xibo 1.6.1 - Codename "Pons-Winnecke"

**This is a bug fixing release of the 1.6 Series of Xibo**.

You can download this release from [https://launchpad.net/xibo/1.6/1.6.1](https://launchpad.net/xibo/1.6/1.6.1)


## Requirements

You must use the 1.6.1 version of the Windows and Ubuntu Display Clients with this version of the Xibo CMS.

Xibo requires PHP 5.3 or higher. A full list of module requirements is presented at the point of installation - we'll even tell you which modules you're missing!

The PHP-PDO module is required from this release onwards.

## Upgrading

There are significant database schema changes between the 1.4 series of Xibo and prior released. The upgrade wizard will take a prior database and convert it to a schema suitable for the 1.4 series to date. Note that this is a one-way conversion. Please do not upgrade your production database to test Xibo 1.6 functionality, and then expect to run a prior series code base against that database.

Instructions for cloning a Xibo database are available here [Clone Database](release_notes_clonedb.html "Clone Database").

*   Clone your existing Xibo database and grant permissions (see [Release Notes:Clone Database](release_notes_clonedb.html "Clone Database") for details)
*   Backup settings.php from your installation
*   Manually take a backup of your database
*   Replace your existing installation with the new version from the tar.gz or zip file
*   Replace your backup settings.php file in your Xibo installation directory
*   Browse to [http://your.server/path](http://your.server/path)as normal
*   You will be prompted that an upgrade is required.
*   Enter your xibo_admin password, and follow the upgrade wizard.
*   The upgrade should run, and finally ask you to log in as you would normally.

## Help

Please ask for help / advice in the Answers section of Launchpad: [https://answers.launchpad.net/xibo](https://answers.launchpad.net/xibo)

Please report any bugs in the Bugs section of Launchpad: [https://bugs.launchpad.net/xibo](https://bugs.launchpad.net/xibo) (if you're not sure that what you have found is a bug, please ask in the Answers section first!)

Please report any enhancement requests in the Blueprints section of Launchpad: [https://blueprints.launchpad.net/xibo](https://blueprints.launchpad.net/xibo)

When asking for assistance with this release, please make it clear that you're using the release candidate and not a stable release of Xibo.

## Bug Fixes

For a full list of bug fixes please refer to the Release Project Page: [https://launchpad.net/xibo/1.6/1.6.1](https://launchpad.net/xibo/1.6/1.6.1)

## Known Issues and Limitations

There are plenty of new features in the pipeline, but to provide a stable platform for users wanting Xibo now, the 1.6 series of releases are now feature-frozen (no new features will be implemented). All new development work will go in to the 1.7 series - which will be made available as a BETA.