<!--toc=getting_started-->

# Maintenance
Maintenance is an important part of any system and should always be configured. 
Maintenance keeps the database and files in trim condition, alerts when there are 
errors and runs in the background. Maintenance is configured in the CMS settings, 
under the Maintenance heading.

## Introduction

When [[PRODUCTNAME]] is running, logs and statistics slowly accumulate on the server 
and consume disk space. In extreme cases the sheer volume of those records can cause 
the CMS web interface to slow and become unresponsive.

It is also reassuring to know that if there is a problem with a display and it stops 
checking in with the [[PRODUCTNAME]] server, you will be notified by email so you can 
take action to resolve the problem.

The maintenance script can be scheduled to run periodically and perform background 
clean-up tasks such as deleting old logs and statistics, and checking the status of 
the displays.


## Configuration

Configuration for the maintenance script can be found in [[PRODUCTNAME]] server at 
"Administration -&gt; Settings -&gt; Maintenance" tab.

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

If [XTR](xtr.html) is configured on the CMS instance it is **not necessary** to configure 
"Enable Maintenance?" and "Maintenance Key" as the Maintenance Tasks are run securely from the command line.

If the environment is not compatible with XTR it is necessary to arrange a 3rd party service to call the 
[maintenance web route](xtr.html#trouble_running_via_cron_/_schedule_tasks?).
