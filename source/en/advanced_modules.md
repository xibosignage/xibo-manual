<!--toc=advanced-->
# Modules and Widgets
[[PRODUCTNAME]] benefits from a Modular "plug-in" architecture for designing and displaying content. There are "core" supported modules that ship with the product, but these can be extended with new community authored modules at any time.

There are two concepts to consider when developing additional modules, the Module and the Widget.

### Module
A Module is the "Entity" which is added to the CMS to identify the new module code. Installation instructions are provided in the Module code and recorded in the `module` database table. They contain all the information required to instantiate the module as well as any global settings.

### Widget

A widget is the assignment of a Module to a Playlist.

These are modules that exist on a specific Layout and have their configuration and user options saved to the <abbr title="Layout Format">XLF</abbr> for the Layout. These modules are served to the player in HTML and rendered locally using an internal embedded browser.

The "Module" is responsible for providing the code for all actions that take place on Widgets, for example: Add, Edit, Preview, GetResource (generate the full HTML to show the module).



# Creating a Module

So you're thinking of creating a Module? That is great! They are easy to create once you understand what each part of the Module is doing and how that interacts with the CMS and Players.

## Overview

All modules provide a `class` which extends `\Xibo\Widget\ModuleWidget` and implements `\Xibo\Widget\ModuleInterface`. They must also provide a `<<modulename>>.json` file in the `/custom` folder for installation. Core modules that ship with the software have their `json` file in the `/modules` folder.

This json file contains the information necessary for the CMS to instantiate the module the first time it is installed into the `module` database table. After installation, this file is not used anylonger.

An example is below:

```json
{
  "title": "My Custom Xibo Module",
  "author": "Spring Signage Ltd",
  "description": "A module for displaying some information I am interested in",
  "name": "mymodule",
  "class": "Xibo\\Custom\\MyModule\MyModule"
}
```

#### Where do I put my code?

When you are making a custom module you should place all of your files under the `/custom` folder, in their own sub folder. The above example would be called `mymodule.json` and stored in `/custom/mymodule.json` with the associated class stored in `/custom/MyModule/MyModule.php`. It is vitally important that your `MyModule` class exists in the `\Xibo\Custom` namespace for it to be auto-loaded correctly.

## Installation

The Module Admin page in the CMS has an action button called "Install Modules". This button looks in the `/custom` folder for all `*.json` files and loads any that are not already installed in the `modules` table. It will present these Modules according to the contents of the file, in the example above you would expect to see an entry for "My Custom Xibo Module - Spring Signage Ltd".

When clicked, the Module is instantiated using the `class` provided in the JSON file, and the `installOrUpdate` method is called. An example implementation of this method is below:

```php
/**
* Install or Update this module
* @param ModuleFactory $moduleFactory
*/
public function installOrUpdate($moduleFactory)
{
  if ($this->module == null) {
    // Install
    $module = $moduleFactory->createEmpty();
    $module->name = 'My Module';
    $module->type = 'mymodule';
    $module->class = 'Xibo\Custom\MyModule\MyModule';
    $module->description = 'A module for displaying my information.';
    $module->imageUri = 'forms/library.gif';
    $module->enabled = 1;
    $module->previewEnabled = 1;
    $module->assignable = 1;
    $module->regionSpecific = 1;
    $module->renderAs = 'html';
    $module->schemaVersion = $this->codeSchemaVersion;
    $module->defaultDuration = 60;
    $module->settings = [];
    $module->viewPath = '../custom/MyModule';

    // Set the newly created module and then call install
    $this->setModule($module);
    $this->installModule();
  }

  // Install and additional module files that are required.
  $this->installFiles();
}
```

This method is only called once! So it is important that the information is correct before you install.



#### What do all these properties mean?

There are a lot of properties to set on a module, which govern how that module is loaded, where its templates are stored and how the Player renders it. Each property is explained below:

