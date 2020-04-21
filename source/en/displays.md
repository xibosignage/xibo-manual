<!--toc=displays-->

# Displays

The primary purpose of [[PRODUCTNAME]] is to show content on screens with the entire application suite existing for that one purpose. [[PRODUCTNAME]] provides a concept called **Displays** to manage when and how content is shown on a screen.

{tip}
When no other content is Scheduled, Displays will **always** show a **Default Layout**. You can create your own Default Layout to replace the existing one and show on selected Displays. Use the row menu and click on Default Layout to select. 
{/tip}

Displays are uniquely identified by a **hardware key** which is generated when the Signage Player software is installed. This hardware key is used to create a Display record in the CMS and is unique to that one Display record.

## Connecting a Display

Displays connect to the CMS over an API called "XMDS" {nonwhite}(Xibo Media Distribution Service){/nonwhite} with most Players only requiring the URL and CMS Key. 

Alternatively, Displays can be added by providing a 6 character ‘Activation Code’ in the **Displays** page of the CMS.

**Please note:** Connecting a Display using the **Add Display (Code)** in the CMS is currently only supported for **Android Players** (from v2 R204 and later). We are working on supporting this connection method for all Players.

{tip}
New Displays will need to be marked as **authorised** before they can be sent any content. This can be done by using the row menu for the Display and clicking **Authorise**.
{/tip}

## Display Administration

Displays are administered from the Menu, with logged in Users able to view the status of Displays that they have been assigned permission for.

![Display Administration Grid](img/v2_displays_admin_grid.png)



#### ID

Used for internal identification of the display.

#### Display

Name given to the Display for easy identification purposes (this is not shown on the Display itself).

#### Status

*Tick* = Player is up to date (this may also show as green in colour).

*Cloud icon* = Player has not logged in with content waiting to be downloaded (this may also show as amber in colour, as displayed in the example image above).

*Cross* = Player is currently downloading new content and has yet to complete (this may also show as red in colour).

#### Authorised

Tick or cross to indicate whether the Display has been granted a licence with the CMS. This prevents unauthorised Displays being added to the CMS.

{tip}
From v2.3 include the **Commercial License** column using the **Column Visibility** button to easily identify the Commercial Licence status of your Displays!
{/tip}

#### Logged In

Tick or cross to show if the Display has logged in recently.

#### Last Accessed

Date and time stamp of when the Display was last accessed. 

#### MAC Address

Media Access Control Address of the Display (if the client software is capable of sending it).

{tip}
Use the **Column visibility** button to select the information you would like to display for your administration purposes. Deselect an entry to remove from the Displays grid.
{/tip}



## Row Menu

Each Display has a row menu containing a number of actions that can be performed against them such as;



![Displays Row Menu](img/displays_row_menu.png)



### Manage

Each Display has its own Dashboard which shows the Displays current status, bandwidth usage, file status and errors.



![Display Manage Dashboard](img/display_manage_dashboard.png)





{tip}
This Dashboard is useful as a first step for troubleshooting issues with a Display.
{/tip}



### Edit

Clicking on **Edit** opens configure options for that **Display**.

Displays can be tagged which allows for ordering and makes it easier to find. Administrators can set certain **Tag's** to have a **Value** associated to them.  Tags that have a Tag Value will show the selections available from an additional field - **Tag value** drop down.

{tip}
For further information on what Tag and Tag Values to use, please speak with your Administrator.
{/tip}

#### Override Display Profile Settings for individual Displays

Use the Profile Settings tab to see the settings applied from the selected [Display Settings Profile](displays_settings.html).



![Displays Edit Profile Settings](img/displays_edit_profilesettings.png)



#### Set Bandwidth Limits per Display

Use the **Advanced** tab to apply a limit for the amount of bandwidth that a **Display** can consume.



![Displays Bandwidth](img/displays_edit_advanced_bandwidth.png)

### Delete

Deleting a **Display** will remove it from the **CMS** entirely - this operation cannot be reversed. A deleted Display can be reconnected to the CMS by repeating the “Register” procedure which will create a new unique Display record.

{tip}
**Deauthorise** a Display instead of deleting so that it can be re-authorised at a later date if needed. Use the row menu for the Display and click on **Authorise** to toggle to **Deauthorise**. This can also be actioned from the **Edit Display** form by selecting **No** for Authorise display.
{/tip}

### Send Command

The **Send Command** functionality is executed via XMR to Players by selecting a predefined command. This is useful for sending Players 'Reboot' commands for example.

![Displays Send Command](img/displays_send_command.png)



{tip}
Administrators create predefined commands for use, therefore if you require additional commands, please contact your Administrator.
{/tip}

{tip}
This type of Command can also be executed by scheduling a [Command Event](scheduling.html#Events)
{/tip}

### Transfer Display to another CMS - available from version 2.2.0

**Please note:** We are currently working to bring this feature to all Players but at present this is only available for Windows Players from version v2 R201 and Android Players from version v2 R203.

To use this functionality you will first need to activate Google Authenticator using [Two factor Authentication](<https://xibo.org.uk/manual/en/tour_two_factor_authentication.html>), if you have not already set this up.

![Display Transfer Google Authenticator](img/displays_transfer_cms_google_authenticator.png)

Once activated, click on **Displays** from the CMS main menu. Use the row menu for the Display you want to Transfer and click on **Transfer to another CMS**.

![Display Transfer Row Menu](img/displays_transfer_cms_row_menu.png)



Ensure all the form fields are completed by:

- Entering the full **CMS URL** you wish to transfer this Display to.
- Providing the **CMS Secret Key** for the CMS Address you wish to transfer to.
- Complete the **Two Factor authentication code**, as displayed on the app.![Transfer CMS](img/displays_move_cms.png)

Once the details provided have been authenticated, the Display will attempt registration with the 'new' CMS. Once the Display has been successfully transferred the Display will stop communicating with the 'old' CMS and will change from a 'tick' to a 'X' in the **Authorised** column.

{tip}
Select multiple Displays to transfer by using the **With Selected** option at the bottom of the Displays Grid and select **Transfer to another CMS**.

![Transfer with Selected](img\displays_transfer_cms_with_selected.png)

{/tip}