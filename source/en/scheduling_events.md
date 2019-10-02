<!--toc=scheduling-->

# Events

Event types are **Layouts**/**Campaigns**, **Overlay Layouts**, **Interrupt Layouts** or **Commands** which can be assigned to Displays/Display Groups at specific dates and times.

Events are administered from the Schedule section from the menu.

## Add Event

Click on the **Add Event** button on the calendar to schedule an Event.

![Add Scheduled Event](img/schedule_event_add.png)

## General

### Event Type

Use the drop-down to select an Event from the 4 Types supported:

- **Campaign/Layout** - select designed Layouts and Campaigns.
- **Overlay Layout** - select a specifically designed Layout to schedule as an [Overlay Layout](layouts_overlay.html).
- **Interrupt Layout** - select a Layout to play for a specified **Share of Voice** to interrupt your usual schedule. (Available from v2.2.0)
- **Command** -  select from a predefined command.

{tip}
Events, with the exception of Interrupt and Command Events, can also be added using the [Schedule Now](scheduling_now.html) function.{/tip}

### Display 

Click in the field to select one or more Displays/Display Groups to show the event content on.

### Dayparting

**Custom**/**Always** or **User** created Dayparts can be selected using the drop-down menu. 

Select **Custom** to specify your own start/end dates/time. Click in the form field to open the date and time picker. 

{tip}
Start and end times can be free typed to get the exact timings required.
{/tip}

### Layout/Campaign

Use the drop-down menu to select the Layout/Campaign to schedule.

{tip}
This list is dependent on the permissions for that User.
{/tip}

### Preview

Click on the Preview button to view the Layout/Campaign in another tab. 

{tip}
This is useful to use to ensure that the correct Layout/Campaign has been selected and to make checks, such as the total duration, without having to leave the schedule.
{/tip}

### Display Order

Determine the order in which the Layout/Campaign will play in rotation when scheduled at the same time as other Layouts/Campaigns. Ordering is by a simple numerical sort, lowest to highest numbers, therefore **Layouts/Campaigns marked 1** will be played before **Layouts/Campaigns marked 2**.

The Display Order on Overlay Layouts determines the order in which the Layout Regions are applied to the overlay and compliments the Regions own layer settings.

{tip}
To ensure ordering of Layouts we would recommend that these are ordered within a **Campaign**. The Display Order could then be used to determine the order in which entire Campaigns should playout. If no Display Order is specified for Campaigns or they have the same Display order the Campaigns will play interleaved.

**Scenario**

Campaign A consists of Layout 1, Layout 2 Layout 3 - Display Order of 1
Campaign B consists of Layout 4, Layout 5, Layout 6 - Display Order of 1
When scheduled at the same time the Campaigns will play out as follows:

A - Layout 1

B - Layout 4

A - Layout 2

B - Layout 5

A - Layout 3

B - Layout 6

A - Layout 1 and so on.

To ensure that the Campaigns played all the contained Layouts before rotating to the next, Campaign A would need a Display Order of 1 and Campaign B would need a Display Order of 2.
{/tip}

### Priority

Set the Priority of the Event with the **highest** number stated playing in preference to lower numbers. This can be used to override all other non-priority Events on the schedule.

 {tip}
This functionality is useful for displaying temporary/important notices for overriding a schedule for a specific Event without having to make any changes to your existing schedule or cancelling Layouts/Campaigns that would be running at that time.
{/tip}

### Run at CMS Time

When selected, the Event will play at the time determined by the **CMS** rather than using the local display time.
{tip}
**Scenario**
CMS Time = GMT
Display 1 = GMT
Display 2 = GMT -4

An event scheduled for 11:00 with **Run at CMS time** deselected will run on display 1 at 11:00 and display 2 at 11:00. These two displays will not show the same content at the same time, because display 2 is 4 hours behind.

With **Run at CMS time** selected, display 1 will run at 11:00 as before but display 2 will run at 07:00.
{/tip}

Please note **The Schedule Now** functionality will always create events with this option selected.

## Repeats

An Event can be repeated at defined intervals (hourly, daily, weekly, monthly or yearly) until a specified time. Use the **Repeats** tab to create recurring events. Select the type of repeat from the drop-down and complete the form fields as required. Use **Repeat every** to further specify the frequency of the repeat.

{tip}

E.g. With a **Weekly** Repeat you could specify to repeat each Wednesday and Friday every other week by including a 2 in the 'Repeat every' form field.
{/tip}

{tip}
(Available in version 2.0 and later) **Monthly** Repeats can be determined by the Event date or by the day in the month the event falls on. 

For example: an event which is scheduled on 06/03/2019 can be set to repeat on the 6th day of every month or the 1st Wednesday of each month (as 06/03/2019 falls on a Wednesday). 
{/tip}

## Reminders

From v2.2.0 create a set of reminders to be sent to the [Notification Drawer](users_notifications.html) for your scheduled Events. 

{tip}
Please ensure that your Administrator has entered a **Sending Email** address on the CMS **Settings** page, **Network** tab prior to set up of Reminders.
{/tip}

![Event Reminders](/img/v2_scheduling_event_reminders.png)

Use the form fields to define a reminder, use the + icon to add additional fields.
Tick the box if you wish to be notified email. This will be sent to the email address as set for your [User Profile](users_administration.html>).

## Edit / Delete

Click on any **Event/Icon** in the calendar to edit form fields or to remove completely from the schedule by clicking delete and confirming.

## Duplicate

Located at the bottom of the Edit form, the **Duplicate** button allows for event details to be duplicated and configured for a new event. Once clicked a pop up will appear to confirm that a new form has been loaded so that amendments can be made.

{tip}
The new loaded form will not have a **Duplicate** button.
{/tip}

**It is important to note that if at any time there are no Layouts/Campaigns Scheduled to run, the Default Layout for the display will run automatically.**