<!--toc=widgets-->

# Chart

The Chart Widget is used with DataSets to display information as a type of Chart.

[[PRODUCTNAME]] supports the following chart types:

- Line
- Bar
- Pie
- Donut
- Horizontal Bar
- Radar

DataSets need to be created and defined prior to adding the Chart Widget to Layouts. Please see the [DataSet](media_datasets.html) page for further information.

## Add Widget

Click on **Chart** from the [Widget](layouts_widgets.html)  toolbar and click to add or drag and drop   ![Chart Widget](img\v2_media_chart_widget.png)

{tip}
If you are using a 1.8.x CMS, select Chart from the Widget Toolbox to add!
{/tip}

On adding, select the DataSet to use from the drop-down menu:

![Chart Widget Add Form](img\v3_media_chart_add.png)

{tip}
Once a DataSet has been associated with the Widget you cannot edit to change to an alternative set of data. A new Widget would need to be added and configured!
{/tip}

Once Saved, configuration options are shown in the the Edit Chart form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

### Configuration

#### Data

![Chart Widget Data](img\v3_media_chart_data.png)

- Use the drop down to select the **Chart type** which would best present the information held in the selected DataSet.
- Configure an **X and Y axis** using the available columns from the associated DataSet.
- Click on the `+` to add an axis and to include a **Series Identifier**.

{tip}
Include a Series Identifier (not suitable for Pie/Donut chart types) to show a breakdown of values rather than the sum of all values. 
{/tip}

#### Labels

![Chart Widget Labels](img\v3_media_chart_labels.png)

- Include a **Title** and **Labels** for each axis to display on the chart. 
- Click in the box to include a **Legend** to further explain the data. 

### Appearance

#### Style

- Use the colour picker to select the colour to use behind the chart.

  {tip}
  Leave this field blank to make the chart transparent!
  {/tip}

- Choose a colour to be used for all text.

  {tip}
  Select a colour to complement the Chart/Layout background!
  {/tip}

-  Set the size to be used for all text.

#### Colour Palette

- Use the colour picker to select colours to use for the charts data series.
- Click the `+` button to add additional fields.

{tip}
 If you do not select any or enough colours to use, the default colouring will be used (these can be configured in **Module Settings** by your Administrator)!
{/tip}

### Order

DataSet results can be set and ordered by any column:

- Select the column to order from the drop down menu.

- Click the `+` button to add additional fields.
- Use the advanced order clause for more complex ordering by providing a SQL command.

### Filter

DataSet results can be filtered by any column:

- Use the clause builder to include/omit DataSet results
- Click the `+` button to add additional fields.
- Use the advanced filter clause for more complex filtering by providing a SQL command.

### Caching

Include a suitable time for the **Update Interval** in minutes, keeping it as high as possible. This determines how often the Module will request data from your feed. 

## Actions 

**Available from v3.0.0**

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html)  page for more information.

{nonwhite}

Take a look at the [Chart Module Guide](https://community.xibo.org.uk/t/chart-module-guide/17791) to walk you through how you can produce a Layout to include a Chart.

{/nonwhite}