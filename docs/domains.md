---
title: 'Domains Tool'
---

## Description

The Domains tool maps over the [Domain OpenSIPS module](https://docs.opensips.org/manual/3-3/modules/domain). The tools is used to perform modifications in OpenSIPS's local domain list during runtime. The domain names are kept in a database and they can be re-loaded into OpenSIPS via OCP.

The user can list, add, edit and delete domains. When "Apply changes to server" button is triggered the domains will be loaded from the database into OpenSIPS.

> [!NOTE]
> All the changes are done in database. To apply them into your OpenSIPS, you need to click on "Reload on Server" button

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![Domain](img/domains.jpg)
