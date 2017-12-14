<!--toc=manual_install-->
# Routine Tasks
XTR is [[PRODUCTNAME]]'s task scheduler and caters for running routine tasks on the CMS. Typical
 tasks include Maintenance, Email Alerts, Archiving and 3rd party integrations.

Tasks are run by a php script which is scheduled to run with either CRON, Task Scheduler
 or the equivalent system on your OS.

### Prerequisites

The operating system the CMS is installed on must have a task scheduler and must have access to
a PHP Command Line (CLI).

In addition, in order to send email notifications, the PHP CLI must have a working mail() command. You 
need to ensure your PHP installation is configured to send mail via a 
[local](http://email.about.com/od/emailprogrammingtips/qt/Configure_PHP_to_Use_a_Local_Mail_Server_for_Sending_Mail.htm) or [remote](http://email.about.com/od/emailprogrammingtips/qt/Configure_PHP_to_Use_a_Remote_SMTP_Server_for_Sending_Mail.htm) SMTP server.

Tasks are run in parallel for maximum efficiency and therefore the system must support 
[pcnt_fork](http://php.net/manual/en/function.pcntl-fork.php).

## Configuration

### Docker

If you are using the [docker installation](install_docker.html) then XTR will be configured and 
running already and this section can be skipped.

### UNIX Crontab

This section is broadly based upon the Moodle Cron documentation available 
[here](http://docs.moodle.org/en/Cron#Using_the_crontab_program_on_Unix). Most unix-based servers 
run a version of cron. Cron executes commands on a schedule.

Modern Linux distributions use a version of cron that reads its configuration from /etc/crontab. 
If you have an /etc/crontab, edit it with your favourite editor, otherwise run the following to 
edit the crontab:

```
crontab -e
```

and then add:

```
* * * * * /usr/bin/php /var/www/xibo/bin/xtr.php
```

The first five entries are the times to run values, followed by the command to run. The asterisk is a 
wildcard, indicating any time.

**Importantly** the `xtr.php` file must be run by a user which can share files with the user account your web
server runs under. If you run `crontab -e` you will need to do so as said user, and if you edit `/etc/crontab` you 
can specify the user in the task.

```
* * * * * www-data /usr/bin/php /var/www/xibo/bin/xtr.php
```

This is because XTR may update cached files.


There are CRON resources available online which may be useful:

*   [A basic crontab tutorial](http://linuxweblog.com/node/24)
*   [Online version of the man page](http://www.freebsd.org/cgi/man.cgi?query=crontab&amp;apropos=0&amp;sektion=5&amp;manpath=FreeBSD+6.0-RELEASE+and+Ports&amp;format=html)

For **beginners**, "EDITOR=nano crontab -e" will allow you to edit the crontab using 
the [nano](http://www.nano-editor.org/dist/v1.2/faq.html) editor. Ubuntu defaults to using the nano editor.

Usually, the "crontab -e" command will put you into the 'vi' editor. You enter "insert mode" by pressing 
"i", then type in the line as above, then exit insert mode by pressing ESC. You save and exit by 
typing ":wq", or quit without saving using ":q!" (without the quotes). Here is an 
[intro](http://www.unix-manuals.com/tutorials/vi/vi-in-10-1.html) to the 'vi' editor.


## Windows Scheduled Task

This section is broadly based upon the Moodle Cron documentation available 
[here](http://docs.moodle.org/en/Cron#Managing_Cron_on_Windows_systems).

*   Find the php.exe or php-win.exe program on your server. It will be in your PHP installation directory.
*   Setup a **Scheduled Task**
*   Go to Start -&gt; Control Panel -&gt; Scheduled Tasks -&gt; Add Scheduled Task.
*   Click "Next" to start the wizard:
*   Click the "Browse..." button and browse to your php.exe or php-win.exe and click "Open"
*   Type "[[PRODUCTNAME]] Maintenance" as the name of the task and select "Daily" as the schedule. 
    Click "Next".
*   Select "12:00 AM" as the start time, perform the task "Every Day" and choose today's date as the 
    starting date. Click "Next".
*   Enter the username and password of the user the task will run under (it does not have to be a 
    privileged account at all).Make sure you type the password correctly. Click "Next".
*   Mark the checkbox titled "Open advanced properties for this task when I click Finish" and 
    click "Finish".
*   In the new dialog box, type the following in the "Run:" text box:

```
c:\php\php-win.exe -f c:\path\to\[[PRODUCTNAME]]\xtr.php
```

Replace secret with your Maintenance Key if you are running in Protected Mode.

*   Click on the "Schedule" tab and there in the "Advanced..." button.
*   Mark the "Repeat task" checkbox and set "Every:" to 1 minute, and set "Until:" to "Duration" and type "23" hours and "59" minutes.
*   Click "OK".*   **Test your scheduled task**.

You can test that your scheduled task can run successfully by clicking it with the right button
and chosing "Run". If everything is correctly setup, you will briefly see a DOS command window 
while php executes and fetches the cronpage and then it disappears. If you refresh the scheduled 
tasks folder, you will see the _Last Run Time column_ in detailed folder view) reflects the current 
time, and that the Last Result column displays "0x0" (everything went OK). If either of these is 
different, then you should recheck your setup.

## Trouble running via CRON / Scheduled Tasks?

Users that cannot run CRON will not be able to run tasks, however it is important the maintenance
still be run in these cases.

For this purpose the Maintenance Routes are available via the web address at 
`http://<host>/maint?key=changeme`.
 
Accessing over the web route will require a key, which is configured via the CMS settings:

 - Enable Maintenance?
 - Maintenance Key
 
The key is required if Enable Maintenance is set to "Protected" - this is strongly recommended. More
information is available in the [Maintenance Section](cms_maintenance.html).