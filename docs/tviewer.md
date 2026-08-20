---
title: 'TViewer Tool (domains)'
---

## Description

The TViwere tool is a generic tool to be used to provision any DB table - the tool can be derived and customized (via the local.inc.php configuration file) to any table format.

It provides standard DB operations (add, edit, delete, view) for a table (with data validation). It also allow to have attached the triggering of an Management Inteface command.

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/tviewer/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name
- Local configuration file : **opensips-cp/config/tools/system/tviewer/local.inc.php** Please read the file for comprehensive decription of the configuration options.
