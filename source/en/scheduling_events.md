---
toc: "scheduling"
maxHeadingLevel: 3
minHeadingLevel: 2
aliases:
  - "layouts_interrupt"
  - "scheduling"
  - "schedule_now"
excerpt: "Create Schedules to show your content at the right time and place"
keywords: "synchronised, mirror, video wall, scheduled actions, media scheduling, interrupt layout"
---

# Scheduling 

Schedules are created from the **Schedule** page of the main CMS menu and include the following Event Types:

### Command

Select a [Command](displays_command_functionality.html) to be executed by the Player at a specific point in time. 

{tip}
Command Events do not require a `toDt`. 

Display Order and Priority are irrelevant when it comes to executing Commands, but may be set in the CMS for organisational purposes.
{/tip}

### Overlay Layout

Layouts that have been designed as an [Overlay Layout](layouts_overlay.html) will be scheduled at the same time as existing Layouts to create an overlay of content when displayed.

### Interrupt Layout

An Interrupt Layout will schedule a selected Layout to play **in-between** other Layouts in the 'usual schedule'.

[[PRODUCTNAME]] will work out when it will be played using how many **seconds per hour** or as a **Percentage** entered on the schedule.

{feat}Interrupt Layouts|v4{/feat}

{tip}
This can be useful if you have Announcements that need to be shown for a particular amount of time within the usual schedule!
{/tip}

- Select **Interrupt Layout** as the Event Type from the drop down menu when adding an Event.
- Complete the form fields to create the schedule.

#### Share of Voice

Enter the amount of time the Layout should be shown in seconds per hour or as a percentage (0 - 100%) of the events duration (the difference between the from date and the to date) that the **Interrupt Layout** should occupy the usual schedule.

{tip}
**Please note:** If your 'main' Layout has a long duration, the Interrupt Layout may show in a block in order to satisfy the SoV criteria entered!
{/tip}

### Action

**Scheduled Actions** listen for a Trigger Code coming in on a webhook to Navigate to a Layout or to run a Command. 

{feat}Scheduled Action Events|v4{/feat}

- **Navigate to Layout** - enter the code identifier for the Layout the Player should navigate to when triggered. This code is created when adding a new Layout or from editing an existing from the Layouts grid.
- **Command** - select the Command to run.

## Synchronised Events

{feat}Sync Events|v4{/feat}

{tip}
Synchronised Events are used in conjunction with [Sync Groups](displays_sync_groups.html) to show mirrored or a video wall configuration across 2 or more Displays.

Ensure you have created and configured a **Sync Group** prior to scheduling!
{/tip}

Click on the **Add Synchronised Event** button at the top of the schedule grid to open the **Add Synchronised Event** form.

Select a [Sync Group](displays_sync_groups.html) from the drop down menu.

- Use the **Layout** drop down to select which content should be shown on each Display within the group.

{tip}
When selecting different content to show in a wall configuration on Displays, the total duration will be enforced by the content on the Lead Display.

The Lead Display will issue instructions to change the sequence based on its assigned content. Please bear in mind that other Displays within the group could fall out of sync if their content is not similar in design (same number of items, durations etc).
{/tip}

- Select **Mirror** to automatically set the same item on each Display within the group automatically.

{tip}
Sync [Playlists](media_module_playlist.html) on different Layouts by using a **Content Synchronisation Key**!
{/tip}

### Dayparts

- Events are scheduled using **Dayparting** information:
  - Select **Custom** to enter your own start and end times. Use the **Relative time** checkbox to input the Hours and Minutes when creating a Scheduled Event (not available for Synchronised Events). 
  - Select **Always** to have the content always scheduled on the selected Display. 

{tip}
Create your own defined [Dayparts](scheduling_dayparting.html) to select for even easier scheduling!
{/tip}

- Use the drop down to select what needs to be scheduled from the list.

