<!--toc=widgets-->
# DataSet Ticker

The DataSet Ticker Widget is used with DataSets to display information as a Ticker. 

DataSets need to be created and defined prior to adding the DataSet Ticker Widget to Layouts. Please see the  [DataSet](media_datasets.html)  page for further information.

## Add Widget

Click DataSet Ticker from the [Widget](layouts_widgets.html)  toolbar and click to add or drag and drop![DataSet Ticker Widget](img\v2_media_datasetticker_widget.png)

{tip}
If you are using 1.8.x CMS, DataSets can be displayed using a Ticker Widget. Please use the following link :[Ticker 1.8](media_module_ticker_1.8.html)
{/tip}

On adding, select the DataSet to use from the drop-down menu:

![DataSet Ticker Add DataSet](img\v3_media_datasetticker_add_dataset.png)

{tip}
Once a DataSet has been associated with the Widget you cannot edit to change to an alternative set of data. A new Widget would need to be added and configured!
{/tip}

Once Saved, configuration options are shown in the the Edit DataSet Ticker form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.
- Select whether the duration is to be per item or leave unticked to set the duration per feed.

{tip}
This should be used with caution as it can create long-running media items. It is recommended to use this setting in conjunction with a setting to limit the number of items shown!
{/tip}

### Configuration

![DataSet Ticker Configuration](img\v3_media_datasetticker_configuration.png)

- Select if returned items should be shown side by side and configure **Upper** and **Lower** row limits.
- Set the number of items you wish to display.


{tip}
From v2.3.8 use the **Randomise** option to randomly shuffle items to de displayed in a random sequence.
{/tip}

### Appearance

- Optionally select a background colour
- Use the drop-down menu to select an **Effect** to be used to transition between items.
- Set the **Speed** for the effect selected.
- Enter how many Items should appear on each page if an effect to split items has been selected.

### Templates

Click on the Template tab to show the DataSet Ticker Templates:

![DataSet Ticker Template](img\v3_media_datasetticker_templates.png)

### Main Template

- Select **Main**

- Toggle **On** the Visual editor to format the main template using the inline editor. 
- Click the edit icon to open.

![DataSet Ticker Inline Editor](img\v3_media_datasetticker_inline_editor.png)

- Include text merge fields from the **Snippets** menu to pull in the required information from the DataSet.

### No Data Template

Include a message to ensure that your audience is not left with blank displays when there is no data to display.

### Optional Stylesheet

Include CSS to apply to the template structure. 

{tip}
This optional template is intended for advanced users to 'tweak' the CMS generated output!
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

Players can **cache** the content of this media for off-line playback and to prevent repeated downloads. Keep this number as high as possible.

{tip}
From v3.0.0 set a 'freshness check' to determine when to switch to the **No Data Template** when a Player is offline!
{/tip}

## Actions 

**Available from v3.0.0**

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html)  page for more information.















