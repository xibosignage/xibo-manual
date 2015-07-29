<!--toc=api-->
# [[PRODUCTNAME]] Layout Format - XLF
XLF is a standard XML document used to completely describe a Layout and its resources. The CMS manages the creation of XLF files and will insure they are valid XML before transmission to the Player.

It is the Player's sole responsibility to parse the Layout files, request any necessary resources and put the Layout on screen for playback.

To simplify the explanation the XLF will be considered in two parts:

 - Structure
 - Media

## Structure
The Layout structure defines the layout width, height and the regions it is divided into. It can also define the background properties.

The structure part of a Layout XLF is shown below:

``` xml
<layout schemaVersion="3" width="1920" height="1080" background="126.jpg" bgcolor="#FF3399">
    <region id="1" width="1920" height="1080" top="0" left="0" zindex="1">
        <media>...</media>
		<options>
			<loop>0</loop>
			<transitionType></transitionType>
			<transitionDuration></transitionDuration>
			<transitionDirection></transitionDirection>
		</options>
    </region>
	<tags>
		<tag>default</tag>
	</tags>
</layout>
```

This is a 1080p landscape Layout with a single full screen region.

 - schemaVersion: The schema version for this Layout.
 - width: The Layout Width.
 - height: The Layout Height.
 - background: The path to the background image.
 - bgcolor: A HEX colour for the background.

### Dimensions 
The XLF provides the width/height of the Layout and the width/height/position of each region. This should be used alongside the Player Dimensions to reconstruct the Layout at the appropriate aspect ratio. Simply put, the Player should scale the Layout according to the Player Dimensions.

### Options
A region node provides additional options in its `<options>` node. These are optional elements and should be provided with sensible defaults in the Player.

