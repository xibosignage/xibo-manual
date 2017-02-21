<!--toc=getting_started-->

# [[PRODUCTNAME]] 1.8.0-rc3 - Codename "Tempel"

Welcome to the release notes for the third release candidate in the 1.8 Series of
[[PRODUCTNAME]], codenamed "Tempel".

 **This should NOT BE USED IN PRODUCTION.**.

This release contains significant changes from 1.7 Series and significant
changes from the 1.8.0-alpha/beta releases and these release notes should be read an
understood before trying the release.

You can download this release from
[GitHub](https://github.com/xibosignage/xibo-docker/releases/tag/1.8.0-rc3).

## Requirements

[[PRODUCTNAME]] runs on [Docker](install_docker.html), please check the [install guide](install_cms.html) 
for detailed requirements.

The CMS can be run without Docker, but this is not a supported configuration. Installs without
Docker are called [Custom/Manual Installs](manual_install.html) and further details can be found
[here](manual_install.html). The release archive for a manual install can be downloaded from
[GitHub](https://github.com/xibosignage/xibo-cms/releases/tag/1.8.0-rc3).

We recommend using the 1.8.0-rc3 Windows Player with this release. The 1.7.6 or
later version of the Windows Display Player is also compatible with this CMS,
but will not run the latest features.

### Special Considerations
#### Windows Player

The 1.7 series contained experimental support for CEF browser integration. This
has been removed in the 1.8 release due to stability issues. In 1.8 you will
not be able to use CEF as an alternative rendering engine.

<nonwhite>
We are working towards a new cross platform player which will replace this
Windows player and will also support Ubuntu. This development can be tracked
on our [community](https://community.xibo.org.uk/t/cross-platform-player-specification/6261)
forum.
</nonwhite>

## Upgrading

This release supports upgrades from 1.7.0 onwards. If you are running a release
prior to 1.7.0 then please upgrade to [1.7.9](release_notes_1.7.9.html) first.

Follow the [upgrade](upgrade.html) instructions to complete the upgrade.

## Help

Please report problems with this release using the [Development Category on the
Community Forum](https://community.xibo.org.uk/c/dev).

## Issues addressed in this release

For a full list of enhancements and bug fixes please refer to the [Release
Project
Page](https://github.com/xibosignage/xibo/issues?q=milestone%3A1.8.0-rc3+is%3Aclosed).
