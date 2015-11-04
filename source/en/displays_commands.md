<!--toc=displays-->
# Commands
The commands functionality in [[PRODUCTNAME]] is used to configure a set of predefined commands which can have a different
 command string per player. This is particularly useful if the network of players is mixed between Windows/Android or even
 if the players are slightly different hardware or connected to different displays.
 
A command record is created with a name, description and unique command code. The command string is then entered on a
 display settings profile. All displays with that profile will then use the command string whenever they are asked to 
 execute a particular command.
 
Commands also provide easy access to functionality such as RS232, Android Intents, etc.

## Configuring a command
Commands are initially created on the **Commands** page in the CMS.

![Commands](img/displays_commands_page.png)

The usual CMS functionality to add/edit and delete commands is provided.

All commands are then presented on the Display Profile Edit form under the Commands tab:

![Display Profile Edit Commands Tab](img/displayprofile_commands_tab.png)

For each command a *command* and *validation* can be specified.

### Command
The command string represents the final executed command and can be a direct call to the shell or can have a *helper*
 specified. See below.

### Validation
The validation string is used as a comparison to the command output and if it matches then the command is considered a
 success. This string can be a regular expression.

## Scheduling
Commands can be scheduled using the standard Schedule Page by selecting the *command* event type when adding/editing a
 schedule.

## Use on Shell Commands
Commands can be selected when adding a Shell Command Widget to a Layout.

<a id="helpers"></a>
## Helpers

### RS232
[[PRODUCTNAME]] supplies a RS232 wrapper application which can be used to send RS232 commands to players, this is accessed
 by using the `rs232` prefix on the command string.

 > todo: add rs232 command string example

### Android Intents
Android display profiles can use the `intent` helper to specify an intent that should be called when the command executes.
 The format of the command is `intent <activity> [<extras>]`.

### HDMI-CEC
This is a bus that is implemented on nearly all new large screen TVs that have HDMI connectors. This bus (which 
 is physically connected within normal HDMI cables) supports control signals that can perform power-on, power off, 
 volume adjust, selection of video source and many of the features that are accessible via the TV's remote control. It can 
 also control most other hardware on the HDMI bus.

[[PRODUCTNAME]] doesn't provide a direct interface to HDMI-CEC as there are many different manufacturer specifications, however
 it is possible to control HDMI-CEC via a batch file.