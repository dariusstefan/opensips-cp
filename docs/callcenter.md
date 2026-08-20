---
title: 'Callcenter Tool (callcenter)'
---

## Description

The tool is used for provisioning the OpenSIPS callcenter module. You can add , delete and edit the Agents and Flows and view callcenter CDRs.

A complete description of the Call Canter module functionlity can be found in [Call Center module documentation](https://docs.opensips.org/manual/2-4/modules/call_center)

The tool features three tabs : Agents , Flows and CDRs . When "Apply changes to server" button is triggered the callcenter configuration will be loaded into OpenSIPS.

> [!NOTE]
> All the changes are done in database. To apply them into OpenSIPS, you need to click on the "Apply changes to server" button.

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/callcenter/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name
- Local configuration file : **opensips-cp/config/tools/system/callcenter/local.inc.php** This module is built on the structure of the TViewer module - the information in the file is self explanatory in order to allow you to make changes :

## Screenshots

![Call Center](img/callcenter.jpg)
