---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Embed HTML and Javascript to display on Layouts and Playlists"
keywords: "preload content, CSS, script header tags"
persona: "content manager"
---

# Embedded Content

Embed HTML and JavaScript to be displayed on Layouts and Playlists. 

{feat}Embedded HTML|v4{/feat}

## Overview

- Make custom enhancements without modifying the core application.
- For content with a transparent background tick to show the Widget with a transparent background.
- Scale content with the Layout.
- Preload content off screen.

- Enter text or HTML to embed.
- Use a CSS style sheet to control the visual styling.
- Include `script` tags to embed content in the HEAD of the document. (Please see section below.)

{version}
**NOTE:** 

- Transparent background and Scale is available on Windows from v2 R253.

- Preloading off screen is currently only available from Android v2 R207.

  {/version}

### HEAD content to Embed

JavaScript should be wrapped in `script` tags. [[PRODUCTNAME]] will automatically add jQuery.

The `EmbedInit()` method will be called by the Player and can be used to safely start any custom JavaScript at the appropriate time. The method is defaulted on any new Embedded media Item.

```html
<script type="text/javascript">
function EmbedInit()
{
    // Init will be called when this page is loaded in the client.

    return;
}
</script>
```

{tip}
Show embedded HTML with Active-X content on a Windows Player, with the security settings of IE, so that local files are allowed to run active content by default. This can be done in Tools -> Internet Options -> Advanced -> Security -> "Allow Active content to run in files on My Computer".
{/tip}

