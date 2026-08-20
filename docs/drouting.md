---
title: 'Dynamic Routing Tool'
---

## Description

The Dynamic Routing OCP tool maps on the [Dynamic Routing (drouting) OpenSIPS module](https://docs.opensips.org/manual/3-3/modules/drouting). It is used for provisioning the OpenSIPS drouting information, to add, modify and delete the Gateways, Carriers and Rules.

The tool features multiple tabs : Gateways , Carriers, Rules, Groups and Settings. All the provisioning operations are performed in the DB. In oder to force the reloading of the DB data into OpenSIPS, be sure to use the *Reload on Server* button (this will trigger a reload command via the Management Interface).

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![Dynamic Routing GWs](img/drouting_gws.jpg)

![Dynamic Routing Rules](img/drouting_rules.jpg)
