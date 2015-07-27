<!--toc=api-->
# Display Groups
The following API calls are available for Display Groups.

*   [Search](#search)
*   [Add](#add)
*   [Edit](#edit)
*   [Delete](#delete)
*   [Assign Display](#assign)
*   [Unassign Display](#unassign)
*   [Assign Media](#mediaAssign)
*   [Unassign Media](#mediaUnassign)

## DisplayGroup Object
Where `<<object>>` is referenced a display group object is returned.

```json
{
	"displayGroupId": "The Id for the DisplayGroup",
	"displayGroup": "The name for the DisplayGroup",
	"description": "Description",
	"isDisplaySpecific": "0|1"
}
```

## Search
<a name="search"></a>

Return a list of all displayGroups

`GET /api/displayGroup`

### Optional Parameters

### Return

```json
{
	"recordsTotal": "int",
	"data": [
		<<object>>
	]
}
```

## Add
<a name="add"></a>
Add a DisplayGroup

`POST /api/displaygroup`

```json
{
	"displayGroup": "DisplayGroup Name",
	"description": "Description"
}
```

```json
{
	"message": "A success message",
	"id": "The Id",
	"data": "<<object>>"
}
```

## Edit
<a name="edit"></a>
Edit a displayGroup

`PUT /api/displaygroup/:id`

```json
{
	"displayGroup": "DisplayGroup Name",
	"description": "Description"
}
```


```json
{
	"message": "A success message",
	"id": "The Id",
	"data": "<<object>>"
}
```

## Delete
<a name="delete"></a>
Delete a displayGroup

`DELETE /api/displaygroup/:id`

```json
{
	"message": "A success message",
	"id": "The Id",
	"data": "<<object>>"
}
```

## Assign Display
<a name="assign"></a>

`POST /api/displaygroup/display/assign/:id`

```json
{
	"displayIds": "an array of displayIds to assign"
}
```

```json
{
	"message": "Displays assigned to %s",
	"id": displayGroupId
}
```

## Unassign Display
<a name="unassign"></a>
`POST /api/displaygroup/display/unassign/:id`

```json
{
	"displayIds": "an array of displayIds to unassign"
}
```

```json
{
	"message": "Displays unassigned from %s",
	"id": "displayGroupId"
}
```


## Assign Media
<a name="assign"></a>

`POST /api/displaygroup/media/assign/:id`

```json
{
	"mediaIds": "an array of mediaIds to assign"
}
```

```json
{
	"message": "Media assigned to %s",
	"id": "displayGroupId"
}
```

## Unassign Media
<a name="unassign"></a>
`POST /api/displaygroup/media/unassign/:id`

```json
{
	"mediaIds": "an array of mediaIds to unassign"
}
```

```json
{
	"message": "Media unassigned from %s",
	"id": "displayGroupId"
}
```