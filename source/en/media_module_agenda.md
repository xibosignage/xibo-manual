<!--toc=widgets-->

# Agenda

Display an agenda pulled from an iCal feed on Layouts.

{version}
**NOTE:** If you are using a CMS earlier than v3.1, please use the following link: [Calendar](media_module_calendar.html)
{/version}

{feat}Agenda Widget|v3{/feat}

## Add Widget

Locate **Agenda** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

On adding, configuration options are shown in the right hand properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

- Select whether the duration is to be **per item** or leave unticked to set the duration per feed.

### Configuration

![Calendar Configuration](img\v3.1_media_agenda_configuration.png)

- Provide the iCal **URL** to link.
- Use the **Interval** field to filter events for a certain period. Use natural language such as '1 day' or '2 weeks' to return the events within your chosen time frame.
- Tick the checkbox to enter a **Date range** instead with defined start and end dates.
- Specify the **Number of items**/events you wish to display from the iCal feed.
- Select to **Exclude all day events** which will be removed from the feed and not shown.
- Select to **Show only current events** which will hide all other events from the feed.
- Select to **Exclude current events** to remove from the feed and not be shown
- Choose to **Use event timezone** or deselect to use the CMS timezone instead.
- Choose to **Use calendar timezone** if the feed specifies that it's own timezone should be used. Deselect to use the CMS timezone.
- If your feed comes from **Windows** use this check box.

### Appearance

- Select an optional  **Background Colour** or leave blank to stay transparent.
- Use the **Date Format** field to ensure that you show the appropriate date/time formats for your events.  

{tip}
Take a look at the table at the bottom of this page for PHP date formats!
{/tip}

- Use the checkbox to show calendar items side by side.

- Select an **Effect** using the drop-down menu to be used to transition between items.

  When an effect  is selected an additional option is shown to specify the number of events to show per page.

  {tip}

  Use an effect when you have several events to display to prevent them being shown as static lists!
  {/tip}

### Template

Click on the Templates tab:

![Calendar Template Tab](img\v3.1_media_agenda_template.png)

#### Main

- Toggle **On** the Visual editor to format the main template using the inline editor. 
- Click the edit icon to open.

![Calendar Main Editor](img\v3.1_media_agenda_main.png)

- Include text merge fields from the **Snippets** menu to pull in the required event information from the feed. 

{tip}

 `[Date]` fields can include an optional format `[Date|format]` so that `[Date]` can be used multiple times in a Template with different formats to allow for different styling for each element of a date.
{/tip}

- Click to **Save**.


#### Current Event

Set alternative text and formatting to show Current Events.  [[PRODUCTNAME]] will use the Players date/time to work out if the event showing is current and switch to the Current Event template.

- Tick the box to **Use an alternative template for Current Events**.

- Include text and select from the available **Snippets** to create a template to be used just for **Current Events**. 
- **Save** changes.

### No Data Template

This template allows a user to include a message to ensure that the intended audience is not left with blank displays when no events are returned from the iCal feed.

### Optional Style Sheet

Include CSS to apply to the template structure.

### Caching

Include a suitable time for the **Update Interval** in minutes, keeping it as high as possible. This determines how often data will be requested from the iCal feed. If the calendar is only ever modified with events scheduled days in advance, you can set this for a long period.

{tip}
It is best practice to contact a remote feed as little as possible.
{/tip}

## Trigger 

Use this tab to trigger a Web Hook **Action** when there is a **Current Event** or **No Event**!

{tip}

**Example Scenario**:

A user has a meeting room calendar configured using the Agenda Widget on a Layout which shows the current occupancy for a room and would like to change LED lights to show when vacant or in use.

- The user would first need to create **Shell Commands** which issued commands to an LED IoT device or the inbuilt LEDS's on some of the Philips Commercial Displays.
- Next an [Interactive Action](layouts_interactive_actions.html) would need to be defined on the **Layout**, which would **Navigate to Widget** and **Target the Screen**, with the **Shell Command Widgets** configured in the **Interactive Drawer**.
- Using the **Trigger** tab on the Agenda Widget, assign the code's to trigger the **Web Hooks** for **Current Event** and **No Event**.


See the [Commands Functionality](displays_command_functionality) page for more information.

{/tip}

## Actions 

Interactive Actions can be attached to this Agenda Widget from the **Actions** tab in the properties panel. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

{tip}
{nonwhite}

Take a look at the [Agenda Module Guide](https://community.xibo.org.uk/t/agenda-module-guide/26993) to see an example of how you can utilise the **Agenda Widget** in your Layouts!

{/nonwhite}
{/tip}

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

