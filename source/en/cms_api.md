<!--toc=api-->
# CMS API

## Authentication
Authentication is via oAuth access code flow. Users must be directed to the CMS URL and authorise any application before API access is granted.

An application needs to be added to the CMS before an authorisation request can be processed. The CMS will provide a key/secret to store in application code. If an application is open source and generally useful, we can include the application record in the CMS release.

## Methods
The API is [Swagger Compliant](http://swagger.io/) and the documentation is generated using Swagger Codegen. It is included as [static HTML](../api-doc.html) in this manual. You may also point a Swagger-UI installation to the `/swagger.json` resource in your CMS instance.