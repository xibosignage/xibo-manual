<!--toc=widgets-->
# Ticker

Display dynamic feed content on Layouts.

{version}
NOTE: If you are using a 1.8.x CMS, please use the following link: [Ticker 1.8](media_module_ticker_1.8.html)
{/version}

{feat}Ticker Widget|v3{/feat}

The Ticker Widget primarily consists of a data source location and a template to apply to the retrieved data.

## Add Widget

Locate **Ticker** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

- Select whether the **Duration is per item** or leave unticked to set the duration per feed.

{tip}
Use the last option with caution as this can create long-running media items. Use in conjunction with **Number of items** to limit!
{/tip}

### Configuration

![Ticker Configuration](img\v3.1_media_ticker_configuration.png)

- Enter the **Feed URL** to use.

- Choose how many RSS **items** to display.

- Select to start with items from the **Start or End** of the list.

- Tick to select to **Reverse Order** feed items.

- Select to display items in a **Random** order.

  {tip}
  The Randomise option works offline; the entire feed is parsed, rendered and downloaded to the Player and then sorted in a random fashion for display. We use a Durstenfeld shuffle to randomise the order of items. Randomise works on the full feed, "Number of items" and "Take items from" options.
  {/tip}

- Display a **Copyright** notice at the end of the feed.

- Tick to display returned results **side by side**.

- Apply a **Date Format** to apply to all returned date results. (see the **Additional Information** at the bottom of this page for further information).

- Include a comma-separated list of **attributes** that should not be stripped from the incoming feed.

- Include a comma-separated list of **HTML tags** to be stripped from the feed.

- Tick to **Decode** the HTML entities in the feed before parsing it.

- Select to **Disable Date Sort** for the feed.

### Appearance

- Optionally select a **Background Colour**.
- Use the drop-down menu to select an **Effect** to be used to transition between items.
- Set the **Speed** for the effect selected.
- Enter how many Items should appear on each page if an effect to split items has been selected.

### Templates

Select from the available Templates:

- **Preset** - use the drop down to select one of the preset templates

{version}

NOTE: From v3.1.0 additional options have been included so that users can easily change the appearance of a selected Template by changing alternative colours, font sizing and image fit options.

![Template Options](img/v3.1_media_ticker_template_options.png)







{/version}
Click to Override the selected template if required. 

Please see the section on Editing Preset Templates below for further information.
{/tip}

- **No Data** provide a message to display when no data is returned from the feed. 

## Editing Preset Templates

Templates can be edited by selecting a Template using the drop-down and clicking in the **Override the template** checkbox. 

{tip}
The template will be automatically scaled and should be designed for the intended output resolution. The following guidelines should be considered when editing templates:

- Templates must be designed at a fixed size
- All elements must use absolute sizing in px, including fonts, margins, widths, heights, etc
- If positioning is used, it must be from top,left
- Templates can use bootstrap
- The aspect ratio will be fixed by [[PRODUCTNAME]] and sized to fit the Region
- Templates are treated the same as a static image
  {/tip}

Once override has been selected, click back on the **Templates tab** to select the template to edit:

![Ticker Override Template](img\v3.1_media_ticker_template_override.png)

- **Main Template** - Toggle **On** the Visual editor to access the inline editor to enter text and formatting or provide text/HTML in the box provided.

- Include text merge fields from the **Snippets** menu to pull in the required information from the feed.


{tip}
A special notation is available where the User can specify the `Tag|Namespace` within the feed for [[PRODUCTNAME]] to extract content.
{/tip}

**Optional Stylesheet** - This is the CSS to apply to the template structure above.

{tip}
This optional template is intended for advanced users to 'tweak' the CMS generated output!
{/tip}

### Caching

Players can **cache** the content of this media for off-line playback and to prevent repeated downloads. Keep this number as high as possible.

{tip}
Options are provided to set different update frequencies for images and data to determine how long the Player will keep the data and or images, saved locally, before checking for updates.
{/tip}

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Ticker Widget from the **Actions** tab. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

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
|                  | **Time**                                                     |                                         |
| a                | Lowercase Ante meridiem and Post meridiem                    | am or pm                                |
| A                | Uppercase Ante meridiem and Post meridiem                    | AM or PM                                |
| B                | Swatch Internet time                                         | 000 through 999                         |
| g                | 12-hour format of an hour without leading zeros              | 1 through 12                            |
| G                | 24-hour format of an hour without leading zeros              | 0 through 23                            |
| h                | 12-hour format of an hour with leading zeros                 | 01 through 12                           |
| H                | 24-hour format of an hour with leading zeros                 | 00 through 23                           |
| i                | Minutes with leading zeros                                   | 00 to 59                                |
| s                | Seconds, with leading zeros                                  | 00 through 59                           |
| u                | Microseconds (added in PHP 5.2.2). Note that date() will always generate 000000 since it takes an integer parameter, whereas DateTime::format() does support microseconds if DateTime was created with microseconds. | 654321                                  |
|                  | **Timezone**                                                 |                                         |
| e                | Timezone identifier (added in PHP 5.1.0)                     | UTC, GMT, Atlantic/Azores               |
| I                | (capital i) Whether or not the date is in daylight saving time | 1 if Daylight Saving Time, 0 otherwise. |
| O                | Difference to Greenwich time (GMT) in hours                  | +0200                                   |
| P                | Difference to Greenwich time (GMT) with colon between hours and minutes (added in PHP 5.1.3) | +02:00                                  |
| T                | Timezone abbreviation                                        | EST, MDT …                              |
| Z                | Timezone offset in seconds. The offset for timezones west of UTC is always negative, and for those east of UTC is always positive. | -43200 through 50400                    |
|                  | **Full Date/Time**                                           |                                         |
| c                | ISO 8601 date (added in PHP 5)                               | 2004-02-12T15:19:21+00:00               |
| r                | » RFC 2822 formatted date                                    | Thu, 21 Dec 2000 16:01:07 +0200         |