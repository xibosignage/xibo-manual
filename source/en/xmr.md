<!--toc=advanced-->
# [[PRODUCTNAME]] Message Relay
XMR for short, the message relay is responsible for **pushing** messages from the CMS to the Players. XMR is used
 for any Player Actions that need to be taken immediately. Examples of this are:

  - Change Layout
  - Collect Now
  - Revert to Schedule
  - Reboot
  - Shutdown
  - Execute Command

XMR uses a technology called ZeroMQ which must be available on your web server before it will function. If not enabled
 the fault page will show a warning.

**[[PRODUCTNAME]] will function without XMR running, but will not run any player actions. Scheduling and Layouts will
 function as normal.**

