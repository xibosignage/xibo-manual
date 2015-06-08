<!--toc=api-->
# Transitions
The following API calls apply.

*   [Search](#search)
*   [Edit](#edit)

## Transitions Object
Where `<<object>>` is referenced a transition object is returned.

```json
{
	transitionId: int,
	transition: string,
	code: int,
	hasDirection: int (0|1),
	hasDuration: int (0|1),
	availableAsIn: int (0|1),
	availableAsOut: int (0|1)
}
```

## Search
<a name="search"></a>

Return a list of all users

`GET /api/transition`

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

## Edit
<a name="edit"></a>
Edit a user

`PUT /api/user/:id`

```json
{
	availableAsIn: "Can the transition be set as an In Transition 0|1",
	availableAsOut: "Can the transition be set as an Out Transition 0|1"
}
```


```json
{
	message: "A success message",
	id: "The Id",
	data: <<object>>
}
```