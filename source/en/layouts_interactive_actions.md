---
toc: "layouts"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Add Interactive Actions to Layouts to trigger content changes on Displays"
keywords: "webhook, touch, button, link, interactive zone, interactive widgets, trigger code, layout code, code identifier"
---

# Interactive Actions

Create Interactive **Actions** on **Layouts** to trigger content changes to show on your **Displays**.

You may have a product display that includes an 'internet of things' device, such as a light sensor, which could be used to trigger a webhook to show a Layout with product specific information on a Display for the product that has been interacted with by a customer. 

You could use touchscreens to show specific information triggered from pressing a button on a Layout, shown on the Display.

Actions can be attached to a complete **Layout**, individual **Widgets** on a Layout or on an **Image within a Playlist** on a Layout, triggered by **Touch/Click** or programmatically by a **Webhook**.

Design your Layout, adding **Widgets** to configure as interactive **Triggers** and **Targets**.

Further **Interactive Widgets** are available from the **Toolbox**:

- **Button** can be used as a Trigger which can be fully customised to suit your designs.
- **Link** can be added to provide text to be used as a Trigger.
- **Interactive Zone** to define an area on the Layout to be used as a Target or Trigger.

To use an **Image** as a trigger, first add a **Playlist** from the **Toolbox** and add an Image to the Playlist Timeline.

Once designed, toggle **Interactive Mode to ON**, located at the top of the Layout Editor.

The design elements will be locked to focus on adding and editing **Actions** only.

Actions are created by clicking on a item on the Layout as a Trigger to drag an arrow to a Target item, clicking to **Save** from the Properties Panel.

They can also be created by clicking **Add Action** from the **Properties Panel**, and selecting the Type of Action and Trigger Type.

- Selecting **Touch/Click**, requires devices that will be used as a touch screen to have touch capabilities enabled.

- To use a **Webhook** a **Trigger Code** needs to be entered which must be present in the URL ``trigger=` parameter.

Select which item on the Layout should be the **Trigger**.

- Click to **Save**.

Arrows will be displayed to easily see the relationship between Triggers and Targets.

### Action Types

- **Next/Previous Layout** will show the next or previous Layout in the schedule for the selected Display(s).
- **Navigate to Layout** uses a **Code** to identify the Layout to switch to. Use the **Search for Layouts** button at the bottom of the canvas, to search for Layouts by Code. Ensure that Layouts which will be used as Interactive Targets have a **Code Identifier** assigned in the **Edit Layout form**.
- **Next/Previous Widget** is used with content from inside a **Playlist** and will show the next/previous item on that Playlist Timeline.
- **Navigate to Widget** to specify which Widget to Load or click to **Create Widget** so an item can be selected from the Toolbox to add to the specified Target.

## Further Reading

{nonwhite}
[Player Control with Webhooks](/docs/developer/player-control/webhooks)
{/nonwhite}

[Using the Layout Editor](layouts_editor)

[Using Playlists in Layouts](layouts_editor_playlists)

## FAQs

***Where do I enable Touch capabilities for my Android device?***

From Display Settings under the Displays section of the main CMS menu and use the row menu to select Edit. From the Advanced tab, check the Enable touch capabilities on the device setting at the bottom of the form. 

