---
title: 'Monit Tool'
---

## Description

MONIT is a monitoring server (see [https://mmonit.com/monit/](https://mmonit.com/monit/) ). The Monit tool is a centralized point of access to the web interfaces of all MONIT servers configured across the SIP platform - it shows the status of machines and processes that are monitored.

The tool has a drop down box with pre-configured machines to easily switch between MONIT servers. The "Force Refresh" button will instantly refresh the page. Using the interface you can enable or disable monitoring for each process or host configured to be monitored by MONIT and you can also start or stop a service.

## Global Configuration

The Monit tool uses the Monit Connector information that is configured for each box.

```
'conn'="127.0.0.1:2812";
'user'="admin";
'pass'="pass";
'has_ssl'=1;
```

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![Monit](img/monit.jpg)
