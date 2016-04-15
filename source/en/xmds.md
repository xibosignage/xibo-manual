<!--toc=api-->
# [[PRODUCTNAME]] Media Distribution Service
XMDS is a SOAP API published by the CMS and consumed by the Player applications. It is described by a WSDL which can be parsed by many IDEs and tools to produce *client methods* to call the API (for example you can set up a web reference in Visual Studio).

The SOAP service is published over HTTP and HTTPS. HTTPS is the recommended end point.

## Information Exchange
The following pieces of information are exchanged between the CMS and the Players at regular intervals. The exact interval is defined by the `collectionInterval` configured for the Display.

 - Register
 - Required Files
 - Schedule
 - File Download
 - Resource Download *
 - Media Inventory Status
 - Logging
 - Proof of Play Statistics

The 1.7 CMS introduced 2 more

 - Screenshot *
 - Status *

The starred services communicate outside the collection interval because they are driven be events that occur during normal running of the player.


## Security
The CMS is configured with a `secret CMS key` which is a required parameter for all information exchange. The Player is assigned a `hardware key` which is used to identify the player as a **Display** in the CMS. **HTTPS** is recommended at all times to prevent the discovery of this information by a 3rd party.


## Versioning
The API provides various schema versions:

 - v3 - for use by players prior to 1.7
 - v4 - for use by players 1.7
 - v5 - for use by players 1.8+

A `v3` player will only be allowed to connect if it has already been registered to the CMS. This encourages new players
 to be commissioned with the latest versions. v5 will allow v4 registrations but will prevent access to [XMR](xmr.html).

# Methods
Information exchanged between the Player and CMS is driven by the Player connecting to the CMS and calling the appropriate method.

## Life Cycle
It is the decision of the author to decide how the XMDS service is called, however the current players implement guidelines which produce a stable, reliable result.

There are two types of calls, those that happen on the collection interval and those than happen at run time.

### Collection Interval
Each collection interval a set of calls are made to the CMS - some of which can be run in parallel. The required sequence is shown in the numbered list below.

 1. Register Display
 2. Required Files
 3. Schedule
 4. Get File / Resource
 5. Media Inventory
 6. Submit Stats
 7. Submit Logs

The Player must call `RegisterDisplay` first and parse the response from the Player, if it is not registered it should stop there and not call the subsequent methods. In this case it is common to check at the next collection interval.

The Windows Player calls `RegisterDisplay` during its configuration in the Player Options screen. Even so it must also be called on a timer so that updated settings are received and actioned.

Once registered the player may then call `RequiredFiles` and `Schedule`. It is important that all Layouts in the `Schedule` are checked for validity before they are shown as they will appear in `Schedule` and `RequiredFiles` at the same time and may not get have all their files downloaded.

Upon a successful call to `RequiredFiles` the Player must parse the response and queue a `GetFile` request for each layout, media and/or resource *required file*.

Upon a successful call to `Schedule` the Player must parse the response and determine which Schedules should be put in rotation based on their `from` and `to` dates.

Each time a `GetFile` call completes the Player should call `MediaInventory` with the status of each Required File vs. its cache of those files.

Once complete the Player may submit its cached Stat/Log records to the CMS for processing.

### Run Time
The run time calls occur outside the normal collection interval and are executed in response to certain events.

#### Resource Download
When a Media item is shown on a Layout by the Player it may be necessary to get an updated set of "resource content". This content is CMS provided HTML that represents how the Player should display the Media. It should be downloaded and shown in a web view.

Resource content should always be cached locally so that the Player can decide the content is fresh or in the event the CMS is unavailable.

#### Submit Screen shot
The Player can submit a screen shot of the current output to the CMS.

#### Notify Status
The player should notify the status when the storage usage significantly changes and when a new layout is shown (if notify current layout is set).

## Definition v4/v5
The definition of the SOAP service can be automatically consumed from the WSDL at `//xmds.php?v=4&wsdl` or `//xmds.php?v=5&wsdl`.

There are 2 common parameters to all Method calls:

 - serverKey: The secret CMS server key.
 - hardwareKey: The Player hardware key used to identify this Player as a Display.

### RegisterDisplay
Register Display is used to add a new display to the CMS or receive updated settings for an existing display.

It takes the following parameters:

 -  serverKey
 -  hardwareKey
 -  displayName
 -  clientType
 -  clientVersion
 -  clientCode
 -  operatingSystem
 -  macAddress

V5 introduced 2 additional parameters:

 - xmrChannel
 - xmrPubKey

It returns the following XML string:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<display date="2015-01-01 00:00:00" timezone="Europe/London" status="0" code="READY" message="Display is active and ready to start." version_instructions="" localDate="2015-01-01 00:00:00 +/- timezone">
   <settingsNode>One or more settings nodes</settingsNode>
   <commands>
        <commandName>
            <commandString></commandString>
            <validationString></validationString>
        </commandName>
   </commands>
