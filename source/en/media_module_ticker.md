---
toc: "widgets"
maxHeadingLevel: 2
excerpt: "Use the RSS Ticker Widget to display dynamic feed content"
keywords: "dynamic feeds"
persona: "content manager"
---

# RSS Ticker

Use to display dynamic feed content on Layouts/ Playlists.

{feat}Ticker|v3{/feat}

The Ticker Widget primarily consists of a data source location which feeds into configured **Elements** when using the [Layout Editor](layouts_editor.html).

**Static Templates** can be used in both the [Playlist](media_playlists.html#content-playlist-editor) and Layout Editors.

## Overview

- Select from the available [Elements](layouts_editor#content-data-widgets) of the Widget and choose where to position.
- Create [Element Groups](layouts_editor.html#content-grouping-elements) for easy configuration with multiple elements.
- Handle paging of data with [Data Slots](layouts_editor,html#content-data-slots) for each Element.
- Variety of Static Templates.
- Define how many items to display.
- Duration can be set per item.

{tip}
Use this option with caution as this can create long-running media items. Ensure to use in conjunction with **Number of items** to limit!
{/tip}

- Select to start with items from the Start or End of the list.
- Reverse and Random order of feed items can be selected.

{tip}
The Randomise option works offline; the entire feed is parsed, rendered and downloaded to the Player and then sorted in a random fashion for display. We use a Durstenfeld shuffle to randomise the order of items. Randomise works on the full feed, "Number of items" and "Take items from" options.
{/tip}

- Include a Copyright notice to show at the end of the feed.
- Return results side by side.

- Apply formatting to apply to returned date results.

- Include a comma-separated list of attributes that should not be stripped from the incoming feed.

- Include a comma-separated list of HTML tags to be stripped from the feed.

- Set a specific User Agent.

- Decode the HTML entities in the feed before parsing it.

- Disable date sort.

- Cached for off-line playback.

- Override the Update Interval for Images.

- Customisable appearance settings.

  

{tip}
Create your own [RSS Feed](media_datasets.html#content-view-rss) using [DataSets](media_datasets.html).
{/tip}


















