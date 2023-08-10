---
toc: "media"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Playlists contain a timeline of ordered content which can be re-used across multiple Layouts"
keywords: "re-usable, slide show, add multiple items, show a sequence of content, schedule playlists, dynamic playlist, playlist editor, spacer widget, text widget, widget expiry dates"
persona: "content manager"
---

# Playlists

Playlists contain a timeline of ordered content which can be created directly on a Layout as a one time assignment using the [Playlist](media_modules_playlist.html) Widget or created and managed independently for further re-use across multiple Layouts from the Playlists page.

## Feature Overview:

- Use to create a 'slide-show' of content.
- Define ordering of items.
- Includes a timeline to show how the sequence of content will play.
- Create a Playlist of content directly on a Layout as a one time assignment.
- Create a [re-usable list](media_playlists.html#content-creating-a-re-usable-playlist) of content independently to Layouts.
  - Re-use across multiple Layouts.
  - Add and maintain content [dynamically](media_playlists.html#content-dynamically-adding-media).
  - Update Playlist content without accessing Layouts.
  - Schedule directly from the Playlist grid without the need to add to a Layout.
  - Save to [Folders](tour_folders.html) to easily control Share options for Playlists.
- Preload media to be shown at a later date/time with [Widget Expiry Dates.](media_playlists.html#content-widget-expiry-dates)
  


## Creating a re-usable Playlist

Streamline resources and save time by creating Playlists to hold multiple items of content which can be used across multiple Layouts. Create Playlists to target and collate content for specific requirements, locations, categories etc. 

Playlists that are created and therefore managed independently to Layouts, do not require further user access to Layouts or the Layout Editor to add or manage content.  Any changes made to a Playlist will be updated in all Layouts/Schedules that contain that Playlist.

Select Playlists under the Library section of the main CMS menu.

- Select the **Add Playlist** button and complete the form fields:

![Add Playlist](img/v4_media_playlists_add.png)(NEW)

[Folders](https://test.xibo.org.uk/manual/en/tour_folders.html) are used to organise, search and easily [Share](https://test.xibo.org.uk/manual/en/users_features_and_sharing.html#content-share) User objects with other Users/User Groups. Playlists saved to a Folder will inherit the access options applied to that Folder. 

{tip}
If Users should also have access to the content of the Playlist (image/video media files for example), ensure that these are also saved to the same Folder!
{/tip}

- Give your Playlist a **Name** for easy identification in the CMS and include optional [Tags.](tour_tags.html) 


### Dynamically adding Media

Playlists have a **Dynamic** option to automatically assign **Library Media** files based on set criteria:

- Once ticked, click on the **Filter** tab and set the required criteria in order to populate matching Library Media. 
- Provide a **maximum number** of Library Media files which can be automatically assigned.

Media already in the Library that matches the criteria set will be shown:

![Dynamic Assignment](img/v4_media_playlists_dynamic.png)

Any future media files that are added to the Library that satisfy the set criteria for this Playlist will be automatically added to this list.

{tip}
Library Media can also be prepopulated as a one-time assignment to a Playlist by setting criteria but leaving the Dynamic option unticked!
{/tip}

- Click to **Save** your dynamic Playlist.

{tip}
If you want to show your dynamic Playlist full screen on Displays, use the row menu and click Schedule!
{/tip}

### Playlist Editor

Saving the form **without** the **Dynamic** option selected or when adding the [Playlist](media_modules_playlist.html) Widget to a Layout, the **Playlist Editor** is used to manually add content:

![Manual Assignment](img/v4_media_playlists_manual.png)

- From the Toolbar, add Widgets / Library Media to the Playlist Editor.
- Configuration options will load in the properties panel.

![Playlist Timeline](img/v4_media_playlists_timeline.png)

The duration will update to show the minutes/seconds as items are added to the Playlist.

- Re-order the sequence by drag and drop.

Click the ruler icon to **Change Scale mode**:

![Scale Mode](img/v4_media_playlists_scale_mode.png)

Use the scale options to zoom in and out to decrease/increase the visible time span.

Items can be added to a specific point in the list, drag or click to add content to a position marker within the Playlist.

![Add to Timeline](img/v4_media_playlists_add_timeline.png)

{tip}
Use the Undo button at the bottom of the toolbar to revert a change!
{/tip}

An additional [menu](layouts_editor.html#content-context-menu) of options can be accessed by right clicking on an item. (See the section below for information on [Widget Expiry Dates](media_playlists.html#content-widget-expiry-dates))

![Context Menu](img/v4_media_playlists_context_menu.png)


Use the **Select Multiple Widgets** button at the bottom of the Playlist Editor to delete multiple selections with one click: 

![Mutli Select](img/v4_media_playlists_multi_select.png)



Use the **X** to close the Playlist Editor and return to the Playlist grid. 

{tip}
If you want to show your Playlist full screen on Displays, use the row menu and click [Schedule](scheduling_events.html) or add to show in a Layout using the [Playlist](media_modules_playlist.html) Widget.
{/tip}

## Playlist Widgets

The Playlist Editor contains two Widgets that are only available for use with Playlists:

### Rich Text Editor

Use the inline editor to enter text and apply formatting:

- Enter text or HTML.
- Provide JavaScript.

- Optionally select a **Background Colour** to use.
- Select an **Effect** to use from the dropdown menu.
- Include a **Speed** for the selected effect.
- Include a selector to use for stacking marquee items in a line when scrolling left/right.

### Spacer

Use the Spacer to create an empty 'slot' within a Playlist.

## Widget Expiry Dates

Items added to a Playlist have an additional option of setting Start and End times.

{feat}Widget Expiry Dates|v3{/feat}

Right click on an item in a Playlist to **Edit Expiry Dates** or set when [uploading media](media_library.html#content-add-media-upload) directly to a Playlist.

Selecting Upload new from a [Library Search](layouts_editor.html#content-toolbar) will have an additional **Set Expiry Date** option:

![Expiry Dates](img/v4_media_playlists_upload_expiry.png)

When uploading multiple media files, clicking the **Start upload** button will upload all files with the same date/time and Folder location set.

Items can also be uploaded individually using the **blue upload** button at the end of the row for a file to have different set Expiry Dates and Folder locations for each file uploaded.

Items on a Playlist that have expiry dates set will include an icon for easy identification:

![Expiry Dates](img/v4_media_playlists_expiry_dates.png)

- Start date has been set for a date/time in the future.
- Expiry date has been set.
- On expiry the item will be deleted from the list.
- Expired item but will remain on the Playlist to view in the Playlist Editor timeline.

{tip}
Once the End date has passed the item will be removed from the Playlist. Expired items that have not been set to Delete on Expiry will remain visible in the Playlist Editor only so that Start and End times can be re-adjusted if needed.
{/tip}

- Click on an icon in the Playlist Editor to open to make any changes/remove.

## Row Menu

Playlists created from the Playlists grid have a row menu where Users can access a list of actions/shortcuts.

- Notable settings are listed below:

**Timeline**

Select to make changes to manually assigned content of a Playlist using the Playlist Editor.

**Edit**

For Dynamic Playlists use the Filter tab to view the list of dynamically assigned media and to make changes to criteria.

Select to change any details of a Playlist record (Manual or Dynamic) such as the Name, Tags etc.

**Usage Report**


View where Playlists are being shown and what Layouts they have been added to.

**Schedule**

Directly Schedule a Playlist to be shown full screen on Displays. 

{tip}
Any changes made to a Scheduled Playlist will be automatically pushed to Players as they are made.
{/tip}

## Creating a Playlist on a Layout

- Add the [Playlist Widget](media_modules_playlist.html) to your Layout and manually add Media using the [Playlist Editor](media_playlists.html#playlist-editor) (as outlined above.)











