<!--toc=displays-->
# Commands
The commands functionality in [[PRODUCTNAME]] is used to configure a set of predefined commands which can have a different
 command string per player. This is particularly useful if the network of players is mixed between Windows/Android or even
 if the players are slightly different hardware or connected to different displays.

A command record is created with a name, description and unique command code. The command string is then entered on a
 display settings profile. All displays with that profile will then use the command string whenever they are asked to
 execute a particular command.

This 2-stage approach means that the same commands can be scheduled across multiple
 player types (be they different operating systems, have difference LCD panels connected, etc).

Commands also provide easy access to functionality such as RS232, Android Intents, etc.

## Configuring a command
Commands are configured in 2 steps:
 
  1. Create the Command
  2. Configure the Command string per Display Profile
 
This allows a generic command to be created which can be used in a schedule, executed via XMR or used in a Layout. The 
 command can be used **across different types of players** as the command string is created in the Display Settings
 Profile.
 
For example, imagine a mixed network of Windows and Android players and a command called "Reboot". The command string
 for reboot on windows is `shutdown /r now`, on android it is `reboot`.
 
The same can also be useful with a non-mixed network - imagine a network of Windows players with different monitors
 connected over HDMI/RS232. A single command called "Monitor On" can be created and the different brands of monitor can 
 be represented by different display settings profiles, and each can have a different command string to turn the 
 monitor on/off.
 
 
Step 1 is done on the **Commands** page.

![Commands](img/displays_commands_page.png)

The usual CMS functionality to add/edit and delete commands is provided.

Step 2 is done on the Display Profile Edit form under the Commands tab:

![Display Profile Edit Commands Tab](img/displayprofile_commands_tab.png)

For each command a *command* and *validation* can be specified.

#### Command
The command string represents the final executed command and can be a direct call to the shell or can have a *helper*
 specified. See below.

#### Validation
The validation string is used as a comparison to the command output and if it matches then the command is considered a
 success. This string can be a regular expression.

## Scheduling
Commands can be scheduled using the standard Schedule Page by selecting the *command* event type when adding/editing a
 schedule.

Scheduled commands are executed once on the Player and only require a From Date.
 The command can be executed up to 10 seconds after the from date selected.

## Use on Shell Commands
Commands can be selected when adding a Shell Command Widget to a Layout. Shell
 Commands with a Command as their source act in the same fashion as normal
 shell commands. They should usually be used in a region on their own so they
 are executed only once each time the Layout is shown.

<a id="helpers"></a>
## Helpers
Command Helpers are prefixes that can be added to the command string in order to
 take a more advanced action. Commands without a prefix are executed in the
 shell of the operating system which runs the Player. `cmd.exe` on Windows and
 `shell` on Android.

#### RS232
RS232 commands can be executed on Players by using the `rs232` prefix in
 the command string. The format of the command is `rs232|<connection string>|<command>`.

The connection string should be provided in the following format on Windows:

```bash
<COM#>,<Baud Rate>,<Data Bits>,<Parity|None,Odd,Even,Mark,Space>,<StopBits|None,One,Two,OnePointFive>,<Handshake|None,XOnXOff,RequestToSend,RequestToSendXOnXOff>,<HexSupport|0,1,default 0>
```

Please note, if you need to send your command in HEX format, you should specify the byte string in the command string,
for example: `7E 00 00 FF 00 00 00 00 00 00 00 00 00 00 00 00 00 FF`, this will be converted to a byte stream by the
player. You will need to set the `HexSupport` element of the connection string to `1`.

The connection string should be provided in the following format on Android:

```bash
<DeviceName>,<Baud Rate>,<Data Bits>,<Parity>,<StopBits>,<FlowControl>
```

Each setting is represented by a corresponding number:

```
DATA_BITS_5 = 5;
DATA_BITS_6 = 6;
DATA_BITS_7 = 7;
DATA_BITS_8 = 8;
PARITY_NONE = 0;
PARITY_ODD = 1;
PARITY_EVEN = 2;
PARITY_MARK = 3;
PARITY_SPACE = 4;
STOP_BITS_1 = 1;
STOP_BITS_15 = 3;
STOP_BITS_2 = 2;
FLOW_CONTROL_OFF = 0;
FLOW_CONTROL_RTS_CTS = 1;
FLOW_CONTROL_DSR_DTR = 2;
FLOW_CONTROL_XON_XOFF = 3;
```


The command itself is a string which gets sent over RS232 using the connection
 details.

#### Android Intents
Android display profiles can use the `intent` helper to specify an intent that should be called when the command executes.
 The format of the command is `intent|<type|activity,service,broadcast>|<activity>|[<extras>]`.

Commands containing an intent helper are ignored in the Windows Player.

## Monitor ON/OFF

### HDMI-CEC
HDMI-CEC is a bus that is implemented on nearly all new large screen TVs that have HDMI connectors. This bus (which
 is physically connected within normal HDMI cables) supports control signals that can perform power-on, power off,
 volume adjust, selection of video source and many of the features that are accessible via the TV's remote control. It can
 also control most other hardware on the HDMI bus.

[[PRODUCTNAME]] doesn't provide a direct interface to HDMI-CEC as there are many different manufacturer specifications, however
 it is possible to control HDMI-CEC via a batch file.
 
### Serial/RS232
Industry grade monitors often have a serial interface for turning the monitor panel on and off. [[PRODUCTNAME]] can use
the RS232 command helper to send these commands to the monitor - usually in HEX mode.

The following monitors and commands have been tested:

#### NEC E464
 - Power On - `rs232|COM1,9600,8,None,One,None,1|01 30 41 30 41 30 43 02 43 32 30 33 44 36 30 30 30 31 03 73 0d`
 - Power Off - `rs232|COM1,9600,8,None,One,None,1|01 30 41 30 41 30 43 02 43 32 30 33 44 36 30 30 30 34 03 76 0d`

#### Sharp LC-42D69U
 - Power On - `rs232|COM1,9600,8,None,One,None,1|50 4F 57 52 31 20 20 20 0D`
 - Power Off - `rs232|COM1,9600,8,None,One,None,1|50 4F 57 52 00 20 20 20 0D`

#### LG 55LK520
 - Power On - `rs232|COM1,9600,8,None,One,None,1|6B 61 20 30 30 20 30 31 0D`
 - Power Off - `rs232|COM1,9600,8,None,One,None,1|6B 61 20 30 30 20 30 30 0D`

It should be noted that other models of each brand should also use the same commands.