</display>
```

The Player should interpret the `code` attribute on the root node to see if the Display has been granted access and "licensed" with the CMS. *An administrator can licence a display by logging into the Web Portal, Editing the Display and selecting Licence = Yes*.

The `settingsNodes` are dependent on the `clientType` provided.

The `<commands>` element was introduced in `v5` and contains a list of commands and their command strings. The `<commandName>`
 changes with each command to indicate the actual command code as registered in the CMS.

The `localDate` attribute is only available in CMS 1.8 and above (`v5` and `v4`) and will provide the local display date/time according to the *Display Timezone* setting
configured in the Display Profile.

#### XMR
When connected to a `v5` CMS the player is expected to generate a RSA pub/private key and a unique channel. It is expected
 to provide these details to the CMS on each register call.

The CMS will use the pub key to encrypt any messages sent to the Player on the XMR Public Address. The Player should
 subscribe to the XMR Public Address using the Channel it sent to `RegisterDisplay`.

Messages sent through XMR are encrypted using `openssl_seal` and should be decrypted accordingly.

### RequiredFiles
The required files method returns all files needed for the Player to play its scheduled Layouts entirely offline for the quantity of time specified by the `REQUIRED_FILES_LOOKAHEAD` setting in the CMS. This setting defaults to 4 days.

It takes the following parameters:

 - serverKey
 - hardwareKey

It returns the following XML string:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<files>
   <file type="media" id="493" size="40408" md5="c90a4c420dd010a5e95dedb8927a29e7" download="xmds" path="weathericons-regular-webfont.woff" />
   <file type="layout" id="29" size="303" md5="5e6ef3b612b39c83bf8c5cf9f2a75ef5" download="xmds" path="29" />
	<file type="resource" id="29" layoutid="1" regionid="3" mediaid="5" updated="102984759" />
</files>
```

Each `file` node contains the following attributes:

 - type: Either media, layout or resource
 - id: A unique ID for the file

Layout and Media file nodes also contain:

 - size: The file size
 - md5: A MD5 of the file to be used as a checksum
 - download: Either xmds or http
 - path: The intended save path

Resource file nodes also contain:

 - layoutid: The layoutId that references this resource.
 - regionid: The regionId that references this resource.
 - mediaid: The mediaId that references this resource.
 - updated: A timestamp indicating the last time this resource was updated.

The required files XML should be parsed and any files that are missing from the local cache OR that have a different MD5 should be downloaded again.

#### Download Type
The CMS supports downloading files over XMDS directly or over directly over HTTP. If HTTP downloads are enabled the `path` attribute will contain a fully qualified download path and a new attribute named `saveAs` will be present showing the intended save path.

HTTP downloads are only valid for one usage and are refreshed with a new `path` each time `RequiredFiles` is called.

When the download mode is `xmds` the Player should call `GetFile`.

#### Resource Files
Resource files are downloaded using the `GetResource` call. The Player implementation is free to save these files with whatever name is most suitable. The Layout XML contains the layout, region and media Ids that can be used to return the relevant cached resource file.

### GetFile
The `GetFile` method is used to request a chunk (part) of a specific file id. This file **must** have been present in the `RequiredFiles` return otherwise it will not be served.

The `chunkSize` is left to the implementer and should be suitable for the type of network the Player is installed on. It should be noted that the smaller the `chunkSize`, the more I/O load there will be on the CMS.

It takes the following parameters:

 - serverKey
 - hardwareKey
 - fileId: The ID of the file being downloaded.
 - fileType: The type of the file being downloaded.
 - chunkOffset: The offset for the current file chunk being requested. Starts as 0.
 - chunkSize: The size for the current file chunk.

It returns base64 encoded binary data representing the requested file, offset and size. The Player is responsible for reassembling the file and checking the MD5 of the completed file against the one provided in `RequiredFiles`.

### GetResource
The `GetResource` method is used to request the HTML representation of a media item on a Layout in a Region. The CMS will calculate the necessary HTML to correctly display that media item once opened in a correctly sized webview.

The Layout XLF determines when a resource file should be loaded or when a native component is needed.

### MediaInventory
The `MediaInventory` method is used by the Player to update the status of its cached files in the CMS. The CMS uses this information to present the status of each Display in the "Displays" page.

It takes the following parameters:

 - serverKey
 - hardwareKey
 - mediaInventory: XML representation of currently cached files vs required files.

#### Media Inventory
The XML structure for media inventory is:

``` xml
<files>
	<file id="1" complete="0|1" md5="c90a4c420dd010a5e95dedb8927a29e7" lastChecked="1284569347" />
</files>
```

 - id: the ID of the file.
 - complete: whether the file is complete or not.
 - md5: the md5 of the file in the local cache.
 - lastChecked: a unix date/time for when the file was last by the player checked.



