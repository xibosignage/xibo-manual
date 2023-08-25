---
toc: "layouts"
---

# Interactive Actions

{version}
**PLEASE NOTE:** We are aware of some issues with Interactive Actions and are currently working on improvements to the work flow and accompanying documentation.
{/version}

## Documentation under review...

Actions can be attached to an entire **Layout** a particular **Region** ??or specific **Widget** and can be used to effect changes to the Layout. These can be triggered by **Touch or Click** or programmatically by **webhook**.

{feat}Interactive Actions Layouts/Regions|v3{/feat}

{tip}
**Scenario**:
A Product display has a product that the customer can pick up. An 'internet of things' device, such as a light sensor could be used to trigger a webhook to [[PRODUCTNAME]] which loads that particular products information into a Region to be shown.
{/tip}

{nonwhite}
More information on webhooks can be found in our Developer documentation [here.](/docs/developer/player-control/webhooks)
{/nonwhite}

Actions are added from the [Layout Editor - Toolbar](ayouts_editor.html#content-interactive-actions) and managed from the **Actions** tab in the properties panel for a Layout, Region?? or Widget:



## Adding an Action

Select the required **Action** and drag to the Target:



Once added, use the properties panel to configure the Target and set the Trigger. Options available here will be dependent on the type of Action added:

**Navigate to Layout** uses a **Layout Code** to identify the Layout to be used. Therefore ensure that Target Layouts have a **Code Identifier** assigned from the  Edit Layout form, in order to be included in this list for selection. 



**Next Widget** and **Previous Widget** Actions are only applicable for adding to **Playlists** to Target the 'Next' and 'Previous' items in a Playlists timeline.

Once the Target has been set, you need to set how the Action should be Triggered:

- Trigger by touching or clicking anywhere on a Layout, a particular Region??? or a particular Widget
- Include a Trigger Code, which must be present in the URL ``trigger=` parameter.

{tip}
When triggering by touch using Android, ensure that **Touch** capabilities are enabled for the device from [Display Settings](display_settings.html) using the **Advanced** tab!
{/tip}







