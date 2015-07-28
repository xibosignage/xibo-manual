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
 
The Player should scale the Layout according to the Player Dimensions.

## Media
Media appears as `<media>` nodes within `<region>` nodes on a Layout. Media should be played in the order is appears in the XLF.

Media Nodes have attributes common to all types of Media and Options Nodes which are specific to the Media Module. There are set of core modules documented here, 3rd party modules should provide their own documentation notes.

``` xml
<media id="" duration="" type="" render="">
	<options>
		<uri></uri>
	</options>
	<raw>

	</raw>
</media>
```