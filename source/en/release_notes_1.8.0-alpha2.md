<!--toc=getting_started-->
# [[PRODUCTNAME]] 1.8.0-alpha2 - Codename "Tempel"</span>
Welcome to the release notes for the second alpha release in the 1.8 Series of
 [[PRODUCTNAME]], codenamed "Tempel".

 **This should NOT BE USED IN PRODUCTION.**.

This release contains significant changes from 1.7 Series and significant changes
from the 1.8.0-alpha release and these release notes should be read an understood
 before trying the release.

You can download this release from [GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.0-alpha2).


## Requirements
[[PRODUCTNAME]] requires PHP 5.5 or higher. Please read the details in [install environment](install_environment.html) to understand the extra configuration 1.8 Series requires before proceeding.

We recommend using the 1.8.0-alpha2 Windows Player with this release. The 1.7.5  version of the Windows Display Player is also compatible with this CMS, but
 will not run the latest features.

### XMR (message relay)
1.8.0-alpha2 is the first version of the CMS to support *push* messaging via a new
 service called XMR. XMR is built on top of `ZermoMQ` and therefore `ZermoMQ` is
 requirement for use.

The CMS will function without `ZeroMQ` or `XMR` installed, however it is advisable
 to use it as it improves the overall performance of the CMS and Players. Further
 instructions can be found on the [XMR](xmr.html) manual page.

## Upgrading
This release contains a new upgrade application which is build into the CMS. This
application supports upgrades from 1.7.0 (including 1.8.0-alpha).

Follow the [upgrade](upgrage.html) instructions to complete the upgrade.

## Help
Please report problems with this release using the [Development Category on the Community Forum](https://community.xibo.org.uk/c/dev).

## Issues addressed in this release
This release is the first stage of the rearchitecting of Xibo. It includes a completely rewritten CMS backend and full featured API. It also lays the foundations for the Playlists functionality.

For a full list of bug fixes please refer to the [Release Project Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.8.0-alpha+is%3Aclosed).
