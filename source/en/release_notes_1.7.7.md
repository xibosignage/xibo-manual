<!--toc=getting_started-->
# [[PRODUCTNAME]] 1.7.7 - Codename "Tuttle"

This is a bug fix release of [[PRODUCTNAME]] - 1.7.7. Included in this release are 24 bugs and small enhancements.

You can download this release from [GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.7.7).

This release is a bug fix release for the 1.7 stable series. If you are upgrading from 1.4 or 1.6 please refer to the [1.7.0 release notes](release_notes_1.7.0.html) for a detailed list of changes and upgrade notes.

## Requirements
You must use the 1.7.0 or higher version of the Windows Display Player with this version of the Xibo CMS. We recommend using the 1.7.7 Windows Player release.

[[PRODUCTNAME]] requires PHP 5.3.3 or higher. A full list of module requirements is presented at the point of installation.

### Special Considerations
#### Windows Player
It has come to our attention that the way the Windows Player handles the refresh of resource based content (such as Tickers, DataSets, Twitter, etc) can introduce a visual delay when updating a widget on the active Layout. The length of delay is dependent on the time it takes to make the necessary request to the CMS. This request can be lengthy if the CMS has to fetch a further remote resource from the wider Internet.

This release contains an improvement so that the Player will show its cached content immediately and update the resource in the background so that it is ready for the next widget reload - greatly improving the visual experience when watching the Player.

The trade off with this improvement is that a widgets content can be out of date for its duration.

A full detailed explanation is available on the [issue](https://github.com/xibosignage/xibo/issues/759).

This improvement brings the Windows Player in-line with the Xibo for Android Player.

#### Android Player
If you are using Xibo for Android R60 or later with this version of the CMS, the functionality to report proof of play statistics will be switched off by default. This will happen on upgrade
of either the CMS or the Player.

This functionality change has occurred because Proof of Play statistics generate a large overhead in both network activity and storage requirements for the Xibo database. It was
therefore felt that they should be "opt-in" rather than "opt-out".

To re-enable them it is necessary to adjust the setting in the CMS Display Settings.

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
For a full list of bug fixes please refer to the [Release Project Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.7.7+is%3Aclosed).
