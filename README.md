# Introduction
Welcome to the Xibo Manual.

This repository contains the source content for the Xibo manual in markdown format. 

## Support
Please track all issues in this repository here: https://github.com/openSignage/xibo-manual/issues

## Building
The manual is built by running generate.php.

```
php genarate.php [template]
```
If template is not spacified default template will be use.

### Docker
It is also possible to build the manual using Docker, resulting in a Docker
image which hosts the complete manual and a web server.

To do this issue the command:

```
./build.sh -t default -r xibo-manual
```

Where `-t` is your theme name and `-r` is the name with which to tag the 
container.

Themes must exist in `/template/custom/<theme_name>` to be built. They 
are build using inheritance from the default theme.

## Translations
To translate English manual to Japanese, translator.php can provide machine translation.

```
php translator.php [translation target md file]
If target is not spacified, all .md files are translate.
```
We are using Google translate API, you need to get API KEY to run this program.

Japanese translation is handled by Open Source Digital Signage Initiative.