#### Loop
The Loop option is only applicable when there is only 1 media item in the region. It controls whether that one media item should be reloaded or not. The default is 0 (don't loop).

#### Transition
The Transitions attached to the Region are referred to as "Region Exit Transitions". They are the transition that should be shown when the Layout is finishing. Transitions are described in more detail in the Media section.

## Media
Media appears as `<media>` nodes within `<region>` nodes on a Layout. Media should be played in the order is appears in the XLF.

Media Nodes have attributes common to all types of Media and Options Nodes which are specific to the Media Module. There are set of core modules documented here, 3rd party modules should provide their own documentation notes.

``` xml
<media id="" duration="" type="" render="">
	<options>
		<uri></uri>
		<transIn></transIn>
		<transInDuration></transInDuration>
		<transInDirection></transInDirection>
		<transOut></transOut>
		<transOutDuration></transOutDuration>
		<transOutDirection></transOutDirection>
	</options>
	<raw>

	</raw>
</media>
```

 - id: The `mediaId` of this media node
 - duration: The duration in seconds that this media item should be played
 - type: The type of media module
 - render: The render type, either native or html
 - options -> uri: The uri of the save location as presented in `RequiredFiles`. This is common to all library based media.

### Type and Render
The Media Node contains a type which the Player can use to determine how that type of Media should be shown. This is particularly important if the `render` attribute is `native`. Native rendering means that the CMS does not provide a HTML file for the Player to show and that the Player should be responsible for implementing the logic to render that item.

Some media items are set to render `native` but can actually be rendered in `html` at the discretion of the implementer. This HTML files are provided for convenience.

A list of media types and their associated render options can be found below:

``` json
[
   {
      "Module":"Image",
      "render":"native"
   },
   {
      "Module":"Video",
      "render":"native"
   },
   {
      "Module":"Flash",
      "render":"native"
   },
   {
      "Module":"PowerPoint",
      "render":"native"
   },
   {
      "Module":"Webpage",
      "render":"native"
   },
   {
      "Module":"Ticker",
      "render":"native"
   },
   {
      "Module":"Text",
      "render":"native"
   },
   {
      "Module":"Embedded",
      "render":"native"
   },
   {
      "Module":"datasetview",
      "render":"native"
   },
   {
      "Module":"shellcommand",
      "render":"native"
   },
   {
      "Module":"localvideo",
      "render":"native"
   },
   {
      "Module":"clock",
      "render":"html"
   },
   {
      "Module":"forecastio",
      "render":"html"
   }
]
```

The following `native` modules can be rendered using the HTML returned by `GetResource`.

 - DataSet View
 - Embedded (may need to adjust transparency)
 - Text
 - Ticker
 - Web Page (may need to open natively)

These media items predate the "render" mode on Modules and will be converted in due course where appropriate.

### Duration
Each Media item represented in the XLF has a duration in seconds attribute. This represents the total time the Player should show that item before moving on to the next.

All media cycling in the Player should be driven by the Duration. This means that a Layout is shown for the duration of the longest set of media.

### Transitions
Media options include instructions for showing transitions at the start and end of each media item, described as In and Out. Each of the two transitions have the following 3 properties:

 - Type: The type of transition, currently supported are Fade In, Fade Out and Fly.
 - Duration: This is the duration in milliseconds that the transition should run for.
 - Direction: This is a compass point set of directions for the transition (only applicable for fly). N, NE, E, SE, S, SW, W, W, NW.

# Modules
The term `Modules` is used by [[PRODUCTNAME]] to represent the different types of Media. The term is being phased out in 1.8 to `Widgets`.

Essentially both modules and widgets are short terminology for "assigning media to a region in a layout".

## Image
Images are library items and will be transferred to the Player via `RequiredFiles`. By default the CMS allows JPG, PNG, GIF and BMP images to be uploaded. Image media nodes contain the `uri` option which matches the `path` attribute provided in `Required Files`. The Player should use this to locate the cached file.

The Player is responsible for natively rendering images according to the following options:

 - scaleType: Either center or stretch.
 - align: Either left, center or right.
 - valign: Either top, middle or bottom.

## Video
Videos are library items and will be transferred to the Player via `RequiredFiles`. By default the CMS allows WMV, AVI, MP4 and WEBM videos to be uploaded. Video media nodes contain the `uri` option which matches the `path` attribute provided in `Required Files`. The Player should use this to locate the cached file.

The Player is responsible for natively rendering videos according to the following options:

 - loop: Play the video for its full duration and loop if it finishes before the duration is reached.
 - mute: Mute the video.

### Duration
Videos can have a special duration attribute of "0" which means "end detect". This allows the user to assign a video widget to the Layout without having to assess its duration. When a duration of 0 is provided it is the Players responsibility to detect when that video has completed and advance to the next item.

When a duration of 0 is provided the `loop` option should be ignored.

## Flash and PowerPoint
Flash and PowerPoint have limited support on the Windows Player and rely on the underlying application being available.

They are both library items transferred to the Player via `RequiredFiles`.

There are no additional options with these widgets.

## Web Page
Web Page widgets provide rendered HTML via `GetResource`. However they also provide a `modeId` option which is used to determine whether the web page should be opened natively or via the rendered HTML.

When the `modeId` is equal to 1 the Player should parse the `url` option and open that directly in a web view.

## Embedded
Embedded widgets provide rendered HTML via `GetResource`. They also provide a `transparency` option which is used to determine if the web view should be transparent.

## Shell Commands
The Shell Command widget exists to execute Shell Commands on a Layout. It provides two options:

 - windowsCommand
 - linuxCommand

It is the players responsibility to sanitize and execute these commands in a Shell.

## Get Resource
Using the rendered HTML provided by the CMS is entirely at the Players discretion. All widget options are also provided on each Media node should the Player implementation require native rendering of any other types of media.

Rendered HTML should be loaded in a transparent Web View unless otherwise stated by a `transparency` option.

### Additional Data
Some widget (such as Ticker / DataSet) provide additional data in the `GetResource` HTML which is used to adjust the duration of the media item. For example Tickers have an option to use the duration setting as a duration per item.

These options are provided as HTML tags which can be parsed by the Player and used to adjust the duration accordingly. They are:

 - `<!-- NUMITEMS= -->`: Informational tag containing the number of items in the resource.
 - `<!-- DURATION= -->`: Calculated total duration for this media item.

