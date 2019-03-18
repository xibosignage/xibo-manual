<!--toc=media-->

# Library 

The CMS Library stores all file-based media that is uploaded for use onto Layouts.

## Uploading Media

Library media can be uploaded directly to the Library using an easy to use file upload tool.

Navigate to Media under the Library section of the menu to open the Library grid. Click on the **Add Media** button.

![Media Library](img/media_library_grid.png)

{tip}
Media can also be uploaded directly to a **Widget** assigned in a **Layout**, which will also save to the Library by default.
{/tip}

Uploading is achieved in two steps.

1. Click **Add files** and select the file(s) you wish to upload.
2. Click **Start upload** to begin the transfer of all files, alternatively click on the blue upload button next to individual files to upload individually. Once successfully uploaded, click Done.

{tip}
Files can also be added via drag and drop.
{/tip}

![Media Library Upload](img/media_library_upload.png)

{tip}
All media items that have been uploaded to the Library are available to include in Layouts by simply using the [Library Search](layouts_library_search.html) tab on the **Layout Designer** tool bar.

![Library Search Tab](img/v2_media_library_search.png)

{/tip}

## Adding New Fonts

[[PRODUCTNAME]] comes with a set of standard fonts provided by our text editor tool - CKEditor. New fonts can be added and uploaded to the **Library** in the same way. Once added the font will be available to use in the text editor.

{tip}
If the new font does not show in the text editor after upload, try clearing the browser cache. 
{/tip}

{tip}
**Please note:** Fonts have preferences built into then known as OS/2 tags. [[PRODUCTNAME]] checks for OS/2 preferences and can use fonts with OS/2 tags 0 or 8. Fonts with other OS/2 tags may produce an error on uploading and may not display correctly.
{/tip}

## Row Menu

Each **media** file has a row menu with a list of actions that can be performed against it.

### Edit

The Edit Media form allows you to edit the name and duration of the file as well as options to **Retire** and **Update** edits to layouts that contain the current media file.

![Edit Media](img/media_edit.png)

It may be necessary to upload a new revision of an existing file. This can be done by using the **Replace** button at the bottom of the form.

![Replace Media](img/media_replace.png)

Upload a replacement file using the same steps as before and select whether the replacement file should be updated to all Layouts it is currently assigned to and the old version removed.

### Delete

Media files can only be deleted from the CMS if they are not being used on any existing **Layouts**. The option to force a delete from any existing Layouts must be used with caution, deleting a file cannot be reversed.

![Delete Media](img/media_delete.png)

{tip}
Retiring content means that it will no longer be available to assign to new Layouts but will remain in existing Layouts it is assigned to, meaning scheduled content can remain unaffected.
{/tip}

### Permissions

Assign **view/edit/delete** permissions for User/User Groups.

### Download

Download a copy of the **media file** for ease of sharing.

### Usage Report

This will show if the selected **media file** is scheduled to **Displays**. Use the Layout tab to see what Layouts the media file is currently included in.

![Library Usage Report](img/media_library_usage_report.png)

{tip}
The Usage Report is great to make checks prior to deleting files.
{/tip}