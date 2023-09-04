---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Display Webpage content by adding the Webpage Widget to Layouts"
keywords: "open natively, manual position, best fit, preloading, webpage load error"
---

# Webpage

Include content from a webpage to be displayed on Layouts and Playlists.

{feat}Webpage|v4{/feat}

{version}
**Note:** The Webpage Widget requires a valid internet connection in order to function as webpages are not cached by the Player.
{/version}

## Overview

- View a full webpage without any alterations.
- Open Natively, Manual Position and Best Fit embed options.
- Scale and offset the target webpage to show a particular section of the webpage.
- For content with a transparent background tick to show the Widget with a transparent background.
- Preload content off screen.
- Trigger a web hook to navigate to an active [action](layouts_interactive_actions.html) in the event of a webpage load error.

{version}

**NOTE:**

- Transparent background is available on Windows from v2 R253.  [[PRODUCTNAME]] will try its best to do this when enabled for pages which have a transparent background, however, it cannot be supported on some webpages.
- Preloading off screen is currently only available from Android v2 R207.

{/version}


### Open Natively

When selected, the Player will open the webpage without any alterations and will open and render in the browser as if the URL had been visited on the device outside [[PRODUCTNAME]].

{tip}
**Please note:** There is no preview available with this option!
{/tip}

### Trigger a web hook

Trigger a web hook for an active action (navigate to Widget, navigate to Layout a Scheduled Command etc.) to be shown in the event the webpage returns an error and fails to load.

{feat}Webpage - Page load error trigger|v4{/feat}

- Enter the **Trigger Code** of a configured Action to match against a supplied web hook `trigger` parameter.

### Manual Position

This option will embed the webpage in an iframe where users can specify the dimensions required.

- Use the Offset and Scale settings to force the page/sections of the page to fit within the dimensions to show just a section of the webpage.

### Best Fit

This option will embed the webpage in an iframe  where users can specify the dimensions required.

{version}
**NOTE:** **Manual Position** and **Best Fit** options will not work with websites that set the **X-Frame-Options header**. If you are unable to see the webpage use the Open Natively option when using Windows / Linux or Android. 

If X-Frame-Options are set then webOS and Tizen will not work in any mode!

If X-Frame-Options are not set then the website should show in any of the Players, using any of the above options.

Use this [X-Frame-Options Header Checker Tool](https://geekflare.com/tools/x-frame-options-test) to see if the header has been set for the webpage you wish to target.
{/version}

