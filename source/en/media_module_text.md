<!--toc=widgets-->

# Text

Add text to display on Layouts.

{feat}Text Widget|v3{/feat}

## Add Widget

Locate **Text** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a 1.8.x CMS, select Text from the Widget Toolbox to add. 
{/version}

### Text Editor

![Edit Text](img\v3_media_text_edit.png)



Click the **edit icon** in the **Preview** window to open the inline editor to enter text and apply formatting.



![Enter Text](img\v3_media_text_inline_editor.png)



The text editor will open with the same background as selected for the Layout and will use a complimentary text colour for the chosen background colour.

The thin red border in the text editing window represents the **Region** size. Ensure that formatted text remains within this border.

Optionally include date/time merge tags, available from the **Snippets** menu. 

{version}
NOTE: From v2.1.0, [Date] tags can include an optional [Date|format] so that [Date] can be used multiple times in a Template each with different formats!
{/version}

Configuration options are shown in the Edit Text form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

### Effect

- Optionally select a **Background Colour** to use.
- Select an **Effect** to use from the dropdown menu.
- Include a **Speed** for the selected effect.
- Include a selector to use for stacking marquee items in a line when scrolling left/right.

### Templates

Select from the available Templates:

- **Main Template** - Toggle Off the Visual editor to enter text/HTML in the box provided.
- **Optional JavaScript Template** - Provide JavaScript in the box provided.

{tip}

**Additional Fonts** can be added to this editor by uploading files to the **Library**. Please be aware that fonts have 'preferences' built into them known as OS/2 tags. [[PRODUCTNAME]] checks these OS/2 preferences, and can use fonts with OS/2 tags 0 or 8. Fonts with other tags may not display correctly or you may receive an error on upload.
{/tip}

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Text Widget from the **Actions** tab in the properties panel. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

## Date Format - PHP

Date / time can be formatted by providing "tokens" that sit between square brackets [] in the template area.

| Title                      | Token   | Output                                 |
| -------------------------- | ------- | -------------------------------------- |
| Month                      | M       | 1 2 ... 11 12                          |
|                            | Mo      | 1st 2nd ... 11th 12th                  |
|                            | MM      | 01 02 ... 11 12                        |
|                            | MMM     | Jan Feb ... Nov Dec                    |
|                            | MMMM    | January February ... November December |
| Quarter                    | Q       | 1 2 3 4                                |
| Day of Month               | D       | 1 2 ... 30 31                          |
|                            | Do      | 1st 2nd ... 30th 31st                  |
|                            | DD      | 01 02 ... 30 31                        |
| Day of Year                | DDD     | 1 2 ... 364 365                        |
|                            | DDDo    | 1st 2nd ... 364th 365th                |
|                            | DDDD    | 001 002 ... 364 365                    |
| Day of Week                | d       | 0 1 ... 5 6                            |
|                            | do      | 0th 1st ... 5th 6th                    |
|                            | dd      | Su Mo ... Fr Sa                        |
|                            | ddd     | Sun Mon ... Fri Sat                    |
|                            | dddd    | Sunday Monday ... Friday Saturday      |
| Day of Week (Locale)       | e       | 0 1 ... 5 6                            |
| Day of Week (ISO)          | E       | 1 2 ... 6 7                            |
| Week of Year               | w       | 1 2 ... 52 53                          |
|                            | wo      | 1st 2nd ... 52nd 53rd                  |
|                            | ww      | 01 02 ... 52 53                        |
| Week of Year (ISO)         | W       | 1 2 ... 52 53                          |
|                            | Wo      | 1st 2nd ... 52nd 53rd                  |
|                            | WW      | 01 02 ... 52 53                        |
| Year                       | YY      | 70 71 ... 29 30                        |
|                            | YYYY    | 1970 1971 ... 2029 2030                |
| Week Year                  | gg      | 70 71 ... 29 30                        |
|                            | gggg    | 1970 1971 ... 2029 2030                |
| Week Year (ISO)            | GG      | 70 71 ... 29 30                        |
|                            | GGGG    | 1970 1971 ... 2029 2030                |
| AM/PM                      | A       | AM PM                                  |
|                            | a       | am pm                                  |
| Hour                       | H       | 0 1 ... 22 23                          |
|                            | HH      | 00 01 ... 22 23                        |
|                            | h       | 1 2 ... 11 12                          |
|                            | hh      | 01 02 ... 11 12                        |
| Minute                     | m       | 0 1 ... 58 59                          |
|                            | mm      | 00 01 ... 58 59                        |
| Second                     | s       | 0 1 ... 58 59                          |
|                            | ss      | 00 01 ... 58 59                        |
| Fractional Second          | S       | 0 1 ... 8 9                            |
|                            | SS      | 0 1 ... 98 99                          |
|                            | SSS     | 0 1 ... 998 999                        |
| Timezone                   | z or zz | EST CST ... MST PST                    |
|                            | Z       | -07:00 -06:00 ... +06:00 +07:00        |
|                            | ZZ      | -0700 -0600 ... +0600 +0700            |
| Unix Timestamp             | X       | 1360013296                             |
| Unix Millisecond Timestamp | x       | 1360013296123                          |

### CKEditor

CKEditor is used for Text input. Complete documentation for all the buttons can be found on the [CKEditor's website](http://docs.cksource.com/CKEditor_3.x/Users_Guide).