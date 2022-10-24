<!--toc=layouts-->

# Layout Designer

{tip}
**Please note:**

- If you are using a v3.1.x CMS, please click [here](layouts_designer.html)
- If you are using a v2.3.x CMS, please click [here](layouts_designer_2.html)
- If you are using a v2.0.x CMS, please click [here](layouts_designer_2.0.html)
- If you are using a v1.8.x CMS, please click [here](layouts_designer_1.8.html)

{/tip}

The Layout Designer is the heart of **content creation** in [[PRODUCTNAME]]. Each time a new Layout is added, or an existing one needs a design change, the Layout Designer is used.

[[PRODUCTNAME]] makes layout design simple through the use of **drag and drop**,**interactive previewing** and **design flexibility**. On adding a new Layout, the **Layout Designer** will open:

![Layout Designer](img\v3_layouts_designer.png)

## Top Toolbar

A status indicator is shown to the left of the top toolbar to show you the current 'play' status of the selected Layout:

![Build Status](img/v2.3_layouts_build_status.png)- This Layout has not been built yet.

![Valid Status](img/v2.3_layouts_valid_status.png) - This Layout is valid and can be scheduled once Published.

![Invalid Status](img/v2.3_layouts_invalid_status.png) - This Layout is invalid and will not be Published for scheduling. 

![Assessed Player Side Status](img/v2.3_layouts_assessed_player_side_status.png) - This Layout contains media that can only be assessed Player side, and can be scheduled once Published. 

{tip}
The last status indicator is a normal Layout status to have if your Layout contains online content, such as a webpage etc. The CMS cannot say that the Player will display the content as it is not sent directly from the CMS (as with file based media, images, videos etc,) and is instead cached (stored) Player side.  The Player will need to have a reliable internet connection to successfully display such content.
{/tip}

{tip}
Hover over the status icon to see further information regarding the status you are seeing!

![Status Indicator Tip](img\v3_layouts_status_tip.png)

{/tip}

The total **Duration** of the selected Layout is displayed here in seconds, which updates each time a **Media** item is added or an existing **Duration** is edited, along with the Layout **Dimensions** applied from the selected **Resolution** on the Edit Layout form.

![Layout Status](img/v3_layout_status_bar.png)

{tip}
The overall Layout duration is always based on the longest running [Region](layouts_regions.html) on the Layout.
{/tip}

{tip}
A Layout must contain at least one Region **and** each Region must contain at least **one** media item for it to be valid and play when scheduled.
{/tip}

### Layout Selector

The **Layout selector** provides easy navigation between all Layouts the logged in User has permission to edit without having to leave the Layout Designer page. Use the dropdown menu to change the Layout you are currently viewing/editing.

{tip}
Use the checkbox to only access your own Layouts!
{/tip}

### Menu

Located next to the Layout Selector is a menu of options that can be performed for Layouts, depending on the status of the Layout.

### Layouts in a Draft status have the following: 

![Draft Actions](img\v3_layout_unlock_layout.png)

- #### Publish layout

  Once you are happy with your designs, set your Layout to **Publish** ready to be Scheduled.
  
  Layouts can be set to be **Published** straight away with updates automatically pushed to Layouts that are in the schedule. A **Publish Date** can also be selected to Publish a Layout at a specified date and time.
  
  ![Publish Date](img\v3_layouts_publish_selected_time.png)
  
  {tip}
  You can also use the **Row Menu** for a selected draft Layout to set to **Publish** immediately or on a set date..
  {/tip}
  
  {tip}
  Published Layouts can be viewed in a read-only mode and 'Checked out' to create a draft Layout to make any edits needed.
  {/tip}
  
- #### Discard layout

  Any changes made to the Layout can be completely discarded, reverting the Layout to the previous Published version. 

![Discard Layout](img\v2.3_layouts_discard_layout.png)

​		Clicking on **Discard** will delete the draft and leave the Published version untouched.

- #### Unlock Layout (visible when another User is attempting to edit the same Layout)

  If a User attempts to edit a Layout that is already being edited by a User, the Layout will lock. The User will be locked out from editing the Layout for a specified amount of time (as shown in the lock message) or until the Layout is unlocked. 

  {tip}
  On selecting the **Unlock Layout** button, the User will be redirected to the Layout Grid.
  {/tip}

