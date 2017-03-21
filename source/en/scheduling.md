<!--toc=scheduling-->

# Scheduling

[[PRODUCTNAME]] has a sophisticated scheduling system allowing for scheduling
Layouts and Campaigns across Displays and Display Groups. This is achieved
through Schedule Events and visualised on the Calendar.

## Event Types

The CMS supports 3 types of event:

 - Campaign / Layout
 - Overlay Layout
 - Command

### Campaign / Layout

The most common event type is the scheduling of a Campaign or Layout to be shown
within a specific time period. These events can be scheduled from the
[Calendar](scheduling_calendar.html) and the [Schedule Now](scheduling_now.html)
form.

When a Display has more than one Layout scheduled to it at one time it will
automatically alternate between the Layouts in the schedule. The display order
is used to determine which order the Layouts will be rotated.

If at any time there are no layouts scheduled to run, the default layout for the
Display will be run automatically.

### Overlay Layout

Layouts can be overlaid over the existing schedule so that they sit on top
of the Campaign / Layout schedule playing. This is particularly useful for
having a company logo or Ticker that exists across all Layouts being shown.

These events can be scheduled from the [Calendar](scheduling_calendar.html).

The Display Order on Overlay Layouts determines the order in which the Layouts
regions are applied to the overlay and compliments the regions own Layer
settings.

### Command

A scheduled command is executed by the player at a specific point in time and
therefore command events do not need a `toDt`.

These events can be scheduled from the [Calendar](scheduling_calendar.html).

The commands available to schedule are configured in the Commands section of
the CMS. More information can be found [here](displays_commands.html).

Display Order and Priority are also irrelevant when it comes to executing the
command, but may be set in the CMS for organisational purposes.

## Schedule

Events are scheduled into "dayparts" which are blocks of time that split up the
day. By default the CMS contains a daypart for adhoc scheduling (called the custom
daypart) and for scheduling an event "always." More information can be found in 
[Dayparting](scheduling_dayparting.html).

To give your own From/To Dates then the "Custom" daypart should be selected.

## Priority

Event Priority determines whether the event is included in the schedule
on the player or not. Priority is a number where 0 is considered the lowest
priority.

If a player has a schedule containing events which are all priority 0, then
all of the events will be shown in rotation together. If one of the events
has a priority of 1, then this will be the only event shown. Likewise if there
are some events with priority 0, some with priority 1 and some with priority 2
only the priority 2 events will be shown.

Priority is a way to alter the schedule at specific times - for example
a normal rotation during the day, with a priority event at lunch time which
shows some lunch specific information (i.e. a menu).
