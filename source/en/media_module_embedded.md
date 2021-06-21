<!--toc=widgets-->

# Embedded Content

The Embedded Content Widget allows HTML and JavaScript to be embedded into a **Region** on a Layout. This allows for custom enhancements to be made to [[PRODUCTNAME]] without modifying the core application. 

{tip}
Examples of where this might be useful are displaying a Clock or Weather region.
{/tip}

## Add Widget

Click on **Embedded** from the [Widget](layouts_widgets.html)  toolbar and click to add or drag and drop ![Embedded Widget](img\v2_media_embedded_widget.png)

{tip}
If you are using a 1.8.x CMS, select Embedded from the Widget Toolbox to add!
{/tip}

On adding, configuration options are shown in the Edit Embedded form:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

### Configuration

- Select if the Widget should be shown with a **transparent** background. 

  {tip}
  Transparent background is available on all Players and Windows from v2 R253!
  {/tip}

  {tip}
  Ensure that the embedded content also has a transparent background!
  {/tip}

- Select to **Scale** embedded content along with the layout.
- From v3.0.0 users can select to **Preload** the Widget off screen. 
  {tip}
  Preload is currently available from Android v2 R207 only!
  {/tip}

### Templates

![Embedded Templates](img\v3_media_embedded_templates.png)

### HTML to Embed

Complete HTML in the box provided or toggle **On** the Visual editor to use the inline editor to enter text and format. Click in the preview window to open the text editor.

{tip}
Please note: The Visual Editor is not available in a 1.8.x CMS.
{/tip}

### Custom Style Sheets

Use a CSS style sheet to control the visual styling.

### HEAD content to Embed

Enter the content to put in the HEAD of the document in the box provided.

JavaScript should be wrapped in `script` tags. [[PRODUCTNAME]] will automatically add jQuery.

The `EmbedInit()` method will be called by the Player and can be used to safely start any custom JavaScript at the appropriate time. The method is defaulted on any new Embedded media Item.

```html
<script type="text/javascript">
function EmbedInit()
{
    // Init will be called when this page is loaded in the client.

    return;
}
</script>
```

{tip}
Show embedded HTML with Active-X content on a Windows Player, with the security settings of IE, so that local files are allowed to run active content by default. This can be done in Tools -> Internet Options -> Advanced -> Security -> "Allow Active content to run in files on My Computer".
{/tip}

## Actions 

**Available from v3.0.0**

Actions can be attached to this Widget, please see the [Interactive Actions](layouts_interactive_actions.html)  page for more information.