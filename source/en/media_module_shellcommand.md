---
toc: "widgets"
minHeadingLevel: 2
excerpt: "Use the Shell Command Widget to execute external commands"
keywords: "operating system shell, terminate commands"
persona: "content manager"
---

# Shell Command

Use Shell Command to instruct the Display to execute a command outside of the [[PRODUCTNAME]] environment, using the operating system shell.  

{feat}Shell Command|v4{/feat}

{tip}
Add the Shell Command Widget to Layouts to execute external commands, such as ‘volume up’ for a Layout with an Audio Widget that is set to play, and ‘volume down’ when the Layout finishes.
{/tip}

{cloud}
{nonwhite}

This Module is disabled by default for **Xibo Cloud Hosted** customers. If you would like to utilise the Shell Command functionality to execute actions on loading a Layout, then please contact our help desk via [My Account](https://xibosignage.com/my-account/tickets?open=true) to request to have this Module enabled.

{/nonwhite}
{/cloud}

## Overview

- The command is executed when a Layout/Playlist containing the Shell Command Widget plays at its scheduled time.
- Select a preconfigured stored command.
- Create a command string using the command builder to pass directly to the shell, further information can be found [here.](displays_command_functionality.html)
- Enter a command string using free text.
- Global commands allow for compatible commands to work with all Player types.
- Android and Linux Players require root access to use Shell Commands.
- Enable launching created commands via Windows Command Line (cmd.exe)
- Run a command for a fixed period by setting a duration, for example where your command shows something on the screen for a time and cannot close itself.

{tip}
On ticking the **Set a duration** box and entering a time in seconds on the **Advanced** tab, options will be made available on the **Configuration** tab to instruct [[PRODUCTNAME]] to terminate the command it started running.

In most cases, commands that are run from a Layout / Playlist tend to be background commands which trigger something to happen like screen on/off or restart the device etc. In such cases, the Set a duration box can be left unticked.

For commands that are executed on a specific date/time, such as  ‘reboots’, 'turn on/off' on opening/closing times for example, then please see the [Add Event](scheduling_events.html#content-add-event) in the Scheduling section and [Send Command](displays.html#content-send-command) in the Displays section.
{/tip}

#### Next...

[Command Functionality](displays_command_functionality.html)













