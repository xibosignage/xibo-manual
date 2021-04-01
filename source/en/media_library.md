<!--toc=media-->

# Library 

{tip}
If you are using a CMS version earlier than 3.0.0 please use the following link: [Library](media_library_2.html)
{/tip}

The CMS Library stores all file-based media that is uploaded for use on Layouts.

Navigate to **Media** under the **Library section** of the main menu to open the Library [grid](tour_grids.html):

![Media Library](img/v3_media_library_grid.png)

## Uploading Media

Library media can be either uploaded directly to the Library using the **Add Media** button and uploading via our easy to use tool or using the **Add Media (URL)** button to provide a URL.

### Add Media by uploading a file

- Select the **Add Media** button at the top of the grid.

![Add Media](img/v3_media_upload.png)

- Click **Add files** and select the file(s) you wish to upload. 

![Add Files](img/v3_media_add_files.png)

{tip}
Files can also be added via drag and drop!
{/tip}

- Give your file a **Name** for easier identification in the CMS and an optional **Tag**. 

{tip}
If the Name field is left blank, the file will be named as per the original file name on upload!
{/tip}

Media can also be directly uploaded to a specified Folder location.

{tip}
Media files that are saved in Folders will inherit the View, Edit, Delete Share option that have been applied to the destination Folder for User/User Group access!
{/tip}

- Click on the **Select Folder** button. Expand to select an existing Folder or right click and **Create** a new Folder.

![Select Folder](img/v3_media_select_folder.png)

{tip}
Available Folder options are based on enabled [Feature and Sharing](users_features_and_sharing.html) options for a User/User Group.
{/tip}

- Click in the folder you wish to upload the file to and click **Done**. The **Current Folder** will show the selected file path:

![Current Folder](img/v3_media_current_folder.png)

{tip}
The above image shows media files will be uploaded to `  />Example Folder` 
{/tip}

- Click the **Start upload** button to begin the upload of all files. If a Folder has been selected and you have added multiple files, all files will be uploaded to that location.

Files can also be uploaded individually and have different Folder locations specified.
Instead of clicking on the Start upload button, click on the **blue upload** button shown at the end of the row for an added file. 

- Change the Folder location using the **Select Folder** button as before and then click the blue button at the end of the row to upload just that singular file.

