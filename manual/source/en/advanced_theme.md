<!--toc=advanced-->
# Theme <small>CMS themes</small>

The CMS has a theme engine which currently covers 90% of the application. The theme engine has been designed with the principle of inheritance in mind, meaning that any resource requested by the CMS is passed through the currently active theme and if that theme does not contain the resource, the default theme resource is served.

This allows for a few minor modifications to have a major impact on the User Interface.

Themes are modelled as sub-folders under the "theme" folder. The theme folder is contained in the root CMS installation folder. The default theme exists in a folder called "default".

![Theme folder structure](img/advanced_theme_folder_structure.png)

Each theme has a simple config file called `config.php` which sets the title for the theme and some other meta data, for example:

```
    $config = array(
        'theme_name' => 'Xibo Default Theme',
        'theme_title' => 'Xibo Digital Signage',
        'app_name' => 'Xibo',
        'theme_url' => 'http://www.xibo.org.uk'
    );
```

The current CMS theme is activated in the General CMS Settings and is called `GLOBAL_THEME_NAME`.

A typical use case for theming is to change the logo and application name. This can be done with a new sub-folder, a `config.php` file and a new logo image file in the img sub folder.