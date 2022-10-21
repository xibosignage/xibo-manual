<!--toc=widgets-->

# Webpage

Display an entire webpage embedded inside a Region on Layouts.

{feat}Webpage Widget|v3{/feat}

{tip}
**Please note:** This Widget requires a valid internet connection in order to function, webpages are not cached by the Player.

There is support for **scaling** and **offsetting** the target webpage to allow for a particular section of a webpage to be defined to display.
{/tip}

## Add Widget

Locate **Webpage** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a 1.8.x CMS, select Webpage from the Widget Toolbox to add. 
{/version}

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

## Configuration

![Webpage Configuration](img\v3.1_media_webpage_configuration.png)

- Provide the **URL** (including `http://`) of the webpage.
- Use the checkbox to render the webpage with a transparent background. (Available from R253 for the Windows Player). [[PRODUCTNAME]] will try its best to do this when checked, however, it cannot be supported on some webpages.

{tip}
After the page is rendered [[PRODUCTNAME]] will scale to fit within the Region.
{/tip}

- Tick to **Preload** the Widget off screen so that it is ready to be shown.

- Select from the available **Options** to choose how the webpage should be embedded:


#### **Open Natively**

The Player will open the webpage without any alterations and will open and render in the browser as if the URL had been visited on the device outside [[PRODUCTNAME]].
**Please note:** There is no preview available for this option.

{version}
From v3.1.0, **Open Natively** has an additional option to provide code to be triggered on page load error.
{/version}

#### **Manual Position**

Embed the webpage by specifying dimensions which can be used to force the page to fit within certain pre-set dimensions.

- Specify the width of the page (leave empty to use the Region width)
- Specify the height of the page (leave empty to use the Region height)
- Starting point from the top for the page to start, in pixels
- Starting point from the left, in pixels
- Percentage (0-100) to scale this Webpage

#### **Best Fit**

- Specify the width of the page (leave empty to use the Region width)
- Specify the height of the page (leave empty to use the Region height)

{tip}
**Manual Position** and **Best Fit** options will not work with websites that set the **X-Frame-Options header**. If you are unable to see the webpage use the Open Natively option when using Windows / Linux or Android. If X-Frame-Options is set then webOS/Tizen will not work in any mode.

If X-Frame-Options is not set then the website should show in any of the Players, using any of the above options.

Use the [X-Frame-Options Header Checker Tool](https://tools.geekflare.com/tools/x-frame-options-test) to see if the header has been set.
{/tip}

- Enter a code identifier for a **Navigate to Layout** Action should the page return an error and not load. See Interactive Actions for further details!

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Webpage Widget from the **Actions** tab in the properties panel. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.