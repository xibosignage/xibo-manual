<!--toc=scheduling-->
#Schedule Now
Schedule Now functionality is available throughout the CMS and provides a quick way to Schedule a 
Campaign or Layout for a specific amount of time.

This is typically used for displaying temporary notices on the signage system.

Schedule Now functionality is available from the following pages:
- Campaign
- Layout
- Layout Designer
- Display

![Schedule Now Form](img/scheduling_schedule_now.png)

The form has been standardised across all areas of the CMS.

## Timezones
The schedule now functionality uses the CMS timezone to anchor the start time of the scheduled event. If
the network has Displays in a later timezone events "now" will occur when the Display reaches the CMS
time.

If the network has Displays in an earlier timezone events "now" will only occur if their duration exceeds
the timezone different between the Display and CMS time.