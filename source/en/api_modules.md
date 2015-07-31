<!--toc=api-->
# Modules
Modules are [[PRODUCTNAME]]'s name for the widgets that get assigned to a Playlist in a Timeline on a Layout.

They exist so that 3rd party designers and developers can easily add extra functionality to [[PRODUCTNAME]]. The module is designed to collect some data from the User and create a `Widget` from that data. The `widget` is then assigned to the Playlist by the application.

## Widget API
All modules can be added from the API as the API supports the follow methods for each:

 - Module Widget Add
 - Module Widget Edit
 - Module Widget Delete

Each module will expect different parameters that correspond to the options it requires. The module author may or may not have provided that documentation with the module.

### Core Modules
The following core modules are documented.

* Clock
* DataSetView
* Embedded
* Flash
* ForecastIO
* Image
* LocalVideo
* PowerPoint
* ShellCommand
* Text
* Ticker
* Twitter
* Video
* WebPage

### Transitions
In addition to these module specific functions, a transition can be set on any module.

`PUT /api/module/transition/:type/:id`

* `:type` is the type of transition, in|out
* `id` is the `widgetId`

## Module API
Modules can also be administered through the API. The following API calls are available for Module Administration.

* [Search](#search)
* [Settings](#settings)
* [Verify](#verify)

## Module Object
Where `<<object>>` is referenced a module object is returned.

```json
{
	"name": "The module name",
	"description": "",
	"validExtensions": "",
	"imageUri": "",
	"type": "",
	"enabled": "",
	"regionSpecific": "",
	"previewEnabled": "",
	"assignable": "",
	"renderAs": "",
	"schemaVersion": ""
}
```