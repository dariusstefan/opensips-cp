---
title: 'TLS Management Tool'
---

## Description

The TLS Management OCP tool maps on the [TLS MGM OpenSIPS module](https://docs.opensips.org/manual/3-3/modules/tls_mgm). It provides the abilities to provision all the TLS domains (certifications and usage settings/conditions) used in OpenSIPS by various other modules (TLS and WSS protocols, REST client module and MySQL backend).

As the TLS domains are kept in an SQL database, the tool provides standard DB provisioning operations : add, delete, search and listing of the TLS domains. As all the changes are done in database, to apply them into your OpenSIPS, you need to click on *Reload on Server* button.

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![TLS domain listing](img/tls_mgm.jpg)

![TLS domain details](img/tls_mgm_details.jpg)
