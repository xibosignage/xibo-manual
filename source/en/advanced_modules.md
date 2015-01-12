<!--toc=advanced-->
# Developing Modules

[[PRODUCTNAME]] benefits from a Modular "plug-in" architecture for designing and displaying content. There are "core" supported modules that ship with the product, but these can be extended with new community authored modules at any time.

This section of the manual will cover the development of a new [[PRODUCTNAME]] module using the `modules/module_template.php` blank module template file.

## Types of Module

[[PRODUCTNAME]] splits modules into two different types. Region specific Modules and Non-region specific Modules. Region specific modules are the only type of module supported by the plug-in architecture at the current time.

### Region Specific Modules

These are modules that exist on a specific Layout and have their configuration and user options saved to the <abbr title="Xibo Layout Format">XLF</abbr> for the Layout. These modules are served to the client in HTML and rendered locally using an internal browser.

### Non-region Specific Modules

These are modules that exist in the `media` table and have files associated with them. They are reusable across Layouts and exist in the Library.

## The Module Template

[[PRODUCTNAME]] includes a module template which is a fully commented example of a basic module. The template can be found in the modules folder of the [[PRODUCTNAME]] installation. `modules/module_template.php`.

All new [[PRODUCTNAME]] module developers should use this file as a starting point.

## Licence Notice

All [[PRODUCTNAME]] modules must be released under a licence that is compatible with the AGPLv3. This Licence notice, as well as any Copyright information for the author should be placed at the top of the file and any companion files.

```
/*
 * Xibo - Digital Signage - http://www.xibo.org.uk
 * Copyright (C) 2014 Daniel Garner
 *
 * This file is part of Xibo.
 *
 * Xibo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version. 
 *
 * Xibo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Xibo.  If not, see http://www.gnu.org/licenses/.
 */ 
```

## The Class Declaration and Constructor

Modules are loaded by the framework dynamically and should therefore adhere to the naming convention. The file name should be `moduletemplate.module.php` where `moduletemplate` is the class name. The Class must extend the Module class.

The constructor of the class must conform to the below specification and must set the module type to be the same as the class name.

```
class moduletemplate extends Module
{
    public function __construct(database $db, user $user, $mediaid = '', $layoutid = '', $regionid = '', $lkid = '') {
        // The Module Type must be set - this should be a unique text string of no more than 50 characters.
        // It is used to uniquely identify the module globally.
        $this->type = 'moduletemplate';

        // This is the code schema version, it should be 1 for a new module and should be incremented each time the 
        // module data structure changes.
        // It is used to install / update your module and to put updated modules down to the display clients.
        $this->codeSchemaVersion = 1;

        // Must call the parent class
        parent::__construct($db, $user, $mediaid, $layoutid, $regionid, $lkid);
    }
```

The codeSchemaVersion is used for upgrading the module in place, should the author release a new version the number should be incremented.

## Installing and Updating

Each Module must have a record in the `module` table. This can be automatically added and changed using the InstallOrUpdate method in the class.

```
/**
 * Install or Update this module
 */
public function InstallOrUpdate() {
    // This function should update the `module` table with information about your module.
    // The current version of the module in the database can be obtained in $this->schemaVersion
    // The current version of this code can be obtained in $this->codeSchemaVersion

    // $settings will be made available to all instances of your module in $this->settings.
    // These are global settings to your module, 
    // not instance specific (i.e. not settings specific to the layout you are adding the module to).
    // $settings will be collected from the Administration -> Modules CMS page.
    // 
    // Layout specific settings should be managed with $this->SetOption in your add / edit forms.

    if ($this->schemaVersion <= 1) {
        // Install
        // Call "$this->InstallModule($name, $description, $imageUri, $previewEnabled, $assignable, $settings)"
    }
    else {
        // Update
        // Call "$this->UpdateModule($name, $description, $imageUri, $previewEnabled, $assignable, $settings)"
        // with the updated items
    }

    // After calling either Install or Update your code schema version will match the database schema version
    // and this method will not be called again. 
    // This means that if you want to change those fields in an update to your module, 
    // you will need to increment your codeSchemaVersion.
}
```

The `$this->schemaVersion` variable can be compared to the `$this->codeSchemaVersion` to determine the install or update actions required.

## Adding and Editing on a Layout

Each module should provide a method to display add / edit forms and to save the module to the Layout. There are 4 methods that should be implemented to provide this functionality:

