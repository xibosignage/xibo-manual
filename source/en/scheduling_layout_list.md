---
toc: "scheduling"
maxHeadingLevel: 3
minHeadingLevel: 1
alias: "layouts_campaigns"
excerpt: "Create Layout List Campaigns to control the sequence of content to be shown"
keywords: "cycle based playback, play count, round robin, block, layout sequence, edit campaign form"
---

# Layout List - Campaign

Create a Campaign containing a list of ordered Layouts so that they play in a controlled sequence. Think of a Layout as a single slide in a presentation deck, a Layout List Campaign is the entire presentation. 

{nonwhite}

## How-to Video Layout List

{video}4Gv1I8NDC9o|how_to_layout_list_campaign.png{/video}
{/nonwhite}

## Creating a Layout List Campaign

- Go to **Campaigns** under the **Design** section of the main CMS menu.


- Click the **Add Campaign** button.
- Use the **Type** drop down and select **Layout List**.
- Give your Campaign a **Name** for easy identification in the CMS.

- Optionally use the checkbox to enable **Cycle Based Playback**, and provide a number to determine how many 'plays' a Layout should have before moving onto the next Layout in the Campaign.

{tip}
If a 2 was set as the Play Count, the same Layout would be shown twice each Schedule loop before moving onto the next Layout in the sequence.
{/tip}

- Leave Cycle based playback blank and use the **List Play Order** menu to select how Layouts will play when scheduled concurrently with another Campaign with the same Display Order:
- Select **Round Robin** to interleave Layouts from each Campaign or **Block** to play Layouts in their set sequence from one Campaign before moving onto the next Campaign.
- Click to **Save**.

On saving, the form will re-open with an additional Layouts tab:

- Select the **Layouts** which should be added to the **Campaign**.


- Use the `+` icon to for each Layout to add.
- Added Layouts will be shown at the top of the **Edit Campaign** form.

Layouts can be re-ordered from here by drag and drop to ensure they play in the correct sequence.

Use the `-` icon for an added Layout to remove from the Campaign.

- Click to **Save**.

## Further Reading

[Creating Layouts in the Layout Editor](layouts_editor.html)

## FAQs

***Is there an easy way to create multiple Campaigns?***

Make copies of selected Campaigns by using the row menu in the Campaign grid. Once a copy has been created use the row menu to select Edit to make changes to the Layout selection.

***Can I assign Layouts to a Campaign from anywhere else in the CMS?***

Directly assign Layouts to Campaigns from the Layout grid. Use the row menu for a selected Layout and click Assign to Campaign. Once added the Layout will be added at the end of the sequence of other added Layouts by default.