| Property        | Explaination                             | Default           |
| --------------- | ---------------------------------------- | ----------------- |
| name            | This is the friendly name of your module. It will be shown in the Layout Designer |                   |
| type            | This is the internal identifier for your module and is what gets recorded on the Layout XLF file and sent to the Player. This does not have to be unique, the CMS will choose the first available module of a particular type to render a Widget. |                   |
| class           | This is the PHP class associated with the Module. It will be instantiated whenever this module is used. This should always include the namespace. |                   |
| description     | A description for the module, only used on the Module admin page |                   |
| imageUri        | DEPRECATED - this option will be removed | forms/library.gif |
| enabled         | A flag indicating whether the module is enabled | 1                 |
| previewEnabled  | Should the Layout designer render a preview of the module or not? | 1                 |
| assignable      | Should this module be assignable - used for Library modules. | 1                 |
| regionSpecific  | Is this Module for the Library (0) or a Widget on a Layout (1) | 1                 |
| renderAs        | Render natively or as HTML. If HTML then the Module should provide the HTML from `getResource`, and if native the player must understand how to render the module and its options. | html              |
| schemaVersion   | Schema Version - can use used to determine different rendering from past versions. | 1                 |
| defaultDuration | When the user has declined to provide a duration for the Widget, what should the duration be. | 60                |
| settings        | An array of settings.                    | []                |
| viewPath        | The view path containing the Twig forms for add, edit and settings. This should be `/custom/MyModule` |                   |

#### Complimentary Files

The Module must also provide an `installFiles()` method which is called after Install and also on upgrade or when the user manually verifies their module files.

The responsbility of this method is to install any complimentary files required by the module - for example if the HTML rendered uses jQuery, or one of the Xibo rendering libraries (layout scaler, etc). An example of this method is below:

```php
/**
 * Install Files
 */
public function installFiles()
{
  // Use JQuery and some Xibo resources
  $this->mediaFactory->createModuleSystemFile(PROJECT_ROOT . '/modules/vendor/jquery-1.11.1.min.js')->save();
  $this->mediaFactory->createModuleSystemFile(PROJECT_ROOT . '/modules/xibo-layout-scaler.js')->save();
  
  // Install files from a folder
  $folder = PROJECT_ROOT . '/custom/MyModule/resources';
  foreach ($this->mediaFactory->createModuleFileFromFolder($folder) as $media) {
    /* @var Media $media */
    $media->save();
  }
}
```



These files are then copied to the library and available for later reference in the CMS and also on the Players.

**Please note** it is important that all files have unique names, discounting the folder structure. Files are transferred to the Player and stored in a flat folder structure.



### Settings

It may be necessary to provide global settings for a module, typically useful for something like a user entered API key. This is done via a settings form accessible on the Module Admin page.

There are two methods that should be implemented to support this.

```php
/**
 * Form for updating the module settings
 */
public function settingsForm()
{
  // Return the name of the TWIG file to render the settings form
  return 'mymodule-form-settings';
}

/**
 * Process any module settings
 */
public function settings()
{
  // Process any module settings you asked for.
  $apiKey = $this->getSanitizer()->getString('apiKey');

  if ($apiKey == '')
    throw new \InvalidArgumentException(__('Missing API Key'));

  $this->module->settings['apiKey'] = $apiKey;
}
```

The form returned from `settingsForm` should be accessible in the `viewPath` you configured for you module during installation.

The TWIG file should extend the default settings for as shown below:

```twig
{% extends "module-form-settings.twig" %}
{% import "forms.twig" as forms %}

{% block moduleFormFields %}
    {% set title %}{% trans "API Key" %}{% endset %}
    {% set helpText %}{% trans "Enter your API Key" %}{% endset %}
    {{ forms.input("apiKey", title, module.getSetting("apiKey"), helpText, "", "required") }}
{% endblock %}
```

It is not necessary to use `trans` blocks, but if you do it is possible that your string is already translated elsewhere in the software.



## Layout Designer

Each Module must provide the appropriate forms for adding/editing in the Layout Designer.

### Views - the add/edit form
Each module entity has a `viewPath` which should be the location of the Twig Template used to render the forms for that module.

Each module should provide:

 - `<<modulename>>-form-add.twig`
 - `<<modulename>>-form-edit.twig`

Modules may optionally provide `<<modulename>>-form-settings.twig` as well as any other files they reference directly in their code.



