<!--toc=layouts-->

# Overlay Layouts

Schedule as an **Overlay Layout** to tell [[PRODUCTNAME]] to display the Layout on top of normally **Scheduled Layouts**. Overlays remain on top while your normal scheduled content changes underneath, particularly useful for logos, important information or emergency notices.

![Overlay Layout](img/layouts_overlay.png)

## Create an Overlay Layout

Overlay Layouts are created in exactly the same way as all other **Layouts**. Add Regions to fit around your existing content so that your Overlay Layout can "sit on top" of other Layouts that are **Scheduled** at the same time as the Overlay.  Your Overlay Layout will display its all important content whilst the Layouts "underneath" playout in rotation.

{tip}
[[PRODUCTNAME]] will not render the background on Players when a Layout is scheduled as an Overlay Layout.

**Please note:** Layouts that contain Widgets / Media that use the Edge browser cannot be used with an Overlay Layout as content cannot sit on top of other content under these circumstances. This would include HLS and Embedded Youtube.
If your content is not a video then the CEF browser can be used instead. 
{/tip}

{tip}
Overlay Layouts can also be used for Campaigns.
{/tip}

## Scheduling

Overlay Layouts are selected as an **Event type** when [Scheduling an Event](scheduling_events.html) and will behave differently to standard Layouts when Scheduled as an Overlay.

![Overlay Event](img/layouts_overlay_event.png)

- #### Refreshing Content


When an Overlay Layout is scheduled it will render the **Media content** once and will not show refreshed content.

{tip}
A workaround to this would be to add a second Media Item to the Overlay Layout so that it loads item 2 and then reloads item 1 (with now refreshed content). This is particularly useful when creating an Overlay Layout which includes the Calendar or Ticker Widgets for example.
{/tip}

- #### Scheduling multiple Overlays


Overlay Layouts do not appear one after the other in Scheduling but instead will **stack**.

{tip}
**Scenario:** 2 Media items are required to ‘Overlay’ other Scheduled Events in the same area of the screen. Rather than creating 2 Overlay Layouts with the assigned Media, only 1 Overlay Layout should be created which would then contain the 2 Media items within the Region.
{/tip}

{nonwhite}
Take a look at our handy YouTube guide that gives a step by step guide on using [Overlay Layouts](https://www.youtube.com/watch?v=Dy62LZG7B0U). {/nonwhite}