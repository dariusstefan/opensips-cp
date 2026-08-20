---
title: 'SIPTrace Tool (siptrace)'
---

## Description

The siptrace tool maps on the [SIPTrace OpenSIPS module](https://docs.opensips.org/manual/2-4/modules/siptrace). When the SIPtrace module is configured to do tracing to Database, this tool can be used to display the traced SIP traffic on the page in a nice graphical way (messages grouped under calls, with flow direction, etc)

Messages are grouped and collepsed based on SIP callid (for faster browsing). Each group can be expended (at message level) and information about the message flow (from/to caller/callee/proxy) will be displayed.

For narrowing the displayed messages, you can use a regexp (regular expression) filter.

You also have the options to see the actual content (full) of the messages you see (in a pop-up window). Special SIP headers (defining dialogs) are highlighted.

The tool interacts with OpenSIPS (via Management Interface - MI) for enabling/disabling the global tracing option in SIPTRACE module.

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/siptrace/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name
- Local configuration file : **opensips-cp/config/tools/system/siptrace/local.inc.php** Attributes set in this file :
  - $config->table\_trace the database table name for storing the siptrace data
  - $config->results\_per\_page and $config->results\_page\_range control over the pagination when displaying the siptrace records
  - $talk\_to\_this\_assoc\_id As OCP can manage multiple OpenSIPS instances, this is the association ID pointing to the group of servers (system) which needs to be provision with this siptrace status (on or off).
  - $proxy\_list an array of SIP interfaces (protocol, IP address and port) to be recognized as belonging to your OpenSIPS servers - you must provide at least one entry. This iss very important to be correctly provision, otherwise the tool will not be able to properly graph the SIP flow (as it will not know which entity in the flow is your OpenSIPS).

## Screenshots

![SIPtrace front](img/siptrace-front.jpg)

![SIPtrace expanded](img/siptrace-expanded.jpg)
