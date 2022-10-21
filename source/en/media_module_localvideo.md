<!--toc=widgets-->

# Local Video

The Local Video Widget is used for video that exists **only** on the **Display** and is not uploaded to the CMS, such as; 

\- Manually transferred videos

\- Videos on a LAN

\- Streamed Videos

{feat}Local Video Widget|v3{/feat}

## Add Widget

Locate **Local Video** from the [Widget](layouts_widgets.html) toolbar and click to **Add** or **Grab** to drag and drop to a Region.

{version}
NOTE: If you are using a 1.8.x CMS, select Local Video from the Widget Toolbox to add!
{/version}

On adding, configuration options are shown in the properties panel:

![Local Video Add](img/v3.1_media_localvideo_configuration.png)

- Complete a local file path or URL to the video, this can be an RTSP Stream.

- Optionally Set a duration to override the default.
- Use the drop down to select how the video should be **scaled**.
- Use the checkbox to mute/unmute the video.
- Tick to expand the content over the top of existing to show full screen. (not available in versions earlier than 2.0)

{version}
NOTE: Video scaling and RTSP streams are only supported on the Android, webOS and Linux Players. Use the [HLS](media_module_hls.html) Widget to show compatible video streams on Window and Tizen Players.
{/version}

{tip}
The number of RTSP streams you can show on one Layout is dependent on the device being used.
{/tip}

{tip}
**Please note:** [Transitions](tour_transitions.html) are not supported for the Tizen Player.
{/tip}

## Actions 

**Available from v3.0.0**

Interactive Actions can be attached to this Local Video Widget from the **Actions** tab. Please see the [Interactive Actions](layouts_interactive_actions.html) page for more information.

