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

## Members

`POST /api/group/members/:id`

An array of `userId`'s must also be provided. These are the users assigned to the group.

```json
{
	message: "Membership set for <<group>>",
	id: The groupId
}
``` 

## ACL
User groups support ACL for Pages and Menu Items in the CMS. Individual users can also be given ACL using their `groupId`, which can be obtained from within the `<<user object>>`.

`POST /api/group/:entity/:id`

 - `entity` is either `Page` or `Menu`
 - `id` is the groupId

An array of `objectIds` must also be provided. Either `pageId`'s or `menuId`'s dependant on the ACL entity.

 - `objectId[]`

```json
{
	message: "ACL set for <<group>>",
	id: The groupId
}
``` 