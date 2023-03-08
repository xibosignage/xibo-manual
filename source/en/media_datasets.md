---
toc: "media"
maxHeadingLevel: 4
minHeadingLevel: 3
excerpt: "Design and store tabular data and use with data Widgets to add to Layouts"
---

# DataSets

DataSets are used to design and store tabular data which are created and managed independently to [Layouts](layouts.html). Once created, DataSets can be added to the [DataSet View](media_module_dataset_view.html)/[DataSet Ticker](media_module_dataset_ticker.html) and [Chart](media_module_chart.html) Widgets.

## Feature Overview:

- Define the data structure.
- Data can be manually added.
- Import data from a CSV file.
- Use a JSON formatted data source via the API.
- Sync from a 3rd party data source remotely on a schedule.
- Maintain content without accessing Layouts.
- Re-use across multiple Widgets and Layouts.
- Create an RSS feed from a DataSet.

DataSets have been designed to be versatile so that they can be configured in a number of ways with the DataSet View/DataSet Ticker and Chart Widgets as well as a source of data for a custom Module. A DataSet provides a convenient way to import and display data from other systems in [[PRODUCTNAME]].

Examples of where DataSets could be utilised:

- A drinks menu at a bar
- Tee times at a golf club
- Meeting room bookings
- Bus timetables

DataSets are created and managed independently to Layouts and therefore do not require user access to Layouts or the Layout Designer to add or manage the data within the DataSet.

![DataSet Flow](img/media_dataset_flow.png)

## Creating a DataSet

DataSets are administered from the **DataSets** page under the **Library** section of the main CMS menu.

![DataSet Grid](img/v3_media_dataset_grid.png)

Click on the Add DataSet button and complete the form fields to create a new record:

![DataSet Add](img/v3_media_dataset_add.png)

