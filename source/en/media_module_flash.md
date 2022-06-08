<!--toc=widgets-->

# Flash

### Please note: As Adobe no longer supports Flash, it will be naturally phased out over a period of time. Whilst Players may still play flash at this current time, updates to operating systems and other third party components, such as the browser, may render Flash files as unplayable.

{tip}
If you are using a CMS earlier than v3.0.0 please use the following link: [Flash](media_module_flash_2.html)
{/tip}

The Flash Module allows for SWF file uploads to the [Library](media_library.html) which can then be used in Layouts.

## Add Widget

Click on Flash from the [Widget](layouts_widgets.html) toolbar and click to add or drag and drop ![Flash Widget](img/v2_media_flash_widget.png)

{tip}
Use the [Library Search](layouts_library_search.html) function to add PowerPoint files already uploaded to the Library.
{/tip}


From v3.1.0 use the **Library other media search** and filter by **Type** to select **Upload new** and add to a Layout:

![Upload New](img/v3.1_media_flash_uploadnew.png)

## Upload Media File

The file uploader will open on adding the Flash Widget:

![Flash Add](img\v3_media_flash_upload.png)

- Click **Add files** and select the file(s) to upload

{tip}
Files can also be added via drag and drop!
{/tip}

- Give your file a **Name** for easier identification in the CMS and an optional **Tag**.

{tip}
If the Name field is left blank, the file will be named as per the original file name on upload!
{/tip}

Flash files can also be directly uploaded to a specified **Folder** location.

{tip}
Files that are saved in Folders will inherit the View, Edit, Delete [Share](users_features_and_sharing.html) options that have been applied to the destination Folder for User/User Group access!
{/tip}

- Click on the **Select Folder** button and expand to select a Folder to save in.
- Users can also right click a Folder to access further options.

{tip}
Available Folder options are based on enabled [Feature and Sharing](users_features_and_sharing.html) options for a User/User Group.
{/tip}

- Click in the folder you wish to upload the file to and click **Done**.
- The **Current Folder** will show the selected file path.

{nonwhite}
Further information for Administrators regarding Folder access and set-up can be found [here](https://xibo.org.uk/docs/setup/folders-administration)
{/nonwhite}

{white}
For further information regarding Folder access and set-up, please speak to your Administrator.
{/white}

There is an option to **Set Expiry Dates** and times for files uploaded to this particular Widget.

{tip}
This is particularly useful should you need to preload files to be shown at a later date/time!
{/tip}

- Tick the **Set Expiry Dates** box.

  {tip}
  **Please note:** Expiry Dates are currently not supported for the Linux Player!
  {/tip}

  ![Expiry Dates](img\v3_media_flash_expiry_dates.png)

- Select **Start** and **End** dates and times.

- Use the check boxes to remove the media file from the Playlist on expiry and delete from the Library.

- Click the **Start upload** button to begin the upload of all files added. If a Folder/Expiry Dates have been selected and there are multiple files to be added, all files will be uploaded to the specified location and have the same Expiry Dates set.


- Once successfully uploaded, click **Done**.

Files can also be uploaded individually and have different Folder locations/Expiry dates and times specified.
Instead of clicking on the Start upload button, click on the **blue upload** button shown at the end of the row for an added file. 

{tip}
View or make changes to Expiry Dates by clicking on the icon on the Widget from the Timeline!
{/tip}

## Configuration Options

Click on the added **Flash Widget** to open configuration options in the properties panel:

![Edit Options](img\v3.1_media_modules_flash.png)

- Make edits to naming of the Widget if required
- Tick the **Set a duration** to provide a specific duration

### Actions

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

## Supported Players

| Display | Supported? | Remarks                                            |
| ------- | ---------- | -------------------------------------------------- |
| Android | No         | Not supported, see note.                           |
| Windows | Yes        |                                                    |
| webOS   | Yes        |                                                    |
| Tizen   | Yes        |                                                    |
| Linux   | Partial    | Support via the browser component can be unstable. |

**Please note:** As Adobe has discontinued development and support for this application the Flash Module is no longer supported on Android. After extensive testing, it was found that instabilities in the Player could cause the Player to close. Should you still choose to run via the Flash Module or on embedded websites, it will render using the Flash application if available. However, if you have stability problems with your device this may be due to the running of Flash content.

