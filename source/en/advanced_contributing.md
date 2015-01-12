<!--toc=advanced-->
# Contributing

1. [Introduction](#Introduction)
2. [Ways to Contribute](#Ways_to_Contribute)
3. [Licensing](#Licensing)
4. [Answering Questions](#Answering_Questions)
5. [Reporting Bugs](#Reporting_Bugs)
6. [Suggest Improvements](#Suggest_Improvements)
7. [Translate Xibo](#Translate_Xibo)
8. [Triage Bugs](#Triage_Bugs)
9. [Test Unstable Releases](#Test_Unstable_Releases)
10. [Documentation](#Documentation)
11. [Fix Bugs / Implement Blueprints](#Fix_Bugs_.2F_Implement_Blueprints)
    1. [Development Overview](#Development_Overview)
    2. [Important Links](#Important_Links)
    3. [Development Process (how to contribute)](#Development_Process_.28how_to_contribute.29)

12.   [Translatability](#Translatability)
13.   [Coding Style Guide](#Coding_Style_Guide)

    1.   [Server](#Server)
    2.   [Notes](#Notes)



##  <span id="Introduction">Introduction</span>

Xibo is primarily developed by Daniel Garner and Alex Harrington. Xibo 1.0.0 also has heavy involvement from James Packer. Being a small development team we are very intimate with the Xibo code and design.

We are always delighted to accept contributions from others and we would always encourage this.

##  <span id="Ways_to_Contribute">Ways to Contribute</span>

There are lots of ways to contribute to the Xibo project, and there are jobs that everyone can do, even if you're not a programmer! Here are the main ways, listed in ascending order of difficulty.

*   Answer questions in Launchpad Answers: [https://answers.launchpad.net/xibo](https://answers.launchpad.net/xibo)

*   Report bugs you find in Launchpad Bugs: [https://bugs.launchpad.net/xibo](https://bugs.launchpad.net/xibo) (The new bug report wizard in 1.0.0 greatly simplifies this)

*   Suggest improvements and new features in Launchpad Blueprints: [https://blueprints.launchpad.net/xibo](https://blueprints.launchpad.net/xibo)

*   Translate Xibo in to new Languages: [https://translations.launchpad.net/xibo](https://translations.launchpad.net/xibo)

*   Help triage bugs in Launchpad Bugs: [https://bugs.launchpad.net/xibo](https://bugs.launchpad.net/xibo)

*   Test unstable development releases and report bugs

*   Improve the documentation in the wiki or manual: [http://www.xibo.org.uk/manual](http://www.xibo.org.uk/manual)

*   Fix bugs in Launchpad Bugs: [https://bugs.launchpad.net/xibo](https://bugs.launchpad.net/xibo)

*   Implement Xibo Blueprints (new features) [https://blueprints.launchpad.net/xibo](https://blueprints.launchpad.net/xibo)

Each of these areas is covered in more detail below:

##  <span id="Licensing">Licensing</span>

Xibo is released under the AGPL v3. Xibo documentation is released under the Creative Commons Attribution Sharealike License. Xibo Translations are licensed by Launchpad under the BSD license (revised, without advertising clause).

All contributions to Xibo should be under the appropriate license listed above. If you object to contributing code under the appropriate license, please email info@xibo.org.uk BEFORE starting work, as there is a strong possibility that your contribution would be rejected.

##  <span id="Answering_Questions">Answering Questions</span>

Xibo isn't particularly well documented at present. There is a manual-in-progress, but it isn't complete. A great deal of time is taken up answering queries from people asking how to install Xibo, or how to use Xibo, or asking if various behaviours are bugs or not etc.

If you've used Xibo for a little while, and become familiar with its operation, you are more than qualified to suggest answers to these questions. All we ask is that you are polite and factual at all times.

We're particularly interested in people who speak more than one language who would be happy to answer questions posed in non-english languages (as Alex and Dan have very limited skills in that area!) or who can translate for us!

##  <span id="Reporting_Bugs">Reporting Bugs</span>

Think you've found a bug? First check in Launchpad Bugs if someone else has already reported the same issue. If they have, you can subscribe to the bug so you get notification when its status changes, or when a new version of Xibo is released which solves the problem.

If you've found a new bug, please let us know about it!

Xibo 1.0.0 sees the release of the bug reporting wizard for Xibo Server. Initially please follow the steps in the bug wizard (found in the management menu). Also include screenshots if appropriate to show us what's wrong. The bug wizard collects alot of the commonly requested information that we need, but we might come back to you and ask for more information or further examples so we can figure out what went wrong.

##  <span id="Suggest_Improvements">Suggest Improvements</span>

Everyone has ideas about how Xibo could improve, not just the developers. If you've got an idea, first have a look in Xibo Blueprints to see if it has already been suggested. If it has, subscribe to it to be notified as its status changes. Also feel free to ADD to the blueprint whiteboard specific thoughts about how things might work.

If your idea is new, feel free to create a new Blueprint. You should describe the idea you have in as much detail as you feel able. If you've done some development work on Xibo before, you might write a new section in the Wiki to further detail how you think the idea might be implemented.

With new ideas, especially if they are radically different to the general direction of Xibo development, it's best to start out with an overview of the functionallity, which you or a developer can flesh out at a later date.

An aside: Blueprints are just that - plans for the future. Not everything suggested will end up as a feature, especially if your idea is applicable to a very small number of users, or if the idea is a fundamental departure from the general direction of Xibo development.

##  <span id="Translate_Xibo">Translate Xibo</span>

Already Xibo is being used in several countries. Xibo 1.1 and later will have support for GNU Gettext Translations. Translations will be handled by Launchpad Translations. If Xibo isn't currently available in your language, or a language you speak, then it's a really great way to help. Launchpad Translations is its own system, and help on how to use the system are best directed to the Launchpad Translations team. They have a getting started guide here: [https://help.launchpad.net/Translations/StartingToTranslate](https://help.launchpad.net/Translations/StartingToTranslate)

##  <span id="Triage_Bugs">Triage Bugs</span>

Triage is a medical term, and it basically means catagorise problems by their severity. In Launchpad, triage is the process of checking a bug report to make sure it has all the appropriate information a developer will need to fix the problem, or in fact confirming that the problem exists and is reproducable.

When a bug arrives in Launchpad, it's status is set to "New" and it's importance is set to "Unknown". A bug triager will look at the bug report, and see if all the required information is there - eg is a suitable txt file attached with the output of the server Bug Wizard? Are screenshots provided if necessary. Can the bug triager reproduce the problem.

If information is missing, please add a comment to the bug asking for that information to be added. Set the bug status to "Incomplete" if you have suitable access rights.

If all the information is there, have a go at reproducing the problem on your system (virtual machines are really good for this). If you can reproduce the problem, mark the bug as "Confirmed" and add a comment to the bug describing how you reproduced it in detail. Attach any media as required, or provide links. If you can't reproduce the problem, then add a comment to that effect, but leave the status as "New".
If you confirmed the bug, is there a workaround? If there is, describe it in a comment. Set the priority to "Low" and status to "Triaged" if you have suitable access rights.
If there is no work around, set the priority as described below and the status to "Triaged". If you're not sure, leave this step all together:

*   Low - Confirmed bugs with workaround available

*   Medium - Confirmed bugs with no workaround that does not significantly impact upon operation of the whole system

*   High - Confirmed bugs with no workaround that impacts significantly on one or more areas of the whole system, but that leaves other areas of the system working.

*   Critical - Confirmed bugs with no workaround that make the whole system inoperable.

##  <span id="Test_Unstable_Releases">Test Unstable Releases</span>

The whole Xibo 1.1 series is "unstable". That means that releases in the series are not recommended for production environments. You can help by installing these releases and testing their operation as if it were a live system. Report any problems in Launchpad Bugs or Launchpad Answers.

##  <span id="Documentation">Documentation</span>

There are large sections of the Xibo Manual still to be written, and the existing sections will need constant updates to track Xibo development. If you're interested in working on Xibo documentation, then please email info@xibo.org.uk and we'll get something worked out.

##  <span id="Fix_Bugs_.2F_Implement_Blueprints">Fix Bugs / Implement Blueprints</span>

###  <span id="Development_Overview">Development Overview</span>

These notes will give guidelines to developers which will ensure that any work you do has the maximum chance of getting merged into a Xibo release.

The Xibo Project exclusively uses Launchpad as a development platform. Through launchpad we manage blueprints (specifications for new features), bugs, Q&amp;A (support), translations and the code release cycle. The only thing we do not manage in Launchpad is the detailed specification documents and developer documentation - which is of course managed here on this Wiki.

###  <span id="Important_Links">Important Links</span>

*   Xibo Homepage: [http://www.xibo.org.uk](http://www.xibo.org.uk)

*   Launchpad Project Page: [https://launchpad.net/xibo](https://launchpad.net/xibo)

*   Developer Wiki: [http://wiki.xibo.org.uk](http://wiki.xibo.org.uk)

###  <span id="Development_Process_.28how_to_contribute.29">Development Process (how to contribute)</span>

I will split the development process into two sections; bugs and blueprints. They are essentially managed in the same way with a few minor differences.

####  <span id="Blueprints_.28new_features.29">Blueprints (new features)</span>

So you want to implement an exciting new feature or idea into Xibo? - or maybe you want to change the way Xibo works slightly? In both of these circumstances your first task is to create a blueprint for the feature and assign it to yourself. You are then responsible for writing a specification document (it may be a brief paragraph, an article on this wiki or a IM conversation with us) at which point we will either Approve your idea, ask for more details or suggest an alternative.

Once your idea is approved you can ask for a "mentor" to help you get started - or you can pull the latest "future" series of the Xibo code and begin development. All development should be done using BZR (supported by Launchpad) and pushed to the Xibo project space in Launchpad. There are some good Launchpad tutorials available on their help site.

**Note:** Blueprints will almost always be for the "Future series".
We would suggest you call your branch "lp:~username/xibo/blueprint-title"

####  <span id="Bugs">Bugs</span>

Found a bug that you want to help fix? The first place to go is the "Bugs" section in Launchpad to create a bug report for the problem you have found. This bug report will then be triaged by the community to determine if it has already been fixed or if it is a new bug, etc.

If the bug gets confirmed and you would like to implement a fix for the bug attach a comment to the bug saying so - we will then give the bug a milestone and a series goal and assign it to you. You can then branch the Xibo code from the appropriate series goal (unlike a blueprint a bug may be targeted to the stable release or to the future release).

Once you have the code, implement the fix to that one bug only and push your code back to launchpad. We would suggest you call your branch "lp:~username/xibo/bug#"

_Check list_

<pre>1. Register a bug report or blueprint in Launchpad
2. For a blueprint create a specification document - for a bug help triage it
3. Get your blueprint approved / bug confirmed and assigned to you
4. Branch the code your blueprint/bug relates to
5. Implement the one blueprint / bug and push the branch back to Launchpad
6. Does the code meet the coding style guide?
7. Does the code use the appropriate library objects (Config, Kit, ResponseManager, db etc)
8. Does the code output translatable strings (use the library function)
9. Create a merge request
</pre>

10. Wait for your code to be reviewed and merged!!
11. Points 1-3 may take some time to get checked off - but it is worth it!

##  <span id="Translatability">Translatability</span>

We're in the process of adding translation support to Xibo. There will be a library method to call in place of PHP's _("string") call. All new code must use this function. Also please look at the existing library of strings and see if the message you need to output is already in the translation library. If there is a suitable string there already, please reuse it rather than creating a new, very similar one, that has to be translated separatly.

##  <span id="Coding_Style_Guide">Coding Style Guide</span>

####  <span id="Server">Server</span>

Blocks are expressed as follows:

<pre>class Example
{
   function registerDisplay(var)
   {
       print "OK";
   }
}

$example = new Example();
</pre>

Comments are good. Please add adequate comments to describe your code.
If you include code written by someone else, please fully document where you got the code from, who wrote it and under what license you're using it. **Bear in mind that the license must be AGPLv3 or later compatible.**

Xibo is very object oriented. Please make sure you code in an object-oriented style where appropriate.

###  <span id="Notes">Notes</span>

Due to the time pressures on Alex and myself we are unlikely to accept any code changes that fall into the below categories:

*   Do not have an approved blueprint or associated bug

*   Have more than one blueprint or associated bug (without prior agreement)

*   Are not released under an appropriate license (see above)

This may seem like an excessively complex way of contributing to Xibo - and if this is too much for you to do we understand. However this method gives the Xibo project the maximum chance of being stable, extensible and well managed!

We dont want to delay the release of important fixes and improvements any more than you want to wait for them to be released! This is why we have adopted launchpad as a solution. When used in the above manor it will allow bugs to be merged across series and features to be implemented in isolation. It will also reduce the chances of two contributions conflicting with each other.

It is also the method the Xibo Maintainers (Alex and I) develop and bug fix Xibo!!

We look forward to your contributions!