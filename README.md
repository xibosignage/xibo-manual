# Introduction
Welcome to the Sigme User Manual.
This manual is base on the Xibo Manual and added Japanese translation.

This repository contains the source content for the original xibo manual in english and Sigme manual in Japanes. 
Some modifications and customizations are added at template/custom/sigme directory.

## Support
Please track all issues related xibo original manual here: https://github.com/xibosignage/xibo/issues
Prease track issues for Sigme Manual here: https://github.com/SigmeSignage/sigme-manual/issues

## Building
The manual is built by running generate.php.
# php genarate sigme

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
