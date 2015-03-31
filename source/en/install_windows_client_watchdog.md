<!--toc=getting_started-->
# Windows Client Watchdog
The Watchdog is an optional component which can be used to monitor the stability of the main application and restart it where necessary.

The Watchdog is installed into the same folder as the Windows Player during the Windows Player installation. **Prior to 1.7.3 it is necessary to get the watchdog from [GitHub](https://github.com/xibosignage/xibo-windows-client-watchdog)**.

## Configuration file
Configuration is managed though a configuration file located in the watchdog installation folder.

The contents of the file is as below:

``` xml
<?xml version="1.0" encoding="utf-8" ?>
<configuration>
    <configSections>
        <sectionGroup name="applicationSettings" type="System.Configuration.ApplicationSettingsGroup, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089" >
            <section name="XiboClientWatchdog.Properties.Settings" type="System.Configuration.ClientSettingsSection, System, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089" requirePermission="false" />
        </sectionGroup>
    </configSections>
    <startup> 
        <supportedRuntime version="v4.0" sku=".NETFramework,Version=v4.5" />
    </startup>
    <applicationSettings>
        <XiboClientWatchdog.Properties.Settings>
            <setting name="ClientLibrary" serializeAs="String">
                <value>C:\Users\username\Documents\Xibo Library</value>
            </setting>
            <setting name="PollingInterval" serializeAs="String">
                <value>120</value>
            </setting>
            <setting name="Threshold" serializeAs="String">
                <value>300</value>
            </setting>
            <setting name="ProcessPath" serializeAs="String">
                <value>C:\Program Files\Xibo\XiboClient.exe</value>
            </setting>
            <setting name="LogFileName" serializeAs="String">
                <value>log.xml</value>
            </setting>
        </XiboClientWatchdog.Properties.Settings>
    </applicationSettings>
</configuration>
```

The important part of the above configuration file is the settings between the `<applicationSettings>` element.

### Client Library
The library location as configured in the signage client.

### Polling Interval
How often the watchdog should check for application activity.

### Threshold
The threshold in seconds that the application has to be inactive before the watchdog will restart it.

### Process Path
The fully qualities pathname to the application EXE that should be monitored. This will be used to restart the application when it is detected as being inactive.

### Log File Name
This is the name of the log file as configured in the client that is being monitored. Downtime events and restarts will be added to the end of the usual error log.

## Start with Windows
A short cut to the watchdog EXE should be created and added to the Windows start up program group in the Start Menu.