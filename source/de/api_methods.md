<!--toc=api-->
##  <span class="mw-headline" id="Request_Formats"> Anforderungsformat </span>

Xibo unterstützt folgendes Anforderungsformat

*   REST

###  <span class="mw-headline" id="REST"> REST </span>

REST wird mittels POST oder GET umgesetzt.

Um die Xibo Version abzufragen, verwenden Sie folgende Methode:

<pre>services.php?service=rest&amp;method=version
</pre>

Standardmäßig wird die Antwort als XML ausgeliefert. Um einen anderen Antworttyp zu erhalten, senden Sie "&amp;response="

##  <span class="mw-headline" id="Response_Types"> Antworttypen </span>

Xibo unterstützt folgende Antworttypen

*   JSON (nicht implementiert)

*   XML

###  <span class="mw-headline" id="JSON"> JSON </span>

Um ein JSON Objekt zu erhalten, spezifizieren Sie die Antwort als JSON (response="json")

Der Methodenaufruf gibt folgendes zurück:

<pre>xiboApi({
  "stat":"ok",
  "response": {...}
})
</pre>

Sollte ein Fehler aufgetreten sein, wird folgendes zurückgeliefert:

<pre>xiboApi({
  "stat":"error",
  "error": {
     "code": "[error-code]",
     "message": "[error-message]"
  }
})
</pre>

###  <span class="mw-headline" id="XML"> XML </span>

Ein erfolgreicher Aufruf liefert folgendes Ergebnis:

<pre>&lt;?xml version="1.0" encoding="utf-8"&#160;?&gt;
&lt;rsp status="ok"&gt;
    [xml-payload-here]
&lt;/rsp&gt;
</pre>

Ein fehlerhafter Aufruf liefert dieses Ergebnis:

<pre>&lt;?xml version="1.0" encoding="utf-8"&#160;?&gt;
&lt;rsp status="error"&gt;
    &lt;error code="[error-code]" message="[error-message]"
&lt;/rsp&gt;
</pre>

##  <span class="mw-headline" id="Error_Codes">Allgemeine Fehlercodes </span>

Eine Liste aller möglichen Fehlercodes finden Sie in der Dokumentation des Aufrufs.

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
<td>OAuth war erfolgreich, aber Xibo hat den Zugang zur ausgewählten Funktionalität für diesen Benutzer verweigert
</td></tr>
<tr>
<td> 2 </td>
<td>Checksum does not match with the generated checksum for the current payload</td>
<td>Wird zum Hochladen von Daten verwendet
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