<!--toc=api-->
# CMS API
The CMS API is a full featured restful API which allows for advanced integrations with other applications and 
automation of CMS functionality.

The API enables exciting opportunities to integrate [[PRODUCTNAME]] with other systems. Imagine an integration
with a point of sale system which pushed complimentary products to the signage when a customer purchased something.

Any party connecting to the CMS is considered to be an "application" and is granted credentials according to the
Applications page in the CMS.


## Authentication
Securing the CMS is of utmost importance and the API is secured behind an oAuth resource server which requires 
a valid `access_token` to be provided before access will be granted.
 
An `access_token` can be obtained from the CMS Authorization Server.

Once an `access_token` has been obtained it should be provided with every request using an Authorization header. The 
`access_token`'s are *Bearer Tokens* and should therefore be provided as such:

```
Authorization: Bearer <<access token>>
```

### Client Information
Applications connecting to the CMS API must do so using a `clientId` and `clientSecret` which are available from the
Applications page.

An application needs to be added to the CMS before an authorisation request can be processed. After adding an 
Application it can be granted access to two different types of credentials, called grant types.

### Grant Types
The CMS supports two grant types:
 - access_code
 - client_credentials
 
The grant type requested must be supplied in the `grant_type` query parameter whenever requesting a token.

Applications added to the CMS should specify which grant types are allowed to use those client credentials. The 
`client_credentials` grant is typically used for machine-to-machine communication, whereas the `access_code` grant
type is used to authorise a user.

### Authorization Server
The CMS authorization server is used to obtain an `access_token` and can be found at `/api/authorize`. The 
authorization server supports two methods:

 - `/api/authorize/` initiate the `access_code` grant
 - `/api/authorize/access_token` obtain a token
 
## Methods
The [[PRODUCTNAME]] API is [OpenAPI Compliant](http://swagger.io/) and the documentation is presented using Swagger-UI 
in this manual.  You may also point a Swagger-UI installation to the `/swagger.json` resource in your CMS instance.

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

## Grid Data - lists of records

Lists of records, henceforth referred to as grids, are paged by default, with a default page size of 10 records. They
also have a default sort order applied to them, which is appropriate for that record type.

### Paging

Paging is controlled by 2 parameters, `start` and `length`. The `start` parameter denotes at which record in the set
the results should start from, and `length` denotes the number of records to return. The default `length` is 10 records
which means to get page 2, `start=20` would be provided.

The headers of the response contain extra information related to paging, these are:

 - `X-Total-Count`: The total count of records (all pages)
 - `Link`: Links pointing to the first, prev, next and last pages (as appropriate)

The link header is [RFC formatted](http://tools.ietf.org/html/rfc5988) and consists of a url and `;` and a `rel=` 
(relationship) attribute.

For example, the headers returned with page 1 are:

```
Link: <http://localhost/api/layout?start=20&length=10>; rel="next", <http://localhost/api/layout?start=0&length=10>; rel="first"
X-Total-Count: 26
```


### Sorting

Sorting happens in two steps using a columns array and an order array. The columns array describes the fields that 
should be ordered, and the order array describes how they should be ordered and in what order.

Taking the layout grid as an example, lets imagine we want to order by the `duration` of the layout, descending. We do 
this by specifying a columns array:

```
columns[1][data]:duration
```

And an order array:

```
order[1][column]:1
order[1][dir]:desc
```

