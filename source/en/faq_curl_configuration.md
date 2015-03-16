<!--toc=getting_started-->
# Using Tickers and other external resources over HTTPS
It is easy to reference and use external sources in [[PRODUCTNAME]] widgets such as Tickers, however special consideration may need to be taken when referencing resources provided over SSL (anything with HTTPS at the front of the Address).

## Symptoms
You have added a Ticker which references a feed served over HTTPS and nothing is shown. You have checked the logs and note a message similar to:

```
SSL certificate problem, verify that the CA cert is OK
```

The message originates from something called `curl`.

## Explanation
`curl` is a PHP extension which allows the CMS to download resources from external sources like the Internet or a Local Network.

Any time [[PRODUCTNAME]] uses `curl` it makes sure that it "Verifies the Peer". In basic terms this means it checks to ensure whomever supplies the data is who they say they are.

[[PRODUCTNAME]] does this because if something is served over HTTPS then it is reasonable to assume the returned information is sensitive and that it should be protected and verified.

The certificate problem error occurs because `curl` uses a bundle of "CA root certificates" to perform the verification and these certificates are missing on some installations. For example, these certificates are almost always missing on Windows Installations.

## Resolution
The web server that hosts the CMS needs to be updated with the latest CA root certificates. This may sound complicated, but is actually very easy.

1. Download the latest CA root certificate from the [curl website](http://curl.haxx.se/docs/caextract.html).
2. Edit the `php.ini` file for your PHP installation to tell `curl` where the root certificate is located. You will be adding a line that looks like `curl.cainfo=c:\php\cacert.pem`.
3. Restart the web server.

If these steps still produce the same error, then the certificate signing the resource you have requested in invalid and you actually want the error to be thrown to protect your data.

## Further Reading
There are some excellent sources of further reading:
 - [Stop turning off CURLOPT_SSL_VERIFYPEER and fix your PHP config](http://snippets.webaware.com.au/howto/stop-turning-off-curlopt_ssl_verifypeer-and-fix-your-php-config/) by Ross McKay
 - [Latest root certificate](http://curl.haxx.se/docs/caextract.html)
 - [PHP option to set in PHP.ini](http://php.net/manual/en/curl.configuration.php)