### Designer JavaScript

You may find that you need to add some custom JavaScript to make your form more user friendly. This can be done by implementing the `layoutDesignerJavaScript` method:

```php
/**
 * Template for Layout Designer JavaScript
 * @return string
 */
public function layoutDesignerJavaScript()
{
  return 'my-module-javascript';
}
```

The string returned should be the name of a TWIG file, example below. The contents of this file are included in the Layout Designer page for use on your form - in the below example you could call `myModuleFormOpen` on your Add/Edit form callBack to execute the code when the form opens.

```twig
<script type="text/javascript">
function myModuleFormOpen(dialog) {
  console.log("Opened!");
}
</script>
```





## Rendering

Widgets are rendered in the Layout Designer, Preview and through XMDS for display on the Player. Each Module must provide a `getResource` method which generates HTML to be returned in the above situations.

The core software provides a `get-resource` TWIG template which sets out a boilerplate HTML file that can then be filled in using the following methods:

```php
/**
* Initialise getResource
* @return $this
*/
$this->initialiseGetResource();

/**
* @return bool Is Preview
*/
$this->isPreview();

/**
* Finalise getResource
* @param string $templateName an optional template name
* @return string the rendered template
*/
$this->finaliseGetResource($templateName = 'get-resource');

/**
* Append the view port width - usually the region width
* @param int $width
* @return $this
*/
$this->appendViewPortWidth($width);

/**
* Append CSS File
* @param string $uri The URI, according to whether this is a CMS preview or not
* @return $this
*/
$this->appendCssFile($uri);

/**
* Append CSS content
* @param string $css
* @return $this
*/
$this->appendCss($css);

/**
* Append JavaScript file
* @param string $uri
* @return $this
*/
$this->appendJavaScriptFile($uri);

/**
* Append JavaScript
* @param string $javasScript
* @return $this
*/
$this->appendJavaScript($javasScript);

/**
* Append Body
* @param string $body
* @return $this
*/
$this->appendBody($body);

/**
* Append Options
* @param array $options
* @return $this
*/
$this->appendOptions($options);

/**
* Append Items
* @param array $items
* @return $this
*/
$this->appendItems($items);

/**
 * Append raw string
 * @param string $key
 * @param string $item
 * @return $this
 */
$this->appendRaw($key, $item)
```

The two most important helper methods are `initialiseGetResource` and `finaliseGetResource` as these control the behaviour. Initialise sets up internal data tracking for the subsequent method calls, and `finalise` renders the template. `isPreview()` can be called to determine whether to render a CMS preview or a Player HTML file.

A simplified `getResource` might look like:

```php
public function GetResource($displayId = 0)
{
    $this
        ->initialiseGetResource()
        ->appendViewPortWidth($this->region->width)
        ->appendJavaScriptFile('vendor/jquery-1.11.1.min.js')
        ->appendFontCss())
        ->appendBody('<h1>My HTML</h1>')
        ->appendJavaScript('$(document).ready(function() { $("h1").html("My Altered HTML"); } ');
        
    return $this->finaliseGetResource();
}
```

These helpers are optional, but if they are used once then the entire `getResource` must be served with them. 

**Please note** it is entirely correct and feasible to render the HTML using your own methodolody. Alternatively a Twig template can be rendered using `$this->renderTemplate([], $templateName);`, where the first parameter is an array of data to provide to the template and the second is the template name.



#### Complimentary Files

Similar to how you've added files in `installFiles()` you will also want to reference these files. Perhaps they are CSS or JavaScript, or perhaps images. Whatever the files are you can use a helper method to render them and the Module code will handle whether they are shown in the CMS or Player.

To reference installed module files use the method below:

```php
$this->getResourceUrl('<<file name>>')
```

The file name should be the same as the file name used when you installed it.

Please note that files installed via this way are only used in the rendering of HTML for the Player/Preview - they are not for PHP files and won't be loaded by PHP in any way.



#### Core HTML rendering

Xibo provides some helper JavaScript and CSS for rendering core aspects of the solution. Typical examples of this are the way we render text and the Layout scaler (which is a tool that keeps content at the correct scale regardless of the region changing size).

