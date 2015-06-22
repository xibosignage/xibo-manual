<!--toc=api-->
# Resolutions
The following API calls are available for Resolutions.

*   [Search](#search)
*   [Add](#add)
*   [Edit](#edit)
*   [Delete](#delete)

## Resolution Object
Where `<<object>>` is referenced a resolution object is returned.

```json
{
	"resolutionId": 9,
	"resolution": "1080p HD Landscape",
	"width": 1920,
	"height": 1080,
	"designerWidth": "800",
	"designerHeight": "450",
	"version": 2,
	"enabled": 1
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
Add a resolution

`POST /api/resolution`

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
