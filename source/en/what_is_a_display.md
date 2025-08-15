---
toc: "displays"
maxHeadingLevel: 3
minHeadingLevel: 1
alias: "displays_fileassociations"        
excerpt: "Displays are an essential part of digital signage which communicate between the CMS and Media Player App"
keywords: "player app, media player, connecting displays, authorising displays"
---

# What is a Display?

[[PRODUCTNAME]] helps you display content on your screens; whether you have existing content or need to create your own, to show on 1 screen or a 100.000, [[PRODUCTNAME]] makes it easy!

[[PRODUCTNAME]] uses the concept of Displays which are managed from the CMS to control when and how content is shown as well as provide device management tools for Users.

A **Display** is an essential part of digital signage as is it bridges the communication between the **CMS** software (Content Management System) and **Media Player App**. 

{nonwhite}

## How-to Video

{video}9H8Ct00qkqs|how_to_what_is_a_display.png{/video}
{/nonwhite}

The **Player App** is installed onto a **Media Player**, which can be a separate physical hardware device attached to a screen or an integrated Media Player found in supported System on Chip (SoC) professional signage monitors. A hardware key is generated on installing the Player App which creates a unique **Display** record in the CMS.

Once installed, the Player App must be **Connected** to the CMS by using a **Code** or by providing a **CMS Key**. Once connected a **Display** will be registered awaiting **Authorisation** in the CMS before it will become a managed device and start displaying content from the CMS.

## Creating a Display

1. **Download** the Player App
2. **Install** to the Player device. Some supported (SoC) System on Chip models will already have the Player App installed.
3. **Connect** the Player App to the CMS.
4. **Authorise** the Display using the row menu from the **Displays** page in the CMS.

The Display will regularly connect to the CMS to check for any updated schedule information or any new content to download. The Displays grid will update to show the status, indicate if the Display has logged in recently, show the date and time stamp of when the Display was last accessed etc, to help you manage your network.

{tip}
Any updates will be downloaded and saved to the Player App. This means that if a connection issue were to arise between the Display and CMS, the Display would continue to show scheduled content offline until the connection was restored.
{/tip}

Manage **Displays** from the CMS to and use the range of device management tools to effectively control your network. 

## Further Reading

[Display Configuration](configuration_of_displays.html)

## FAQ's

***Which Players can connect to the CMS using code?***

All Players, at the latest version support connecting via a code, with the exception of the Linux Player.

***Can I easily transfer a Display to another CMS?***

First you need to ensure that you have Two Factor Authentication set up, from the User Profile to use Transfer to another CMS setting from a Display row menu. Multiple Displays can be transferred using the With Selected option at the bottom of the Displays grid.

***Do the Player and CMS versions have to match?***

Our recommendation is that your CMS and Players should be of the same major version for the best results.

***What does it mean to Assign Files / Assign Layouts?***

Library files and Layouts can be directly assigned to a Display so that they are always available in the local library of the Player. This is useful for pre-loading a Layout ahead of time when the Layout will be used for some API integration to trigger a change for example. Content will still need to be scheduled to show on Displays.











