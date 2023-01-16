<!--toc=layouts-->

# Interrupt Layouts

{feat}Interrupt Layouts|v3{/feat}

When a Layout is scheduled as an **Interrupt Layout**, [[PRODUCTNAME]] will work out how it should be played between Layouts in the 'usual schedule' using the **Share of Voice** time or percentage entered on the event.

{tip}
This can be useful if you have, for example, Announcements that need to be shown for a particular amount of time within the usual schedule.
{/tip}

## Create an Interrupt Layout

**Interrupt Layouts** are created in exactly the same way as all other [Layouts](layouts.html). 

## Scheduling

Interrupt Layouts are selected as an **Event type** when Scheduling an [Event](scheduling_events.html).

Once selected, complete the form fields:

![Interrupt Layout](img/v3_layouts_schedule_interrupt.png)



### Share of Voice

Enter the amount of time the Layout should be shown in seconds per hour or as a percentage (0 - 100%) of the events duration (the difference between the from date and the to date) that the **Interrupt Layout** should occupy the usual schedule.

{tip}
**Please note:** If your 'main' Layout has a long duration, the Interrupt Layout may show in a block in order to satisfy the SoV criteria entered!
{/tip}

