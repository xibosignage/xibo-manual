<!--toc=advanced-->
# Events

This section will discuss the CMS event dispatcher, which can be used in Custom 
Middleware / Modules to intercept various core events raised by the CMS.

<white>
Please contact your service provider for details.
</white>

<nonwhite>

## Event Dispatcher

The CMS uses the Symfony event dispatcher by default.

In order to execute code on an event the object you are listening from must have 
access to the `$container->dispatcher`, which is an object implementing the 
`EventDispatcherInterface`.

This is registered in the DI Container by the `State` Middleware and automatically
provided to all Widgets.

## Listening for an Event

Event listeners are adding to the event dispatcher for execution when a matching
event is fired.

The easiest way to add one is:

```
$dispatcher = $this->getDispatcher();
$dispatcher->addListener('event.name', function(Event $event) {
    // Your code here
});
```

Each event holds an event object which exposes specific functionality that may be
useful for that event.

## Supported Events

Below is a list of supported events:

| Event               | Class                              | Description |
|---------------------|------------------------------------|-------------|
| layout.build        | \Xibo\Event\LayoutBuildEvent       | Fired at the end of a Layout Build, before the XML has been saved. |
| layout.build.region | \Xibo\Event\LayoutBuildRegionEvent | Fired during a Layout build, as each Region has finished processing. |


</nonwhite>