<!--toc=getting_started-->

# [[PRODUCTNAME]] 1.8.10 - Codename "Tempel"

This is the tenth minor release of Xibo 1.8 Series. Included in this release are 68 bug fixes and improvements. There is a new Player with this release.

You can download this release from [GitHub - xibo-docker.tar.gz](https://github.com/xibosignage/xibo-cms/releases/download/1.8.10/xibo-docker.tar.gz). The full release files can be viewed [here](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.10).

This release is a bug fix release for the 1.8 stable series. If you are upgrading from 1.4, 1.6 or 1.7 please refer to the [1.8.0 release notes](release_notes_1.8.0.html) for a detailed list of changes and upgrade notes.




## Requirements

[[PRODUCTNAME]] runs on [Docker](install_docker.html), please check the [install guide](install_cms.html) for detailed requirements. The archive for this release can be downloaded from [GitHub](https://github.com/xibosignage/xibo-docker/releases/tag/1.8.10).

The CMS can be run without Docker, but this is not our recommended configuration. Installs without Docker are called [Custom/Manual Installs](manual_install.html) and further details can be found [here](manual_install.html). The release archive for a manual install can be downloaded from [GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.10).

We recommend using the 1.8.10 Windows Player with this release. The 1.7.6 or later version of the Windows Player is also compatible with this CMS, but will not run the latest features.



### Special Considerations

#### Google Traffic Module

Google are making changes to their Traffic API billing and terms which may result in your Traffic Widgets ceasing to function. Please review our [blog post](https://blog.xibo.org.uk/changes-to-google-traffic-widget/) for more information.



#### Dropdown Lists

This release improves the way the CMS provides drop down select lists for Layouts, Media and Displays. In large CMS instances with a lot of Layouts, Media and/or Displays the user interface could become unresponsive and hard to use. Drop down lists for these types of data are now paged and filtered so they open faster.



#### Widget Sync

We've made improvements to the way we manage Widget Caching and updating 3rd party resources, such as Tickers and Twitter. Please review our [blog post](https://blog.xibo.org.uk/widget-refresh-from-the-cms/) for more information.



#### Calendar Module

This release contains a new Module for you to try - the Calendar Module, used the show an iCal feed on a Layout. We've got a great guide for this new module on [the community](https://community.xibo.org.uk/t/calendar-module-guide-xibo-cms-1-8-10/14749).



#### Chart Module

Adding to the work he did in on Remote DataSets in 1.8.4, [LukyLuke](https://github.com/lukyluke) is back with another contribution, this time a Chart Module. This is used to show various type of Chart on a Layout, based on data in a DataSet (perhaps even a remote one!). We've got a great guide for this new module on [the community](https://community.xibo.org.uk/t/chart-module-guide-xibo-cms-1-8-10/14794).



#### Switching to Docker

Our recommended configuration for 1.8 series onward will be based on Docker and from 1.8 the focus of the documentation has changed to reflect this. If you would like to try 1.8.10 by upgrading your existing 1.7 installation, we recommend switching to Docker. Please refer to the [upgrade guide for more information](upgrade_switch_to_docker.html).




## Upgrading

This release supports upgrades from 1.7.0 onwards. If you are running a release prior to 1.7.0 then please upgrade to [1.7.9](release_notes_1.7.9.html) first.

Follow the [upgrade](upgrade.html) instructions to complete the upgrade.



## Help

Please report problems with this release using the [Support Category on the Community Forum](https://community.xibo.org.uk/c/support).



## Issues addressed in this release

For a full list of enhancements and bug fixes please refer to the [Release Project Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.8.10+is%3Aclosed).
