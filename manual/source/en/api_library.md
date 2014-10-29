<!--toc=api-->
###  <span class="mw-headline" id="Library"> Library </span>

*   LibraryMediaFileUpload

*   LibraryMediaFileRevise

*   LibraryMediaAdd

*   LibraryMediaEdit

*   LibraryMediaRetire

*   LibraryMediaDownload

*   LibraryMediaList

Transactions related to the Library

## LibraryMediaFileUpload

### Parameters

<dl>
    <dt>fileId</dt>
    <dd>The ID for this File. NULL for the first call, required thereafter.</dd>
</dl>
<dl>
    <dt>checksum</dt>
    <dd>A MD5 checksum for the payload</dd>
</dl>
<dl>
    <dt>payload</dt>
    <dd>A base64 encoded string representing the file content.</dd>
</dl>

### Response

<pre>
{
    "file": {
        "id": "3",
        "offset": 164
    },
    "status": "ok"
}
</pre>

### Errors

*   1 - Access Denied

*   2 - Payload Checksum doesn't match provided checksum

*   3 - Unable to add File record to the Database

*   4 - Library location does not exist

*   5 - Unable to create file in the library location

*   6 - Unable to write to file in the library location

*   7 - File does not exist

###  <span class="mw-headline" id="LibraryMediaAdd"> LibraryMediaAdd </span>

Parameters

*   fileId

*   type (image|video|flash|ppt)

*   name

*   duration

*   fileName (including extension)

Response

*   MediaID

Errors

*   Code 1 - Access Denied

*   Code 10 - The Name cannot be longer than 100 characters

*   Code 11 - You must enter a duration

*   Code 12 - This user already owns media with this name

*   Code 13 - Error inserting media into the database

*   Code 14 - Cannot clean up after failure

*   Code 15 - Cannot store file

*   Code 16 - Cannot update stored file location

*   Code 18 - Invalid File Extension

###  <span class="mw-headline" id="LibraryMediaEdit"> LibraryMediaEdit </span>

Parameters

*   mediaId

*   name

*   duration

Response

*   success

Errors

*   1 - Access Denied

*   10 - The Name cannot be longer than 100 characters

*   11 - You must enter a duration

*   12 - This user already owns media with this name

*   30 - Database failure updating media

###  <span class="mw-headline" id="LibraryMediaFileRevise"> LibraryMediaFileRevise </span>

Parameters

*   mediaId

*   fileId

*   fileName (including extension)

Response

*   mediaId

Errors

*   1 - Access Denied

*   13 - Error inserting media into the database

*   14 - Cannot clean up after failure

*   15 - Cannot store file

*   16 - Cannot update stored file location

*   18 - Invalid File Extension

*   31 - Unable to get information about existing media record

*   32 - Unable to update existing media record

###  <span class="mw-headline" id="LibraryMediaRetire"> LibraryMediaRetire </span>

Parameters

*   mediaId

Response

*   success

Error Codes

*   1 - Access Denied

*   19 - Error retiring media

###  <span class="mw-headline" id="LibraryMediaDelete"> LibraryMediaDelete </span>

Parameters

*   mediaId

Response

*   Success = True

Error Codes

*   1 - Access Denied

*   20 - Cannot check if media is assigned to layouts

*   21 - Media is in use

*   22 - Cannot locate stored files, unable to delete

*   23 - Database error deleting media