{nonwhite}
Further information for Administrators regarding Folder access and set-up can be found [here](https://xibo.org.uk/docs/setup/folders-administration)
{/nonwhite}

{white}
For further information regarding Folder access and set-up, please speak to your Administrator.
{/white}

![Single Upload](img/v3_media_single_upload.png)

- Once all files have been successfully uploaded, click **Done**.

{tip}
Media files can also be uploaded directly to a **Widget** assigned in a **Layout**, which will also save to the Library by default.
{/tip}

### Add Media via URL

- Select the **Add Media (URL)** button at the top of the grid.

![Upload via URL](img/v3_media_library_upload_url.png)

- Use the Select Folder button if you need to select /create a specific Folder to add this media file to.
- Provide the remote URL for the file.
- Include a Name to be used instead of the file name if required for easier identification in the system.
- Use the drop down to select the setting to be applied regarding stats collection.
- Once all fields have been completed click to **Save**.


{tip}
All media items that have been uploaded to the Library are available to include in Layouts by simply using the [Library Search](layouts_library_search.html) tab on the **Layout Designer** tool bar.
{/tip}

## Adding additional fonts

[[PRODUCTNAME]] comes with a set of standard fonts provided by our text editor tool - CKEditor. Additional fonts can also be added to the **Library** using the **Add Media by uploading a file** method. Once added, the font will be available to use in the text editor.

{tip}
If the new font does not show in the text editor after upload, try clearing the browser cache!
{/tip}

{tip}
**Please note:** Fonts have preferences built into then known as **OS/2 tags**. [[PRODUCTNAME]] checks for OS/2 preferences and can use **fonts with OS/2 tags 0 or 8**. Fonts with other OS/2 tags may produce an error on uploading and may not display correctly.
{/tip}

## Folders

By default, the **Folder Search** option will open. 

{tip}
This can be toggled on and off from view by clicking!
{/tip}

- Tick **Global Search** to Look in all places; including all folders and CMS libraries, to return results based on the filters applied to the Grid.

  or

- Click on a folder or sub folder to search contents and return results based on the filters applied to the Grid.

  

Folders allow users to organise, search and share objects easily.  Further information can be found on the [Grids page](tour_grids.html)
{nonwhite}
Further information for Administrators regarding folder setup can be found [here](https://xibo.org.uk/docs/setup/folders-administration).
{/nonwhite}

## Row Menu 

Each **Media** file has a Row Menu with a list of actions / shortcuts that can be performed against it.

### Edit

The **Edit Media** form allows you to make edits to the **Folder**, **Name** and **Duration** of the selected file amongst other actions.

![Edit Media](img/v3_media_row_menu_edit.png)

**Current Folder** - If the media file is already in a Folder, the file path with be shown here. Click **Select Folder** to move to a different location.

**Tags** - Media can be tagged to allow for ordering and make files easier to find.

When entering text into the Tag field on the form, an auto complete helper will show possible matches to make it easier for Users to select from.

Predefined  Values will be shown by using the **Tag value** drop down, if the Value is already known it can be typed directly into the field using the following format: `Colour|Red`

{tip}
If a Value has been set as 'Required' by an Administrator, then the Value must be entered in order to save the form!
{/tip}

Users can add an associated Value to a Tag that does not already have a predefined value by using the **Tag value** field. If a Tag value is not needed, this field can be left blank.

{tip}
Tags can also be assigned to multiple media files using the [With Selected](https://xibo.org.uk/manual/en/tour_grids.html#multi-select) option at the bottom of the Library grid!
{/tip}

For further information on what **Tag **and **Tag Values** to use, please speak with your Administrator.

{nonwhite}
Tag management information for Administrators can be found [here](https://xibo.org.uk/docs/setup/tags-adding-editing-assigning)
{/nonwhite}

**Expiry date** - Select a date and time to completely remove the selected media file from the CMS.

{tip}
**Please note:** This will remove media from any Layouts that contain the selected file.
{/tip}

{tip}
If you do not want to completely remove the media file and keep it assigned to existing Layout's then tick the **Retire this media** option. The Media file will not show for selection for new Layouts.
{/tip}

**Enable Media Stats Collection** - Use the drop-down to set the collection of [Proof of Play](displays_metrics.html#proof_of_play) statistics to On / Off / Inherit for the selected Media file.

{tip}
To collect Proof of Play records ensure that the Enable Stats Reporting has been ticked in [Display Settings](displays_settings.html)
{/tip}

{tip}
Use the check box **Update this Media in all Layouts it is assigned to** so that edits made are reflected in Layouts that this Media file is currently assigned to. Edits will only be updated in Layouts which you have permission to edit.
{/tip}

It may be necessary to upload a new revision of an existing file. This can be done by using the **Replace** button at the bottom of the form.

Upload a replacement file using the same steps as before and select whether the replacement file should be updated to all Layouts it is currently assigned to and if the old version should be removed.

### Copy

Make copies of the selected media file, give the copied file a new **Name** and **Tag**.

### Select Folder

Move the Media file to a selected Folder.

### Delete

Media files can only be deleted from the CMS if they are **not** being used on any existing **Layouts** .The option to force a delete from any existing Layouts must be used with caution as deleting a file cannot be reversed.

{tip}
**Retiring Content** means that it will no longer be available to assign to new Layouts but will **remain** in existing Layouts it is assigned to, meaning scheduled content can remain unaffected. Click on **Edit** and tick the box to retire on the Edit Media form!
{/tip}

### Share

Enable [Share](users_features_and_sharing.html) options for selected Users/User Groups.

### Download

Download a copy of the **media file** for ease of sharing.

### Enable Stats collection

Enable the collection of Proof of Play statistics.

### Usage Report

This will show if the selected **media file** is directly assigned/scheduled to **Displays**. 

![Library Usage Report](img/v3_media_library_usage_report.png)

Use the Layout tab to see what Layouts the media file is currently included in.

Use the Row Menu to view/edit in the Layout Designer by selecting **Design** or open a previewer to **Preview Layout**. 

![Library Usage Preview](img/v3_media_library_usage_preview.png)

{tip}
The **Usage Report** is great to make final checks prior to tidying media files.
{/tip}