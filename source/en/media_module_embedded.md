<!--toc=widgets-->

# Embedded Content

Embed HTML and JavaScript to be displayed on Layouts. This allows for custom enhancements to be made to [[PRODUCTNAME]] without modifying the core application. 

{feat}Embedded HTML Widget|v3{/feat}

{tip}
Examples of where this might be useful are displaying a Clock or Weather region.
{/tip}

## Add Widget

Locate **Embedded** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a 1.8.x CMS, select Embedded from the Widget Toolbox to add!
{/version}

On adding, configuration options are shown in the properties panel:

- Provide a **Name** for ease of identification.
- Choose to override the default **duration** if required.

### Configuration

- Select if the Widget should be shown with a **transparent** background. 

  {version}
  NOTE: Transparent background is available on all Players and Windows from v2 R253!
  Ensure that the embedded content also has a transparent background!
{/version}
  
- Select to **Scale** embedded content along with the layout.
- From v3.0.0 users can select to **Preload** the Widget off screen. 
  {version}
  NOTE: Preload is currently available from Android v2 R207 only!
  {/version}

### Templates

![Embedded Templates](img\v3.1_media_embedded_templates.png)

### HTML to Embed

Complete HTML in the box provided or toggle **On** the Visual editor to use the inline editor to enter text and format. Click in the preview window to open the text editor.

{version}
NOTE: The Visual Editor is not available in a 1.8.x CMS.
{/version}

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

Interactive Actions can be attached to this Embedded Widget from the **Actions** tab. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.