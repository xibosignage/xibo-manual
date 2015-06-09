<!--toc=getting_started-->
# Configuring the [[PRODUCTNAME]] web engine to use a specific version of Internet Explorer
The [[PRODUCTNAME]] Windows Player uses Internet Explorer as its internal web engine by default. The version of Internet Explorer (IE) will depend on the Operating System and version of the .NET framework that has been installed on the PC. 

On early versions of Windows, the version of IE typically used will be an **early** version, which may not be desirable.

## Symptoms
You have added some web content such as embedded HTML or a web page item to your layout timeline, but the content looks very different on the player than it does in the Layout Designer or CMS Layout Preview.

## Explanation
The internal web engine used by [[PRODUCTNAME]] is Internet Explorer by default. This is provided as part of the .NET framework in the `WebBrowserControl`. [[PRODUCTNAME]] can be configured to use an experimental web engine called `CEF` by creating a Display Profile - this is beyond the scope of this article.

## Resolution
A particular version of Internet Explorer can be selected by modifying the registry and restarting the Player application.

``` registry
[HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Microsoft\Internet Explorer\MAIN\FeatureControl\FEATURE_BROWSER_EMULATION]
"XiboClient.exe"=dword:0000270f
```

The registry key may already exist (there may be entries within that folder), if that is the case then add a new String Value for `XiboClient.exe`.

The example above is for IE9. Further values can be obtained from [here](https://msdn.microsoft.com/en-us/library/ee330730#browser_emulation).

## Further Reading
 - [Internet Feature Controls](https://msdn.microsoft.com/en-us/library/ee330730) by Microsoft.
 - [Browser Emulation](https://msdn.microsoft.com/en-us/library/ee330730#browser_emulation) by Microsoft.