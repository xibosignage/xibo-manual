<!--toc=api-->
# DataSets

The following API calls apply to DataSets.

*   [DataSetList](#DataSetList)
*   [DataSetAdd](#DataSetAdd)
*   [DataSetEdit](#DataSetEdit)
*   [DataSetDelete](#DataSetDelete)
*   [DataSetColumnList](#DataSetColumnList)
*   [DataSetColumnAdd](#DataSetColumnAdd)
*   [DataSetColumnEdit](#DataSetColumnEdit)
*   [DataSetColumnDelete](#DataSetColumnDelete)
*   [DataSetDataList](#DataSetDataList)
*   [DataSetDataAdd](#DataSetDataAdd)
*   [DataSetDataEdit](#DataSetDataEdit)
*   [DataSetDataDelete](#DataSetDataDelete)
*   [DataSetSecurityList](#DataSetSecurityList)
*   [DataSetSecurityAdd](#DataSetSecurityAdd)
*   [DataSetSecurityDelete](#DataSetSecurityDelete)
*   [DataSetImportCsv](#DataSetImportCsv)

<a name="DataSetList"></a>
## DataSetList

Get a list of DataSets that the authenticated user has view permission to see. Each DataSet will be returned with its details and a flag to indicate the permissions the user has against it.

### Parameters

There are no parameters

### Response

<pre>
{
    "dataset": [
        {
            "datasetid": "1",
            "dataset": "Test",
            "description": "",
            "ownerid": "1",
            "view": 1,
            "edit": 1,
            "del": 1,
            "modifyPermissions": 1
        },
        {
            "datasetid": "2",
            "dataset": "Test2",
            "description": "",
            "ownerid": "2",
            "view": 1,
            "edit": 1,
            "del": 1,
            "modifyPermissions": 1
        }
    ],
    "status": "ok"
}
</pre>


### Errors

General Errors Only.

<a name="DataSetAdd"></a>
## DataSetAdd

### Parameters

<dl>
    <dt>dataSet</dt>
    <dd>The Name for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>description</dt>
    <dd>A description for this DataSet.</dd>
</dl>
</p>

### Response

<pre>
{
    "dataset": {
        "id": "3"
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetEdit"></a>
## DataSetEdit

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSet</dt>
    <dd>The Name for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>description</dt>
    <dd>A description for this DataSet.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetDelete"></a>
## DataSetDelete

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetColumnList"></a>
## DataSetColumnList

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>

### Response

<pre>
{
    "datasetcolumn": [
        {
            "datasetcolumnid": "3",
            "heading": "API Column 1",
            "listcontent": "",
            "columnorder": "1",
            "datatype": "String",
            "datasetcolumntype": "Value"
        }
    ],
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetColumnAdd"></a>
## DataSetColumnAdd

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>heading</dt>
    <dd>The Column Heading</dd>
</dl>
<dl>
    <dt>listContent</dt>
    <dd>A comma separated list to appear as a select list for data entry.</dd>
</dl>
<dl>
    <dt>columnOrder</dt>
    <dd>The order this column should appear</dd>
</dl>
<dl>
    <dt>dataTypeId</dt>
    <dd>The data type. See DataTypeList.</dd>
</dl>
<dl>
    <dt>datasetColumnTypeId</dt>
    <dd>The Column Type for this Column. Either `value` or `formula`. See DataSetColumnTypeList.</dd>
</dl>
<dl>
    <dt>formula</dt>
    <dd>A formula (in MySQL syntax) to apply to this column</dd>
</dl>

### Response

<pre>
{
    "datasetcolumn": {
        "id": "3"
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetColumnEdit"></a>
## DataSetColumnEdit

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSetColumnId</dt>
    <dd>The ID for this DataSet Column. Required.</dd>
</dl>
<dl>
    <dt>heading</dt>
    <dd>The Column Heading</dd>
</dl>
<dl>
    <dt>listContent</dt>
    <dd>A comma separated list to appear as a select list for data entry.</dd>
</dl>
<dl>
    <dt>columnOrder</dt>
    <dd>The order this column should appear</dd>
</dl>
<dl>
    <dt>dataTypeId</dt>
    <dd>The data type. See DataTypeList.</dd>
</dl>
<dl>
    <dt>datasetColumnTypeId</dt>
    <dd>The Column Type for this Column. Either `value` or `formula`. See DataSetColumnTypeList.</dd>
</dl>
<dl>
    <dt>formula</dt>
    <dd>A formula (in MySQL syntax) to apply to this column</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetColumnDelete"></a>
## DataSetColumnDelete

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSetColumnId</dt>
    <dd>The ID for this DataSet Column. Required.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetDataList"></a>
## DataSetDataList

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>

### Response

<pre>
{
    "datasetdata": [
        {
            "datasetcolumnid": "1",
            "rownumber": "1",
            "value": "Row1-1"
        },
        {
            "datasetcolumnid": "1",
            "rownumber": "2",
            "value": "Row2-1"
        }
    ],
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetDataAdd"></a>
## DataSetDataAdd

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSetColumnId</dt>
    <dd>The ID for this DataSet Column. Required.</dd>
</dl>
<dl>
    <dt>rowNumber</dt>
    <dd>The Row Number this data should be added with</dd>
</dl>
<dl>
    <dt>value</dt>
    <dd>The Value to Save in this Row/Column</dd>
</dl>

### Response

<pre>
{
    "datasetdata": {
        "id": 1
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetDataEdit"></a>
## DataSetDataEdit

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSetColumnId</dt>
    <dd>The ID for this DataSet Column. Required.</dd>
</dl>
<dl>
    <dt>rowNumber</dt>
    <dd>The Row Number this data should be added with</dd>
</dl>
<dl>
    <dt>value</dt>
    <dd>The Value to Save in this Row/Column</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetDataDelete"></a>
## DataSetDataDelete

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>dataSetColumnId</dt>
    <dd>The ID for this DataSet Column. Required.</dd>
</dl>
<dl>
    <dt>rowNumber</dt>
    <dd>The Row Number this data should be added with</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetSecurityList"></a>
## DataSetSecurityList

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>

### Response

<pre>
{
    "datasetgroupsecurity": [
        {
            "groupid": "2",
            "group": "Everyone",
            "view": 0,
            "edit": "1",
            "del": 0,
            "isuserspecific": 0
        },
        {
            "groupid": "1",
            "group": "Users",
            "view": "1",
            "edit": 0,
            "del": 0,
            "isuserspecific": 0
        },
        {
            "groupid": "4",
            "group": "username",
            "view": 0,
            "edit": 0,
            "del": 0,
            "isuserspecific": "1"
        }
    ],
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetSecurityAdd"></a>
## DataSetSecurityAdd

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>groupId</dt>
    <dd>The ID for this Group. Required.</dd>
</dl>
<dl>
    <dt>view</dt>
    <dd>View Permissions (0 = no, 1 = yes). Required.</dd>
</dl>
<dl>
    <dt>edit</dt>
    <dd>Edit Permissions (0 = no, 1 = yes). Required.</dd>
</dl>
<dl>
    <dt>delete</dt>
    <dd>Delete Permissions (0 = no, 1 = yes). Required.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetSecurityDelete"></a>
## DataSetSecurityDelete

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>groupId</dt>
    <dd>The ID for this Group. Required.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetImportCsv"></a>
## DataSetImportCsv

### Parameters

<dl>
    <dt>dataSetId</dt>
    <dd>The ID for this DataSet. Required.</dd>
</dl>
<dl>
    <dt>fileId</dt>
    <dd>The ID of the CSV file uploaded by LibraryMediaFileUpload. Required.</dd>
</dl>
<dl>
    <dt>spreadSheetMapping</dt>
    <dd>A JSON object that represents the column mapping. `{"zero based column number":"dataSetColumnId"}`. For example: `{"0":"1","2":"5"}` would be CSV column 1, dataSetColumnId 1 and CSV column 1, dataSetColumnId 5.</dd>
</dl>
<dl>
    <dt>overwrite</dt>
    <dd>Should the DataSet be cleared first. (0 = No, 1 = Yes) Required.</dd>
</dl>
<dl>
    <dt>ignoreFirstRow</dt>
    <dd>Should the first row of the CSV file be treated as a Header and ignored. (0 = No, 1 = Yes) Required.</dd>
</dl>

### Response

<pre>
{
    "success": {
        "id": true
    },
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataTypeList"></a>
## DataTypeList

### Parameters

None

### Response

<pre>
{
    "datatype": [
        {
            "datatypeid": "1",
            "0": "1",
            "datatype": "String",
            "1": "String"
        },
        {
            "datatypeid": "2",
            "0": "2",
            "datatype": "Number",
            "1": "Number"
        },
        {
            "datatypeid": "3",
            "0": "3",
            "datatype": "Date",
            "1": "Date"
        }
    ],
    "status": "ok"
}
</pre>

### Errors

General Errors Only.

<a name="DataSetColumnTypeList"></a>
## DataSetColumnTypeList

### Parameters

None

### Response

<pre>
{
    "datasetcolumntype": [
        {
            "datasetcolumntypeid": "1",
            "0": "1",
            "datasetcolumntype": "Value",
            "1": "Value"
        },
        {
            "datasetcolumntypeid": "2",
            "0": "2",
            "datasetcolumntype": "Formula",
            "1": "Formula"
        }
    ],
    "status": "ok"
}
</pre>

### Errors

General Errors Only.