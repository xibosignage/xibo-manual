# Introduction
Welcome to the Xibo Manual.

This repository contains the source content for the Xibo manual in markdown format. 

## Support
Please track all issues in this repository here: https://github.com/xibosignage/xibo/issues

## Building
The manual is built by running generate.php.

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

We are not in a position to accept translated contributions for Manuals. 

Please see our [FAQ](https://community.xibo.org.uk/t/how-can-i-translate-xibo/11183) for further information.