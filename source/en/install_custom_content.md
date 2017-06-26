<!--toc=cms_installation-->
# Docker
## Custom Scripts and Web pages

If you want to use the environment provided by Docker to run custom developments, themes, modules or standalone files
you can do so using the `/shared` folders.

The following locations are available:

 - `/shared/cms/custom`: Used for custom middleware
 - `/shared/cms/web/theme/custom`: Used for custom themes
 - `/shared/cms/web/userscripts`: Use for standalone files, will be served as `http://localhost/userscripts`

## Other shared folders

Docker also makes the library and backup available as shared folders:

 - `/shared/backup`:
 - `/shared/cms/library`

# Non-docker
The above folders are also available in non-docker installations, minus the `.shared` prefix.
