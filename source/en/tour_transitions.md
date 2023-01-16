<!--toc=tour-->

# Transitions

{feat}Transitions|v3{/feat}

{version}

**Note:** Transitions are not supported by Tizen Players for the following Widgets:

- [Video](media_module_video.html)
- [Video In](media_module_video_in.html)
- [Local Video](media_module_localvideo.html)

{/version}

Transitions are managed from the **Transitions** page under the **Administration** section of the main CMS menu:

![Transitions Grid](img\v3_layouts_transitions_grid.png)



This grid is used to determine which Transitions are available for assignment to Media items.

- **Fade In** - Increase Opacity from 0 to 100.
- **Fade Out** - Decrease Opacity from 100 to 0.
- **Fly** - Fly in or out on a compass point.

## Transition Defaults

{version}
**Note:** Transition Defaults are available from v2.2.0
{/version}

Set a Default Transition **Type** and **Duration** from the **Settings** page under the **Administration** page of the main CMS menu:

![Default Transitions](img\v3_layouts_default_transitions.png)

- Use the check box to automatically apply the defaults to all Widgets when a User adds a new Layout.

{tip}
Ensure you click the green Save button at the bottom of the tab to save all changes!
{/tip}

## Editing Transitions

Default Transitions can also be enabled for all Widgets on a Layout using the Properties Panel in the Layout Designer

![Transitions Layout](img\v3_layouts_transitions_layout.png)

{tip}
**Please note:** When Transition Defaults are applied to a Widget, the fields will show as blank fields.

![Transitions Widget](img\v3_layouts_transitions_widget.png)

Only **manually** entered Transitions will show in the form fields.
{/tip}

## Playlist Transitions

Transitions between two **Media items** on a Playlist are called **Playlist Transitions**. They are used to transition between two media items and are set as **In** and **Out** transitions.

{tip}
The Transition form adapts depending on the Transition selected and the options available for that transition. In most cases it is necessary to select a duration for the Transition in Milliseconds and in the case of Fly, a direction must also be selected.
{/tip}

## Region Exit Transition

A Region Exit Transition happens when the last Media Item to be displayed in a Region is shown. This only occurs once **all Media items** have expired in the other Regions and can have a different Transition set. This Transition is set on the Region itself.