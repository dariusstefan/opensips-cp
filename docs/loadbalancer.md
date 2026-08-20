---
title: 'Load Balancer Tool'
---

## Description

The Load Balancer tool is an interface to the [Load Balancer module within OpenSIPS](https://docs.opensips.org/manual/3-3/modules/load_balancer). The tool is performing standard DB provisioning of the load-balancer entries - add, delete, search and listing. The DB listing is aggregated with information from OpenSIPS internals, like the status of the destination (active, disabled, probing) or the current load of the destination (per resource). The OpenSIPS internal information is fetched via Management Interface. The status of a destination can be also changed from the tool.

After peforming any DB change over the Load Balancer data, be sure to trigger a DB reload in OpenSIPS by using the *Reload on Server* button.

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![Load Balancer](img/load_balancer.jpg)