*   AddForm
*   AddMedia
*   EditForm
*   EditMedia

### The response object

All module forms in [[PRODUCTNAME]] are requested and rendered via AJAX and a helper object called Response Manager is included to facilitate the AJAX communication. All content that is returned to the browser is done through the `$this->response` object.

The response object is the last item to be returned from any of the above 4 calls.

```
// The response must be returned.
return $this->response;
```

The response object can take a number of actions once the request has completed, for example loading another form.

### Permissions

When editing a module the permissions of the logged in user should be validated.

```
// Edit calls are the same as add calls, except you will to check the user has permissions to do the edit
if (!$this->auth->edit) {
    $this->response->SetError('You do not have permission to edit this assignment.');
    $this->response->keepOpen = false;
    return $this->response;
}
```

### Using the Theme Class

The Theme class should always be used to provide the end user with the option of Theming your form. Module Theme files are stored in `modules/theme` rather than the `theme/html/` folder.

The application will always try to load a template specific theme file before any module specific file provided with the module.

Forms will usually pass the same set of core data to the theme file for rendering.

```
Theme::Set('form_id', 'ModuleForm');
Theme::Set('form_action', 'index.php?p=module&mod=' . $this-&gt;type . '&q=Exec&method=AddMedia');
Theme::Set('form_meta', '
    &lt;input type="hidden" name="layoutid" value="' . $this-&gt;layoutid . '"&gt;
    &lt;input type="hidden" id="iRegionId" name="regionid" value="' . $this-&gt;regionid . '"&gt;
    &lt;input type="hidden" name="showRegionOptions" value="' . $this-&gt;showRegionOptions . '" />
    ');
```

The template file is then rendered with a call to `$this->response->html = Theme::RenderReturn('media_form_text_add');`


### Validating Input

Input should be validated using the Kit class GetParam method.


```
$variable = Kit::GetParam('duration', _POST, _INT, 0);
```

### Getting and Setting options on the XLF

Data associated with the configuration of the module can either be set as "options" or "raw" content in the XLF. In most cases an option is sufficient.

```
$this->SetOption('name', $value);
```

Options can be retrieved by name.

```
$value = $this->GetOption('name');
```

## Preview

In most cases the preview should be handled exactly as the client would handle the preview. There is a helper method to make the necessary framework calls.

```
return $this->PreviewAsClient($width, $height);
```

## GetResource

When it comes time to render the content on the Display client it is the CMS responsibility to download a fully rendered HTML page containing all of the information required to display the module.

### HTML Templates

A HTML template should be used as the starting point for all rendered module output. The template is run in isolate on the client and shouldn't rely on any resources that might not be available. For example on-line resources that would not be present if the client is running off-line.

A standard template is provided for convenience.

``` html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
    <head>
        <title>Xibo Open Source Digital Signage</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=[[ViewPortWidth]]" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Copyright 2006-2014 Daniel Garner. Part of the Xibo Open Source Digital Signage Solution. Released under the AGPLv3 or later. -->
        <!--[[[HEADCONTENT]]]-->
    </head>
    <!--[if lt IE 7 ]><body class="ie6"><![endif]-->
    <!--[if IE 7 ]><body class="ie7"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--><body><!--<![endif]-->
        <!--[[[BODYCONTENT]]]-->
    </body>
    <!--[[[JAVASCRIPTCONTENT]]]-->
</html>
<!--[[[CONTROLMETA]]]-->
```

The template contains place holders that should be substituted by the GetResource method.

The `[[ViewPortWidth]]` place holder is used by the client at run time.

Vendor libraries have been provided and can be loaded into the JAVASCRIPTCONTENT place holder.

``` php
$javaScriptContent  = '<script>' . file_get_contents('modules/preview/vendor/jquery-1.11.1.min.js') . '</script>';

// Replace the After body Content
$template = str_replace('<!--[[[JAVASCRIPTCONTENT]]]-->', $javaScriptContent, $template);
```

### Altering the Duration at Run Time

The duration of the running media can be altered at run time on the client by providing an override to the `CONTROLMETA` place holder.

``` php
$template = str_replace('<!--[[[CONTROLMETA]]]-->', '<!-- NUMITEMS=' . $pages . ' -->' . PHP_EOL . '<!-- DURATION=' . $totalDuration . ' -->', $template);
```