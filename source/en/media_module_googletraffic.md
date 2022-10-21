<!--toc=widgets-->

# Google Traffic

Display traffic data configured with a Google Maps API key on Layouts.

{version}
IMPORTANT: This Module requires a Google API key which has associated usage charges. Please make sure you are aware of the usage charges before entering your key in this Module's configuration.
{/version}

{feat}Google Traffic Maps Widget|v3{/feat}

## Installation

The Google Traffic Module must be configured with a Google Maps API key before use. The "[get a key](https://developers.google.com/maps/documentation/javascript/get-api-key)" documentation describes the process and differences between the keys.

The Google Traffic Module is installed from the Modules page under the Administration section of the menu. Click on the **Install Module** button and select the Module to install.

After installation, select the Module from the grid and use the row menu to select **Edit**.

Complete the form fields and include the **API key**. This form also contains settings to provide a **default duration** and a **minimum duration**. Please make sure you understand these two settings and configure them in a suitable way for your environment.

**Please note:** The Google API is charged per map load and therefore how long the Widget remains on screen has a direct relation on the charges you will accrue.

{tip}
Until an API key is entered the Widget will not render in the Layout Designer or the Player, although you can still add the Widget to your Layouts.

This Module requires a **valid internet connection** on the Player in order to function.
{/tip}

The Google Maps API terms of use must be read and understood before using this Module. At the time of writing these terms can be found [here](https://developers.google.com/maps/terms).

## Add Widget

The Google Maps API terms of use must be read and understood before using this Module. At the time of writing these terms can be found [here](https://developers.google.com/maps/terms).

Locate **Google Traffic** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region. 

{version}
NOTE: If you are using a 1.8.x CMS, select Google Traffic from the Widget Toolbox to add. 
{/version}

On adding, configuration options are shown in the Edit Google Traffic form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

### Configuration

- Tick to use the **Display Location** to use the **Latitude** and **Longitude** recorded for the Display or untick to manually enter.

  {tip}
  Use the display location so that you can have 1 Layout of **Traffic Data** that can be reused on multiple Displays to show the traffic in the correct location on each Display.
  {/tip}

- Select how close/far away the aerial view of the map will be. The higher the number entered the closer the view to ground level will be with a zoom of 1 being the whole globe.

## Actions

**Available from v3.0.0**

Interactive Actions can be attached to this Google Traffic Widget from the **Actions** tab. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.