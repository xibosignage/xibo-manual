---
toc: "layouts"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Add Interactive Actions to Layouts to trigger content changes on Displays"
keywords: "webhook, touch, button, link, interactive zone, interactive widgets, trigger code, layout code, code identifier, keyboard, key press, trigger key"
---

# Interactive actions

Create **Interactive actions** on **Layouts** to trigger content changes to show on your **Displays**.

You could have a product display that includes an 'internet of things' device, such as a light sensor, which could be used to trigger a webhook. Product specific information could be included on a Layout to show on Displays for the specific product that has been interacted with by a customer. 

You could use touchscreens to show specific information triggered from pressing a button on a Layout, shown on the Display, or by pressing a key, which has been defined as a trigger type, from an attached keyboard.

Actions are created for:

- A complete **Layout**
- Individual **Widgets** on a Layout 
- An **Image within a Playlist** on a Layout

These actions can be triggered by **Touch/Click**, by pressing a **key** on a keyboard or programmatically by a **Webhook**.

## Create an interactive layout

1. Create and design a Layout, adding **Widgets** to configure as interactive **Triggers** and **Targets**, if required.

   Further **Interactive Widgets** are available from the **Toolbox**.

   {tip}Toggle Interactive Mode to OFF to open the Toolbox{/tip}

2. Click the **Widgets** button at the top of the Toolbox 

3. Click on **Interactive** to open:

- **Button** can be used as a Trigger which can be fully customised to suit your designs
- **Link** can be added to provide text to be used as a Trigger
- **Interactive Zone** to define an area on the Layout to be used as a Target or Trigger

## Adding and editing actions on a layout

1. Toggle **Interactive Mode to ON**, using the button at the top of the Layout Editor

   The design elements will be locked to focus on adding and editing **Actions** only.

2. Use the drop-down menu to select the **Action Type**:

   - **Next/Previous Layout** to show the next or previous Layout in the schedule for the selected Display(s)

   - **Navigate to Layout** using a **Code** to identify the Layout

   Use the **Search for Layouts** button at the bottom of the canvas, to easily search for Layouts by code. Ensure that Layouts to be used as Interactive Targets have a **Code Identifier** entered in the **Edit Layout form**

   - **Next/Previous Widget** to show content from inside a **Playlist** for the next/previous item shown on the timeline

   - **Navigate to Widget** to specify which Widget to Load, or click to **Create Widget** and select an item from the Toolbox to add to the specified Target

3. From the Layout, click on an item to select the **Trigger Type**
   Alternatively, use the drop-down menu from the Properties Panel

   - Selecting **Touch/Click**, requires devices that will be used as a touch screen to have touch capabilities enabled

   - To use a **Webhook** a **Trigger Code** needs to be entered which must be present in the URL ``trigger=` parameter

   - **Key Press**, requires an attached keyboard with a key selected as the **Trigger Key**

4. Draw an arrow to a **Target** item, or use the drop-down menu

5. Click **Save** on the Properties Panel

{version}
**NOTE:** Fields shown are dependent on the Action Type selected.
{/version}

## Further reading

{nonwhite}
[Player Control with Webhooks](/docs/developer/player-control/webhooks)
{/nonwhite}

[Using the Layout Editor](layouts_editor)

[Using Playlists in Layouts](layouts_editor_playlists)

## FAQs

***Where do I enable Touch capabilities for my Android device?***

From Display Settings under the Displays section of the main CMS menu and use the row menu to select Edit. From the Advanced tab, check the Enable touch capabilities on the device setting at the bottom of the form. 

***How can I use an image as a trigger?***

You need to add a Playlist to a Layout from the Toolbox, and then add the image to the Playlist Timeline.

***Why do I not see key press as a trigger type?***

Assigning a keyboard key as a trigger type was introduced in v4.4. Update your CMS to benefit from this feature!
