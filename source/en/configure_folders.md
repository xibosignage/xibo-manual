---
toc: "configure"
maxHeadingLevel: 3
minHeadingLevel: 2
alias: "tour_folders"
excerpt: "Create and Manage Folders to easily organise and control User objects"
keywords: "move and merge folders, folder management, home folders, sharing folder contents, force folder"
---

# Folders

Folders are used throughout the CMS and provide a great way to organise and easily locate user items within the CMS.  Additionally Folders can have view, edit, delete sharing options applied which will apply to all items saved to the Folder, making it an efficient way to control User/User Group permissions for User items.

Administrators are encouraged to assign User Groups to their Users, and then use Folder Share options to give these Users appropriate access to each other's content. Folders can be assigned to new Users from the on-boarding wizard to ensure that they are up and running from the start.

Folders are managed from the Administration section of the main CMS menu where administrators can see detailed information including who the Folder has been shared with and a breakdown of its contents.

{nonwhite} 

## How-to Video

{video}kq0vR4FZuAM|how_to_managing_folders.png{/video}
{/nonwhite}

### Creating Folders

Only administrators can create **Folders** under the **Root Folder**. 

- Right click the **Root Folder** and select **Create** to add a new Folder to the tree.


-  Further options are available from the context menu by right clicking a Folder.

- Configure View, Edit and Delete **Share** options to apply to Users/User Groups for individual Folders.

Once set, all items contained or moved to that Folder will inherit the applied options.

{tip}
Only Administrators can set Share options for Folders.
All elements of an item that need to be shared should also be moved to the Folder. This includes Media files contained on Layouts, and Layouts within Campaigns, as an example, if Users also require access to those.
{/tip}

Users can be granted access via the **Feature** functionality, to create sub-folders under parent folders they have been given access to.

Sub-Folders added to a Folder will inherit any applied Share options from the Main Folder. 

### Home Folder

Assign a Home Folder to existing Users:

- Go to **Users** under the **Administration** section of the main CMS menu.
- Use the row menu and select **Set Home Folder**.
- Select a Folder to use, or right click to create a new Folder.

{tip}
If you want Group Administrator to have the ability to set Home Folder for Users, ensure that they have the appropriate **Feature** enabled!
{/tip}

If a Folder is not selected, new content will automatically save into a Users default Home Folder location.

### Force Saving to a Folder

Administrators can prevent Users from saving into the Root Folder and instead force them to select a Folder before saving by disabling the user of the Root Folder as a default:

- Navigate to **Settings** under the **Administration** section of the main CMS menu.
- Click on the **Sharing** tab.

- Untick **Allow saving in the root folder** option.
- Click the **Save** button at the bottom.

Once configured a User ***must*** select a named Folder.

### Move Folder

Folders can be moved to another Folder location and added as a Sub-Folder using the **Move Folder** option from the context menu for a Folder.

The Folder and any contained sub-folders will be moved as a new sub-folder within the new Folder location maintaining the original Folder structure.

Moving a Folder that does not have any Share options set, will inherit any applied **Share** options of the destination Folder.

You can also select the **Merge** option to add the original Folder contents to the selected location, with the original Folder being deleted from the Folder tree.

## Folder Management

Administrators can view, create and manage all Folders of the CMS from the Folders page under the Administration section of the main CMS menu. 

This management page will show the Folders that have been shared with Users as well as folder contents. When viewing sub-folders from here, only the directly assigned share options will be shown, inherited options will not be shown.

As only empty folders can be removed, move, merge or delete contents before removing the folder.

## Further Reading

[Managing Tags](configure_tags.html)

## FAQ's

***Where can I find the Feature set for Folders to configure for Users/User Groups?***

Features are applied to a User/User Group by using the row menu for a selected User/User Group.

***What steps should I take take to allow Users the ability to Create their own Folders?***

1. Enable **Allow users to create Sub-Folders....** from the Content tab of the **Folders Feature** set.
1. Enable **View** from the **Share options** for the parent folders(s) that can have sub-folders created under them by the User/User Group. 

***What steps should I take to allow Users access to rename Folders within the menu?***

1. Enable **Rename and Delete existing folders** from the Content tab on the **Folders Feature** set.
2. Enable **Edit** from the **Share options** for the folder(s) that can be renamed by the User/User Group.

***What steps should I take to allow Users access to delete Folders from the menu?***

1. Enable **Rename and Delete existing Folders** from the Content tab on the **Folders Feature** set.
2. Enable **Delete** from the **Share options** for the folder(s) that can be removed by the User/User Group