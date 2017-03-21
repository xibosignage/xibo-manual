<!--toc=api-->
# [[PRODUCTNAME]] Message Relay
XMR is the push messaging technology used in [[PRODUCTNAME]]. More introductory
information can be found [here](xmr.html).

XMR consists of a private REQ/RESP and a public PUB/SUB message queue using ZeroMQ. This document will
focus on the public side, which represents the messages flowing from XMR to the Player.

The Private side represents messages flowing from the CMS to XMR. A complete message lifecycle is CMS ->
 XMR -> Player.

## Configuration
Each Player must identify itself with the CMS by providing an XMR channel and public key to the 
`RegisterDisplay` XMDS call.

The Channel must be a unique key and it is recommended to generate that from the CMS Address, CMS Key
and Hardware Key.

The XMR Public Key should be the public key of a Public/Private key RSA key. The private key
remains secret and should be stored appropriately by the player.

## Security
The PUB/SUB ZeroMQ used by XMR is transferred over TCP and is therefore unencrypted. Although the 
message content is benign, the Player must be able to ensure the validity of the message source. Therefore
all messages are encrypted using a RSA key pair.

The Player sends the public key to the CMS, and the CMS will encrypt all messages destined for the
players Channel with the public key provided.

## Player Subscription
Players should connect to the XMR Public Address supplied in the `RegisterDisplay` return XML using
a ZeroMQ library and the PUB/SUB subscriber socket. Players should subscribe to the channel they
provided to the CMS in `RegisterDisplay` and optionally a heartbeat channel called "H".

The heartbeat channel can be used to determine if the connection is still active and should receive
data every 5 minutes.

## Receiving Messages
Messages sent from XMR are multipart messages, consisting of 3 components (in order):

 - Channel
 - Key
 - Message
 
The channel can be used to test whether the message is a heartbeat.

The Key and Message form the `openssl_seal` encryption used and should be decoded using the same
 operation and the private key stored securely by the Player.
 
Once opened the decrypted message has the following format:

```
{
    "action": "action name",
    "createdDt": "the message created date - including timezone"
    "ttl": "the message ttl, in seconds"
}
```

The TTL should be tested against the created date of the message to ensure it has arrived in a 
timely fashion. Expired messages should be discarded.

Each message can also have action specific properties.

## Actions
A range of actions are supported by the CMS:

|Action             |Description                                                   |Params                                       |
|-------------------|--------------------------------------------------------------|---------------------------------------------|
|changeLayout       |Immediately change to the specified Layout                    |layoutId,duration,downloadRequired,changeMode|
|collectNow         |Run XMDS routine collection immediately                       |                                             |
|commandActionAction|Run a configured Command                                      |commandCode                                  |
|overlayLayout      |Immediately overlay a Layout                                  |layoutId,duration,downloadRequired           |
|rekeyAction        |Regenerate the Player Public Key and Channel                  |                                             |
|revertToSchedule   |Revert to the scheduled content, removing any Layouts/Overlays|                                             |
|screenShot         |Take and send a screen shot                                   |                                             |

The `changeMode` parameter of the changeLayout action can be either "replace" or "queue", where the value
effects the currently active changeLayout actions. The `duration` is always based on the time since
the message was received, even when in "queue" mode.