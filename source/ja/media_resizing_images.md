<!--toc=media-->

# Resizing Images

{version}
**Note:** This feature is available from v2.2.0
{/version}

Default thresholds and limits can be specified which are then considered in the event an image should be resized. This could be when uploading an image or an image being downloaded by a Widget - NASA RSS in a Ticker Widget for example.

Settings can be configured from the **Settings** page under the **Administration** section of the main CMS menu.

- Click on the **Defaults** tab:

![Resizing Images](img/v3_media_resizing_images.png)



## Resize Threshold

- Set a maximum threshold (based on the longest side) that should be considered for resizing an image.

{tip}
If you set a Resize Threshold of 1920 and you upload/download an image which is 800, this image would not need resizing. If you uploaded/downloaded an image which was 2400, this would then be resized to 1920.
{/tip}

## Resize Limit

- Set a limit (based on the longest side) for uploaded/downloaded images. Images that exceed this limit will not be processed and should be replaced with another image that is within the limit.

This setting will determine whether the image file is too large to be processed.