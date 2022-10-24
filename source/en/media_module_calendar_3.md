<!--toc=widgets-->

# Calendar

{tip}
**Please note:** If you are using a CMS v3.1.x, please use the following link [Agenda](media_module_agenda.html)
{/tip}

The Calendar Widget is used to display events from an **iCAL feed.** Calendar events can be filtered and formatted using templates.

## Add Widget

Click on **Calendar** from the [Widget](layouts_widgets.html)  toolbar and click to add or drag and drop ![Calendar Widget](img\v2_media_calendar_widget.png)

{tip}
If you are using a 1.8.x CMS, select Calendar from the Widget Toolbox to add!
{/tip}

On adding, configuration options are shown in the Edit Calendar form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

- Select whether the duration is to be per item or leave unticked to set the duration per feed.

### Configuration

![Calendar Configuration](img\v3_media_calendar_configuration.png)

- Provide the iCAL **URL** to link.

- Use the **Interval** field to filter events for a certain period. Use natural language such as '1 day' or '2 weeks' to return the events within your chosen time frame.

  {tip}
  From v3.0.0 select a **date range** to return events instead!
  {/tip}

- Specify the **Number of items**/events you wish to display from the iCAL feed.

- Select to **Exclude all day events** and **Exclude current events** so that they are removed from the feed and not shown.

- Choose from the **event timezone** and **calendar timezone** to specify which timezone to use. If left unticked, the timezone that has been set in the CMS will be used.

- If your feed comes from **Windows** use the check box.

### Appearance

- Use the **Date Format** field to ensure that you show the appropriate date/time formats for your calendar events.  

  {tip}
  Take a look at the table at the bottom of this page for PHP date formats!
  {/tip}

- Use the checkbox to show calendar items side by side.

- Select an **Effect** using the drop-down menu to be used to transition between items.

- When an effect  is selected an additional option is shown to specify the number of events you wish to show per page.

  {tip}
  We would encourage users to opt for an effect when you have several events you wish to display, otherwise they will be shown as static lists.
  {/tip}

### Template

Click on the Template tab to show the Calendar Templates:

![Calendar Template Tab](img\v3_media_calendar_template.png)

### Main Template

- Select **Main**
- Toggle **On** the Visual editor to format the main template using the inline editor. 
- Click the edit icon to open.

![Calendar Main Editor](img\v3_media_calendar_main.png)

- Include text merge fields from the **Snippets** menu to pull in the required event information from the Calendar. 

{tip}
If you are using 1.8.x CMS use **Available Substitutions** to show available text fields to use!
{/tip}

{tip}
From v2.1.0 `[Date]` fields can include an optional format `[Date|format]` so that `[Date]` can be used multiple times in a Template with different formats to allow for different styling for each element of a date.

![Calendar Date Format](img\v3_media_calendar_dateformat.png)

{/tip}

- Click to **Save**.


### Current Event Template

Set alternative text and formatting to show Current Events.  [[PRODUCTNAME]] will use the Players date/time to work out if the event showing is current and switch to the Current Event template.

Select **Current Event** from the Template tab

- Tick the box to Use an alternative template.

![Calendar Current Event](img\v3_media_calendar_current_events.png)

- Include text and select from the available **Snippets** to create a template to be used just for **Current Events**. 
- **Save** changes.

### No Data Template

This template allows a user to include a message to ensure that the intended audience is not left with blank displays when no events are returned from the iCAL feed.

### Optional Style Sheet

Include CSS to apply to the template structure.

### Caching

Include a suitable time for the **Update Interval** in minutes, keeping it as high as possible. This determines how often data will be requested from the iCAL feed. If the calendar is only ever modified with events scheduled days in advance, you can set this for a long period.

{tip}
It is best practice to contact a remote feed as little as possible.
{/tip}

## Trigger 

**Available from v3.0.0**

Use this tab to trigger a Web Hook **Action** when there is a **Current Event** or **No Event**!

{tip}

**Example Scenario**:

A user has a meeting room calendar configured using the Calendar Widget on a Layout which shows the current occupancy for a room and would like to change LED lights to show when vacant or in use.

- The user would first need to create **Shell Commands** which issued commands to an LED IoT device or the inbuilt LEDS's on some of the Philips Commercial Displays.
- Next an [Interactive Action](layouts_interactive_actions.html) would need to be defined on the **Layout**, which would **Navigate to Widget** and **Target the Screen**, with the **Shell Command Widgets** configured in the **Interactive Drawer**.
- Using the **Trigger** tab on the Calendar Widget, assign the code's to trigger the **Web Hooks** for **Current Event** and **No Event**.

See the [Command Functionality](displays_command_functionality) page for more information.

{/tip}

## Actions 

**Available from v3.0.0**

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html)  page for more information.

## Date Format - PHP

[[PRODUCTNAME]] should accept any date format that is in a correct PHP date format, the following characters are recognised and can be used:

| Format Character | Description                                                  | Example returned values                 |
| ---------------- | :----------------------------------------------------------- | --------------------------------------- |
|                  | **Day**                                                      |                                         |
| d                | Day of the month, 2 digits with leading zeros                | 01 to 31                                |
| D                | A textual representation of a day, three  letters            | Mon through Sun                         |
| j                | Day of the month without leading zeros                       | 1 to 31                                 |
| l                | (lowercase ‘L’) A full textual representation of the day of the week | Sunday through Saturday                 |
| N                | ISO-8601 numeric representation of the day of the week (added in PHP 5.1.0) | 1 (for Monday) through 7 (for Sunday)   |
| S                | English ordinal suffix for the day of the month, 2 characters | st, nd, rd or th. Works well with j     |
| w                | Numeric representation of the day of the week                | 0 (for Sunday) through 6 (for Saturday) |
| z                | The day of the year (starting from 0)                        | 0 through 365                           |
|                  | **Week**                                                     |                                         |
| W                | ISO-8601 week number of year, weeks starting on Monday (added in PHP 4.1.0) | 42 (the 42nd week in the year)          |
|                  | **Month**                                                    |                                         |
| F                | A full textual representation of a month, such as January or March | January through December                |
| m                | Numeric representation of a month, with leading zeros        | 01 through 12                           |
| M                | A short textual representation of a month, three letters     | Jan through Dec                         |
| n                | Numeric representation of a month, without leading zeros     | 1 through 12                            |
| t                | Number of days in the given month                            | 28 through 31                           |
|                  | **Year**                                                     |                                         |
| L                | Whether it’s a leap year                                     | 1 if it is a leap year, 0 otherwise.    |
| o                | ISO-8601 year number. This has the same value as Y, except that if the ISO     week number (W) belongs to the previous or next year, that year is used instead. (added in  PHP 5.1.0) | 1999 or 2003                            |
| Y                | A full numeric representation of a year, 4 digits            | 1999 or 2003                            |
| y                | A two digit representation of a year                         | 99 or 0                                 |

{nonwhite}
Take a look at the [Calendar Module Guide](https://community.xibo.org.uk/t/calendar-module-guide/17797) which gives a walkthrough of how to display calendar events using this Widget.
{/nonwhite}
