<!--toc=layouts-->

# Layout Designer

{version}
**Note:** If you are using a CMS earlier than v3.1.0 please select from the options below:

- v3.0.x CMS click [here](layouts_designer_3.html)
- v2.3.x CMS click [here](layouts_designer_2.html)
- v2.0.x CMS click [here](layouts_designer_2.0.html)
- v1.8.x CMS click [here](layouts_designer_1.8.html)

{/version}

## Overview

The Layout Designer is the heart of **content creation** in [[PRODUCTNAME]]. Each time a new Layout is added, or an existing one needs a design change, the Layout Designer is used.

On adding a new Layout, or clicking Design from the row menu of a Layout, the **Layout Designer** will open:

![Layout Designer](img\v3.1_layouts_designer.png) 

## Status Bar

The left hand icon shows you the current 'play' status of the selected Layout:

![Build Status](img/v2.3_layouts_build_status.png)- This Layout has not been built yet.

![Valid Status](img/v2.3_layouts_valid_status.png) - This Layout is valid and can be scheduled once Published.

![Invalid Status](img/v2.3_layouts_invalid_status.png) - This Layout is invalid and will not be Published for scheduling. 

![Assessed Player Side Status](img/v2.3_layouts_assessed_player_side_status.png) - This Layout contains media that can only be assessed Player side, and can be scheduled once Published. 

{tip}
The last icon is a normal Layout status to have if your Layout contains online content, such as a webpage etc. The CMS cannot say that the Player will display the content as it is not sent directly from the CMS (as with file based media, images, videos etc,) and is instead cached (stored) Player side.  The Player will need to have a reliable internet connection to successfully display such content.

Hover over the icon to see further information regarding the status you are seeing!
{/tip}

Next to the icon the total **Duration** of the selected Layout is displayed in seconds which updates each time a **Media** item is added or an existing **Duration** is edited. 

The overall Layout duration is always based on the longest running [Region](layouts_regions.html) on the Layout!



Interactive Actions that have been added to the Layout will be shown in the status bar.

![Interactive Actions Status](img/v3.1_layouts_designer_interactive_actions_status.png)



The **Layout selector** provides easy navigation between all Layouts the logged in User has permission to edit without having to leave the Layout Designer page. Enter search criteria and use the dropdown menu to change the Layout you are currently viewing/editing.

{tip}
Use the checkbox to only access your own Layouts!
{/tip}

The **Menu** located to the right of the Status bar provides a list of options for Layouts.

Layouts in a **Draft** status have the following menu options:

![Draft Actions](img\v3.1_layouts_unlock_layout.png)

- Once you are happy with your designs, set your Layout to **Publish** ready to be Scheduled.


Layouts can be set to be **Published** straight away with updates automatically pushed to Layouts that are in the schedule. A **Publish Date** can also be selected to Publish a Layout at a specified date and time.

{tip}
You can also use the **Row Menu** for a selected draft Layout to set to **Publish** immediately or on a set date..
{/tip}

- Clicking on **Discard draft** will delete the draft and leave the Published version untouched. 

- **Unlock Layout**  will show when another User is attempting to edit the same Layout.

  If a User attempts to edit a Layout that is already being edited by a User, the Layout will lock to prevent editing. The Layout will remain locked for a specified amount of time (as shown in the lock message) or until the Layout is unlocked from this menu.

  {tip}
  On selecting the **Unlock Layout** button, the User will be redirected to the Layout Grid.
  {/tip}

Layouts that have been **Published** have the following menu options:

![Published Actions](img\v3.1_layouts_published_actions.png)

- **Checkout** to enable editing by putting the published Layout into a draft status.

- **Delete layout** to completely remove.

- **Schedule** published Layouts onto one or more Displays without having to leave the Layout Designer. 

- Use your design as a [Template](layouts_templates.html) for creating additional Layouts to save time and to maintain a corporate image/standard.

## Viewer

The viewer will update as the Layout is designed so that users can clearly see what has been added and make necessary edits:

![Layout View](img\v3.1_layouts_view.png)

Edit or add [Regions](layouts_regions.html) to your Layout using the **Edit Layout** Icon located under the viewer to open the editor:

![Layout Editor](img/v3.1_layouts_editor.png)

{tip}
A Layout must contain at least one Region **and** each Region must contain at least **one** media item for it to be valid and play when scheduled.
{/tip}

Exit the editor and return to the Layout view using the back arrow in the top left corner of the viewer.


## Context Menu

All Widgets/ Library Media and Regions have a **Context Menu** with a set of options that can be applied. This menu is located under the viewer for a selected Widget or Region or by right clicking a selected Widget or Region:

![Context Menu](img\v3.1_layouts_widgets_context_menu.png)



- Control [Sharing](users_features_and_sharing.html) options to View, Edit and Delete for Users/User Groups
- Select an **Audio** file from the Library to be attached to a Widget.

{tip}
Users can enter a Volume as well as a Loop parameter to determine whether the audio will loop for the duration of the attached Widget or just play through once. Audio will be stopped once it's parent Widget finishes playing.
{/tip}

Once an audio file has been attached to a Widget, a speaker icon will show in the **Timeline** which can be clicked to re-open to edit.