### Schedule
The `Schedule` method call provides the Player with a date/time aware set of Layouts that need to be played. The time window of schedule returned is controlled by the CMS setting `REQUIRED_FILES_LOOKAHEAD` if the `SCHEDULE_LOOKAHEAD` setting is `On`.

It takes the following parameters:

 - serverKey
 - hardwareKey

It returns XML in the following format for v5:

```xml
<schedule>
	<default file="4">
	    <dependents>
	        <file>5.jpg</file>
	    </dependents>
	</default>
	<layout file="5" fromdt="" todt="" scheduleid="" priority="">
	    <dependents>
            <file>5.jpg</file>
        </dependents>
	</layout>
	<dependents>
		<file>5.jpg</file>
	</dependents>
	<command code="CODE" date="" />
	<overlays>
	    <overlay file="5" fromdt="" todt="" scheduleid="" priority=""></overlay>
	</overlays>
</schedule>
```

It returns XML in the following format for v4 and below:

```xml
<schedule>
	<default file="4" />
	<layout file="5" fromdt="" todt="" scheduleid="" priority="" dependents="" />
	<dependents>
		<file>5.jpg</file>
	</dependents>
</schedule>
```

The from and to dates are ISO formatted dates in the CMS time zone.

#### Default Layout
If there aren't any Layouts in the Schedule window then the default Layout should be shown. If the Display is set to *interleave default* in the CMS then the Layout will appear as a `<layout>` element and no additional logic is required.

#### Priority
The priority attribute determines whether a Layout is in the priority schedule or normal schedule. Priority schedules should be shown in preference to normal ones.

The attribute will either be empty or contain an integer value - when empty a value of 0 should be assumed. Only the highest priority layouts should be included in the schedule
at any time.

#### Dependants
A list of global dependencies is provided in the `dependents` element. This is a list of files that must be in the cache before any Layouts can be considered valid. These *global dependencies* are provided as the first entries in `RequiredFiles` XML.

A Layout may also have dependents specific to itself and these are provided either as an attribute on the layout node (v3,v4) or as a `<dependents>` child node (v5). Layout specific dependents should be checked in the off-line cache before the Layout is considered for playback.

**Starting in v5 the default layout also has a `<dependents>` child node.**

#### Overlays
**Starting in v5** overlay nodes may be provided in the overlays element. These describe layouts that should be overlaid on top of the normal layout schedule.

Overlays have a from/to dt, scheduleId and priority which have the same meaning as a normal `layout` node. The order of `overlay` nodes determines the order in which the overlay
layout regions should be applied, starting with the first and stacking on top.

Overlays should be applied on top of the existing Layout schedule and remain there while they are still considered to be in the schedule.

### SubmitLog
The `SubmitLog` method is used by the Player to send useful audit/error logging information back to the CMS. The log messages should be kept to a minimum to prevent unnecessary traffic. The log level is defined in the Display Settings and defaults to "error".

It takes the following parameters:

 - serverKey
 - hardwareKey
 - logXml: XML representation for Log Messages

#### Log XML
The structure for Log XML is as follows:

``` xml
<logs>
	<log date="" category="" type="" message="" method="" thread=""></log>
</logs>
```

 - date: The local date, ISO formatted.
 - category: Either error or audit. Audit messages are discarded unless auditing is switched on globally and on the display.
 - type (optional): The type.
 - message: The log message
 - method (optional): The method.
 - thread (optional): The Thread that the log message executed on.



### SubmitStats
The `SubmitStats` method is used to report Proof of Play statistics to the CMS.

It takes the following parameters:

 - serverKey
 - hardwareKey
 - statXml: XML representation for Proof of Play Statistics

#### Stat XML
The structure for Stat XML is as follows:

``` xml
<stats>
	<stat type="" fromdt="" todt="" scheduleid="" layoutid="" mediaid=""></stat>
</stats>
```

 - type: The type of stat record, either layout or media.
 - fromdt: The ISO date that the layout/media started playing.
 - todt: The ISO date that the layout/media finished playing.
 - scheduleid: The ID of the schedule that caused the Layout/Media to be shown.
 - layoutid: The layoutId.
 - mediaid: The mediaId



### NotifyStatus
The `NotifyStatus` method is used by the Player to update the CMS on various events in the Player life cycle.

It takes the following parameters:

 - serverKey
 - hardwareKey
 - status: JSON encoded key/value string of properties to update on the display.

Properties supported by `status` are:

``` json
{
	"currentLayoutId": "The ID of the Current Layout",
	"availableSpace": "The bytes of available space",
	"totalSpace": "The bytes of total space"
}
```

### SubmitScreenShot
The `SubmitScreenShot` method call is used by the Player to send a screen shot of the current playback to the CMS. The instruction to send a screen shot appears in the `RegisterDisplay` call settings.

It takes the following parameters:

 - serverKey
 - hardwareKey
 - screenShot: Base64 encoded binary representation of the screen shot image.
