<!--toc=getting_started-->

# [[PRODUCTNAME]] 1.8.9 - Codename "Tempel"

This is the ninth minor release of Xibo 1.8 Series. Included in this release are 11 bug fixes. There is a new Player with this release.

You can download this release from [GitHub - xibo-docker.tar.gz](https://github.com/xibosignage/xibo-cms/releases/download/1.8.9/xibo-docker.tar.gz). The full release files can be viewed [here](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.9).

This release is a bug fix release for the 1.8 stable series. If you are upgrading from 1.4, 1.6 or 1.7 please refer to the [1.8.0 release notes](release_notes_1.8.0.html) for a detailed list of changes and upgrade notes.




## Requirements

[[PRODUCTNAME]] runs on [Docker](install_docker.html), please check the [install guide](install_cms.html) for detailed requirements. The archive for this release can be downloaded from [GitHub](https://github.com/xibosignage/xibo-docker/releases/tag/1.8.9).

The CMS can be run without Docker, but this is not our recommended configuration. Installs without Docker are called [Custom/Manual Installs](manual_install.html) and further details can be found [here](manual_install.html). The release archive for a manual install can be downloaded from [GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.9).

We recommend using the 1.8.8 Windows Player with this release. The 1.7.6 or later version of the Windows Player is also compatible with this CMS, but will not run the latest features.



### Special Considerations

#### Currencies Module

The Currencies Module in [[PRODUCTNAME]] uses data from two 3rd party datasources, Alpha vantage and Fixer. This release works around issues exposed in both of these data sources.

1. Alpha vantage Rate Limiting: despite advertising that there are no rate limits on their API, it seems that Widgets which ask for more than 5 symbols are disallowed due to rate limiting. This release recommends only 5 symbols are entered and improves caching to assist in returning data despite the rate limit.
2. Fixer paywall: this free service exposes the ECB's 16:00 UTC published exchange rates and is used in the Currencies Module to calculate percentage change (Alpha Advantage does not support time series exchange data). Unfortunately Fixer are expanding their service to uses non ECB data and moving it behind a paywall. This release switches to a new service called https://exchangeratesapi.io/.



#### Widget Caching

This release fixes issues with the Widget Caching introduced in 1.8.8, in particular fixing regressions in 1.8.7 functionality. As with any big change in functionality there were unforseen consequences which have now been solved. This type of change will not be included in future minor releases. See [https://blog.xibo.org.uk/releases-and-software-versions/](https://blog.xibo.org.uk/releases-and-software-versions/).



#### Switching to Docker

Our recommended configuration for 1.8 series onward will be based on Docker and from 1.8 the focus of the documentation has changed to reflect this. If you would like to try 1.8.8 by upgrading your existing 1.7 installation, we recommend switching to Docker. Please refer to the [upgrade guide for more information](upgrade_switch_to_docker.html).




## Upgrading

This release supports upgrades from 1.7.0 onwards. If you are running a release prior to 1.7.0 then please upgrade to [1.7.9](release_notes_1.7.9.html) first.

Follow the [upgrade](upgrade.html) instructions to complete the upgrade.



## Help

Please report problems with this release using the [Support Category on the Community Forum](https://community.xibo.org.uk/c/support).



## Issues addressed in this release

For a full list of enhancements and bug fixes please refer to the [Release Project Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.8.9+is%3Aclosed).
