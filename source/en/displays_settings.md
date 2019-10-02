<!--toc=displays-->
# Display Settings 

Displays can be configured automatically from the CMS once they are connected. This is managed using Display Setting Profiles.

## Display Setting Profiles

Each Display has a default **Display Setting Profile** which can be customised by an Administrator to suit required preferences. New Display Setting Profiles can be created and assigned directly to a **Display**.

## Available profiles

A list of available profiles can be viewed from **Display Settings** under the **Display** section on the menu.

![Display Settings Profiles](img/displays_settings_profiles.png)

Each profile has a **Name**, **Type** and a flag indicating if it is the **default** or not. Default profiles are automatically assigned to Displays of the corresponding type.

## Editing Profiles

Use the row menu for the Profile you wish to view and click on **Edit**. Use the Edit Profile form to adjust available settings:

![Displays Settings Edit](img/displays_settings_edit.png)

Each setting is explained under each form field for each of the tabs.

{tip}
Using the row menu click on **Copy** to make another version of a Profile. Make adjustments as needed to quickly and simply create new Profiles.
{/tip}

### Collect Interval

Using the drop-down menu select how often you would like the Player to check for new content. This means that once a Player has communicated with the CMS, it will check again for any changes by the time  set here.

{tip}

**Scenario:**

A Player has a collect interval set for 24 hours, it will check for any changes, action pending changes and then wait for the next 24-hour collection. If a change is made between this period of time, the Player will not be aware of it until it is time to check again.
{/tip}

If a Display Profile for a Player is changed, the Player will only be aware of the change after it has connected according to its prior connection interval. 

{tip}

**Scenario:**

A Player with a collect interval set for 24 hours made a check at 12 pm, it will not check again until 12 pm the following day for any changes that have been made. Once the 24 hour interval has passed, it will update the new changes and from this point will collect changes based on the new Profile.
{/tip}

{nonwhite}

XMR is configured by default for **Xibo in the Cloud** customers which allows for changes to be communicated immediately to the Player, regardless of the Collection Interval set. This means that fast and dynamic modifications can be made to your Display, without the need to modify a Display Profile.

For non-cloud customers the CMS can be configured to talk to an XMR instance if player actions are required, please contact your Administrator.

{/nonwhite} 

{white}

The CMS can be configured to talk to an XMR instance if player actions are required, please contact your Administrator.

{/white}

### Enable Stats Reporting

Tick/untick the box to enable/disable the collection of statistics for **Proof of Play Reports** for all **Displays** that use the selected **Display Profile**.

If enabled set the required level of collection for Proof of Play statistics to be applied to all Layouts / Media and Widget items using the **Aggregation level** drop down.

![Enable Stats](img/v2_aggregation_level_displays_proof_of_play.png)

- **Individual** - statistics are collected when specified by default.
- **Hourly** - statistics will be collected hourly by default.
- **Daily** - statistics will be collected daily by default.

{tip}
Players aggregate ‘completed records’ only, with collection made at the end of the Widgets duration so if a Widget has a duration of 3 hours, the stat will be recorded once the Widget has expired. 
{/tip}

## Network

From v2.2.0 use the **Network** tab to set **Operating Hours** for Displays by setting pre-defined [Dayparts](scheduling_dayparting.html)

Use the drop down menu to select the day part to apply

![Display Settings Network](img/v2_display_settings_network.png)

'Email alerts' such as those which send when a Display is offline, will not be sent outside of the specified Operating Hours.

{tip}
Use the **Profile Settings** tab for individual **Displays** to override.
{/tip}

## Add a Profile

Click on the Add Profile button, and include a name and select **Client type**, Save.

The Edit Profile form will open so that you can complete the necessary form fields for this Profile.

## Deleting Profiles

Display profiles can be deleted by using the row menu options for a selected Profile. 

Please ensure that there is **one default** remaining for each Type.

## Setting on the Display

A default profile will automatically apply its settings to all Displays of the same Type. A Display can be overridden with a Profile other than the default by selecting the required **Settings Profile** on a Display's **Edit form** using the **Profile Settings** tab. Each setting can also be overridden for individual Displays.

![Displays Edit Profile Settings](img/displays_edit_profilesettings.png)