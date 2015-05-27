<!--toc=api-->
# User Groups
The following API calls apply to Users.

*   [Search](#groupSearch)
*   [Add](#groupAdd)
*   [Edit](#groupEdit)
*   [Delete](#groupDelete)

## User Object
Where `<<group object>>` is referenced a group object is returned.

```json
{
	groupId: int,
	group: string,
	isUserSpecific: int (0|1),
	isEveryone: int (0|1)
	libraryQuota: int
}
```

## Search
<a name="groupSearch"></a>

Return a list of all groups

`GET /api/group`

### Optional Parameters

### Return

```json
{
	recordsTotal: int,
	data: [
		<< group object>>
	]
}
```

## Add
<a name="add"></a>
Add a user group

`POST /api/group`

```json
{
	group: "The User Group Name",
	libraryQuota: "The library quota"
}
```

```json
{
	message: "A success message",
	id: "The Group Id",
	data: << group object >>
}
```

## Edit
<a name="edit"></a>
Edit a user group

`PUT /api/group/:id`

```json
{
	group: "The User Group Name",
	libraryQuota: "The library quota"
}
```


```json
{
	message: "A success message",
	id: "The User Group Id",
	data: << group object >>
}
```

## Delete
<a name="delete"></a>
Delete a user group

`DELETE /api/group/:id`

```json
{
	message: "A success message",
	id: "The Group Id",
	data: << group object >>
}
```