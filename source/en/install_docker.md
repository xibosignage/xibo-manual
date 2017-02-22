<!--toc=getting_started-->
# Docker

[Docker](https://docker.com/) is an application to package and run any
application in a pre-configured container making it much easier to deploy a [[PRODUCTNAME]]
CMS with recommended configuration.

### Install Docker
Docker installation documents can be found on the 
[Docker website](https://docs.docker.com/installation/).

#### Linux
Docker can be installed on Linux based systems using the below command:

```
wget -qO- https://get.docker.com/ | sh
```

#### Windows
There are 2 Docker products for Windows, native and toolbox. Either of these options come with 
Docker Compose and are compatible with [[PRODUCTNAME]].

Please note that when running through Docker Toolbox, the Docker system will be running in a VM,
which will be created in bridged mode. The resulting Docker containers will therefore be accessible
from the IP address assigned to the Docker Toolbox VM, rather than your local machine.

#### Mac
Docker can be installed on a Mac - see https://docs.docker.com/docker-for-mac/
