# [[PRODUCTNAME] Media Distribution Service
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
The API provides two schema versions:

 - v3 - for use by players prior to 1.7
 - v4 - for use by players 1.7+

A `v3` player will only be allowed to connect if it has already been registered to the CMS. This encourages new players to be commissioned with the latest versions.

# Methods
Information exchanged between the Player and CMS is driven by the Player connecting to the CMS and calling the appropriate method.

## Life Cycle
It is the decision of the author to decide how the XMDS service is called, however the current players implement guidelines which produce a stable, reliable result.

There are two types of calls, those that happen on the collection interval and those than happen at run time.

### Collection Interval
Each collection interval a set of calls are made to the CMS - some of which can be run in parallel. The required sequence is shown in the numbered list below.

 1. Register Display
 2. - Required Files
	- Schedule
 3. Get File / Resource
 4. Media Inventory
 5. - Submit Stats
	- Submit Logs

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

#### Submit Screenshot
The Player can submit a screenshot of the current output to the CMS.

#### Notify Status
The player should notify the status when the storage usage significantly changes and when a new layout is shown (if notify current layout is set).

## Definition v4
The definition of the SOAP service can be automatically consumed from the WSDL at `//xmds.php?v=4&wsdl`.

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

It returns the following XML string:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<display status="0" code="READY" message="Display is active and ready to start." version_instructions="">
   <settingsNode>One or more settings nodes</settingsNode>
</display>
```

The Player should interpret the `code` attribute on the root node to see if the Display has been granted access and "licensed" with the CMS. *An administrator can licence a display by logging into the Web Portal, Editing the Display and selecting Licence = Yes*.

The `settingsNodes` are dependent on the `clientType` provided.

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
	<file type="resource" id="29" layoutid="1" regionid="3" mediaid="5" updated="102984759" download="xmds" path="29" />
</files>
```

Each `file` node contains the following parameters:

 - type: Either media, layout or resource
 - id: A unique ID for the file
 - download: Either xmds or http
 - path: The intended save path

Layout and Media file nodes also contain:

 - size: The file size
 - md5: A MD5 of the file to be used as a checksum
 
Resource file nodes also contain:

 - layoutid: The layoutId that references this resource.
 - regionid: The regionId that references this resource.
 - mediaid: The mediaId that references this resource.
 - updated: A timestamp indicating the last time this resource was updated.

### GetFile

### Schedule
### SubmitLog
### SubmitStats
### MediaInventory
### GetResource
### NotifyStatus
### SubmitScreenShot

