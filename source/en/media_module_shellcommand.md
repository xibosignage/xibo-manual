<!--toc=widgets-->
# Shell Command

The Shell Command Module is used to instruct the Display to execute a **Command** outside of the [[PRODUCTNAME]] environment, using the operating system shell.  

**Please note: This Module is not supported for webOS**.

{cloud}

{nonwhite}

This module is disabled by default for **Xibo in the Cloud** Customers. If you would like to utilise the Shell Command functionality to execute actions on loading a Layout, then please contact our help desk and open a [ticket](https://xibo.org.uk/help#commercial) asking to have this Module enabled.

{/nonwhite}

{/cloud}

The Command is executed when a Layout containing the Shell Command Widget plays at its Scheduled time.

A Shell command can be an **"ad hoc"** command string which is passed directly to the shell or a **predefined** **command** configured by an Administrator.

{tip}

It is recommended that predefined commands should be used where possible. If you require additional commands, please contact your Administrator to create a new predefined command or provide a command string to include.

{/tip}

 If a command string is specified then an option for Windows or Linux is provided.

\- **Windows Command** - will be executed using `cmd.exe`.

\- **Linux Command** - Linux/Android Players require **root access** to use Shell Commands.

![Shell Command Form](img/media_shellcommand_form.png)

{tip}

Shell Commands do not have a duration, they are executed once and then expire automatically.
{/tip}

Add the Shell Command Widget to Layouts to execute external commands, such as ‘volume up’ for a Layout with an Audio Widget that is set to play, and ‘volume down’ when the Layout finishes.

{tip}

For commands that are executed on a specific date/time, such as  ‘reboots’, 'turn on/off' on opening/closing times for example, then please see [Events](scheduling_events.html) in the Scheduling section and [Send Command](displays.html) in the Displays section of this User Manual.

{/tip}