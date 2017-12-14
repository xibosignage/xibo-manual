<!--toc=api-->
#[[PRODUCTNAME]] API

Welcome to the [[PRODUCTNAME]] API documentation. This is an advanced topic for developers who want to integrate [[PRODUCTNAME]] with another application.

The API is split into 2 separate sections:

 - CMS API
 - Player API (XMDS)

This split ensures that the Players can consume a simple, reliable, dedicated API which is easier to maintain and version between application versions. It also increases the flexibility of the Player API implementation.


## Player API
The Player API is referred to as XMDS, which stands for [[PRODUCTNAME]] media distribution service. XMDS is a SOAP service with a set of end points defined by a WSDL.

The XMDS WSDL can be consumed at `//yoururl/xmds.php?wsdl&v=5`.

The Player API version can be requested with `xmds.php?v=X` where X is the version requested. The latest version is version 5.

### XLF
Layouts are provided by XMDS in their XLF format ([[PRODUCTNAME]] Layout Format). This is an XML file which represents the Layout presentation and content.

## CMS API
The CMS API is a RESTful API protected by oAuth. It can be consumed at `//yoururl/api` and exposes routes for all CMS operations.

If developing a CMS extension for use within the existing web portal (for example an extension to be used in a theme file), the API can be consumed directly from `//yoururl/`.

The [[PRODUCTNAME]] API is [OpenAPI Compliant](http://swagger.io/) and the documentation is presented using Swagger-UI in this manual. 
You may also point a Swagger-UI installation to the `/swagger.json` resource in your CMS instance.