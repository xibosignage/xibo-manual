<!--toc=api-->
# Playlists
The following API calls are available for Playlists.

*   [Widget Search](#search)
*   [Order](#order)
*   [Library Assign](#libraryAssign)

## Playlist Object
Where `<<object>>` is referenced a playlist object is returned.

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

Return a list of all Widgets in a Playlist

`GET /api/playlist/widget`

### Optional Parameters
- playlistId

### Return

```json
{
	"recordsTotal": "int",
	"data": [
		<<object>>
	]
}
```

## Order
<a name="#order"></a>
Order the Widgets in a Playlist

`POST /api/playlist/order/:id`

```json
{
	"widgets": [
		{3: 2}
	]
}
```

Where the key to `widgets` is the widgetId and the value is the position.

``` json
{
	"message": "Order Changed",
	"data": "<<object>>"
}
```
