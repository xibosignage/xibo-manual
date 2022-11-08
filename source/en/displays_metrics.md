<!--toc=displays-->

# Reporting

{tip}
If you are using a CMS earlier than v3.0.0 please use the following link: [Reporting](displays_metrics_2.html)
{/tip}

[[PRODUCTNAME]] provides useful **metrics** for Users, who have the relevant enabled [Features and Sharing](users_features_and_sharing.html) options, to view reports within the CMS. These are designed to provide a centralised area for analysis into Display performance and usage as well as detailed **Proof of Play** reports which are all available from **All Reports** under the **Reporting** section on the main menu.

![Reporting](img\v3_displays_reporting.png)

## Display Metrics

- ### Display Statistics: Bandwidth


The CMS records the **bandwidth** used by each Display when connecting to XMDS for content and when reporting back Display information. 

- Select the range and click on **Apply**. Leaving the Display field empty will show a bandwidth chart total per Display:

![Display Bandwidth](img\v3_displays_bandwidth.png)

- Filter to just one Display and click on **Apply** to see each call that the Player made to XMDS in isolation:

![Bandwidth one Display](img\v3_displays_bandwidth_display.png)

{tip}
Filtering to just one Display helps to better understand where bandwidth has been used!
{/tip}

{tip}
Did you know...you can set a bandwidth limit per [Display](displays.html)!
{/tip}

Use the **All Reports** button to return to the Reporting dashboard or use the **Reports** drop down menu to select another 'Display' report to view.

{version}
**Note:** From CMS v3.3.0 all reports will show a Chart and Tabular data (on separate tabs) which can be exported as a CSV.
{/version}

- ### Time Connected/Disconnected


The CMS records all Displays/Display Groups on/offline events to provide a breakdown regarding a Displays availability. 

The Time Connected Report will give a breakdown of % connected (shown in green) and % disconnected (shown in blue)

- Select the **Range** and **Group by** Hour or Day of Month. 

- Leave the Display/Display Group field empty to view all or select  Displays/Display Groups to view.

- Click **Apply**

![Time Connected](img\v3_displays_time_connected.png)

The **Summary** gives a further breakdown between specified dates for Displays/Display Groups and shows the number of days connected/disconnected:

![Summary Time Connected](img\v3_displays_summary_connected.png)

## Proof of Play

![Proof of Play Dashboard](img\v2_proof_of_play_dashboard.png)

Each **Display** can collect information to provide Proof of Play Reports on what they have shown by:

- **Layout** - this will show all instances of the selected Layout being shown.
- **Media** - this will show all instances of the selected Media file being shown.
- **Widget** - this will give a report on that one selected Widget contained within a Layout. (This also includes Widgets that do not contain Library media files, such as Text).
- **Event** - If the Player supports collection from external sensors, Event stats will be recorded and shown in Reports.

![Proof of Play Type](img\v3_displays_reporting_proof_of_play_type.png)

- To collect Proof of Play reports **Enable Stats Reporting** and set the **Aggregation level** on a [Display Profile Setting](displays_settings.html)

## Proof of Play Default Settings

Statistical collection can be enabled by default from the **Settings** page under the **Administration** section of the main CMS menu. 

Click on the **Displays** tab:

![Proof of Play Settings](img\v3_displays_reporting_pop_settings.png)

### Aggregation level

Set the level of collection of Proof of Play statistics to be applied to all **Layouts** / **Media** and **Widget items** as default.

- **Individual** - statistics are recorded at the start and finish of each item individually and sent back to the CMS at each collection interval.
- **Hourly** - records each item once, and includes the total number of times played and the length of time played during the hour and is sent back to the CMS on the next collection interval after the hour period has expired.
- **Daily** - records each item once, and includes the total number of times played and the length of time played during the day and is sent back to the CMS on the next collection interval after the day has expired.

{tip}
Players aggregate ‘completed records’ only, with collection made at the end of the Widgets duration so if a Widget has a duration of 3 hours, the stat will be recorded once the Widget has expired!
{/tip}

### Enable Stats Collection

- Tick the box to enable the collection of Proof of Play statistics to all **Displays** as default.

This can be toggled on/off by editing [Display Setting Profiles](displays_settings.html#editing_profiles>).

### Enable Layout Stats Collection

- Tick the box to set the default to on for the collection of Proof of Play statistics for all newly added **Layouts**.

Collection can be disabled by unticking the box on the **Add/Edit** Layout form.

### Enable Media Stats Collection

- Use the dropdown menu to select the default setting to use for the collection of Proof of Play statistics for all Media items.

  Off
  On
  Inherit

### Enable Playlist Stats Collection

- Use the dropdown menu to select the default setting to use for the collection of Proof of Play statistics for all Playlists.

  Off
  On
  Inherit

### Enable Widget Stats Collection

- Use the dropdown menu to select the default setting to use for the collection of Proof of Play statistics for all Widgets.

  Off
  On
  Inherit

{tip}
It is intended to have **Widget** always set to Inherit so that Layout and Media options control the collection!
{/tip}

## Proof of Play Reports

- ### Proof of Play: Export


Use **Export** to select from and to dates for a Display to easily see all Proof of Play data exported to a CSV.

![Proof of Play Export](img\v3_displays_export_proof_of_play.png)

### Proof of Play: Report


- Select a **Range** from the dropdown or specify your own dates and times and use the filter fields as necessary. 
- Click **Apply**

![Proof Of Play](img\v3_displays_proofofplay.png)

{tip}
Returned results can be exported to a CSV!
{/tip}

Click on **All Reports** to return to the Reports Dashboard or use the **Reports** dropdown to select from the available Proof of Play Reports.

### Chart: Summary/Distribution by Layout, Media or Event


Charts show an aggregate duration and number of plays the selected Layout, Media or Event.

- Select a **Range**.
- Choose the **Type** and use the drop down to further specify the type selected.
- Click **Apply**.

![Proof of Play Summary Report](img\v3_displays_proofofplay_summary_report.png)

## Library

### Library Usage


View Library usage for all Users of the CMS or filter to have an overview of usage by an individual User/User Group. 

![Displays Library Usage](img\displays_library_usage.png)

### Schedule

Reports can be scheduled to run on a **Daily**, **Weekly**, **Monthly** or **Yearly** basis. 

{tip}
**Chart: Distribution** and **Chart: Summary Reports** must have the **Type** and the named Layout/Media/Event selected to activate the **Schedule** button.
{/tip}

- Click on the **Schedule** button and complete the necessary form fields for the particular report type.

- A PDF of the report can  be emailed to users by ticking the Should an email be sent? checkbox

{tip}
From v3.1.0 opt to disable the **Logo** shown on exported reports from the General tab on the **Settings** page under the **Administration** section of the main menu!
{/tip}


{tip}
Scheduled Reports can also be emailed to additional email addresses entered in the **Email addresses** field.

To use this functionality, ensure that a **Sending email address** has been set on the Network tab of the CMS **Settings** page, which is located under the **Administration** section of the main menu.
{/tip} 

### Report Schedules

- Click on the **Report Schedules** button to view all schedules by Owner/Type. 

- Use the row menu for a report for further options:

  ![Report Row Menu](img\v3_displays_reports_row_menu.png)

  Saved Reports

Click on **Saved Reports** to view all run reports. 

{tip}
Use the checkbox to only view your own run reports!
{/tip}

Use the row menu to view a saved report,schedule, export as a PDF or delete.

{tip}
**Report Schedules** and **Saved Reports** can also be accessed directly from the CMS menu under the **Reporting** section.
{/tip}