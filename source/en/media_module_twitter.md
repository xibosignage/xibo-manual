<!--toc=widgets-->
# Twitter

The [[PRODUCTNAME]] Twitter widget provides access to the [Twitter Search API](https://dev.twitter.com/rest/public/search).

## Installation

Access to the Twitter API is protected and users must register for an API key and enter that key in to the Xibo CMS settings.

### Connecting to Twitter

* As a first step you will need to head to the modules page in your CMS and click on the link to install Twitter module.

* Now you need to obtain API key and API secret from [Twitter]( https://dev.twitter.com/apps/new) page.
	* log into your Twitter account
	* Supply the necessary required fields, accept the terms of service, and solve the CAPTCHA.
	* Submit the form
	* Make a note of the generated consumer key (API key) and consumer secret (API secret)

* As a last step head to the modules page in your CMS click on the row menu for Twitter module, click edit and enter your API key and API Secret.
	* Optionally adjust the Cache Period value to determine how long to cache a results set for each Twitter search. Note that setting low values can cause your access to the Twitter API to be disabled for generating too many requests.
	* Save changes

<nonwhite>
### Xibo Cloud Users

The process of connecting to the Twitter API is simplified for Spring Signage Cloud customers.

* From the Modules page of the CMS, find the Twitter Provider module, click on the row menu for this module and select Connect to Twitter.
* In the newly opened form click the Login with Twitter button, to allow you to authorise the CMS to connect via your Twitter account.
* Follow the on-screen instructions to authorise the CMS to use your Twitter account.

</nonwhite>

## Adding to a Layout

### Substitutions
The following substitutions are available to use in your own templates:

[Tweet]
[User]
[ScreenName]
[Date]
[ProfileImage]
[Photo]
