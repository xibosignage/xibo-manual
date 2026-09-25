---
toc: "widgets"
minHeadingLevel: 2
excerpt: "Add Image files to include on Layouts and Playlists"
persona: "content manager"
---

# Image

Images are downloaded from the CMS and saved to the Player library (on internal storage or an SD card).

{tip}
Animated gif’s are not supported on any Player!
{/tip}

## Size and Format

Images served through the image module are sampled so that only the quantity of pixels that an be displayed on the screen are loaded into the Player memory.

When using images, follow our recommendations for best results:

- Ensure your image is saved no bigger than 96 dpi
- Check the resolution of the image and keep it within the intended screen size
- Use PNG/JPG file format

{tip}
When an image is shown, the physical space the image takes up in memory is far greater than the size of the file, the majority of file containers use compression to reduce the file size.

**Example**: *A JPEG image with a resolution of 2160 x 3840 at 600 dpi (which is common for printed media) shown without any sampling, would take -24 MB of memory to paint on the screen. If a graphics package were used to drop the resolution to 1080 x 1920 at 96 dpi, it would only take 6 MB of memory to open.*
{/tip}

## Webpage Images

Images on embedded or webpage media, observe the rules of the browser application for the player hardware.

## Pixabay Integration

Images can be selected for use directly from Pixabay without leaving the CMS. Once selected, Pixabay image files will be saved to the CMS library.

## Image Start and End times

Start and end times can be set for image files uploaded directly to Playlists.

**As [[PRODUCTNAME]] takes no measures to control what content is put on your displays, it is your responsibility to ensure that any images used are appropriately attributed if you do not own the rights.**

## Further Reading

[Using Start and End times in Playlists](media_playlists.html#content-widget-expiry-dates)
