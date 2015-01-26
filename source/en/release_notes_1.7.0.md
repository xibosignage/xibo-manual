<!--toc=getting_started-->
# Xibo 1.7.0 - Codename "Tuttle"</span>

This is the first stable release of Xibo 1.7.0!

You can download this release from [https://github.com/xibosignage/xibo-cms/releases/tag/1.7.0](https://github.com/xibosignage/xibo-cms/releases/tag/1.7.0)

This release is the result of 2 alpha releases, a beta release and a release candidate and is packed with new features and improvements, including:

 * Clean, modern user interface
 * Improved translatable manual
 * Scheduling Calendar with Day, Week and Month Views
 * Simplified Player Registration and Configuration
 * Advanced Player Configuration managed from the CMS
 * Screen Shot Request from the Player
 * Media RSS support
 * Twitter support
 * Weather provided by Forecast IO
 * Effects for Text based media
 * New options for scaling web pages and embedded content
 * Many bug fixes and improvements
 * and much more.


## Requirements
You must use the 1.7.0 or higher version of the Windows Display Player with this version of the Xibo CMS.

Xibo requires PHP 5.3.3 or higher. A full list of module requirements is presented at the point of installation.

### Layout Design
The Layout format has been changed in 1.7 release but we have included a method of upgrading older Layouts to the new format. When viewing an older layout a notification will appear below the layout in the designer. Upgrading a Layout will alter the dimensions of the layout so that they match a particular resolution - after the upgrade you may have to manually adjust the media items to suit the new size, particularly if you have embedded media.

### Xibo for Windows
There are significant changes to the way display client settings are managed. All settings are now managed on the CMS except the settings required to connect to the CMS. You will need to manually migrate your settings into the CMS - we have provided sensible default values. See [display settings](displays_settings.html) in the manual for more information.

The .NET Framework requirement has been raised to v4.

### Xibo for Ubuntu
Xibo for Ubuntu (the Python Client) has been discontinued. Please see the [announcementt](http://xibo.org.uk/2014/12/15/xibo-for-ubuntu-alpha-discontinuation-notice/) for further information.

## Upgrading
There are significant changes between the 1.7 series of Xibo and prior releases. The upgrade wizard will take a prior installation and convert it to the 1.7 series to date. Note that this is a one-way conversion. **Please do not upgrade your production database without taking a backup.**

*   Clone your existing Xibo database and grant permissions (see [Release Notes:Clone Database](release_notes_clonedb.html "Clone Database") for details)
*   Backup settings.php from your installation
*   Manually take a backup of your database
*   Replace your existing installation with the new version from the tar.gz or zip file. **Do not copy over the top.**
*   Replace your backup settings.php file in your Xibo installation directory
*   Browse to [http://your.server/path](http://your.server/path) as normal
*   You will be prompted that an upgrade is required.
*   Enter an administrator user name and password, and follow the upgrade wizard.
*   The upgrade should run, and finally ask you to log in as you would normally.

Instructions for cloning a Xibo database are available here [Clone Database](release_notes_clonedb.html "Clone Database").

## Help

Please ask for help / advice on Github Issues: [https://github.com/xibosignage/xibo/issues](https://github.com/xibosignage/xibo/issues)

When asking for assistance with this release, please make it clear the version you are using.

## Bug Fixes

For a full list of bug fixes please refer to the Release Project Page: [https://github.com/xibosignage/xibo/issues?q=milestone%3A1.7.0](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.7.0)