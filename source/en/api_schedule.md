<!--toc=api-->
# Schedule
The following API calls are available.

*   [Search](#search)
*   [Add](#add)
*   [Edit](#edit)
*   [Delete](#delete)

## Resolution Object
Where `<<object>>` is referenced a resolution object is returned.

```json
{
	
}
```

## Search
<a name="search"></a>

Return a list of all resolutions

`GET /api/resolution`

### Optional Parameters

### Return

```json
{
	recordsTotal: int,
	data: [
		<<object>>
	]
}
```

## Add
<a name="add"></a>
Add an event

`POST /api/schedule`

```json
{
	fromDt:
	toDt:
	campaignId: 
	displayGroupIds: 
	displayOrder:
	isPriority:
	recurrenceType:
	recurrenceDetail:
	recurrenceRange:
}
```

```json
{
	message: "A success message",
	id: "The Id",
	data: <<object>>
}
```

## Edit
<a name="edit"></a>
Edit a resolution

`PUT /api/resolution/:id`

```json
{
	resolution: Resolution Name
	width: Resolution Output Width
	height: Resolution Output Height
}
```


```json
{
	message: "A success message",
	id: "The Id",
	data: <<object>>
}
```

## Delete
<a name="delete"></a>
Delete a resolution

`DELETE /api/resolution/:id`

```json
{
	message: "A success message",
	id: "The Id",
	data: <<object>>
}
```
