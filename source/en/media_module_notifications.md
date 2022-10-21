<!--toc=widgets-->

# Notifications

Display messages created in the [Notification Drawer](users_notifications.html) of the CMS on Layouts.

{feat}Notification Widget|v3{/feat}

## Add Widget

Locate **Notification** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a v1.8.x CMS, select Notification from the Widget Toolbox to add!
{/version}

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

- Select if the duration should be per Notification or a total duration for **ALL** Notifications.

### Configuration

- Complete a maximum notification **Age** for messages you wish to use in this Widget.
- Select an optional **Effect** and transition **Speed** for the selected effect from the drop-down menu.

### Templates

Click on the **Template** tab to format available templates:

![Notification Template](img\v3.1_media_notifications_templates.png)

#### Main 

- Enter HTML in the box provided or toggle On the **Visual editor** to format the template using the inline editor.
- Click the edit icon to open.

![Notification Editor](img\v3.1_media_notifications_inline_editor.png)

- Include the text merge fields to format from the **Snippets** menu, to pull in the **Subject** and **Body** information from the Notification Drawer. 
- Click on the **Save** button.

### No Data Template

This template allows a user to include a message to ensure that the intended audience is not left with blank displays when there are no Notifications to display. 

### Optional Style Sheet

Include CSS to apply to the template structure.

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Notifcation Widget from the **Actions** tab in the properties panel. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.