### Layouts in a Published status have the following:

![Published Actions](img\v3_layouts_published_actions.png)

- #### Checkout

  Enable editing by putting the published Layout into a draft status.

- #### Schedule Now 

  Schedule published Layouts onto one or more Displays directly from the Layout Designer. 

- #### Save Template

  Use your design as a [Template](layouts_templates.html) for creating additional Layouts.

- #### Unlock Layout

  As before.

## Layout View

As you create your Layout, the Layout View will update so that you can view all the elements as you go to ensure the correct positioning of [Regions](layouts_regions.html) and the correct ordering of [Widgets](layouts_modules.html), so it will play as you intend.

![Layout View](img\v3_layouts_view.png)

### Edit Layout Mode

All new Layouts, by default, have one full screen empty **Region**, represented as a semi-transparent overlay.  Use the **Edit Layout Mode** to add, position and resize Regions, by clicking on the **Edit icon** to open the editor.

![Layout Navigator](img\v3_layouts_editor_button.png)

Clicking on a **Region** in the opened editor, opens the **Region Options** form which allows for refinement of  **Positioning** and the application of **Exit Transitions** for when the Region finishes as well as configuring **Actions** for the Region.

![Region Options](img\v3_layouts_region_options.png)

Use the arrow, in the bottom left corner of this window, to return to the **Layout View**.

## Preview

Play a full **Preview** of your Layout by clicking on the **Play** button located at the bottom left of the Layout View window. 

![Layout Preview](img\v3_layouts_preview.png)

{tip}
View your Preview in full screen by clicking on the icon in the bottom right corner of this window to toggle to full screen then press Play.
{/tip}

Click on a **Widget** to view the media content and use the arrows to cycle through all Widgets that have been assigned to that **Region**. 

{tip}
Video files will only play in the full Layout Preview!
{/tip}

![Widget Preview](img\v3_layouts_widget_preview.png)

Return to the **Layout View** by clicking on the back arrow at the bottom left of the Preview screen.


{tip}
When you have multiple Regions, easily Preview all of the Media assigned by toggling to full screen and using the arrow tabs for each Region to cycle through the content.

![Multiple Region Preview](img\v3_layouts_multiple_region_preview.png)!

{/tip}

## Edit Forms

Edit aspects of your **Layout**,**Regions** and assigned **Widgets** using the available options in the **Edit **forms. 

![Layout Edit Form](img\v3_layouts_edit_form.png)

{tip}
The Edit Layout form is available when in **Layout View**, to add background colour or image, change the resolution etc.
{/tip}

Once assigned, click on **Widgets** from the **Timeline** to open the available options in the Edit form for that media item.

![Media Edit Form](img\v3_layouts_edit_media_form.png)

{tip}
**Layouts**, **Regions** and **Widgets** can have **Actions** attached to effect changes to the Layout, triggered by Touch, click or by webhook. [Interactive Actions](layouts_interactive_actions.html) are created and managed from the **Actions** tab on Edit forms.
{/tip}

## Layout Timeline 

The [Layout Timeline](layouts_timeline.html) displays the duration of individual Widgets and gives you an overview of how your configured media will play on the Layout.

![Region Timeline](img\v3_layouts_region_timeline.png)

## Interactive Drawer

Located under the Timeline, the Interactive Drawer is used to add Widgets to be used when configuring [Interactive Actions](layouts_interactive_actions.html).

![Interactive Drawer](img\v3_layouts_interactive_drawer.png)


Add Widgets or Library items in the same way as adding to Regions by clicking to add or by drag and drop.

Once added, set a **Target Region** and configure using the available **Edit** options.

{tip}
Use the Search field here to look for Widgets already added to the drawer!
{/tip}

## Bottom Toolbar

Located on the bottom left of the toolbar use the buttons to add [Library](layouts_library_search.html) media items, apply actions from the [Tools](layouts_tools.html) menu and assign [Widgets](layouts_widgets.html) to Layouts. 

![Bottom Toolbar](img/v2.3_layouts_bottom_toolbar.png)

{tip}
Further actions will show on this toolbar when available such as Undo changes and Delete!
{/tip}

