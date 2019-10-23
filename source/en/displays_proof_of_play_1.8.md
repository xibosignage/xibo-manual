# Proof of Play

{tip}
If you are using 2.1 or later of the CMS, please use the following link: [Reporting](displays_metrics.html)
{/tip}

Players are capable of sending Proof of Play statistics to the CMS so you can see exactly how many times any given Layout and Media file was displayed on your Players.

On the **Proof of Play** page, under the **Reporting** section of the CMS, you can filter your results according to:

- Date (from/to) - show statistics only from specified date
- Display - show statistics only for specific display
- Media - show statistics for specific media file

## How does it work?

You have two options, either reporting is on or off:

**When it’s on**
The Player will send records “on-demand” after a threshold of records has been collected. The threshold depends on how fast the records are being collected.

If there is a backlog of records to send - for example if the Player has been without a network connection for some time - the Player will enter “backlog mode”. This mode will send the records more frequently until the backlog has been cleared.

**When it’s off**
The Player will not collect Proof of Play statistics.

**When it was on and then turned off**

The Player will send any remaining completed collected Proof of Play statistics at the next collection interval.

**What does completed records mean?**
The Player will send only completed records, for example:

If a Layout runs for 2 hours, then there will be no Proof of Play statistics regarding a Layout as a whole until it was fully displayed, but it can collect and send Media statistics if they are fully displayed. After 2 hours it will also send Proof of Play for the Layout as a whole that it was displayed.

## Display Settings

To enable stats reporting click on **Display Settings** under the **Displays** section of the CMS. Use the row menu to edit the Display Profile and on the General tab tick to **Enable stats reporting?** at the bottom of the form, Save.

