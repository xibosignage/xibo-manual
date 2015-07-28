<!--toc=api-->
## Layouts
The following API calls are available.

*   [Search](#search)
*   [Add](#add)
*   [Edit](#edit)
*   [Retire](#retire)
*   [Delete](#delete)
*   [Copy](#copy)

## Layout Object
Where `<<object>>` is referenced a layout object is returned.

```json
{
	"layoutId": "int: The id of the Layout",
	"ownerId": "int: The id of the Layout Owner",
	"campaignId": "int: The id of the Layout's dedicated Campaign",
	"backgroundImageId": "int: The id of the image media set as the background",
	"schemaVersion": "int: The XLF schema version",
	"layout": "string: The name of the Layout",
	"description": "string: The description of the Layout",
	"backgroundColor": "string: A HEX string representing the Layout background color",
	"createdDt": "timestamp: The datetime the Layout was created",
	"modifiedDt": "timestamp: The datetime the Layout was last modified",
	"status": "int: A flag indicating the Layout status",
	"retired": "int: 0|1 flag indicating whether the Layout is retired",
	"backgroundzIndex": "int: The Layer that the background should occupy",
	"width": "double: The Layout Width",
	"height": "double: The Layout Height"
}
```

## Search

## Add
<a name="add"></a>
Add a Layout

`POST /api/layout`

```json
{
	"name": "string: The Layout Name",
	"description": "string: The Layout Description",
	"templateId": "int: If the Layout should be created with a Template, provide the ID, otherwise don't provide",
	"resolutionId": "int: If a Template is not provided, provide the resolutionId for this Layout."
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
Edit a Layout

`PUT /api/layout`

```json
{
	"name": "string: The Layout Name",
	"description": "string: The Layout Description",
	"tags": "string: A comma separated string of Tags",
	"resolutionId": "int: The resolution of this Layout. Widgets may need adjustment if a different resolution is selected.",
	"retired": "int: 0|1 flag to indicate whether the Layout is retired.",
	"backgroundColor", "string: A HEX string representing the background color",
	"backgroundImageId", "int: A mediaId from the Library that should be used as the background image",
	"backgroundzIndex", "int: The Layer that the background should occupy"
}
```

```json
{
	"message": "A success message",
	"id": "The Id",
	"data": "<<object>>"
}
```

## Retire
<a name="retire"></a>
`PUT /api/layout/retire/:id`

```json
{
	"message": "A success message"
}
```

## Delete
<a name="delete"></a>
`DELETE /api/layout/retire/:id`

```json
{
	"message": "A success message"
}
```

## Copy
<a name="copy"></a>
`post /api/layout/copy/:id`

`:id` is the `layoutId` of the Layout that should be copied.

```json
{
	"name": "string: The Layout Name",
	"description": "string: The Layout Description",
	"copyMediaFiles": "int: 0|1 flag to determine whether new copies of assigned media need updating"
}
```

```json
{
	"message": "A success message",
	"id": "The Copied Id",
	"data": "The Copied Layout <<object>>"
}
```