<!--toc=getting_started-->
# Windows Player Multi-install
Multiple instances of the Windows Player can be configured to run together on a single PC. This might be desirable if you have 1 PC that drives multiple screens which are not in an extended desktop configuration.

Before choosing this route you should consider whether or not you want to show content spanning both screens - if you do you must use the extended desktop route (and not run multiple instances).

Running multiple instances of the Player application requires some leg-work in order to get the files in the correct place. Please follow the steps below:

1. Install 1 copy of the Player normally following the [installation instructions](install_windows_client.html).
2. Navigate to the Player installation folder
3. Copy the entire folder and rename to something unique (for example a 2 at the end).
4. Navigate inside the new folder, rename [[PRODUCTNAME]]Client.exe to [[PRODUCTNAME]]Client2.exe
5. Create a start-up short cut to the new [[PRODUCTNAME]]Client2.exe file, ensuring that you provide the letter `o` in the start up arguments (this indicates that the options form should be opened instead of the main application).
6. Double click the short cut and configure the second Player as normal making sure that you choose a **different library folder**.
7. Navigate inside the Watchdog sub folder, edit the `app.config` file, set the `ClientLibrary` to be the library folder you've configure above and set the `ProcessPath` to be the path to the renamed [[PRODUCTNAME]]Client2.exe.
8. Before starting the Player, create a display profile in the CMS to position the second Player - see below.
9. Double click the EXE and the client should start.



### Positioning the Player

A Player by default will position itself on the Primary monitor in a full screen configuration. You will want to change this behaviour for the second Player so that it does not appear underneath the first. This is done using a Display Settings Profile from the CMS.

Open a CMS connection and log in, navigating to the Display Settings page. Create a new Windows Profile called "Second Screen" or similar. 

In the new profile configure the "Location" tab so that your left, top, width and height represent the second screen in your PC configuration. For example, if you have two 1920x1080 panels the second one would be at left=1920, top=0, width=1920, height=1080. You would enter different coordinates if the monitors are not side by side or have different resolutions. You should therefore adjust the coordinates according to your setup.

### Embedded Webserver

The Player uses an embedded web server to show some content and it will be necessary to adjust the port that this web server listens on so that it does not conflict with the other Player.

Do to this use the Display Settings Profile created when you positioned the Player and set the Embedded Web Server address, incrementing the port number on the one that is already there.

