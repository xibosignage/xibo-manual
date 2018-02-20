<!--toc=displays-->
#Displays
The primary purpose of [[PRODUCTNAME]] is to show content on screens and the entire application suite exists for that one purpose. [[PRODUCTNAME]] provides a concept called **Displays** to manage when and how content is shown on a screen.

Displays are uniquely identified by a "hardware key" which is generated when the signage player software is installed. This hardware key is used to create a Display record in the CMS and is unique to that one Display record.



##Connecting a Display
Displays connect to the CMS over an API called "XMDS" <nonwhite>(Xibo Media Distribution Service)</nonwhite>. Each signage player software application will have its own method of registering and connecting to the CMS - most of them only require the `URL` and `CMS Key`.

New Displays are added "unauthorised" and will need to be marked as authorised before they are sent any content. This is done by editing the display and setting the "Authoris Display?" option to Yes.



##Display Administration
The CMS provides a page for Display Administration which is used to show the user the Displays they have permission to view and the status of those Displays.

The display administration table gives an easy to understand overview of each display registered in the CMS. 

![Display Administration Grid](img/displays_administration.png)

The rows and columns have the following meanings:

| Column             | Explaination                                                 |
| ------------------ | ------------------------------------------------------------ |
| Status             | The status of the display. Tick (checkmark) = Player is up to date with the content (in older CMS versions, it used to be green),  [!] = Player wasn't logged in since the content change (in older CMS versions, it used to be yellow), [X] = Player is currently downloading the new content (in older CMS versions, it used to be red) |
| ID                 | The internal ID for the display.                             |
| Authorised?        | A tick or cross showing whether the display has been granted a licence with the CMS. This prevents unauthorised displays being added to the CMS. |
| Display            | A friendly name for the Display. This can be set during the registration process in the Player software. |
| Default Layout     | The default layout that will play when there are no other Layouts / Campaigns scheduled or when all scheduled Layouts are invalid. |
| Interleave Default | A tick or cross showing whether the Default Layout will play when there are other layouts scheduled. |
| Email Alert        | A tick or cross showing whether an email alert will be sent by the Maintenance module. |
| Logged In          | A tick or cross showing whether the display has logged in recently. The time out for the Display is set on each display OR in the global settings field `MAINTENANCE_ALERT_TOUT`. |
| Last Accessed      | The date/time of last access.                                |
| IP Address         | The IP address the Display had the last time it reported its status through the "Media Inventory" status call. |
| Mac Address        | The Mac Address of the Display (if the client software is capable of sending it). |
| XMR Registered     | A flag indicating whether the Display has registered for XMR or not. XMR is push messaging and Displays who have registered for it will respond much faster to changes made in the CMS. |
| Tags               | Tags added to the Display for filtering                      |
| Current Layout     | The Current Layout - reported by the Display each time a Layout change happens. This option can be enabled in Display Settings and is disabled by default. |
| Storage Available  | The available library storage on the device.                 |
| Storage Total      | The total storage on the device.                             |
| Storage Free %     | The percentage of free storage calculated using the available vs total storage |
| Description        | A friendly description for this Display                      |
| Version            | The Player Software Version                                  |
| Device Name        | The Device Name - this will be the device provided name, such as the windows computer name. |
| Timezone           | The time zone for this Display - when a new Player registers it will provide its timezone information. This can be taken as given or adjusted from the Edit Display form. The timezone should be entered correctly to ensure that statistics reporting arrives with the correct from/to dates. |
| Screenshot?        | Has a screenshot request been logged for this Display.       |
| Thumbnail          | The most recent thumbnail of this Display.                   |
| Last Command       | A flag indicating whether the last scheduled/push command was a success or not. |

### Row Menu
Displays can have a number of actions performed against them.

| Action              | Explaination                                                 |
| ------------------- | ------------------------------------------------------------ |
| Manage              | Open the Management page for this Display                    |
| Edit                | Edit a Display                                               |
| Delete              | Delete a Display                                             |
| Schedule Now        | A quick shortcut to scheduling a Layout from the current time for a particular duration |
| Assign Files        | Allows the assignment of generic files to the Display. Usually for use by an embedded media type or custom module |
| Assign Layouts      | Allows the assignment of one or more Layouts directly to the Display. Useful if these Layouts will be triggered by a push message |
| Request Screenshot  | Request a screen shot of the Display - the Player software will capture the content currently on the screen and send it back to the CMS as a thumbnail. Some content (such as certain video) will be shown as a black area in the screenshot |
| Collect Now         | Send a push message asking this Display to check in with the CMS and collect its content and configuration |
| Display Groups      | Administration of the Display Groups this Display belongs to |
| Permissions         | Adjust the User / User Group permissions on the Display - this controls who can see and edit this Display. |
| Version Information | Show the version of the signage player software installed on the Display. |
| Wake on LAN         | Send a Wake on LAN packet to the Display - requires the Wake On LAN settings to be configured. |
| Send Command        | Send a Command to this Display, from the list of Commands configured on this CMS. |

### Manage

Each Display has its own Manage page accessible from the Row Menu. This page shows a graphical dashboard of the Display's current status, including file status, errors and bandwidth usage.

This dashboard is useful for troubleshooting issues with a Display.



### Edit

Each Display has a range of configuration options specific to that Display, as well as a Display Settings Profile containing higher level options, which often apply to multiple displays.

The "Edit Display" form is accessible from the row menu and presents all options specific to the Display. Each new Display added to the CMS will require an admin to come into the Edit form at least once to adjust the "Authorised Display" option.

A list of the "general" settings that are applied to this Display from its Display Settings Profile can be viewed on the Advanced tab.

![Display Edit](img/displays_edit.png)



### Delete

Deleting a Display will remove it from the CMS entirely - this operation cannot be reversed. _A display can be deauthorised without deleting it using Display Edit_.

Deleting a Display cannot be reversed. A deleted Display can be reconnected to the CMS by repeating the "register" procedure which will create a new Display record.



## Changes and Display Status

When new content is scheduled or existing content changed, it is helpful to know that the appropriate Displays have updated with the new information. Each Display keeps a "status" and a list of required files for playback.

The overall Display status is shown in the "Status" column, which is either a tick, exclaimation or cross. Relevent changes in the CMS adjust the status of the Display accordingly as does the Display itself when it connects a downloads configuration and content. Under normal operation the status will be a tick, changing to an exclaimation if there have been changes that the Display is not yet aware of. Once the Display becomes aware of the changes the status becomes a cross and will remain a cross until the Display informs the CMS that it is "up to date".

The manage page can be viewed to see a more detailed status, but please be aware that this will only be up to date in the tick or cross states.