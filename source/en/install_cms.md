<!--toc=cms_installation-->
# CMS Installation

The [[PRODUCTNAME]] CMS is a web application run through Docker or a web server
supporting PHP/MySQL.

Please select the installation instructions appropriate to your environment from
the below list. Not sure what to use? Read on for more details.

 - [[[PRODUCTNAME]] for Docker on Linux](install_docker_linux.html)
 - [[[PRODUCTNAME]] for Docker on Windows 10 64bit](install_docker_win10_64bit.html)
 - [[[PRODUCTNAME]] for Docker on other Windows 64bit](install_docker_winother_64bit.html)
 - [[[PRODUCTNAME]] for Docker on an existing Docker cluster](install_docker_without_compose.html)
 - [[[PRODUCTNAME]] on a Web server](manual_install.html)
 
**Docker for Windows Server 2016 (for Windows Containers) is not suitable as it is only capable of running
Windows containers.**

Alternatively there are a number of service providers that will install [[PRODUCTNAME]] for
you, or even run [[PRODUCTNAME]] on their architecture. If you are unfamiliar
with Docker or web servers and just want to use the application, then a service provider
solution may be preferable.

Should you want to install and run [[PRODUCTNAME]] yourself then we strongly
encourage you to use a [Docker](install_docker.html) environment.

## Docker or not?
Starting with 1.8 series we have packed [[PRODUCTNAME]] with Docker. Docker is
a technology that can be compared to Virtual Machines, but without the overhead
of running Virtual Machines.

Essentially this means that you can have a fully isolated environment running
on a host machine, running our recommended configuration, which is the same
as the configuration we use to develop and test the software.

This reduces the chance of encountering a bug with the software and allows
for in place upgrades of the software.

The disadvantage of Docker is that you have to install Docker, which is a software
product from a third party. The installation of Docker is not always straightforward,
but we have tried to provide full instructions for each host operating system.

[[PRODUCTNAME]] can still be installed without Docker - Docker is a recommendation
and not a requirement. To install without Docker a working knowledge of how to
install, configure and maintain a web server is recommended. There are extra
considerations in 1.8 compared to 1.7 series regarding the "web root" and
"URL rewriting".

**Please note** that while every effort will be made to assist with custom
installations, Docker is the supported method of running [[PRODUCTNAME]] and it
may not be possible to help with your custom installation without opening a paid
support incident from a company offering commercial support.
