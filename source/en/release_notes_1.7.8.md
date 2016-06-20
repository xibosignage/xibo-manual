<!--toc=getting_started-->
# [[PRODUCTNAME]] 1.7.8 - Codename "Tuttle"

This is a bug fix release of [[PRODUCTNAME]] - 1.7.8. Included in this release are 12 bugs and small enhancements.

You can download this release from [GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.7.8).

This release is a bug fix release for the 1.7 stable series. If you are upgrading from 1.4 or 1.6 please refer to 
the [1.7.0 release notes](release_notes_1.7.0.html) for a detailed list of changes and upgrade notes.

## Requirements
You must use the 1.7.0 or higher version of the Windows Display Player with this version of the Xibo CMS. We recommend 
using the 1.7.8 Windows Player release.

[[PRODUCTNAME]] requires PHP 5.3.3 or higher. A full list of module requirements is presented at the point of 
installation.

### Special Considerations
#### Windows Player
There are 2 changes of note related to the Windows Player.

 1. The installer will enable HTML5 support by default
 2. The Player will automatically configure and start the Watchdog tray application.

## Upgrading
You should always take a backup before upgrading your Xibo CMS Installation.

*   Clone your existing [[PRODUCTNAME]] database and grant permissions
(see [Clone Database](release_notes_clonedb.html "Clone Database") for details). It is possible to upgrade without cloning but much harder to roll back.
*   Backup settings.php from your installation
*   Manually take a backup of your database
*   Replace your existing installation with the new version from the tar.gz or zip file. **Do not copy over the top.**
*   Replace your backup settings.php file in your [[PRODUCTNAME]] installation directory
*   Browse to [http://your.server/path](http://your.server/path) as normal
*   You will be prompted that an upgrade is required.
*   Enter an administrator user name and password, and follow the upgrade wizard.
*   The upgrade should run, and finally ask you to log in as you would normally.


## Help
Please see our [troubleshooting](troubleshooting.html) section for help, advice and links to the [[PRODUCTNAME]] community.

## Bug Fixes
For a full list of bug fixes please refer to the [Release Project Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.7.8+is%3Aclosed).
