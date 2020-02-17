<!--toc=layouts-->

# Layouts

A Layout is a complete screen design including content and background, which is then scheduled to a Display or multiple displays and Display Groups. A Layout is made up of 1 or more Regions which hold content and contain a timeline of Media to show. Media is assigned to the Layout Timeline using Widgets which provide the actions for the selected Module. 

{tip}
Take a look at the [Modules](media_modules.html) page to see the variety of content available by simply adding a Widget to a Layout.
{/tip}

[[PRODUCTNAME]] has no limit to the number of Layouts you can have in the system or the number a User can have.

Layouts are administered from the Design section of the menu. Click on **Layouts** to open the Layouts grid, use the available fields to narrow your search for existing Layouts.

Create a new Layout from the **Add Layout** button.

![Layout Grid](img/v2_layouts_grid.png)

## Add Layout

Click on the action button to open the Add Layout form to complete the appropriate fields.

![Add Layout](img/v2_layouts_add.png)

{tip}

**When should a User create a new Layout? When should a User add to an existing Layout?**
Layouts provide vast flexibility in the system, but can also cause confusion. The recommended usage for a layout is to only contain the design and media required for a set of related content that should be scheduled at the same time.

**Scenario**:
You have a video showing a fire safety demonstration and a video showing an advert for an upcoming production - it would be natural to have separate Layouts for these.

{/tip}

### Tags

Layouts can be tagged which allows for ordering and makes it easier to find and view a large number of Layouts if grouped by a certain Tag. Administrators can set certain Tag's to have a Value associated to them.   Tags that have a Tag Value will show the selections available from an additional field -  **Tag value** drop down.

{tip}
For further information on what **Tag **and **Tag Values** to use, please speak with your Administrator.
{/tip}

### Templates

Create Layouts and save your design to use as a [Template](layouts_templates.html), great for maintaining a corporate image or style.

### Resolution

Layouts are designed for an intended display resolution and will function best when shown on a Player with a matching resolution. If they are shown on a display that has a different resolution it will dynamically resize which may result in unused screen space.  

{tip}
Sending a Player a Layout that has been designed with a 4:3 resolution which is connected to a 16:9 TV screen would result in two empty bars either side of your content. 
{/tip}

**If you require an alternative resolution to the available options listed, contact your Administrator**

### Enable Stats collection

Tick/untick the box to enable/disable the collection of statistics for **Proof of Play Reports** for the newly added **Layout**.

{tip}
Ensure that the **Enable Stats Collection** check box has been enabled for the **Display** this Layout will be scheduled to, in the [Display Profile Settings](displays_settings.html).
{/tip}

### Automatically apply Transitions

{tip}
Transitions are not supported on Windows and Linux Players.
{/tip}

Default Transition settings will be applied to all Widgets on the Layout if this box is ticked. Untick to disable defaults for all Widgets on the Layout. 

{tip}
Transitions can be applied from the [Tools](layouts_tools.html) menu on the Layout Designer.
{/tip}

## Row menu

Use the row menu for a selected Layout to access more options:

![Layouts Row Menu](img/v2_layouts_row_menu.png)

### Design

Click to open the Layout Designer to enable editing.

{tip}
If your Layout has a Published status, the Layout Designer will open in a **Read Only Mode**. **Checkout** the Layout to enable editing.
{/tip}

### Checkout

Checkout from the row menu to put the Layout into a **draft** mode so that changes can be made later. Once edited, the Layout can be **Published** to make changes permanent and to overwrite the existing Layout.  **Discard** will revert the Layout back to the original published state.

{tip}
Take your time with any edits you need to make as using **Checkout** ensures that no changes are made to your published version or shown on scheduled **Displays** until you choose to do so. **Publish** confirms changes have been made and will overwrite your published version. **Discard** will delete the draft with the published version remaining untouched.
{/tip}

### Preview Layout

The **Layout** will play from start to finish which allows you to see how your layout will play. Make important adjustments to ensure that layout designs play as intended before scheduling to Displays. 

{tip}
Before the Layout can start all **Media** must be downloaded to your browser and verified so you may experience a slight delay whilst this is in process.
{/tip}

### Schedule Now

To save time, **Layouts** can be scheduled for a specified amount of time, which can be very useful for important notices / promotions.

{tip}
Layouts must have a **Published** status before being scheduled.
{/tip}

### Assign to Campaign

Select Layouts to include in created Campaigns.

### Edit

Make changes to the naming and Tags used for the **Layout** as well as making changes to the background image/colour.

### Copy

Create copies of designed layouts. Choose to include all contained **Media** items, to use as a base for creating new layouts to save time.

### Retire

Retire a Layout so it does not affect existing **Schedules**. A retired Layout will be hidden from new Scheduling options but will remain unaffected in existing Schedules and continue to show on Displays.

### Delete

Remove a Layout and all its associated media completely from all existing Schedules. **Please note:** This action is irreversible!

### Export

Export the Layout including all associated Widgets/Media/DataSet structures to a ZIP file, so it can be easily shared.

### Permissions

Assign Permissions for **Users/User Groups** to define who should have access to **View**, **Edit** and **Delete** the Layout.



## Draft Status

Selecting a Layout that is in a Draft status will present further row menu options.

{tip}
From v2.2.0 Administrators can use the default setting on the CMS **Settings** page to automatically **Publish** draft Layouts 30 minutes after the last edit!
{/tip}

### Publish

Select to Publish Now or select a date and time to set the Layout to Publish.

### Discard

Ignore any changes that have been made and revert to the previous Published version of the Layout.

{tip}
Did you know…**.Layouts** and **Library files** can be [Assigned](displays_fileassociations.html) directly to a **Display** or **Display Group** so that they are always available in the local library of the Player. Useful for pre-loading a Layout ahead of time ready to be scheduled.
{/tip}