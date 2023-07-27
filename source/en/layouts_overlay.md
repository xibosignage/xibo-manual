---
toc: "layouts"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Create an Overlay Layout that once scheduled will sit on top of other Layouts in the schedule"
keywords: "multiple overlays, show on top"
persona: "content manager"
---

# Overlay Layouts

Create an Overlay Layout to [Schedule](scheduling_events.html#content-creating-a-schedule) to show on top of other Layouts in the schedule. 

{tip}
Overlay Layouts can also be Scheduled to be used with Layouts inside a [Campaign](layouts_campaigns.html).
{/tip}

Overlay Layouts remain on top while your normal scheduled content changes underneath. This is particularly useful for logos, important information or emergency notices for example.

![Overlay Layout](img/v4_layouts_overlay.png)

## Create an Overlay Layout

Overlay Layouts are created in exactly the same way as all other **Layouts**. Add content to fit around your existing designs so that your Overlay Layout can "sit on top" of other Layouts that are **Scheduled** at the same time as the Overlay.  Your Overlay Layout will display its all important content whilst the Layouts "underneath" play in rotation.

{tip}
[[PRODUCTNAME]] will not render the background on Players when a Layout is scheduled as an Overlay Layout.
{/tip}

{version}
**NOTE:** Layouts that contain Widgets / Media that use the Edge browser cannot be used with an Overlay Layout as content cannot sit on top of other content under these circumstances. This would include HLS and Embedded YouTube. If your content is not a video then the CEF browser can be used instead. 
{/version}

## Scheduling

Overlay Layouts are selected as an **Event type** when [Scheduling an Event](scheduling_events.html) and will behave differently to standard Layouts when Scheduled as an Overlay.

![Overlay Event](img/v4_layouts_overlay_event.png)

- #### Refreshing Content


When an Overlay Layout is scheduled it will render the **Media content** once and will not show refreshed content.

{tip}
A workaround to this would be to add a second Media Item to the Overlay Layout so that it loads item 2 and then reloads item 1 (with now refreshed content). This is particularly useful when creating an Overlay Layout which includes the Calendar or Ticker Widgets for example.
{/tip}

- #### Scheduling multiple Overlays


Overlay Layouts do not appear one after the other in Scheduling but instead will **stack**.

{tip}
**Scenario:** 

2 Media items are required to ‘Overlay’ other Scheduled Events in the same area of the screen. 

Rather than creating 2 Overlay Layouts with the assigned Media, only 1 Overlay Layout should be created containing a [Playlist](media_playlists.html) which would then contain the 2 Media items to cycle through.
{/tip}

