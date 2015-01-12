<!--toc=api-->
##  <span class="mw-headline" id="Request_Formats"> Request Formats </span>

Xibo supports the following request formats

*   REST

###  <span class="mw-headline" id="REST"> REST </span>

A simple POST or GET.

To request the Xibo Version method:

<pre>services.php?service=rest&amp;method=version
</pre>

By default the response type is xml. To get a different response type send "&amp;response="

##  <span class="mw-headline" id="Response_Types"> Response Types </span>

Xibo supports the following response types

*   JSON (not implemented)

*   XML

###  <span class="mw-headline" id="JSON"> JSON </span>

To return a JSON object specify the response to be JSON (response="json")

A method call returns:

<pre>xiboApi({
  "stat":"ok",
  "response": {...}
})
</pre>

A failure call returns:

<pre>xiboApi({
  "stat":"error",
  "error": {
     "code": "[error-code]",
     "message": "[error-message]"
  }
})
</pre>

###  <span class="mw-headline" id="XML"> XML </span>

A successful call returns this:

<pre>&lt;?xml version="1.0" encoding="utf-8"&#160;?&gt;
&lt;rsp status="ok"&gt;
    [xml-payload-here]
&lt;/rsp&gt;
</pre>

A failure call returns this:

<pre>&lt;?xml version="1.0" encoding="utf-8"&#160;?&gt;
&lt;rsp status="error"&gt;
    &lt;error code="[error-code]" message="[error-message]"
&lt;/rsp&gt;
</pre>

##  <span class="mw-headline" id="Error_Codes">General Error Codes </span>

A list of the potential error codes from each method call can be found with the documentation of that call.

<table border="1">
<caption> Error code numbers and explanations
</caption>
<tr>
<th>Error Code</th>
<th>Explanation</th>
<th>Use case
</th></tr>
<tr>
<td> 1 </td>
<td>Access Denied</td>
<td>OAuth was successful, but Xibo denied access to that functionality for the user
</td></tr>
<tr>
<td> 2 </td>
<td>Checksum does not match with the generated checksum for the current payload</td>
<td>Used when Uploading data or requesting file offset
</td></tr>
<tr>
<td> 3 </td>
<td>Unable to add File record to the Database</td>
<td>
</td></tr>
<tr>
<td> 4 </td>
<td>Library location does not exist</td>
<td>
</td></tr>
<tr>
<td> 5 </td>
<td>Unable to create file in the library location</td>
<td>
</td></tr>
<tr>
<td> 6 </td>
<td>Unable to write to file in the library location</td>
<td>
</td></tr>
<tr>
<td> 7 </td>
<td>File does not exist</td>
<td>
</td></tr>
<tr>
<td>10</td>
<td>The Layout Name cannot be longer than 100 characters</td>
<td>
</td></tr>
<tr>
<td>11</td>
<td>You must enter a duration</td>
<td>
</td></tr>
<tr>
<td>12</td>
<td>The user already owns media with this name</td>
<td>
</td></tr>
<tr>
<td>13</td>
<td>Error inserting media into the database</td>
<td>
</td></tr></table>