---
title: 'SMPP Gateway Module (proto_smpp)'
---

## Description

This tool is available starting with OCP version 8.3.0

The SMPP Gateway OCP tool maps on the [Proto SMPP OpenSIPS module](https://docs.opensips.org/manual/3-0/modules/proto_smpp). It provides OpenSIPS the abilities to connect to multiple SMS Centers (via SMPP protocol) and to send and received SMS'es, by converting them from / to SIP MESSAGE requests - basically to perform the functionality of a bidirectional SIP to SMPP gateway

As the SMS Center records are kept in an SQL database, the tool provides standard DB provisioning operations : add, delete, search and listing of the records. As all the changes are done in database, to apply them into your OpenSIPS, you need to restart it.

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/smpp/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name

## Screenshots

![SMPP listing](img/smpp.jpg)

![SMPP details](img/smpp_details.jpg)
