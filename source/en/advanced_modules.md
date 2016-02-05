<!--toc=advanced-->
# Modules and Widgets
[[PRODUCTNAME]] benefits from a Modular "plug-in" architecture for designing and displaying content. There are "core"
supported modules that ship with the product, but these can be extended with new community authored modules at any time.

There are two concepts to consider when developing additional modules, the Module and the Widget.

### Module
A Module is the "Entity" which is added to the CMS to identify the new module code. Installation instructions are provided
in the Module code and recorded in the `module` database table. They contain all the information required to instantiate
the module as well as any global settings.

All modules provide a `class` which extends `\Xibo\Widget\ModuleWidget` and implements `\Xibo\Widget\ModuleInterface`.
They must also provide a `<<modulename>>.json` file in the `/modules` or `/custom` folder for installation.

This file contains the information necessary for the CMS to instantiate the module the first time it is installed into
the `module` database table.

An example is below:

```
{
  "title": "Forecast IO Weather Module",
  "author": "Spring Signage Ltd",
  "description": "A module for displaying weather information. Uses the Forecast API",
  "name": "forecastio",
  "class": "Xibo\\Widget\\ForecastIo"
}
```

### Widget
A widget is the assignment of a Module to a Playlist.

These are modules that exist on a specific Layout and have their configuration and user options saved to the
<abbr title="Layout Format">XLF</abbr> for the Layout. These modules are served to the player in HTML and rendered
locally using an internal browser.

It is the responsibility of the ModuleWidget class to provide methods for add/edit/getResource.

### Views
Each module entity has a `viewPath` which should be the location of the Twig Template used to render the forms for
 that module.

Each module should provide:

 - `<<modulename>>-form-add.twig`
 - `<<modulename>>-form-edit.twig`

Modules may optionally provide `<<modulename>>-form-settings.twig` as well as any other files they reference directly
in their code.

## Custom Modules
Custom modules can be created in the `/custom` folder. Classes will be auto-loaded from the `/custom` folder provided they
are in the name space `\Xibo\Custom` and that the file name is `ClassName.php`.

The Modules page in the CMS will look in the `/custom` folder for files ending in `.json`.

It is recommended to include all custom views and resources in the a sub-folder named the same as the module. I.e. "MyModule"
should live in `/custom/MyModule`. The module should then specify this view path in `installOrUpdate()`, i.e.

```
$module->viewPath = '../custom/MyModule';
```
