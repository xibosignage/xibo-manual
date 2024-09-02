---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 1
alias: "media_module_chart"
excerpt: "Module Management for Administrators"
keywords: "generic file, caching, external access, enable modules, disable modules"
persona: "administrator"
---

# Modules Management

All content displayed in [[PRODUCTNAME]] is served by a **Media Module** managed from the **Modules** page under the **Administration** section of the main CMS menu:

![Modules Grid](img/v4_media_modules_grid.png)

- Use the row menu and click **Configure** to control if it should be accessible for Users to use.

{tip}
At times it may be necessary to add or remove the allowed extensions on a particular Library file based Module (Image, Video, Flash etc.) A typical use case would be if a Player is being used which does not support that particular type of file.

Fonts can be added and manages from the [Fonts](tour_cms_settings.html#content-fonts) page under the **Administration** section of the main CMS menu.
{/tip}

## Caching and external access

The core Modules are designed to have their data cached and served from the CMS so that they can be played back without an active connection and/or without direct access to external resources that might be required. The CMS also uses this mechanism to be a _good citizen_ when requesting 3rd party data.
{tip}
For example, a Ticker Widget with the address `http://anexternal.com/feed` would only be accessed by the CMS and only once per `updateInterval`. The Players showing the Layout would not need to access that address directly.
{/tip}

All of the core Modules adopt this approach, exceptions noted below:

- The **Web Page Module** does not cache from the CMS and will always attempt to open the specified web page address using the browser on the Player. This means that the Player must have network access to the web address at all times.
- The **Embedded Module** can be cached using library references, however, the User that creates the Module is free to specify external resources should they require them.
- The **Local Video Module** is rendered by the video decoder on the Player and can reference an external stream.
- **Flash** Files have the capability to reference an external file and will be run on the Player.

## Generic File

The Generic File Module is used to send **additional files** to the Player that can then be used for other purposes. 

{tip}
This could be useful for providing supplementary files to be used as relative paths (e.g. An up and down arrow that is dynamically shown in the embedded HTML based on the results of stock data) as an example.
{/tip}





