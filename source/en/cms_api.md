<!--toc=api-->
# CMS API

## Authentication
The API is secured behind an oAuth resource server which requires a valid `access_token` to be provided before access
will be granted.
 
An `access_token` can be obtained from the CMS Authorization Server.

Once an `access_token` has been obtained it should be provided with every request using an Authorization header. The 
`access_token`'s are *Bearer Tokens* and should therefore be provided as such:

```
Authorization: Bearer <<access token>>
```

`GET` and `POST` requests also accept the `access_token` in the query string/form parameters of the request. Access to
the other verbs must be using a header.

### Client Information
Applications connecting to the CMS API must do so using a `clientId` and `clientSecret` which are available from the
Applications page.

An application needs to be added to the CMS before an authorisation request can be processed.

### Grant Types
The CMS supports two grant types:
 - access_code
 - client_credentials
 
The grant type requested must be supplied in the `grant_type` query parameter whenever requesting a token.

Applications added to the CMS should specify which grant types are allowed to use those client credentials.

### Authorization Server
The CMS authorization server is used to obtain an `access_token` and can be found at `/api/authorize`. The 
authorization server supports two methods:

 - / initiate the `access_code` grant
 - /access_token obtain a token
 
## Methods
The [[PRODUCTNAME]] API is [OpenAPI Compliant](http://swagger.io/) and the documentation is presented using Swagger-UI in this manual. 
You may also point a Swagger-UI installation to the `/swagger.json` resource in your CMS instance.

<nonwhite>
[View the API documentation](../api/)

## PHP client implementation
A PHP oAuth client implementation has been provided for ease of authentication with the API. It can be found here:
https://github.com/xibosignage/oauth2-xibo-cms.
</nonwhite>

## Enveloping
All requests can be enveloped by adding `envelope=1` as a query parameter.

## Errors
API errors are reported via the 4xx and 5xx HTTP response codes, the most common of which are:

 - 404 Not Found (the resource could not be found)
 - 409 Conflict (the request conflicts with an existing entity)
 - 422 Unprocessable Entity (the entity provided is invalid)
 
Extra information is available in the response body and is JSON formatted. A human readable
error message is presented, the HTTP status code and a data block indicating further information.

An example 422 response is below:

```
{
    "error": {
        "message": "Layout Name must be between 1 and 50 characters",
        "code": 422,
        "data": {
            "property": "name"
        }
    }
}
```

5xx errors indicate an issue with the CMS environment and extra information will be available
in the CMS logs.