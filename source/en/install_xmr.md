<!--toc=manual_install-->
# [[PRODUCTNAME]] Message Relay
XMR for short, the message relay is responsible for **pushing** messages from the CMS to the Players. XMR is used
 for any Player Actions that need to be taken immediately.
 
## Mile-high Overview
XMR is a message queuing application and comes in two parts, one handles the CMS -> XMR communication and the other the
 XMR -> Player communication. Therefore it must listen on two ports.

The CMS -> XMR section is a request/response queue and the XMR -> Player section is a publisher/subscriber queue.

The communication protocol doesn't matter and you may choose - we recommend TCP.

## Installation

[Docker installations](install_docker.html) have XMR pre-installed and configured.

Please make sure [ZeroMQ](install_environment.html#zeroMQ) is installed and enabled.

XMR is included in the `vendor/bin` folder of your CMS installation and requires a `config.json` file to be written
 to that folder before use.

The `config.json` is very simple:

```json
{
  "listenOn": "tcp://localhost:50001",
  "pubOn": ["tcp://your_ip:9505"],
  "debug": false
}
```

 - `listenOn` is the XMR Private Address for CMS -> XMR communication
 - `pubOn` is the XMR Public Address for XMR -> Player communication
 - `debug` determines the level of debug messaging output and whether the output goes to the console (false = no)

XMR is a PHAR (PHP archive) and can be run from any terminal by issuing `php xmr.phar`. It is a long running application
 and will not terminate once started. It is recommended to run this as a service,
 you can find an example upstart conf file in `vendor/xibosignage/xibo-xmr/bin/upstart`.

### CMS Configuration
The CMS must be configured to talk to an XMR instance if player actions are required. The CMS has settings for this in
 the "Displays" section of the Settings Page.

There are two settings:
 - XMR Private Address - this is the `listenOn` address for CMS -> XMR communication
 - XMR Public Address - this is the `pubOn` address for XMR -> Player communication

The XMR Public Address can be adjusted for Displays using the Display Settings Profile functionality.

## Security
XMR only handles encrypted messages.

When Players register with the CMS they generate a public / private key and send the public key to the CMS. All messages
 running through XMR are encrypted using the public key of the display the are intended to reach. This happens in the CMS
 and therefore XMR only receives encrypted messages.

The CMS -> XMR `listenOn` address should be private to your internal network.

It is common to run the CMS and XMR on the same machine.


## Multiple CMS installations
XMR can service multiple CMS installations - it is CMS agnostic as the message encryption ensures that only the intended
 recipient of a message can read it.