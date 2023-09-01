---
toc: "widgets"
minHeadingLevel: 2
excerpt: "Display Dashboards that have been configured to use the Xibo Dashboards Service"
keywords: "xibo dashboards service, power bi, grafana, matomo"
persona: "content manager"
---

# Dashboards

{white}
**Please note:** If you would like to take advantage of this Widget, please contact your Administrator.
{/white}

{nonwhite}
The Dashboards Widget is used to display [Dashboards](media_dashboard_service.html) that have been configured to use the [Xibo Dashboards Service](/docs/setup/xibo-dashboard-service)

**Please note:** This commercial Widget is part of the **Xibo Dashboard Service** and requires an API for configuration as further explained [here](/pricing#dashboards)

{feat}Dashboards|v4{/feat}

## Configuration

- Select the dashboard service to match the dashboards that have been configured in the connector.
- Enter the URL to embed.

{tip}
Please see the following page for further information on obtaining a URL to use with this service, authentication mechanisms and possible limitations [Xibo Dashboard Service](/docs/setup/xibo-dashboard-service)
{/tip}

- Provide an update interval in minutes.

{version}
**NOTE:** The minimum refresh interval that can be entered per dashboard is 5 minutes as we do not support dashboard service updates more frequently than 5 minutes.
{/version}

On first entering a URL into the Dashboard Widget it may take a few moments to load as it is dependent on how long it takes to render your dashboard content, and how busy the service currently is.

Once you are showing your dashboards on displays, the service will keep your dashboards updated at the interval you specify so it will always be ready to show and appear instantly on Displays.

If you stop showing a dashboard on your displays for a time, then the service will stop refreshing it, but will start again automatically the next time that dashboard is shown.


{tip}

By default reports in **Power BI** render with a US Date format. To use an alternative date format add the following parameters to the URL you pass in the Dashboards Widget as shown with the example below for `en-GB`:

`&language=en&formatLocale=en-GB`

{/tip}

**Please note:** If Xibo detects an error with a request for dashboard services, you will see a red banner message over the top of a screengrab to give an indication to the user where the problem has occurred. This will be shown in the Layout Designer previewer only for the logged in user. The Layout Preview and Displays showing the scheduled Layout will continue to show the last good capture or a spinner icon until the issue has been resolved.

Example Error message with screengrab shown below:

![Example Error Message](img/v4_media_modules_dashboard_error.png)



