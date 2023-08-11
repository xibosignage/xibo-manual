---
toc: "layouts"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Create a Layout List Campaign to ensure the play order of Layouts or create an Ad Campaign with automatic scheduling"
keywords: "Layout list, Ad campaign, cycle based playback, round robin, block, cost per play, impressions per play, proof of play"
persona: "content manager"
---

# Campaigns

[[PRODUCTNAME]] has two  **Campaign** types:

- **Layout List** -  is used to ensure the play order of a group of Layouts by placing them in an ordered list.
- **Ad Campaign** - create advertising campaigns ([Feature](users_features_and_sharing.html#content-features) enabled).

Both Campaign types are created and managed by selecting **Campaigns** under the **Design** section of the main CMS Menu:

![Campaigns](img/v4_layouts_campaigns_grid.png)

- Click the **Add Campaign** button 
- Select the **Type** of Campaign to create.

## Create a Layout List Campaign

- Select **Layout List** from the drop down and complete the form fields:


![Add Layout List Campaign](img/v4_layouts_campaign_add_layout_list.png)

[Folders](tour_folders.html) are used to organise, search and easily [Share](users_features_and_sharing.html#content-share) User objects with other Users/User Groups. Campaigns saved to a Folder will inherit the access options applied to that Folder. 

{tip}
If users should also have access to the Layouts/Layout content, ensure that this is also saved to the same Folder!
{/tip}

- Give your Campaign a **Name** for easy identification in the CMS including optional [Tags](tour_tags.html).

{tip}
Tags and Folders can also be assigned to multiple Campaigns using the [With Selected](tour_cms_navigation.html#content-multi-select---with-selected.) option at the bottom of the Campaign grid!
{/tip}

### Cycle Based Playback

{feat}Campaign Cycle Playback|v4{/feat}

-  Optionally enable **cycle based playback** for the Campaign.
- If enabled, provide a **Play Count** to determine how many 'plays' a Layout should have before moving onto the next Layout in the Campaign.

When you schedule a Campaign with cycle playback enabled, each time the scheduled event appears only 1 Layout will be shown for the set count from the Campaign.

### List Play Order

Use the **List play order** drop down to select how you would like the Layouts in the Campaign to play when scheduled alongside another Campaign with the same **Display Order** in [Scheduled Events](scheduling_events.html):

**Round Robin** - Layouts from each Campaign with the same Display Order will play interleaved.

**Block** - Layouts will play in their entirety from the Campaign before moving onto the next.

On **Saving** , the form will re-open with additional tabs:

![Edit Layout List Campaign](img/v4_campaigns_edit_layout_list.png)

### Reference

Optionally use this tab to provide reference information for the selected Campaign. Once added, this information can be viewed in the Campaign grid and via the API.

### Layouts

Use the Layouts tab to assign Layouts to this Campaign:

![Assign Layouts](img/v4_campaigns_assign_layouts.png)

- Assign Layouts using the `+` icon. Selected Layouts will be added to the 'staging area' at the top of the form.
- Remove by clicking the `-` icon next to a Layout from the staging area.
- Re-order selected Layouts using drag and drop to ensure that Layouts play in your chosen sequence.

- Click **Save** to keep changes.

{tip}
Use the **Copy** button located on the row menu to easily make a copy of an existing Campaign as well as enabling [Share](users_features_and_sharing.html#content-share) options for selected Users/User Groups.

Click **Schedule** to open the [Schedule Event](scheduling_events.html) form to create a schedule for your Campaign,

Layouts can be directly assigned to Campaigns from the [Layouts](layouts.html) grid. Use the row menu for the Layout to add and click **Assign to Campaign**. Layouts will be assigned to the end of the selected Campaign by default!
{/tip}

## Ad Campaigns

Create Advertising Campaigns where  [[PRODUCTNAME]] will work out how many plays are needed to satisfy entered criteria and handle the scheduling automatically for you.

{tip}
This [Feature](users_features_and_sharing.html#content-features) should be enabled for each User/User Group who requires access!
{/tip}

### Create an Ad Campaign

- Select **Ad Campaign** from the drop down menu:


![Add Ad Campaign](img/v4_layouts_campaign_add_ad_campaign.png)

Complete the required form fields:

[Folders](tour_folders.html) are used to organise, search and easily [Share](users_features_and_sharing.html#content-share) User objects with other Users/User Groups. Ad Campaigns saved to a Folder will inherit the access options applied to that Folder. 

{tip}
If users should also have access to the Layouts/Layout content, ensure that this is also saved to the same Folder!
{/tip}

- Give your Ad Campaign a **Name** for easy identification in the CMS including optional [Tags](tour_tags.html).

{tip}
Tags and Folders can also be assigned to multiple Campaigns using the [With Selected](tour_cms_navigation.html#content-Multi---select--with-selected.) option at the bottom of the Campaign grid!
{/tip}

- Use the drop down to set the **Target Type** for this Ad Campaign as **Plays**, **Budget** or **Impressions**.
- Include the total **Target** number for this Ad Campaign in relation to its selected Target Type.

- Click to **Save**.

The new Ad Campaign record will be added to the grid.

- Use the row menu and select **Edit** to provide the required criteria in order that [[PRODUCTNAME]] can work out the play frequency:  

![Edit Ad Campaign](img/v4_campaigns_edit_ad_campaign.png)

- Provide **Start** and **End** Dates and Times for the Ad Campaign. (This is required information and **cannot** be left blank)
- Select from available **Displays** and **Display Groups** to play this Ad Campaign on. (This is required information and **cannot** be left blank)

{tip}
Ensure that [Displays](displays.html) have had **Display Details** correctly entered for the selected Displays which play this Ad Campaign, ensuring that **Cost per play** and **Impressions per play** fields have been completed!
{/tip}

- Click to **Save**.

{tip}
**Proof of Play** needs to be set to **ON** for all Displays/Display Groups selected here, to ensure accurate reporting and plays!
{/tip}

- Assign a Layout using the **Add Layout** drop down menu.

Once a Layout is selected further scheduling options are available:

![Assign Layouts Ad Campaign](img/v4_campaigns_assign_layouts_ad_campaign.png)

- Select which **Days of the Week** this Layout should be active in this Ad Campaign.

- Choose from existing [Dayparts](scheduling_dayparting.html) if this Layout is only to be shown at selected predefined times.

{tip}
Ad Campaigns can include multiple instances of the same Layout with different Dayparts assigned if required.

For example, If you needed to show the same Layout for a defined 'Morning' daypart as well as a defined 'Evening' daypart add the Layout twice and define the required dayparts individually for each!
{/tip}

- Draw areas on the map to provide **geo fenced** based plays for any mobile displays, with content to be shown on entering a defined area.

{tip}
You can have multiple areas defined on the same map!
{/tip}

- Click to **Save**.


The Layout will be added to the Campaign which can be edited/deleted if required using the row menu:

![View Ad Campaigns](img/v4_campaigns_view_added_ad_campaigns.png)

Continue to build your Ad Campaign by selecting Layouts and defining scheduling options.

{tip}
**Proof of Play** needs to be set to **ON** for all Layouts added to the Ad Campaign to ensure accurate reporting and plays!
{/tip}

[[PRODUCTNAME]] will schedule automatically to fulfil the required play criteria to meet entered Targets. 

Ad Campaigns can be viewed on the [Schedule](scheduling_management.html#content-calendar-view) as locked entries which cannot be edited from the scheduler itself. 

[Agenda](scheduling_management.html#content-agenda) can be used to see a more detailed play view of the Ad Campaign and preview included Layouts.

The Ad Campaign progress will be shown in the Campaigns grid and on opening the Ad Campaign, providing that Proof of Play has been set to ON for all Displays and Layouts selected for the Campaign. As well as Cost per play and Impressions per play fields are completed for all selected Displays.

{version}
**NOTE**: If the above information is omitted the reporting cannot update to reflect Plays, Spend, Impressions and Target which will all show a 0 value. The Ad Campaign itself will also try and catch up to increase the Target which will result in Layouts being played more and more frequently until its the only content shown in order to fulfil the target.
{/version}

![Ad Campaign Grid](img/v4_campaigns_ad_campaign_grid.png)

The **Reference** tab can be optionally used to provide reference information for the selected Ad Campaign. Once added, this information can be viewed in the Campaign grid and via the API.

## Row Menu

Both Campaign types have a row menu where Users can access a list of actions/shortcuts.







