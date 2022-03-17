# Regions 

{tip}
**Please note:**

- If you are using a v3.1.x CMS, please click [here](layouts_regions.html)
- If you are using a v2.3.x CMS, please click [here](layouts_regions_2.html)
- If you are using a v2.0.x CMS, please click [here](layouts_regions_2.0.html)
- If you are using a v1.8.x CMS, please click [here](layouts_regions_1.8.html)

{/tip}

Regions define areas on a **Layout** which hold **Widgets** (media content) to form sets of timed content.


A new Layout will contain one full size empty **Region** by default ready for resizing, positioning and adding media content to. 

Click on the 'edit' icon located in the bottom left hand corner of the Layout View window to open the **Layout Editor**. 

![Layout Editor](img/v2.3_layouts_layout_editor.png)

{tip}
You can toggle to a full sized screen using the icon located in the bottom right of the editor.
{/tip} 

**Regions** can be positioned anywhere inside the **Layout Editor** canvas using drag and drop, and resized by using the resize handle located in the lower right-hand corner of the Region. 

Click inside a Region to use the resize handle and to open the **Region Options** form for further configuration.

![Region Resize](img/v3_layouts_region_resize.png)

{tip}
When you are in **Layout Editor** mode you will notice that the window toolbar changes to orange!
{/tip}

Click on the ![Add Region](img/v2.3_layouts_add_region.png)icon to add more Regions.

Remove Regions and all associated content by clicking in the Region you wish to delete and then click on the ![Delete Region](img/v2.3_layouts_delete_region.png)icon. **Please note: This action cannot be undone!**

{tip}
Regions can also be deleted from here or from the Timeline by clicking on a Region and clicking the bin icon on the bottom toolbar or by right clicking on the target Region and selecting the bin icon from the pop up menu.
{/tip}

Click on ![Layout View](img/v2.3_layouts_region_layout_view.png)to exit edit mode and return to the Layout View.

## Region Options

### General

This tab allows you to optionally create a name for a Region for easier identification, and to enable the  **Loop** option if it is required.

{tip}

#### When to enable Loop?

It may be desirable to have a Region with just 1 media item reload when that item has finished. With the **Loop** ticked the media item will reload each time it expires and show refreshed content until other Regions have fully played out. Loop is only effective for a Region with only 1 media item and should only be used for certain Media types where the content changes (Ticker RSS, Calendar etc).

#### Consider the following rules when thinking about using the Region Loop option for the best results:

- If your Region contains more than one Widget, Loop should not be enabled.
- If your Region contains one Widget, and that Widget is a 'fixed' item (eg Text), Loop should not be enabled.
- If your Region contains one Widget, and that Widget needs to update periodically (eg RSS Ticker Widget), Loop can be enabled ONLY if the Widget needs to update MORE frequently than the duration of the overall Layout.

{/tip}

### Positioning

This tab allows for precise sizing and positioning as well as the ability to set a **Layering Order** for playback.  

### Rules for Layering Regions

{tip}
**Please note:** You cannot overlay anything on a Region that has Widgets / Media that use the Edge browser. This would include HLS and Embedded Youtube.
For content other than a video you can use the CEF browser instead.
{/tip}

If required, overlapping Regions can be ordered for playback using z-index settings.

Enter a number in the **Layer** field to determine the order that Region should be shown within the overall stack.

![Region Options Layering](img/v2.3_layouts_regions_layer.png)

The **Layer** order is determined by the number entered here, with 1 considered the lowest Layer. The higher the number the higher the Layer.

{tip}
On some devices, it is impossible to overlay anything on a Region showing a **Video** or **VideoIn** Widget. Whether it is possible will depend on the device and whether hardware accelerated playback is being used. In general, it is possible on Android (when **not** using the SurfaceView option in the [Display Settings Profile](displays_settings.html)), Linux, Tizen and webOS Players, but if you have a requirement for this, be sure to test your intended device carefully to ensure this works in your use case.
{/tip}

At the bottom of this tab, click on the **Make this Region full screen** text to resize as shown by the dimensions displayed here.

### Exit Transition

**Exit Transitions** happen when the last media item in a Region is shown and occurs only when all other media items have expired in the other Regions. 

{tip}
Transitions are supported in the Android, webOS, Tizen Players and Windows Players from v2 R252 and are **not** currently supported in the Linux Player.{/tip}
Transitions need to be pre-configured, please contact your Administrator with any queries.

{nonwhite}
Further information on Transitions for administrators can be found [here](https://xibo.org.uk/docs/setup/transitions-administration)
{/nonwhite}

Ensure any edits made are saved using the **Save** button on the Region Options form before returning to the Layout View.

### Actions

{tip}
Actions are available from v3.0.0! (Speak to your Administrator to upgrade the CMS to benefit from this feature!)
{/tip}

Actions can be attached to Regions to effect changes on the Layout. 

![Actions](img\v3_layouts_regions_actions.png)

Full details are available on the [Interactive Actions](layouts_interactive_actions.html) page.

### Share options for a Region

Control which **Users**/ **User Groups** can have **View**/ **Edit** /**Delete** access for a Region.  

- Assign/edit [Share](users_features_and_sharing.html) options by right clicking on the target Region to open the form.

  {tip}
  In versions earlier than 3.0.0, Share options are labelled as [Permissions](users_permissions.html)!
  {/tip}


![Region Sharing](img\v3_layouts_regions_share.png)

{tip}
Alternatively Share options can also be located from the [Tools](layouts_tools.html) button on the bottom toolbar. Click or drag to the target Region, and enable/disable access as appropriate.
{/tip}

**Please note:** The owner of the **Layout** has full control over sharing. 

{tip}
A globally shared Layout can have Region access right defined for any other Users of the CMS. See the [Features and Sharing](users_features_and_sharing.html) page for more information.
Users of a CMS earlier than v3.0.0 please see the [Permissions](users_permissions.html) page.
{/tip}