The key options for the Layout scaler are:

```php
// Layout Scaler Options
$options = array(
  'originalWidth' => $this->region->width,
  'originalHeight' => $this->region->height,
  'previewWidth' => $this->getSanitizer()->getDouble('width', 0),
  'previewHeight' => $this->getSanitizer()->getDouble('height', 0),
  'scaleOverride' => $this->getSanitizer()->getDouble('scale_override', 0)
);

$this
  ->appendOptions($options)
  ->appendJavaScript('
$(document).ready(function() {
    $("body").xiboLayoutScaler(options);
});
');
```



### Downloading for Rendering

As your module is rendered you may want to download data and/or resources for use when rendering the Widget. An example would be a JSON datasource giving weather data, tweets, Facebook data, etc.

**Whenever you interact with a 3rd party resource please take care to respect that resource and cache appropriately. Remember that your Widget might be used on a network with 1000s of Displays!**

Xibo includes the popular [Guzzle](http://docs.guzzlephp.org/en/stable/) HTTP client and is the recommended way to get third party data sources. Please refer to their documentation to learn how to use Guzzle.

#### Caching

Xibo has a sophisticated caching interface build in, accessible from a module using the `$this->getPool()` method. This is a PSR compliant caching interface. An example of using the cache is provided below:

```php
/** @var \Stash\Item $cache */
$cache = $this->getPool()->getItem($this->makeCacheKey('some key for this widget'));
$cache->setInvalidationMethod(Invalidation::SLEEP, 5000, 15);

$items = $cache->get();

// Check our cache to see if the key exists
// Ticker cache holds the entire rendered contents of the feed
if ($cache->isHit()) {
  return $items;
} else {
  // Lock this cache item (120 seconds)
  // Your module might be accessed concurrently!!
  $cache->lock(120);
  
  // Do something to get my items
  $items = [];
  
  $cache->set($items);
  $cache->expiresAfter(<some cache period>);
  $this->getPool()->saveDeferred($cache);
  
  return $items;
}

```

When caching you must ensure that you cache everything required to render your module.



#### Downloading Images

You may also want to download images to use with your module, for example with Media RSS or Facebook posts.

Xibo provides a `MediaFactory` to help with this - the `MediaFactory` will queue your downloads to happen concurrently, add them to the library and assign them to your Layout so that they are downloaded to the Player correctly.

An example of using the `MediaFactory` is below:

```php
// Determine a number of seconds to keep this media before expiring
$expires = 86400;

$file = $this->mediaFactory->queueDownload(md5('http://example.com/myfile'), 'http://example.com/myfile', $expires);

// After queueing the download you can use the returned object to get an ID reference to the file. This is used to refer to it later.
$downloadUrlToUseLater = $this->getFileUrl($file, 'image');

// After you've queued all of your downloads
// Process queued downloads
$this->mediaFactory->processDownloads(function($media) {
  // Tag this layout with this file
  $this->assignMedia($media->mediaId);
});
```



The download URL provided by the `getFileUrl` is valid for the CMS Layout Designer, Preview and also for the Player.

If downloading resources in this way you must ensure that these images are included in your cache, or exist outside your cache. For example, if your cache key is **not** specific to your Layout then you would want to cache the `mediaId` of every assigned media. 



### Concurrency

In a network consisting of many Displays it is conceivable that `getResource` will be called concurrently by 2 or more Players. It is therefore important that we build `getResource` in a concurrent aware manner. In order to do this you should call `$this->concurrentRequestLock();` at the start of `getResource` and `$this->concurrentRequestRelease();` at the end.

This will ensure that concurrent requests wait for the first one to complete before executing themselves.



## Summary

As you might have imagined, this is the "thin end of the wedge", meaning there is a lot more you can do with Modules. Most of the complexity behind a module comes from the desired goal rather than the tools. For example you may need to parse some very difficult content, or have some difficult HTML to make.

It is intended that the tools above provide a basis for generating good quality HTML from `getResource`, that is compatible with the Player and making sure that any 3rd party content is cached.