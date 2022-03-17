<!--toc=layouts-->

# Interrupt Layouts

{tip}
**Please note:** This feature is currently supported by the Android Player from v2 R204, Windows Player from v2 R253, webOS Player from v2 R207and Tizen Player from v2 R203.
{/tip}

When a Layout is scheduled as an **Interrupt Layout**, [[PRODUCTNAME]] will work out how it should be played to 'interrupt'  the usual schedule using the **Share of Voice** percentage entered on the event.

When the usual schedule is 'interrupted', 1 **Widget** from each **Region** will play from the **Interrupt Layout** for its duration. The schedule will then return to resume the previous Layout at the point it was interrupted and so on.

If the Layout selected for the interrupt has a total duration less than the event duration, it will loop in the same way as a normal scheduled Layout. If the Layout selected for the interrupt has a total duration more than the event duration, it will be validated when the event is created - Layouts modified to be longer after they have been assigned an event will have any Widgets outside the event duration cut.

{tip}
This can be useful if you have, for example, Announcements that need to be shown for a particular amount of time within the usual schedule.
{/tip}

## Create an Interrupt Layout

**Interrupt Layouts** are created in exactly the same way as all other [Layouts](layouts.html). 

Be careful when setting durations of Widgets as the Interrupt Layout will play 1 Widget from each Region in its entirety at each 'interrupt' interval. You should take this into consideration when creating your Layout to get the best out of this feature. 

## Scheduling

Interrupt Layouts are selected as an **Event type** when Scheduling an [Event](scheduling_events.html).

Once selected, complete the form fields:

![Interrupt Layout](img/v3_layouts_schedule_interrupt.png)



### Share of Voice

Enter the amount of time the Layout should be shown in seconds per hour or as a percentage (0 - 100%) of the events duration (the difference between the from date and the to date) that the **Interrupt Layout** should occupy the usual schedule.

{tip}
**Example Scenario**:

I have created an Interrupt Layout with 1 full size Region that has two Text Widgets assigned, containing my 'Announcements', both of which have durations of 30 seconds, which I have scheduled for 1 hour.

I have completed a Share of Voice percentage of 50%. [[PRODUCTNAME]] will calculate how many and how often the interrupt intervals should occur to occupy the screen for half of the play time.

When the usual schedule is interrupted you should see the first announcement for its total duration of 30 seconds before resuming to the previously interrupted Layout. Then at the next interruption the second announcement for 30 seconds then the previous Layout is resumed and so on for the scheduled hour.
{/tip}

