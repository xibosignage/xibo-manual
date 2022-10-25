<!--toc=widgets-->

# Twitter

Display Twitter feeds on Layouts. 

{feat}Twitter Widget|v3{/feat}

The Twitter Module provides access to the [Twitter Search API](https://dev.twitter.com/rest/public/search). Granted access is to **read data** only!

{nonwhite}
{cloud}

The main set-up is provided as part of the service for **Xibo Cloud** hosted customers. Please follow the simplified process below to connect to the Twitter API.

- Select **Modules** from the Administration section of the menu.
- Click on the row menu for the Twitter Provider (Twitter Search) Module and select **Connect to Twitter**.
- A form will open which has a **Login with Twitter** button which allows authorisation for the CMS to connect via a Twitter account.
- Follow the on-screen instructions to authorise.

Skip the installation section below and continue from the **Add Widget** section.

{/cloud}

**Non-Xibo Cloud Hosted customers please follow the full installation steps as detailed below.**

{/nonwhite}

## Installation

Access to the Twitter API is protected and so users must register for an **API key** which is then entered into the Twitter Module in the [[PRODUCTNAME]] CMS. 

### Connecting to Twitter

- Obtain an **API key** and **API secret** from [Twitter](https://apps.twitter.com) and then log in to your Twitter account. 

**Please note:** You will need to apply for a **Twitter developer account** if you are not already approved, using the above Twitter link.

- Complete the required fields and accept the Terms of Service.
- Solve the CAPTCHA and submit the form.
- Make a note of the generated consumer key (API key) and consumer secret (API secret).

### Twitter Module Installation

- Select the **Modules** page under the Administration section and install the Twitter Module.
- Once installed click on the row menu for the Twitter Module and click **Edit**.
- Enter the generated **API key** and **API secret**.
- Optionally adjust the **Cache Period** to determine how long to cache a results set for each Twitter search.

{tip}
Setting a low value can cause your access to the Twitter API to be disabled for generating too many requests.
{/tip}

## Add Widget

Locate **Twitter** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a 1.8.x CMS, select Twitter from the Widget Toolbox to add!
{/version}

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.
- Select whether the duration is to be per item or leave unticked to set the duration per feed.

### Configuration

![Twitter Configuration](img\v3.1_media_twitter_configuration.png)

- Provide a **Search Term** to return applicable Tweets

{tip}
Check to make sure your search term is valid before entering here by using the twitter.com search box!

To return Tweets from a specific account rather than all Tweets that contain the accounts @ handle, use `from:` before the name of the account in the **Search Term** field.
{/tip}

- Select the **Language** to use
- Use the drop down to select the **Type** of Tweets to be returned; based on popularity, most recent or a mixed.
- Select the **Distance** in miles, away from your location Tweets should be returned from. 0 has no restrictions.
- Use the tick box if **Mentions** (@someone) should be removed from the returned Tweet text.
- Use the tick box if **Hashtags** (#something) should be removed from the returned Tweet text.
- Use the tick box to remove **URLs** from returned Tweet Text.

{tip}
Most URL's do not compliment Digital Signage!
{/tip}

### Appearance

- Optionally add a **Background Colour**.
- Specify the number of Tweets to return, left blank will return the default number of 15
- Select the number of Tweets to show Per Page, left blank will show the default number of 5 Tweets.
- Apply a **Date Format** to be used for returned results (see Additional Information at the bottom of page).
- Select an optional **Effect** and **Speed** to be used to transition between tweets.

{version}
NOTE: From v3.1.0 users can set **Horizontal** and **Vertical** alignment options for this Widget!
{/version}

### Templates

Select from the available Templates:

**Preset**  - use the drop down to select one of the preset templates:

![Preset Templates](img\v3.1_media_twitter_preset_templates.png)

{tip}
Click to Override the selected template if required. Please see the section on Editing Preset Templates below for further information.
{/tip}

- **No Tweets Message** provide a message to display when there are no Tweets to return based on the search query.

### Editing Preset Templates

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

Once override has been selected, click back on the **Templates tab** to select templates to edit:

![Twitter Override the Template](img\v3.1_media_twitter_override_template.png)

**Main ** - Toggle **On** the Visual editor to access the inline editor to enter text and formatting or provide text/HTML in the box provided.

- Use the Snippets menu to include merge text fields.

  {version}
  NOTE: If you are using 1.8 the following substitutions are available for use:
  [Tweet][User]
  [ScreenName][Date]
  [ProfileImage][Photo]
  {/version}

**Optional Stylesheet** - This is the CSS to apply to the template structure above.

{tip}
This optional template is intended for advanced users to 'tweak' the CMS generated output!
{/tip}

### Caching

Include a suitable time for the Update Interval in minutes, keeping it as high as possible. This determines how often the Module will request data from the feed.

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Twitter Widget from the **Actions** tab. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

### Date Format - PHP

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