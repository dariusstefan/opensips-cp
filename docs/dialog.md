---
title: 'Dialog Module (dialog)'
---

## Description

The OCP dialog tool comes to mapps over the [Dialog OpennSIPS module](https://docs.opensips.org/manual/2-4/modules/dialog) (for keeping track of the ongoing SIP calls in OpenSIPS).

The tools provides a listing of the ongoing calls (directly fetched from OpenSIPS internals via Management Interface) and the possibility to terminate a specific call.

Also it provides access to the dialog profile - by selecting an existing profile, you can see how many ongoing calls are in that profile, and optional, the actual listing of those calls.

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/dialog/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name
- Local configuration file : **opensips-cp/config/tools/system/dialog/local.inc.php** Attributes set in this file :
  - $talk\_to\_this\_assoc\_id variable - association ID pointing to system (group of OpenSIPS servers) to be queried for ongoing calls. Note: only the first server from the group will be used for fetching the dialogs!!

## Screenshots

![Dialog Live](img/dialog_live.jpg)
