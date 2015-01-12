<!--toc=layouts-->
# Regions

Regions are defined areas on the Layout that can hold sets of content (called Playlists). Regions can be moved around inside the Layout using drag and drop, and resized using the Resize Handle in the Lower Right hand corner of the Region.

![Empty Region](img/layouts_designer_region_resize.png)

With each change to a Region a "Save Position" button will appear at the top of the Layout. This must be clicked to Save the Changes that have been made.

If a Layout has been created from a Template it will most likely have a full screen Region pre-created - Regions are shown on the Layout Designer as semi-transparent white overlays.

The Display clients have limited support for overlapping Regions - for the best compatibility please sure the Regions do not overlap.

## Adding Regions

Regions are added using the Layout Designer Options Menu. Once the Add Region menu item is clicked a new region appears and is ready to be moved or resized by the designer.

![Resize a region](img/layouts_designer_region_resize_handles.png)

## Region Menu

Each Region has its own menu of Actions - similar to the Action menu found on the Layout Table. The Action menu for Regions always appears at the top right of the Region and also shows the Width, Height and Coordinates.

![Layout Designer Screenshot - Add Region](img/layouts_designer_region_menu.png)


- **Edit Timeline**
        
    Assign content to this Region or change the sequence of existing content.


- **Options**
        
    Assign the Region a name and manually adjust its width, height and coordinates.


- **Delete**
        
    Completely remove this Region and all its associated content.
        
- **Permissions**
    
    Control which users and user groups can view/edit/delete this Region.


Ideally Regions that are intended for Video content should be at the same aspect ratio as the indented content.


## Options
The Region options form allows for naming a region, precise sizing and positioning and exit transitions.

To get a full screen Region go into the Region options and select "Set Full Screen".

## Permissions

The owner of the layout has full control on how the new layout is to be shared. A globally shared layout may have one of its layout region access rights being disabled for any other user edit. Right click within the region and select "Permissions" to define the selected region access rights to other users of the CMS