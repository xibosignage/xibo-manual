---
toc: "widgets"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Show real time weather alerts"
keywords: "emergency weather alerts, atom feed format, custom atom feed url, NWS connector"
---

## National Weather Service

Help US citizens to prepare for extreme weather events by showing weather forecasts with real time data about severe weather, water and climate events. Raise awareness for potential hazards across your [[PRODUCTNAME]] Display network using data from the [National Weather Service (NWS)](https://www.weather.gov/).

![National_Weather_Alerts](img/media_module_national_weather_alerts_elements.png)

{version}
**NOTE:** Weather forecasts and warnings are for the United States, its territories and adjacent waters and ocean areas. If you would like to use this Widget, ask your Administrator to enable the **National Weather Service** from the **Modules** section.
{/version}

## Feature Overview

-  **National Weather Service Connector** uses data from the provided NWS Atom URL feed. 
- Can be used with the default **URL for the NWS Atom Feed** or a custom Atom Feed format URL can be provided.
- Add from a variety of **Elements** to tailor visual representations in the Layout Editor for maximum impact.
- Use industry standard filters to tailor messaging from returned data.
- Show multiple weather alert messages with data cycling from the NWS Atom Feed.
- Set **Criteria** when **Scheduling** to determine if the weather alert should be included in the Schedule Loop for supported Players.

{tip}
{nonwhite}
By setting the **Criteria Type** to "Emergency Alert" and the **Category** to "Met" will ensure that Layouts with NWS Elements will be automatically added to the Schedule Loop whenever an active **Emergency Alert** occurs!
{/nonwhite}
{/tip}

## Player Feature Support

{feat}National Weather Service|v4{/feat}

## Further Reading

[Connectors Management](/media_modules_connectors)

[Data Widgets](/layouts_editor_data_widgets)

[Layout Editor](/layouts_editor)

{nonwhite}
[Schedule Criteria](/developer/player-control/schedule-criteria)
{/nonwhite}

