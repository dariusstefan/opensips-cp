---
title: 'RTPproxy Tool'
---

## Description

The RTPproxy OCP tool maps on the [RTPproxy OpenSIPS module](https://docs.opensips.org/manual/3-3/modules/rtpproxy). It provides provisioning and monitoring capabilities for the list of RTPproxy relays used by OpenSIPS.

The tool provides standard DB operations for the RTPproxy sockets: add, delete, search and listing of the whole content of the table. As all the changes are done in database, to apply them into your OpenSIPS, you need to click on *Reload on Server* button.

Beside the DB operations, the tool also aggregates the runtime status of rtpproxy sockets (as internally provided by OpenSIPS via Management Interface). This provides additional information about the rtpproxy sockets, as status (enabled, disabled) and recheck ticks. The status can be also be modified from the tool (enabled or disabled).

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![RTPproxy](img/rtpproxy.jpg)
