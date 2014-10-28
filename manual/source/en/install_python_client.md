<!--toc=getting_started-->
##  <span id="Introduction"> Introduction </span>

There follows some basic instructions for installing the Xibo Python client on Linux.

_**This guide is for the 1.6.0 Development Preview release.**_

_**Note that this is beta software. It should not be used in production.**_

###  <span id="Who_should_test_this_software"> Who should test this software </span>

Lots of people have asked about testing the Python code base early. While it would be great to have lots of feedback early on, we're a very very small development team and can't support even tens of people though the installation and configuration. I respectfully request therefore that you have a few months of experience with the Xibo system and enough Linux know-how that you'd be comfortable compiling some software from source yourself if you want to be involved at this early stage.

###  <span id="What_you_should_expect"> What you should expect </span>

The goal initially is to replicate the functionality of the Windows .net client, with the exception of PowerPoint support. It should give you broadly the same output for any given layout, except that the Python client is multi-threaded so there are some low level differences between the two. The Python client will not play any layout that contains PowerPoint items. The Python client supports overlapping regions. The Python client does not currently return layout statistics, but can return media statistics.

##  <span id="Hardware_Requirements"> Hardware Requirements </span>

Most reasonably modern PCs should be fine. If you need HD video playback then the faster the CPU the better, otherwise the most basic nettops are normally OK providing they have nVidia graphics. You _must_ have a supported graphics card - most nVidia cards work fine using the binary nVidia drivers.

There is a list of hardware and it's compatibility here: [Python Client Hardware Compatibility List](python_client_hardware.html "Python Client Hardware Compatibility List")

##  <span id="Software_Requirements"> Software Requirements </span>

Most modern linux distros should work. I'm developing on Ubuntu so **Ubuntu 12.04** - **32 bit Desktop edition**. I've not built, tested or provided binaries for 64 bit versions.

Xibo server 1.6.0 or later.

##  <span id="Automated_Installation"> Automated Installation </span>

The easiest way to install the client is by using the official installer.

