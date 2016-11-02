<!--toc=widgets-->
#PowerPoint
[[PRODUCTNAME]] can display PowerPoint in two different ways, the correct solution for your network will depend on whether you have a full copy of PowerPoint to install on each Player or not.

**We recommend Option 1 for new installations.**

## Option 1 - Export as a Video
From Office 2010 onwards PowerPoint presentations can be exported as Video files and played using the video module on Windows and Android displays.

To export a PowerPoint use the option on the File Menu from inside the PowerPoint application. Save the file with an appropriate name and then upload it to the [Video Module](media_module_video.html).

If your players are Android devices you should ensure that the export format is MP4 (PowerPoint 2013 onwards) or convert your video to a MP4 using a 3rd party tool.

## Option 2 - Prepare and Upload your PowerPoint PPT file
PowerPoint is a proprietary format from Microsoft and can only be displayed on a Windows based signage player that has Microsoft PowerPoint installed.

First prepare the PowerPoint Presentation. PowerPoint will, by default, put scroll bars up the side of your presentation, unless you do the following for each PowerPoint file *BEFORE* you upload it:

1. Open your PowerPoint Document
2. Slide Show -> Set-up Show
3. Under "Show Type", choose "Browsed by an individual (window)" and then un-tick "Show scrollbar"
4. Click OK
5. Save the Presentation
6. Note also that Xibo will not advance the slides in a Presentation, so you should record automatic slide timings by going to "Slide Show -> Rehearse Timings" and then saving the presentation.

<a name="machine_preparation"></a>
### Prepare your Windows Players
Install PowerPoint on your Windows PC alongside your [[PRODUCTNAME]] Player and make the following adjustments to the Windows Registry to disable the windows prompt when opening the PowerPoint. **Please ensure you have taken all necessary precautions when making these changes**.

``` registry
[HKEY_CLASSES_ROOT\PowerPoint.Show.12]
"BrowserFlags"=dword:00000002
"EditFlags"=dword:00010000

[HKEY_CLASSES_ROOT\PowerPoint.Show.8]
"BrowserFlags"=dword:00000002
"EditFlags"=dword:00010000

[HKEY_CLASSES_ROOT\PowerPoint.SlideShow.12]
"BrowserFlags"=dword:800000a0
"EditFlags"=dword:00010000

[HKEY_CLASSES_ROOT\PowerPoint.SlideShow.8]
"BrowserFlags"=dword:00000002
"EditFlags"=dword:00010000
```

If you do not feel comfortable changing the registry it may be possible to achieve the same results by waiting for [[PRODUCTNAME]] to open the first PowerPoint and then when the pop-up notification appears, choose to "Open" the file, and un-check the box so you won't be prompted again.

### Advanced Steps
When displaying PowerPoint [[PRODUCTNAME]] is relying on Windows and PowerPoint to display the content. This means that error capture and reporting is outside the control of [[PRODUCTNAME]]. To mitigate any issues we recommend disabling windows error notifications. This can be done by following the [steps here](http://www.windowsnetworking.com/articles_tutorials/Disable-Error-Reporting-Windows-XP-Server-2003.html).

If you still experience issues, it may also be advisable to disable Office Application Error reporting. Follow instructions at [KB325075](http://support.microsoft.com/kb/325075).
