<!--toc=widgets-->

# Currencies

The Currencies Widget displays exchange rates for many currency pairs.

{nonwhite}
{cloud}
The Currencies Module is configured for Xibo in the Cloud customers with an API key provided as part of the service. Skip the Installation steps detailed below and follow the set up from the Add Widget section.
{/cloud}

**Non-Xibo in the Cloud customers please follow the Installation steps as detailed below.**

{/nonwhite}

## Installation

The Currencies Widget relies in part on the [Alpha Vantage API](https://www.alphavantage.co/) to retrieve exchange rates. 
Prior to installation you will need an API key. Please visit [Alpha Vantage](https://www.alphavantage.co/support/#api-key) to create an account and obtain a key.

The Currencies Module is installed from the Modules page, under the Administration section of the menu. Click on the **Install Module** button and select the Module to install.

After installation, select the Module from the grid and use the row menu to select **Edit**.

Complete the form fields and include the **API key** and specify Cache settings.

## Add Widget

Click on **Currencies** from the [Widget](layouts_widgets.html)  toolbar and click to add or drag and drop![Currencies Widget](img\v2_media_currencies_widget.png)

{tip}
If you are using a 1.8.x CMS, select Currencies from the Widget Toolbox to add. 
{/tip}

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.
- Select whether the duration is to be per item or leave unticked to set the duration per feed.

## Configuration

![Currencies Configuration](img\v3.1_media_currencies_configuration.png)

- Define currencies using their **acronym/abbreviation** (symbols or written text will not be recognised).
- Include a **Base** currency.
- Select **Reverse conversion** if you would like to use your base currency as the comparison.

### Appearance

- Optionally add a **Background Colour**.
- Include a PHP **Date Format** to apply to returned results, (see the bottom of the page for date formats).
- Select an optional **Effect** and **Speed** to be used to transition between items.

{tip}
From v3.1.0 set **Horizontal** and **Vertical** alignment options for this Widget!

{/tip}

### Templates

Select from the available Templates:

- **Preset**  - use the drop down to select one of the preset templates:

  ![Preset Templates](img\v3.1_media_currencies_preset_templates.png)

  {tip}

  Click to Override the selected template if required. 

  Please see the section on Editing Preset Templates below for further information.
  {/tip}

- **No Records Message** provide a message to display when there are no records returned.

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

![Currencies Override the Template](img\v3.1_media_currencies_override_templates.png)

**Main ** - Toggle **On** the Visual editor to access the inline editor to enter text and formatting or provide text/HTML in the box provided.

{tip}
**Please note:** The Visual editor is not available in a 1.8.x  CMS.
{/tip}

**Item ** - Enter a Template to be applied to each item, use the Visual editor or provide text/HTML in the box provided.

**Optional Stylesheet** - This is the CSS to apply to the template structure.

{tip}
This optional template is intended for advanced users to 'tweak' the CMS generated output!
{/tip}

### Caching

Include a suitable time for the Update Interval in minutes, keeping it as high as possible.

### Results

Get results at anytime to see what data is returned. Any field is available as a substitute to use in a template by simply entering the field name between square brackets [].

## Actions 

**Available from v3.0.0**

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html)  page for more information.

## Additional Information

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