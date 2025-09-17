---
toc: "displays"
maxHeadingLevel: 3
minHeadingLevel: 2
excerpt: "Create Display Groups for ease of scheduling and media assignment"
keywords: "dynamic group membership, add display group"
---

# Display Groups

Group together specific **Displays** to allow content and schedules to span multiple Displays with just one configured **Event**, saving time and reducing errors. Grouping Displays makes it easier to manage an expanding network. Simply add newly connected **Displays** to an existing **Display Group** to inherit schedules and to quickly start showing content.

Group Displays by industry or location to make it easier to update and target content which differs by areas or purpose.

Display Groups can contain a mix of singular **Displays** as well as other **Display Groups** to allow you to easily target the right Displays to show your content.

For example, you could have Displays located within stores over different levels, intended to reach differing audiences so could have Display Groups that contain:

- All Displays in store A
- All Displays in store B
- All Displays that are street facing
- All Displays on level 1
- All Displays on level 2
- All internal Displays
- All external Displays

**Create Display Groups** and automatically assign **Displays** with matching criteria **dynamically** or **manually** selecting Display membership.

- Click on Add Display Group from the Display Groups grid.

## Dynamic Groups

To assign members dynamically, tick the **Dynamic Group** checkbox.

- Set the **filter criteria** to use in the format of regular comma separated expressions or simple string comparisons. 
- Prefix expressions with a `-` to exclude from filters. For example, all Displays containing `a` but not `b` in the name would be `a, -b`
- **Criteria Tags** can also be filtered using additional OR/AND filters for Displays with multiple Tags assigned.

## Manual Groups

To assign members manually, leave the checkbox unticked and click to Save the form:

- Use the row menu for the new Display Group record and select **Members** using the checkbox for each Display.

The Relationship Tree shows the ancestors and descendants. Parent Display Groups, shown above the selected Group will pass their schedule down to the Displays groups underneath.

## Nested Groups

Display Groups can be nested to simplify scheduling to allow sub-groups to inherit permissions from a parent group.

## Further Reading

[Configuring Displays](displays_configuration)

[Sync Groups](displays_sync_groups)

[Display Profile Settings](displays_settings)