It can be downloaded from the release page - currently [https://launchpad.net/xibo/1.6/1.6.0-rc1](https://launchpad.net/xibo/1.6/1.6.0-rc1).

Once downloaded on to your Ubuntu system, open a Terminal and type

``` 
sudo bash /path/to/the/xibo-1.6.0-ubuntu.all-pyclient.sh 
```

The installer will then take you through the steps required to install.

Skip straight to the configuration section below.

##  <span id="Manual_Install_Guide"> Manual Install Guide </span>

The official manual install guide is below. You're recommended to use the official installer where possible as it's a great deal simpler!

###  <span id="Ubuntu_12.04_and_derivatives"> Ubuntu 12.04 and derivatives </span>

This guide is aimed at people who know what they're doing with Linux, so I'm not going to hold your hand through the install. Here's the basic information you need based on an Ubuntu 12.04 Precise Pangolin installation.

*   Download [Ubuntu 12.04](http://www.ubuntu.com/getubuntu/download) 32 bit Desktop Edition and install on the target machine. I suggest a 20GB / partition, some swap and the remainder of the disk formatted and mounted as /opt/xibo. This ensures that the client writing logs etc won't lock you out of the box if the drive fills up.

*   Once Ubuntu is installed, update the machine to get any patches etc:
```
sudo apt-get update
sudo apt-get dist-upgrade
```

*   Reboot

*   If you're using a nVidia card, ensure you're using the binary drivers by referring to the Restricted Driver Manager and enabling them if they're disabled. (Note: I've not tried the new OS nVidia drivers - they may work now).

*   Install the following packages:
```
sudo apt-get install bzr libvdpau1 libboost-python1.46.1 libboost-thread1.46.1 libdc1394-22 libswscale2 libavformat53 python-soapy libxss1 python-feedparser python-serial flashplugin-nonfree libavcodec53 libavformat53 libswscale0
```

*   Unpack the binary distribution of libavg/Berkelium/libbrowsernode in to /. Binaries are available here: [[1]](https://launchpad.net/xibo/1.6/1.6.0-rc1/+download/libavg-1.8.0-vdpau-berkelium11-12.04.tar.gz) If for some reason you need to compile all that yourself then full source and build instructions are available here: [libbrowsernode Build Instructions](index.php?toc=developer&p=admin/pyclient_libbrowsernode_build "Libbrowsernode Build Instructions"). _(Trust me you don't want to. It takes hours and requires about 4GB of disc space)_

*   Run the following:
```
sudo ldconfig
```

*   If you want to use the Tahoma font, install the ttf-tahoma-replacement package.

*   Download the python client:
```
cd /opt/xibo
  bzr branch lp:xibo/1.6 pyclient
```

##  <span id="Configuration"> Configuration </span>

###  <span id="Online_Mode"> Online Mode </span>

Create / edit the configuration in /opt/xibo/pyclient/client/python/site.cfg. A site.cfg.default is provided for you to copy as a starting point. defaults.cfg contains all the possible configuration directives. You'll need to edit at least the following:

```  
[Main]
  xmdsUrl=[http://127.0.0.1](http://127.0.0.1)
  xmdsClientID=test
  xmdsKey=test
  xmdsUpdateInterval=90
  requireXmds=false
  width=960
  height=540
  bpp=24
  fullscreen=false
```

xmdsUrl is the address of your Xibo server (eg [http://my.xibo.server.com/xibo](http://my.xibo.server.com/xibo))

xmdsClientID is a random string used to generate the client identifier. This will change in future but for now just set it to something random.

xmdsKey is the server key for your Xibo instance

xmdsUpdateInterval is the number of seconds between polls to the webservice for updated content

requireXmds can be either "true" or "false" (ie not "True" or "False"). If true, the client must successfully connect to the webservice before playing cached content.

width is the width of your screen in pixels (or the window you want the player to run in if not in fullscreen mode)

height is the height of your screen in pixels (or the windows you want the player to run in if not in fulscreen mode)

fullscreen can be either "true" or "false" (ie not "True" or "False"). If true, the client will run fullscreen otherwise it'll run windowed.

###  <span id="Offline_Mode"> Offline Mode </span>

The client can be configured to run in an offline mode - where the client will have no direct communication with the Xibo server. _**This feature is available in client versions 1.2.1a1 onwards.**_

In this mode, the client receives updates via a USB stick. Content is put on to the memory stick by the [Offline Download Client](index.php?toc=getting_started&p=install/offline_download_client "Offline Download Client").

*   Create / edit the configuration in /opt/xibo/pyclient/client/python/site.cfg. A site.cfg.default is provided for you to copy as a starting point. defaults.cfg contains all the possible configuration directives. You'll need to edit at least the following:
``` 
[Main]
  xmdsLicenseKey=key here
  manualUpdate=true
  width=960
  height=540
  bpp=24
  fullscreen=false
```

xmdsLicenseKey is the client's license key. You generate this with the offline download application.

manualUpdate puts the client in offline update mode.

width is the width of your screen in pixels (or the window you want the player to run in if not in fullscreen mode)

height is the height of your screen in pixels (or the windows you want the player to run in if not in fullscreen mode)

fullscreen can be either "true" or "false" (ie not "True" or "False"). If true, the client will run fullscreen otherwise it'll run windowed.

The client expects the operating system to mount USB sticks inserted in to the client PC under the /media directory. The client will scan that location frequently looking for updated content for that display (a USB stick can hold updated content for one or more clients). If new content is found, an amber dot will be shown at the top left of the screen. Once the client has finished downloading content from the USB stick, the amber dot will be replaced with a green dot which will remain for a few seconds to indicate completion.

##  <span id="Running_the_client"> Running the client </span>

```  
cd /opt/xibo/pyclient/client/python
  ./run.sh
```

Once the client is running, it will first attempt to register with the server and then proceed to attempt to pull content. Once the client is running, go to the server and give it a license.

To see what the client is doing, press 'i' to bring up the hidden infoscreen. You'll see the client's IP address, remaining disk space, currently running layout ID, scheduled layout IDs and a list of media items for those layouts. Media items in italics failed checking and are therefore invalid. They will be downloaded again automatically.

With the infoscreen up, you can force the client to collect from the server by pressing 'r' (refresh). You'll see the 'Schedule' and 'Required Files' lights blink amber as the client connects up and return to green. Red lights indicate either the client isn't licensed or a problem connecting to the server. Grey lights indicate no attempt to connect to the server yet.

With the infoscreen up, you can skip to the next layout by pressing 'n'. You quit the client by pressing 'q'.

##  <span id="Reporting_Problems"> Reporting Problems </span>

As this isn't released code please do NOT report bugs in Launchpad bugs. Please ask a question in Launchpad questions making it very clear that you're using the python client and which bzr revision you've got. You can find out as follows:

```  
cd /opt/xibo/pyclient
  bzr log | head
  ------------------------------------------------------------
  revno: **182**
  committer: Alex Harrington &lt;alex@longhill.org.uk&gt;
  branch nick: xibo-python
  timestamp: Fri 2009-12-18 23:09:25 +0000
  message:
    [pyclient] Fixed a whole raft of issues with the previous two commits.
  ------------------------------------------------------------
```

If the client throws an exception then I'll need the full text of the exception along with the circumstances that caused it. If the client isn't doing what you expect, send a question. I may well ask you for full debug output as follows

###  <span id="Full_Debug_Output"> Full Debug Output </span>

*   Edit site.cfg:
```  
[Logging]
  logWriter=XiboLogFile
  logLevel=10
```

*   Now run as normal (ie ./run.sh)

*   Once the problem has occured, stop the client running and compress run.log (which will hopefully contain the information we need).

###  <span id="Known_Issues"> Known Issues </span>