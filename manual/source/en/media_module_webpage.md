<!--toc=media-->
# Web Page

The Web Page module allows an entire Web Page to be embedded inside a Region on a Layout.

There is support for scaling and offsetting the target web page inside the Region so the particular section of the web page can be displayed.

![Webpage Form](img/media_webpage_form.png)

- **Link**
    
    The URL of the Web Page - including `http://`

- **Duration**
    
    The duration in seconds that this item should remain in the Region.

- **Offset Top**
    
    The top position for the page to start.

- **Offset Left**
    
    The left position for the page to start.

- **Scale Percentage**
    
    The percentage zoom to apply to the web page.

- **Transparent?**
    
    Should the web page be rendered with a transparent background? [[PRODUCTNAME]] will try its best to do this when checked, however it cannot be supported on some web pages.

Web Pages are not cached by the Display Client and will not operate when disconnected from the network.