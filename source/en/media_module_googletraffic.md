<!--toc=widgets-->
# Google Traffic

**This module requires a Google API key which has associated usage charges. Please make sure you are aware of the usage charges before entering your key in this Module's configuration**.

Traffic data can be added to a Layout using the Google Traffic Widget. The Widget takes the 
following options:

 - Name
 - Duration
 - Display Location / Lat & Long
 - Zoom

The traffic data can be based on the location of each display by ticking "Display Location".
Once ticked the lat/long recorded on the Display record is used. This means you can have
one Layout of traffic data which is reused on multiple displays and shows the traffic in
the correct location on each display.

You can also specify a lat/long manually.

The Zoom setting relates to how close/far away the ariel view of the map is. The higher
the number the closer to ground level. A zoom of 1 is "whole globe".



## Display Notes

This module requires a valid internet connection on the Player in order to function.



## Configuration

The Google Traffic module must be configured with a Google Maps API key before use. The "[get a key](https://developers.google.com/maps/documentation/javascript/get-api-key)" documentation describes the process and differences between the keys.

Once a key is obtained it should be entered on the Module Settings Form (CMS -> Modules Page). This page also contains a setting for the default duration and the minimum duration. Please make sure you understand these two settings and configure them in a suitable way for your environment. The Google API is charged per map load and therefore how long the Widget remains on screen has a direct relation on the charges you will accrue.

Until an API key is entered the Widget will not render in the Layout Designer or the Player, although you can still add the Widget to your Layouts.



## Terms

The Google Maps API terms of use must be read and understood before using this module. At
the time of writing these terms can be found [here](https://developers.google.com/maps/terms).