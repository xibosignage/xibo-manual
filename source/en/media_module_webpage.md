<!--toc=widgets-->
# Webpage

Include the Webpage Widget to Layouts to show an entire Webpage embedded inside a Region. 

{tip}

There is support for **scaling** and **offsetting** the target Webpage to allow for a particular section of a Webpage to be defined to display.

{/tip}

![Add Webpage](img/media_webpage_add.png)

### Link

Provide the **URL** (including `http://`) of the Webpage.

### Name

Provide an optional name.

### Set a duration

Choose to override the default duration.

### Options

Select from 3 options to choose how the Webpage should be embedded:

1. #### **Open Natively**

   The Player will open the Webpage without any alterations and will open and render in the browser as if the URL had been visited on the device outside [[PRODUCTNAME]].

   **Please note:** There is no Layout Designer Preview for this option.

2. #### **Manual Position**

   Embed the Webpage by specifying dimensions which can be used to force the page to fit within certain pre-set dimensions.

   **Page Width** - specify the width of the page

   **Page Height** - specify the height of the page

   **Offset Top** - the top position for the page to start

   **Offset Left** - the left position for the page to start

   **Scale Percentage** - percentage zoom to apply to the Webpage

3. #### **Best Fit**

   Specify a **Page Width** and **Page Height**.

   {tip}

   **Manual Position** and **Best Fit** options will not work with websites that set the **X-Frame-Options header**. If you are unable to see the webpage use the Open Natively option when using Windows / Linux or Android. If X-Frame-Options is set then webOS/Tizen will not work in any mode.

   If X-Frame-Options is not set then the website should show in any of the Players, using any of the above options.

   Use the [X-Frame-Options Header Checker Tool](https://tools.geekflare.com/tools/x-frame-options-test) to see if the header has been set.
   {/tip}

### Background Transparent

Choose to render the Webpage with a transparent background (currently not available on the Windows Player). [[PRODUCTNAME]] will try its best to do this when checked, however, it cannot be supported on some Webpages.

{tip}

After the page is rendered [[PRODUCTNAME]] will scale to fit within the Region.

{/tip}

{tip}

Webpages are not cached by the Display, this Module requires a valid internet connection on the Player in order to function.

{/tip}