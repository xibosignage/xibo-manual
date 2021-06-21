<!--toc=tour-->

# Logging In

The CMS is protected by an authentication system that requires a **Username** and **Password**.

During the installation process,  a Username and Password is provided which grants unrestricted access to all areas of the CMS, as a top level **Super Admin** User. Once logged in additional User accounts can be created with various levels of access, as covered in the [Users section](users.html) of this manual.

**All pages** in the CMS are authenticated and if the User is not logged a login form will appear.

## First time access

### Administrators (Super Admin Users)

After installation the Username and Password provided during installation must be used to access the CMS as a Super Administrator.

### Users

Users can be created by Administrators and given access to the system. The Username and Password for any new User should be shared in a private and secure manner. We highly recommend that the User changes their password after first time log in.

{tip}
Take a look at the **Force Password Change** option on User records!
{/tip}

### Two Factor Authentication

[Two Factor Authentication](tour_two_factor_authentication.html) can be set by Users for added security. Once configured a User would need to enter a code sent via email or displayed in the Google Authenticator app to complete login and gain access to the CMS. 

### Force Password Change at next login

This function can be set by Super Admin Users at [User](users_administration.html) level.

### Forgotten Password reset

**Administrators** can activate a Reset link to be available at login, by configuring CMS settings.

{nonwhite}
For further information regarding Password Settings administration, click [here](https://xibo.org.uk/docs/setup/password-settings)
{/nonwhite}

### Cookies

The CMS uses cookies to track whether Users are logged in or not. If you are experiencing trouble logging in you may need to adjust your browser settings for cookies.

### After login

Each User is assigned a [Dashboard](tour_status_dashboard.html) which they will be taken to after login.