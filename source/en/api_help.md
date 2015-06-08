<!--toc=api-->
# Help Links
The following API calls apply.

*   [Search](#search)
*   [Add](#add)
*   [Edit](#edit)
*   [Delete](#delete)

## Object
Where `<<object>>` is referenced a help object is returned.

```json
{
	helpId: int,
	topic: string,
	category: string,
	link: string
}
```

## Search
<a name="search"></a>

Return a list of all help links

`GET /api/help`

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
Add a help link

`POST /api/help/:id`

```json
{
	topic: "The Help Topic",
	category: "The Help Category",
	link: "The Help Link"
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
Edit a help link

`PUT /api/help/:id`

```json
{
	topic: "The Help Topic",
	category: "The Help Category",
	link: "The Help Link"
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
Delete a help link

`DELETE /api/help/:id`

```json
{
	message: "A success message"
}
```