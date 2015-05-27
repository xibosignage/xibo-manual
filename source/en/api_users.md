<!--toc=api-->
# Users
The following API calls apply to Users.

*   [Search](#userSearch)
*   [Add](#userAdd)
*   [Edit](#userEdit)
*   [Delete](#userDelete)
*   [Change Password](#changePassword)

## User Object
Where `<<user object>>` is referenced a user object is returned.

```json
{
	userId: int,
	userName: string,
	userTypeId: int,
	loggedIn: int (0|1)
	email: string,
	homePage: string,
	retired: int
}
```

## Search
<a name="userSearch"></a>

Return a list of all users

`GET /api/user`

### Optional Parameters

### Return

```json
{
	recordsTotal: int,
	data: [
		<< user object>>
	]
}
```

## Add
<a name="add"></a>
Add a user

`POST /api/user`

```json
{
	userName: "The users username",
	email: "The users email",
	userTypeId: "The users user type",
	homePageId: "The users homepage id",
	libraryQuota: "The users library quota",
	groupId: "The users group id",
	password: "The users password"
}
```

```json
{
	message: "A success message",
	id: "The User Id",
	data: << user object >>
}
```

## Edit
<a name="edit"></a>
Edit a user

`PUT /api/user/:id`

```json
{
	userName: "The users username",
	email: "The users email",
	userTypeId: "The users user type",
	homePageId: "The users homepage id",
	libraryQuota: "The users library quota",
	retired: "Is the user retired 0|1",
	newPassword: "Super Admin Only, set a new password",
	retypeNewPassword: "Confirm the new password"
}
```


```json
{
	message: "A success message",
	id: "The User Id",
	data: << user object >>
}
```

## Delete
<a name="delete"></a>
Delete a user

`DELETE /api/user/:id`

```json
{
	deleteAllItems: 0|1
}
```


```json
{
	message: "A success message",
	id: "The User Id",
	data: << user object >>
}
```

## Change Password
<a name="changePassword"></a>
Change your password

`PUT /api/user/change/password`
    
```json
{
	password: "Current Password",
	newPassword: "New Password",
	retypeNewPassword: "Confirm New Password"
}
```


```json
{
	message: "A success message",
	id: "The User Id",
	data: << user object >>
}
```
