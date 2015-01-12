<!--toc=media-->
#PowerPoint
PowerPoint is a proprietary format from Microsoft and can only be displayed on a Windows based signage player that has Microsoft PowerPoint installed.

**From Office 2010 onwards PowerPoint presentations can be exported as Video files and played on the Ubuntu/Android display clients.**

## Preparation
First prepare the PowerPoint Presentation. PowerPoint will, by default, put scroll bars up the side of your presentation, unless you do the following for each PowerPoint file BEFORE you upload it:

1. Open your PowerPoint Document
2. Slide Show -> Set-up Show
3. Under "Show Type", choose "Browsed by an individual (window)" and then un-tick "Show scrollbar"
4. Click OK
5. Save the Presentation
6. Note also that Xibo will not advance the slides in a Presentation, so you should record automatic slide timings by going to "Slide Show -> Rehearse Timings" and then saving the presentation.

<a name="machine_preparation"></a>
## Windows Modifications
The first time you run [[PRODUCTNAME]] with a PowerPoint, you might get a pop-up appear that asks what [[PRODUCTNAME]] should do with the PowerPoint file. The pop-up actually originates from Internet Explorer. Choose to "Open" the file, and un-tick the box so you won't be prompted again.

In some circumstances, you may find that PowerPoint, the application, loads instead of the file opening within [[PRODUCTNAME]] itself. If that happens, try merging this, taken from pptfaq.com.

``` registry
[HKEY_LOCAL_MACHINE\SOFTWARE\Classes\PowerPoint.Show.8]
"BrowserFlags"=dword:00000000
```

Users of PowerPoint 2007 should go to Microsoft [KB927009](http://support.microsoft.com/kb/927009) and run the FixIT application instead. Users of PowerPoint 2010 should go here instead [KB982995](http://support.microsoft.com/kb/982995/en-us)

Disable Windows Error Reporting. Occasionally PowerPoint seems to "crash" when [[PRODUCTNAME]] closes it. Unfortunately this leaves an unsightly "PowerPoint has encountered a problem and needs to close" message on the display. Follow the [steps here to disable Windows Error Reporting completely](http://www.windowsnetworking.com/articles_tutorials/Disable-Error-Reporting-Windows-XP-Server-2003.html) - including notifications.

Also disable Office Application Error reporting. Follow instructions at [KB325075](http://support.microsoft.com/kb/325075) or merge this registry patch below.

``` registry
[HKEY_CURRENT_USER\Software\Policies\Microsoft\Office\11.0\Common]
"DWNeverUpload"=dword:00000001

[HKEY_CURRENT_USER\Software\Policies\Microsoft\Office\10.0\Common]
"DWNeverUpload"=dword:00000001

[HKEY_CURRENT_USER\Software\Policies\Microsoft\Office\12.0\Common]
"DWNeverUpload"=dword:00000001
```