From v3.0.0 DataSets can be optionally saved to [Folders](https://xibosignage.com/manual/en/tour_folders.html) for easier searches, organisation and to set [Share](https://xibosignage.com/manual/en/users_features_and_sharing.html) options for Users/User Groups.

{tip}
Folders provide and easy way to define User/User Group access to its contents. DataSets will inherit any Share access that have been applied to the destination Folder.
{/tip}

- **Name** your DataSet for easy identification for when it needs to be selected in the chosen Widget.
- Provide an optional internal **Description** to give more details/instructions to other potential users of the DataSet.
- If applicable, enter a **Code** to lookup this DataSet if referencing via the API.

If the DataSet is going to be connected to sync with a **Remote** data source, tick to enable and continue with the configuration steps outlined next.

If the DataSet is **not Remote**, click to Save the DataSet record and go onto the [Create and Configure Columns](media_datasets.html#create_and_configure_columns) section on this page.

## Creating Remote DataSets

Remote DataSets are a special type of DataSet which will periodically sync from a 3rd party data source. [[PRODUCTNAME]] will call the URL at a chosen time period and parse the data according to instructions set on the DataSet record and any Columns that have been defined as **Remote**.

On selecting Remote, additional tabbed fields are made available so that the Remote DataSet record can be fully completed:

![Remote DataSet Options](img/v3_media_dataset_remote.png)

- #### Remote

  Use this tab to set the type of request method and enter the URL for the remote data source.

- #### Authentication

  Use the Authentication tab to provide authentication information.

  {version}
  From v2.3.10 Custom Headers are available to provide an optional string of custom HTTP headers.
  {/version}

- #### Data

  From this tab set the remote data source: 

#### JSON Source

JSON data is populated according to the Columns defined as Remote types. When specifying a **Remote Column** a 'data path' needs to be entered which is the JSON syntax path to the data for that column, in respect to the **Data Root** specified.

{tip}
Consider an example JSON data source:

```json
{
    "base": "EUR",
    "date": "2017-12-22",
    "rates": {
        "GBP": 0.88568,
        "THB": 38.83,
        "USD": 1.1853
    }
}
```

If we wanted two columns to capture the currency **Symbol** and **Value**, we would need to set the **Data Root** to `rates` and have Columns for:

- **Symbol** - data path = 0
- **Value** - data path = 1

Use the **Test data URL** to ensure that the desired structure is returned.

#### CSV Source

{version}
From v2.3.0 the remote data source can be selected as a CSV.
{/version}

- Use the drop down to select the separator to use for the CSV source.
- If the CSV source contains headers, tick to ignore the first row.


Use the **Test data URL** to ensure that the desired structure is returned.

- #### Advanced

  Set how often the remote data should be fetched and imported.
  
  Set a timescale to Truncate data.
  
  Use the drop down to select a DataSet if using dependants.
  
  Optionally set a row limit and what should happen if this limit is exceeded.

{noncloud}
If no **Row Limit** is set here, the Row Limit applied in the CMS Settings will be used.
{/noncloud}

{cloud}
If no **Row Limit** is set here the default will apply which is 10,000 rows per DataSet for Cloud customers.
{/cloud}

Once completed, click to **Save** the Remote DataSet record and continue to **Create and Configure Columns**.

## Create and Configure Columns

Once you have saved your DataSet record you need to create Columns to define the structure of your data.

- Use the row menu for a  DataSet record and select **View Columns**.

![DataSets Add columns](img/media_datasets_add_columns.png)

{tip}
By default, all new DataSets will have a **Col1** added. This should be edited or removed using the row menu for Col1!
{/tip}

- Delete Col1 from the row menu and click on the **Add Column** button to create a new column

​	or

- Use the row menu for Col1 and select **Edit**.

![DataSet Columns Form](img/media_columns_form.png)

- Include a **Heading** to identify this Column.
- Use the drop down to select the type of Column to use.

### Column Types:

#### Value

Enter a list of items to be presented in a combo box.

- Use the drop down to select the **Data Type**.
- Provide a comma-separated list of values that can be selected for this column.
- Set the position this Column should appear when viewing/editing Data.
- Provide an optional tooltip message to display when entering data for this column.

Use the additional options to enable **Filters**, **Sorting** and **Required Values** for this column.

#### Formula

Enter a MySQL statement.

- Use the drop down to select the Data Type.
- Set the position this Column should appear when viewing/editing Data.
- Provide a MySQL statement suitable to use in a 'SELECT' statement or a string to format a date field.

{tip}

`	$dateFormat(<col>,<format>,<language>)`
	Ensure that `<col>`has a date and time specified for the date format to work. If the language has not been set, it will default to English.

Two substitutions are available for Formula columns: `[DisplayId]` and `[DisplayGeoLocation]` which will be substituted at run time with the Display ID / Display Geo Location (MySQL GEOMETRY).

{/tip}

Use the additional options to enable **Filters** and **Sorting** for this column.

#### Remote

Provide a JSON syntax string.

- Use the drop down to select the Data Type.
- Enter a JSON syntax string showing how to access the data from a 3rd party data source.
- Set the position this Column should appear when viewing/editing Data.

Use the additional options to enable **Filters** and **Sorting** for this column.

Continue to add and configure Columns as required. There is no theoretical limit to the number of Columns [[PRODUCTNAME]] can support, although a smaller DataSet is often easier to manage and display.

{tip}

Columns can be viewed/added and edited by using the row menu for a DataSet record from the DataSets page!

The ordering and list content of Columns can be changed after Data has been collected!
{/tip}

## Adding Data to Columns

Once Columns have been defined, data needs to be added. This can be achieved a number of ways:

- Manually through the CMS User interface
- Imported via a CSV file
- Using the API
- Remotely Sync

### Manually 

Data is added using the **View Data** button on the Columns page.

{tip}
Data can be viewed/added and edited by using the row menu for a DataSet record from the DataSets page!
{/tip}

The data table will show each of the Columns added to the DataSet as they have been configured.

![Dataset Row](img/v3_media_dataset_row.png)

- Add a new row of data by clicking on the **Add Row** button and complete for each non-formula Column type.
- Click **Next** to continue adding data to add more rows.
- When all data has been completed, click **Save**

{tip}
Click in any row to Edit Data. Click on the cross at the end of a selected row to Delete.
{/tip}

{version}
From v2.3, Users can toggle to a **Multi Select Mode** using the button at the top of the grid. In this mode, Users can select multiple rows and click on **Delete Rows** to remove in bulk.

Once complete click on the **Edit Mode** button to come out of multi-select mode.
{/version}

### Importing a CSV 

The CMS has a DataSet CSV importer that can be used to extract data from a **CSV file** and put it into a DataSet. The **Import CSV** function can be accessed through the row menu of any DataSet record (with the exception of DataSets configured for Remote data sources).

![Dataset Import CSV](img/media_dataset_importcsv_form.png)

The importer has options to overwrite the existing data held in the import file as well as an option to ignore the first row of the CSV when importing if your file has headings.

The Remote Columns in the DataSet will be listed with a field next to them to indicate the column number in the CSV file that corresponds with the listed Column Header.  

{tip}
It is important to ensure that your CSV file has the correct file encoding if you are using non-ASCII characters. Non-ASCII characters are very common for languages outside of English. The file encoding most commonly used is UTF-8.

If you have edited your CSV file using Excel, you will need to make sure you select "Unicode (UTF-8)" from the Tools -> Web Options -> Encoding tab on the 'Save as' dialogue.
{/tip}

### Through the API

You can write your own application which syncs data into a DataSet using the [[PRODUCTNAME]] API. Data can be added row by row or by importing whole JSON structures.

{nonwhite}
Further discussion on the API can be viewed in the [Developer documentation](/docs/developer).
{/nonwhite}

### Remotely

Remote DataSets are kept in sync with a Task called **Fetch Remote DataSets**. This task is configured by default and runs once per minute.

- ### Dependents

  A remote DataSet can depend on another DataSet to formulate its request. Each row in the dependent DataSet will be used to create a request using the parent DataSet's request parameters.

## Row Menu

Use the row menu for a DataSet to View, Add and Edit the DataSet record, Columns and Data as well as accessing additional options:

### View RSS

Create your own RSS feed using the data held in a DataSet.

- Select View RSS from the row menu of a DataSet.
- Click on the Add RSS button.

![Add RSS](img/media_datasets_add_rss.png)

- Complete the form fields, selecting the Columns to use.
- On Saving a URL will be generated which can be copied and added to the [Ticker](media_module_ticker.html) Widget.

### Export as a CSV

From v3.1.0 the DataSet can be exported as a CSV file.

### Share

{version}
**Please note:** In versions earlier than v3.0.0 Share will be labelled as [Permissions](users_permissions.html)!
{/version}

Set [Share](https://xibosignage.com/manual/en/users_features_and_sharing.html) options for Users/User Groups for the selected DataSet.

{tip}
DataSets can only be deleted if they are not in use.

From v2.3 multiple DataSets can be selected and deleted in bulk using the **With Selected** option at the bottom of the DataSets grid.
{/tip}

## Date Format Table

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

