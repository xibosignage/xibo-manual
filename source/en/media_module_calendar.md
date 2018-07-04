<!--toc=widgets-->
#Calendar

The calendar module is used to display events from an iCAL feed. Calendar  events can be filtered using 'Interval' options and formatted using text templates. 

##Edit Calendar

###General

![Image showing the General Tab](img/media_calendar_general.png)

Optionally give your widget a name which can then be pulled into your text template.

Use the Interval option as a filter to show events for a certain period. Use natural language such as 1 day or 2 weeks to return the events within your chosen time frame.



###Template

![Image showing the Template Tab](img/media_calendar_template.png)

Use the text editor to format the template. Use the tags under ‘Available Substitutions’ to pull in the required event information from your Calendar. You can double click on the tag name, or type in the tag as its shown.

Using the Set an alternative template for events that are current? feature will tell Xibo to use the Players Date/Time to work out if the event showing is current. 

An additional text editor will open so that you can include alternative text and formatting to be used just for your ‘current events’. 

Available substitutions should be typed into this editor to pull the required information from your Calendar.

![Image showing the Template Tab, additional editor](img/media_calendar_template_2.png)

###Format

![Image showing the Format Tab](img/media_calendar_format.png)

Use Date Format to ensure that you show the appropriate date/time formats for your calendar events.  See the Manual (link) for all allowed formats.

Specify the Number of items ‘events’ you wish to display from the iCAL feed.

Items per page - If you select an ‘Effect’ (we would encourage users to opt for an Effect when you have many events you wish to display, otherwise they will be shown as a static list) specify the number of ‘Events you wish to show per page.



###Advanced

![Image showing the Advanced Tab](img/media_calendar_advanced.png)

Select the ‘Exclude all day events’ tick box if you would like all day events excluded from the feed and therefore not shown on your displays.

Include a suitable time for the Update Interval in minutes, keeping it as high as possible. This determines how often the Module will request data from your feed, it is best practice to contact a remote feed as little as possible. If your calendar only ever modified with events scheduled days in advance, you can set this to a long period.

Include a message using the text editor to ensure that your audience are not left with blank displays when no information is returned from the iCAL feed.