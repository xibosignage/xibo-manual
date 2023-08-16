---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Display Information held in DataSets as Tickers or Tables"
keywords: "dataset ticker, dataset view, dataset tables"
persona: "media manager"
---

# DataSet

Display information held in a DataSets as Tickers or in a tabular format in Layouts/Playlists.

{feat}DataSet | v4{/feat}

The DataSet Widget primarily consists of a DataSet source which feeds into configured Elements when using the [Layout Editor](ayouts_editor.html) and Static Templates which are available in both the [Playlist](media_playlists.html#content-playlist-editor) and Layout Editors.

[DataSets](media_datasets.html) need to be created and defined prior to adding the DataSet Widget to Layouts/Playlists. 

## Overview

- Select from the available [Elements](layouts_editor#content-data-widgets-and-elements) of the Widget and choose where to position.

{tip}
You will see a message in the properties panel should you add an element that has no matching field type in your DataSet!
{/tip}

- Complement Elements by adding [Global Elements.](layouts_editor.html#content-global-elements)
- Create [Element Groups](layouts_editor.html#content-grouping-elements) for easier configuration/positioning when adding groups of multiple Elements/Global Elements.
- Handle paging of data with [Data Slots](layouts_editor.html#content-data-slots) for each Element.
- Variety of customisable [Static Templates](layouts_editor.html#content-static-templates).
- Update Elements/Templates with new data by editing the underlying [DataSet](media_datasets.html#content-adding-data-to-columns) data.
- Split data over multiple pages.
- Define how many items to display.
- Set transition effects.
- Specify how many items per page when choosing an effect that splits items.
- Duration can be set per item.

{tip}
Use this option with caution as this can create long-running media items. Ensure to use in conjunction with **Number of items** to limit!
{/tip}

- Order and Filter results by any column.
- Select which columns to use and re-order.
- Return results side by side and configure upper and lower row limits.
- Shuffle items to play in a random sequence.
- Customisable appearance settings.
- Create your own no data message to show in the event of no returned data.
- Content for this media is cached by the Players for off-line playback.
- Set a freshness check to determine when to switch to the 'No data' message when a Player is offline.





















