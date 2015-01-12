<!--toc=api-->
###  <span class="mw-headline" id="Layout"> Layout </span>

*   LayoutList

*   LayoutAdd

*   LayoutEdit

*   LayoutCopy

*   LayoutDelete

*   LayoutRetire

*   LayoutBackgroundList

*   LayoutBackgroundEdit

*   LayoutGetXlf

*   LayoutRegionList

*   LayoutRegionAdd

*   LayoutRegionEdit

*   LayoutRegionPosition

*   LayoutRegionTimelineList

*   LayoutRegionMediaAdd

*   LayoutRegionMediaReorder

*   LayoutRegionMediaDelete

*   LayoutRegionLibraryAdd

*   LayoutRegionMediaEdit

*   LayoutRegionMediaDetails

##  <span class="mw-headline" id="Layout_2"> Layout </span>

Transactions Related to Layouts

###  <span class="mw-headline" id="LayoutAdd"> LayoutAdd </span>

Parameters

*   layout - The Name of the Layout

*   description - The Description of the Layout

*   permissionid - PermissionID for the layout

*   tags - Tags for the Layout

*   templateid - Template for the Layout

*   resolutionid - Resolution for the Layout (not required if a template is provided)

Response

*   layout - The ID of the layout

Errors

*   Code 1 - Access Denied

*   Code 25001 - Layout Name must be between 1 and 50 characters

*   Code 25002 - Description must be less than 254 characters

*   Code 25003 - All tags combined must be less that 254 characters

*   Code 25004 - User already has a layout with this name

*   Code 25005 - Database error adding layout

*   Code 25006 - Failed to Parse Tags

*   Code 25007 - Unable to update layout xml

*   Code 25008 - Unable to Delete layout on failure

###  <span class="mw-headline" id="LayoutDelete"> LayoutDelete </span>

Parameters

*   layoutId - The ID of the layout to delete

Response

*   success = true

Errors

*   Code 1 - Access Denied

*   Code 25008 - Unable to delete layout

###  <span class="mw-headline" id="LayoutRegionList"> LayoutRegionList </span>

Parameters

*   layoutId

Response

A list of region timelines. Each item will have the following values:

*   regionid

*   width

*   height

*   top

*   left

*   ownerid

*   permission_edit

*   permissions_del

*   permissions_update_permissions

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionAdd"> LayoutRegionAdd </span>

Adds a new Region Timeline to a Layout

Parameters

*   layoutId

*   width

*   height

*   top

*   left

*   name

Response

*   success = true

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionEdit"> LayoutRegionEdit </span>

Edits an existing Region Timeline on a Layout

Parameters

*   layoutId

*   regionId

*   width

*   height

*   top

*   left

*   name

Response

*   success = true

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionDelete"> LayoutRegionDelete </span>

Deletes an existing Region Timeline on a Layout

Parameters

*   layoutId

*   regionId

Response

*   success = true

Error Codes

*   1 - Access Denied

##  <span class="mw-headline" id="Layout_Timelines"> Layout Timelines </span>

Transactions related to layout timelines

###  <span class="mw-headline" id="LayoutRegionTimelineList"> LayoutRegionTimelineList </span>

Parameters

*   layoutId

*   regionId

Response

A list of media items on a region timeline. Each item will have the following values:

*   mediaid

*   lkid

*   mediatype

*   duration

*   permission_edit

*   permission_del

*   permission_update_duration

*   permission_update_permissions

Error Codes

*   1 - Access Denied

## LayoutRegionMediaDetails

### Parameters

<dl>
    <dt>layoutId</dt>
    <dd>The ID for this Layout. Required.</dd>
</dl>
<dl>
    <dt>regionId</dt>
    <dd>The ID for this Region. Required</dd>
</dl>
<dl>
    <dt>mediaId</dt>
    <dd>The ID for this media. Required</dd>
</dl>
<dl>
    <dt>type</dt>
    <dd>The media type. Required</dd>
</dl>

### Response

The XLF for the provided media id (XML format). Base 64 encoded.
<pre>
{
    "media": {
        "id": "1",
        "base64Xlf": "base64"
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

###  <span class="mw-headline" id="LayoutRegionMediaAdd"> LayoutRegionMediaAdd </span>

Parameters

*   layoutId

*   regionId

*   type (the type of media item being added)

*   xlf (the xibo layout file xml representing the media to add)

The XLF will be checked for the attributes that are required for all media type. It is the callers responsibility to ensure media type specific attributes are set correctly.

Response

<pre> The Media ID added
</pre>

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionLibraryAdd"> LayoutRegionLibraryAdd </span>

Parameters

*   layoutId

*   regionId

*   mediaList (A list of media id's from the library that should be added to to supplied layout/region)

Response

<pre>success (true|error)
</pre>

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionMediaEdit"> LayoutRegionMediaEdit </span>

Parameters

*   layoutId

*   regionId

*   mediaId

*   xlf (the xibo layout file xml representing the media to add)

The XLF will be checked for the attributes that are required for all media type. It is the callers responsibility to ensure media type specific attributes are set correctly.

Response

<pre>success (true|error)
</pre>

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionMediaReorder"> LayoutRegionMediaReorder </span>

Parameters

*   layoutId

*   regionId

*   mediaList (array('mediaid' =&gt; _, 'lkid' =&gt; 0))_

Response

*   success (true|false)

Error Codes

*   1 - Access Denied

###  <span class="mw-headline" id="LayoutRegionMediaDelete"> LayoutRegionMediaDelete </span>

Parameters

*   layoutId

*   regionId

*   mediaId

Response
success (true|error)

Error Codes

*   1 - Access Denied