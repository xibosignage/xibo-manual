<!--toc=widgets-->
# Finance
The [[PRODUCTNAME]] Finance widget provides access to the [Yahoo! YQL API](https://developer.yahoo.com/yql/console/?q=show%20tables&env=store://datatables.org/alltableswithkeys#h=select+*+from+yahoo.finance.xchange+where+pair+in+(%22EURUSD%22%2C%22GBPUSD%22)).

At the time of writing the Yahoo! API is a public source of data that can be used free of charge for non-commercial usage and for commercial usage with Yahoo approval. Please refer to the below resources for more information:

 - [API FAQ](https://developer.yahoo.com/faq/)
 - [API Terms of Use](https://policies.yahoo.com/us/en/yahoo/terms/product-atos/apiforydn/index.htm)
 - [API Network Guidelines](https://policies.yahoo.com/us/en/yahoo/guidelines/ydn/index.htm)
 - [Attribution Guidelines](https://developer.yahoo.com/attribution/)
 - [Usage notes](https://developer.yahoo.com/yql/guide/usage_info_limits.html)

**It is the content creators responsibility to ensure that the necessary permissions have been obtained for data usage *before* this module is used and that the necessary attribution is in place.**


## Installation
The module must be installed on the Module Administration page before it is available for use on Layouts.

## Advanced Usage
The *template* tab of the Add/Edit forms allow selection of a predefined template and provision of custom code via the Override checkbox.

When Override is selected the designer is responsible for manually entering the necessary information to return the data and render the template.

There are 5 pieces of information required:

 - HTML (CKEditor provided for simple text)
 - CSS
 - Query
 - Result Indicator
 - Item

#### Query
The Query box should contain the YQL (Yahoo Query Language) query that should be requested in order to retrieve the results for display. The [Yahoo! Console](https://developer.yahoo.com/yql/console/?q=show%20tables&env=store://datatables.org/alltableswithkeys#h=select+*+from+yahoo.finance.xchange+where+pair+in+(%22EURUSD%22%2C%22GBPUSD%22)) can be used to experiment with these queries.

The YQL should always make use of an IN clause such that:

``` sql
IN ([Item])
```

[Item] is then substituted with the contents of the *Item* edit box.


#### Result Indicator
The result indicator is the element name of the results provided by Yahoo! and can be found using the developer console.

For example the `yahoo.finance.xchange` table returns results in the following format:

``` json
{
 "query": {
  "count": 2,
  "created": "2015-09-03T11:50:00Z",
  "lang": "en-US",
  "results": {
   "rate": [
    {
     "id": "EURUSD",
     "Name": "EUR/USD",
     "Rate": "1.1227",
     "Date": "9/3/2015",
     "Time": "12:49pm",
     "Ask": "1.1228",
     "Bid": "1.1227"
    },
    {
     "id": "GBPUSD",
     "Name": "GBP/USD",
     "Rate": "1.5278",
     "Date": "9/3/2015",
     "Time": "12:49pm",
     "Ask": "1.5280",
     "Bid": "1.5275"
    }
   ]
  }
 }
}
```

In this case the *Result Indicator* is `rate` as that is the name of the property contained below the `results`  object.

### Templates
Any set of Template/CSS/YQL/resultIndicator and Item can be saved in a JSON template that should be located in the `modules/finance` folder with the `.json` extension.

Any templates found in that folder will be available for selection in the Template list and provide a user friendly way to reuse complex designs.

Templates have the following format:

```
{
  "id":"stock-simple",
  "value":"Stock Quote - Simple Text Output",
  "template":"<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif;\"><span style=\"font-size:62px;\">[symbol] [Change]<\/span><\/span><\/p>",
  "css":"",
  "yql": "select * from yahoo.finance.quote where symbol in ([Item])",
  "item": "GOOGL",
  "resultIdentifier": "quote"
}
```

The ID and Value should be unique across the CMS installation.
