---
toc: "scheduling"
maxHeadingLevel: 3
minHeadingLevel: 1
alias: "schedule_management"
excerpt: "Set the play order and importance of events when scheduling content"
keywords: "event type, override schedules, limit number of plays, run at cms time"
---

# Using Priority and Display Order

[[PRODUCTNAME]] has a number of scheduling tools to allow for the simple creation of schedules across one or more Displays/Display groups. These tools allow users to define the order of scheduled items to tailor how content should be shown as well as flagging high-priority Events to display those at the top of schedule lists.

## Priority

Priority pushes important content to the front of any existing schedules and overrides all other non priority events of the same Event Type (Layouts/Campaigns/Video/Images and Playlists) on the schedule.   

Schedules with a higher priority take precedence over those with lower priorities, with 0 considered the lowest.

For example, you might have an important announcement with information about a fire alarm test which needs to be the only thing to show on Displays at a specific time. Assigning the highest Priority to this Event would ensure that it is the only content to be shown.

On reaching the end time of the priority event, the normal schedule will resume on displays.

## Display Order

Use Display Order to determine the play order of multiple Events which have been scheduled to show at the same time.

Ordering is a simple numerical sort, lowest to highest numbers, Events marked with a 1 will be played before any Events marked with a 2 for example.

Leaving the Display Order field blank will default to the order that the Event was first added.

{tip}
**NOTE:** To ensure Layouts play in a defined order we recommend adding and ordering them into a Layout List Campaign. The Display Order can then be used to determine the order in which entire Campaigns should play.

If Layout List Campaigns have the same Display Order set or this field is left blank, Layouts assigned to the Layout List Campaign will play according to the **Play List order** set. 
{/tip}

### Maximum Plays per Hour

There is an additional setting when scheduling Events to limit the number of times the Event should be shown per hour on Displays. You may have a promotional Image which should only be shown once an hour for example.

- Set a number here or leave as 0 for unlimited plays.

## Further Reading

[Setting a Play List order for a Campaign](/scheduling_layout_list_campaign.html)

[Showing a sequence of content in a Playlist](/getting_started_showing_a_playlist.html)

## FAQs

***What is considered the same Event Type for Priority?***

Layouts/Campaigns/Images/Videos and Playlists will be treated as the same Event Type when taking Priorities into consideration.

***What would happen if I ticked the Run at CMS time checkbox for an event?***

With this ticked, the Event time would be determined by the CMS time rather than using the local Display time for the selected Displays.

Scenario:

- CMS Time = GMT
- Display 1 = GMT
- Display 2 = GMT -4

If an event was scheduled to start at 11:00hrs, content would start to show on these Displays at 11:00hrs according to their time zones. These two Displays will not show the same content at the same time as Display 2 is 4 hours behind Display 1.

If Run at CMS time was ticked, Display 1 will start to show at 11:00hrs, as it is on the same time zone as the CMS. Display 2 will start to show content at 07:00hrs as it is 4 hours behind the CMS time zone.

