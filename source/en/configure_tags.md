---
toc: "configure"
maxHeadingLevel: 3
minHeadingLevel: 2
alias: "tour_tags"
excerpt: "Creation and Management of Tags used throughout the CMS"
keywords: "associated values, system tags, required value, assigning tags, delete tags in bulk"
---

# Tags

Tags are used throughout the CMS in order to easily organise and categorise items to make it easier for Users to locate and use. Tags act as keywords or labels which when assigned to items enhances the search functionality for Users. 

{nonwhite} 

## How-to Video

{video}gHRMKiiXdRA|how_to_managing_tags.png{/video}
{/nonwhite}

Tags can be created by Users from various forms throughout the CMS, as well as created and managed by Administrators from the Tags page under the Administration section of the main CMS menu.

Create and assign **Tags** to items throughout the CMS using the Tag field on forms. As text is entered, an auto-complete helper will show possible matches to make it easier for Users to see what Tags are already available to select from:

- Select a **Tag** from the list or create a new one by directly typing in the Tag field.

Tags can also be be created by Administrators from the **Tags** page under the **Administration** section of the main CMS menu.

- Click the **Add Tag** button and give it a **Name**.

Tags can optionally have Tag Values associated with them. For example, you could have a Reception Tag, with reception areas across multiple sites. These could be differentiated using Values by creating a comma separated string of numbers, 1,2,3.

The **Required Value** checkbox is used to ensure that a User ***must*** select a Value in order to successfully assign the Tag to the item.

Once enabled, when the Tag is selected by Users, any associated Values will be shown for selection. A warning message will be shown to Users who do not select a Value to prompt them to do so.

Users can also add associated Values to Tags using the **Tag Value** field in forms.

Administrators can view all **System Tags** from the Tag management page and view Usage reports using the row menu for each individual Tag.

Use the **With Selected** option at the bottom of the grid to **Delete** Tags in bulk.

## Further Reading

[Managing Folders](configure_folders.html)

## FAQs

*Can I use filter options to exclude Tags from searches?*

- Enter `-Tag` to exclude the tag from search results.
- Enter `-|Value` to exclude the value from search results.
- Enter `-Tag|Value` to exclude both tag and value from search results.

You can have a comma separated mix of all the above!

- If you want to show all items that have **not** got a tag then enter `--no-tag`























