<!--toc=media-->

# Menu Boards (Feature Preview)

{tip}

**Please note:** This feature is a preview and should not be used in production. 

Whilst we work on this to make improvements please be aware of the following limitations if you would like to try this feature:

- When creating Categories please be aware that available Templates will only display 3 or 4 Categories in Portrait and 3, 4 or 5 in Landscape
- Product descriptions do not have a maximum character length which could result in descriptions being incorrectly displayed in a chosen template.
- Any Allergy information completed in the Product form will automatically show.
- There is no limit to the amout of Product Options a Product can have which could result in them being incorrectly displayed if more than 2 are created.
- Product Options does not have a maximum character length which could result in descriptions being incorrectly displayed.

{nonwhite}
{cloud}
This feature preview is not available for Xibo Cloud Hosting customers.
{/cloud}
{/nonwhite}

{/tip}

The Menu Boards interface provides a simple way for users to create and configure information to be used with the [Menu Board Widget](media_module_menuboards.html) to display Menu  items and information using customisable templates.

Menu Boards allow for the creation of 'reusable Menus' which are created and managed independantly to Layouts. Once created, Menus can easily be reused across multiple Layouts.

Using Menu Boards is a two part process:

- The Menu Board - contains the content of the Menu
- The Menu Board Widget - allows for configuration of the Menu

Menu Boards are administered by clicking on **Menu Boards** under the **Library** section of the main menu:

![Menu Boards Grid](img/v3.1_layouts_menuboards_grid.png)

The Menu Boards [Grid](tour_grids.html) allows users to create new and edit existing.

Click the Folders icon to toggle on/off from view.  

{tip}
When Folders are hidden from view, the file path for the selected folder will be shown!
{/tip}

- Click on a Folder/sub-folder to search the contents and return results based on any filters applied to the grid.

or

- Tick **All Folders** to include searching in the Root Folder and return results based on any filters applied to the grid.

## Creating Menu Board data

Creating information for Menu Boards requires 3 stages:

1. Adding a Menu Board record
2. Creating Categories
3. Adding Products

### 1. Add new Menu Board

Click on the Add Menu Board button and complete the form fields:

- Provide a **Name** for easy identification purposes within the CMS.
- Menu Boards can be optionally saved to [Folders](tour_folders.html) for easier searches, organisation and to easily set [Share](users_features_and_sharing.html) options for Users/User Groups.

{tip}
Menu Boards that are saved to Folders will inherit the View,Edit and Delete **Share** options that have been applied to the destination Folder for User/User Group access!
{/tip}

- Enter a **Code** to be used to identify this Menu Board (advanced use used for referencing the API).
- Include an optional **Description** to give more detail/instructions to other potential users of the Menu Board.
- Click to **Save**.

### 2. Create Categories

Categories are used to define and structure the menu.

- Use the row menu for a Menu Board and select **View Categories**:

  ![Row Menu](img/v3.1_layouts_menuboards_rowmenu.png)

Click on the **Add Category** button and complete the required form fields:

- Provide a **Name** which can be selected to be shown on displays as a header.
- Enter a **Code** to be used to identify this Category (advanced use used for referencing the API).
- Optionally include a **Media** file to be used for this category. 
- Click to **Save**.

Repeat this process to add the required **Categories** for the Menu Board.

### 3. Add Products

Add Products to Categories to provide pricing and other key information, to be shown on displays.

- Use the row menu for a Category and select **View Products**:

![Products](img/v3.1_layouts_menuboards_products.png)

 

- Click on the **Add Product** button and complete the product information to display on screen:

![Add Product](img/v3.1_layouts_menuboards_add_product.png)

- Provide the **Name** of your product.
- Give your product a **Description** to provide further information to the intended audience.

- Enter a **Price** (this can also be text such as TBC / Free etc)

{tip}
The **Price** field must not be left blank in order to save the form!
{/tip}

- 
  Toggle **On Availability** to show the product information in the menu board. Products that are toggled to **Off** will not automatically show. 

{tip}
The Menu Boards Widget has a setting to allow for **Unavailable Products** to show greyed out!
{/tip}

- Enter a **Code** to be used to identify this Product (advanced use used for referencing the API).

- Optionally include a **Media** file to be used for this Product.

{tip}
Images can be toggled on/off to be shown using the Menu Board Widget.
{/tip}

The **Product Options** tab allows for additional options to be added if required:

![Product Options](img/v3.1_layouts_menuboards_product_options.png)

Repeat the process to add further **Products** to the selected Category.

Use the tabs to navigate to the other categories to add Product information.

![Product Tabs](img/v3.1_layouts_menuboards_products_tabs.png)



Once all information has been completed, add the [Menu Board Widget](media_module_menuboards.html) to a Layout using the [Layout Designer](layouts_designer.html) and complete configuration options to best present the information.

{tip}
Menu Boards are edited independently to Layouts, so there is no need to access or edit the Layout(s) the Menu Board has been added to. Changes will be available in the system straight away ready to be picked up by Players on their next collection, with no need to make any edits to Layouts!
{/tip}