{tip}
If audio is assigned to a Widget which is the only Widget in the Region, the audio will stop once the Widget duration has expired but the Widget will remain visible on screen until the rest of the Layout has expired!
{/tip}

- Enter **Start** and **End** times for Widgets

{feat}Widget Expiry Dates|v3{/feat}

Widgets that have expiry dates set can be identified by the following icons shown in the **Timeline**:

- ![Set to Start](img/v2.3_layouts_tools_set_to_start.png)Start date has been set for a future date/time.

- ![Set to Expire](img/v2.3_layouts_tools_set_to_expire.png)Expiry date has been set.

- ![Delete on Expiry](img/v2.3_layouts_tools_delete_on_expiry.png)Widget has been marked to be deleted on reaching the expiry date.

- ![Expired Widget](img/v2.3_layouts_tools_expired_widget.png) The Widget has expired but remains on the Layout

  {tip}
  Once the End date has passed the Widget will be removed from the Region. Expired Widgets that have **not** been set to **Delete on Expiry** will remain visible in the Layout Designer so that **Start** and **End** times can be re-adjusted if needed.
  {/tip}

Click on an icon to re-open to edit.

{tip}
It is important to note that the Layout will be marked invalid and not sent to Players if a Region is empty due to Widget expiry. It should also be noted that if at the time of download there was a valid Layout but the Player has since gone offline, the Layout will show with an empty Region.
{/tip}

{feat}Transitions|v3{/feat}

- Select a **Fade/Fly In transition** for when the Widget starts playing.

- Select a **Fade/Fly Out transition** to move onto the next Widget in the Timeline.

  If there are no more Widgets to follow or the Layout is in the process of being removed then the **Exit Transition** will apply as configured in [Region Options](layouts_regions.html#region_options).

Default Transition Type's and Duration can be entered by an Administrator on the **Settings** page using the **Defaults** tab, which can then be applied to all Widgets.

Applied defaults can be overridden for Layouts by unticking the box in the properties panel.

{tip}
When Transitions are applied to a Widget by default, the properties panel will be blank.  Only manually entered Transitions will show on forms!
{/tip}

Play a full **Preview** of your Layout by clicking on the **Play** button located at the bottom of the viewer: 

![Layout Preview](img\v3.1_layouts_preview.png)

{tip}
View your Preview in full screen by clicking on the icon in the top right corner of this window to toggle to full screen then press Play!
{/tip}

All content that has been assigned to a Region can also be viewed. Use the arrows to cycle through all Widgets that have been assigned.

![Multiple Region Preview](img\v3.1_layouts_multiple_region_preview.png)

{tip}
Video files will only play in the full Layout Preview!
{/tip}

## Toolbar

Add content to your Layout using an array of [Widgets](layouts_widgets.html) and [Library Media](layouts_library_search.html) accessed from the Toolbar located on the left hand side:

![Content Panel](img/v3.1_layouts_content_panel.png)



## Properties Panel

Edit all the elements of your **Layout**, **Regions** and assigned **Widgets** using the available options in the properties panel located on the right.

Use the tabs to configure media items using the available options for the content:

![Media Edit Form](img\v3.1_layouts_edit_panel_media.png)

{tip}
**Layouts**, **Regions** and **Widgets** can have **Actions** attached to effect changes to the Layout, triggered by Touch, click or by webhook. [Interactive Actions](layouts_interactive_actions.html) are created and managed from the **Actions** tab in the properties panel.
{/tip}

Use the properties panel whilst in the main Layout view, to access further configurations to apply to the Layout such as adding a background colour or selecting/uploading an image to use as the background:

![Layout Edit Form](img\v3.1_layouts_edit_options.png)



### Adding a Background Image

Add an Image which has already been added to your Library.  Select an Image from the Image Library Search function from the Toolbar and click or drag to the **Background Image** area of the properties panel:

![Layout Background](img/v3.1_layouts_add_background.png)



Ensure to **Save** clicking the button at the bottom of the properties panel:

![Saved Background](img/v3.1_layouts_saved_background.png)

{tip}
New Images can also be added by using the **Upload** button from here!
{/tip}

## Layout Timeline 

The [Layout Timeline](layouts_timeline.html) displays the duration of individual Widgets and gives you an overview of how your configured media will play on the Layout. Icons will show to identify any options that have been applied which can be clicked to view in more detail and to edit.

![Region Timeline](img\v3.1_layouts_region_timeline.png)

## Interactive Drawer

Located to the right of the Timeline, the Interactive Drawer is used to add Widgets to be used when configuring [Interactive Actions](layouts_interactive_actions.html).

![Interactive Drawer](img\v3.1_layouts_interactive_drawer.png)

- 
  Toggle the drawer to open and add Widgets or Library files by clicking to add or drag and drop.

- Once added, set a **Target Region** and configure using the available options in the properties panel.


{tip}
Use the Search field in the drawer to find Widgets already added to the drawer!
{/tip}

### Delete/Revert Buttons

Use as you create your designs to undo any changes or to completely remove from the Layout. 

![Layout Buttons](img/v3.1_layouts_buttons.png)

{tip}
Hover over the buttons for further information as to what selecting a button will do!
{/tip}

Click the top **Exit** button to leave the Layout Designer and return to the Layout Grid.



