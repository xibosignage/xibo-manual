<!--toc=tour-->

# CMS Dashboards

Dashboards can be assigned when creating [Users](users_administration.html) and allow as well as restrict other areas of the CMS.

There are four **Dashboard views** of the CMS that can be assigned to Users, which will be the first screen **Users** will see after login.  

## Status Dashboard

The CMS **Status Dashboard** is the default Dashboard for **Super Admin Users** and is intended as a high-level view of the system for Administrators. It provides information relating to Library and Bandwidth usage, Display Activity and Latest news.

![CMS Status Dashboard](img/tour_cms_status_dashboard.png)



## Icon Dashboard 

The CMS Icon Dashboard is the default Dashboard for all new assigned **Users** and is intended as a **Launcher** into other areas of the CMS. The icons within the Dashboard are shown/hidden according to the permissions for the User.

![CMS Icon Dashboard](img/tour_cms_icon_dashboard.png)



## Media Manager Dashboard

The CMS Media Manager Dashboard can be enabled for **Users** who should only edit the **Media** they have been given permission for. The Media Manager Dashboard gives a restricted access view of the CMS presented in a grid style interface which lists each item the User has permissions to edit. Users can use the dropdown menu to select **Widgets** from **Drafts** or **Playlists** and use the available filters.

![CMS Media Dashboard](img/tour_cms_media_dashboard.png)

{tip}
Ensure that your User has the required Permissions applied so that they can access the Media Manager Dashboard and view/edit content of a Layout. See [Permissions](users_permissions.html) for guidance.
{/tip}

## Playlist Dashboard

**This dashboard is available from v2.3**

The **Playlist Dashboard** can be assigned to Users who belong to the **Playlist Dashboard User** User Group so that they only have access to upload/replace media in **Playlists** they have been given permission to.

The Playlist Dashboard gives a restricted view of the CMS with a User only able to select a Playlist to manage using a drop-down menu.

![Playlist Dashboard](img/v2.3_tour_cms_dashboards_playlist_dashboard.png)

**Spots** are configured using the [Sub-Playlist Widget](media_module_subplaylist.html) to determine how many media files a User can upload. 

{tip}
**Please note:** Administrators need to ensure that the **Sub-Playlist Widget** has been added to a Layout and configured to show the User's Playlist with defined Spots before the User can add/replace Media using the Playlist Dashboard.
{/tip}

