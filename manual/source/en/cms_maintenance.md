<!--toc=getting_started-->
# Maintenance

Maintenance is an important part of any system and should always be configured. Maintenance keeps the database and files in trim condition, alerts when there are errors and runs in the background. Maintenance is configured in the CMS settings, under the Maintenance heading.

<a name="Introduction"></a>
### Introduction

When [[PRODUCTNAME]] is running, logs and statistics slowly accumulate on the server and consume disk space. In extreme cases the sheer 
volume of those records can cause the server interface to slow and become unresponsive.

It is also reassuring to know that if there is a problem with a display and it stops checking in with the [[PRODUCTNAME]] server, you will 
be notified by email so you can take action to resolve the problem.

The maintenance script can be scheduled to run periodically and perform background clean-up tasks such as deleting old logs and 
statistics, and checking the status of the displays.

<a name="Prerequisites"></a>
### Prerequisites

In order to send email notifications, your PHP must have a working mail() command.

You need to ensure your PHP installation is configured to send mail via a 
[local](http://email.about.com/od/emailprogrammingtips/qt/Configure_PHP_to_Use_a_Local_Mail_Server_for_Sending_Mail.htm) or [remote](http://email.about.com/od/emailprogrammingtips/qt/Configure_PHP_to_Use_a_Remote_SMTP_Server_for_Sending_Mail.htm) SMTP server.

Once you have verified that your PHP installation has a working mail() command, you can proceed to the next step.

### Setup for New [[PRODUCTNAME]] Installations

[[PRODUCTNAME]] server 1.2.0 and later have the maintenance functionality.

New [[PRODUCTNAME]] installations come pre-populated with some default values for the maintenance script, but with the entire system 
disabled. You can proceed to the configuration section.

### Setup for [[PRODUCTNAME]] Installations &lt; 1.2.0

Only [[PRODUCTNAME]] server versions 1.2.0 and later have this functionality. If you're upgrading your older [[PRODUCTNAME]] server installations to 1.2.0 
then you will be prompted to modify the default settings as part of the upgrade process.

If you decide to enable the maintenance script as part of your upgrade, it will automatically be configured to use "protected" 
mode as this is the most secure option. The other options are discussed in detail below. You should change your Maintenance Key immediately 
in protected mode as the default key is publicly available and offers no protection.

<a name="Configuration"></a>
### Configuration

Configuration for the maintenance script can be found in [[PRODUCTNAME]] server at "Administration -&gt; Settings -&gt; Maintenance" tab.

There are several options associated with the maintenance script:

*   Maintenance Enabled (`MAINTENANCE_ENABLED`):

    *   **Off** - All maintenance functionality is disabled.
    *   **On** - All maintenance functionality is enabled. You can use any of the methods below to call the maintenance script on a schedule without specifying a key.
    *   **Protected** - All maintenance functionality is enabled. You must specify the correct key when calling the maintenance script. This is to prevent unauthorised persons from repeatedly calling the script and generating large amounts of alert email.
*   Maintenance Key (MAINTENANCE_KEY)

    The secret key required to allow the maintenance script to run when "Maintenance Enabled" is set to "Protected" mode.
*   Email Alerts (MAINTENANCE_EMAIL_ALERTS)

    Globally enable or disable the sending of email alerts. You can enable/disable alerts for individual displays in Display Management.
*   Alert Timeout (MAINTENANCE_ALERT_TOUT)

    Globally configure how many minutes after a display lasts connects to the server we should consider it to have a problem and cause analert to be sent. You can override this default for individual displays in Display Management. You should make sure this time is longerthan the collection interval you have configured on your clients to avoid false positive alerts.
*   Email To (mail_to)

    Who should the alert emails be sent to?
*   Email From (mail_from)

    Who should the alert emails appear to be from?
*   Log Maximum Age (MAINTENANCE_LOG_MAXAGE)

    How many days worth of log messages to keep. Logs older than this will be deleted. Set to 0 to keep all logs indefinitely.
*   Statistics Maximum Age (MAINTENANCE_STAT_MAXAGE)

    How many days worth of statistics to keep. Statistics older than this will be deleted. Set to 0 to keep all statistics indefinitely.

Once you have decided which of the options you want to enable and the parameters required, you need to setup some mechanism for calling 
the **maintenance.php** script on a schedule. Skip to the appropriate section for your server below.

If you do not have permission to setup scheduled tasks on your server, you could arrange for a remote computer to call the maintenance.php script.

<a name="Windows_Scheduled_Task"></a>
## Windows Scheduled Task

This section is broadly based upon the Moodle Cron documentation available [here](http://docs.moodle.org/en/Cron#Managing_Cron_on_Windows_systems).

*   Find the php.exe or php-win.exe program on your server. It will be in your PHP installation directory.
*   Setup a **Scheduled Task**

*   Go to Start -&gt; Control Panel -&gt; Scheduled Tasks -&gt; Add Scheduled Task.
*   Click "Next" to start the wizard:
*   Click the "Browse..." button and browse to your php.exe or php-win.exe and click "Open"
*   Type "[[PRODUCTNAME]] Maintenance" as the name of the task and select "Daily" as the schedule. Click "Next".
*   Select "12:00 AM" as the start time, perform the task "Every Day" and choose today's date as the starting date. Click "Next".
*   Enter the username and password of the user the task will run under (it does not have to be a privileged account at all).Make sure you type the password correctly. Click "Next".
*   Mark the checkbox titled "Open advanced properties for this task when I click Finish" and click "Finish".
*   In the new dialog box, type the following in the "Run:" text box:
```
c:\php\php-win.exe -f c:\path\to\[[PRODUCTNAME]]\maintenance.php secret
```
Replace secret with your Maintenance Key if you are running in Protected Mode.
*   Click on the "Schedule" tab and there in the "Advanced..." button.
*   Mark the "Repeat task" checkbox and set "Every:" to 5 minutes, and set "Until:" to "Duration" and type "23" hours and "59" minutes.If you are Alert Timeouts are less than 5 minutes, you may want to run the maintenance script more often.
*   Click "OK".*   **Test your scheduled task**.

You can test that your scheduled task can run successfully by clicking it with the right button
and chosing "Run". If everything is correctly setup, you will briefly see a DOS command window while php executes and fetches the cronpage and then it disappears. If you refresh the scheduled tasks folder, you will see the _Last Run Time column_
in detailed folder view) reflects the current time, and that the Last Result column displays "0x0" (everything went OK).If either of these is different, then you should recheck your setup.

<a name="Maintenance_on_Unix_Servers" id="Maintenance_on_Unix_Servers"></a>

## Maintenance on Unix Servers

This section is broadly based upon the Moodle Cron documentation available [here](http://docs.moodle.org/en/Cron#Using_a_cron_command_line_in_Unix "http://docs.moodle.org/en/Cron#Using_a_cron_command_line_in_Unix").
There are different command line programs you can use to call the maintenance page from the command line. Not all of them may be available
on a given server.

For example, you can use a Unix utility like 'wget': 

```
wget -q -O /dev/null http://example.com/[[PRODUCTNAME]]/maintenance.php?key=changeme
```

Note in this example that the output is thrown away (to /dev/null).

The same thing using lynx:

```
lynx -dump http://example.com/[[PRODUCTNAME]]/maintenance.php changeme &gt; /dev/null
```

Note in this example that the output is thrown away (to /dev/null).

Alternatively, you can use a standalone version of PHP, compiled to be run on the command line. The disadvantage is that you need to 
have access to a command-line version of php. The advantage is that your web server logs are not filled with constant requests to 
maintenance.php and you can run at a lower I/O and CPU priority.

```
 php /var/www/[[PRODUCTNAME]]/maintenance.php changeme
 ```

Example command to run at lower priority:

```
 ionice -c3 -p$$;nice -n 10 /usr/bin/php /var/www/[[PRODUCTNAME]]/maintenance.php changeme &gt; /dev/null
 ```

<a name="Running_maintenance_with_crontab" id="Running_maintenance_with_crontab"></a>

### Running maintenance with crontab

This section is broadly based upon the Moodle Cron documentation available [here](http://docs.moodle.org/en/Cron#Using_the_crontab_program_on_Unix "http://docs.moodle.org/en/Cron#Using_the_crontab_program_on_Unix").
Most unix-based servers run a version of cron. Cron executes commands on a schedule.

Modern Linux distributions use a version of cron that reads its configuration from /etc/crontab. If you have an /etc/crontab, 
edit it with your favourite editor, otherwise run the following to edit the crontab:

```
crontab -e
```

and then adding one of the above commands like:

```
*/5 * * * * wget -q -O /dev/null http://example.com/[[PRODUCTNAME]]/maintenance.php?key=changeme
```

The first five entries are the times to run values, followed by the command to run. The asterisk is a wildcard, indicating any time. 
The above example means run the command _wget -q -O /dev/null..._ every 5 minutes (*/5), every hour (*), every day of the month (*), 
every month (*), every day of the week (*).

The "O" of "-O" is the capital letter not zero, and refers the output file destination, in this case "/dev/null" which is a black 
hole and discards the output. If you want to see the output of your cron.php then enter its url in your browser.

*   [A basic crontab tutorial](http://linuxweblog.com/node/24 "http://linuxweblog.com/node/24")
*   [Online version of the man page](http://www.freebsd.org/cgi/man.cgi?query=crontab&amp;apropos=0&amp;sektion=5&amp;manpath=FreeBSD+6.0-RELEASE+and+Ports&amp;format=html "http://www.freebsd.org/cgi/man.cgi?query=crontab&amp;apropos=0&amp;sektion=5&amp;manpath=FreeBSD+6.0-RELEASE+and+Ports&amp;format=html")

For **beginners**, "EDITOR=nano crontab -e" will allow you to edit the crontab using the [nano](http://www.nano-editor.org/dist/v1.2/faq.html "http://www.nano-editor.org/dist/v1.2/faq.html") editor. Ubuntu defaults to using the nano editor.

Usually, the "crontab -e" command will put you into the 'vi' editor. You enter "insert mode" by pressing "i", then type in the line as above, then exit 
insert mode by pressing ESC. You save and exit by typing ":wq", or quit without saving using ":q!" (without the quotes). Here is an 
[intro](http://www.unix-manuals.com/tutorials/vi/vi-in-10-1.html "http://www.unix-manuals.com/tutorials/vi/vi-in-10-1.html") to the 'vi' editor.