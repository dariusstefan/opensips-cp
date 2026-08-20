---
title: 'CDRviewer Tool'
---

## Description

It shows Call Detail Records(CDRs) from the database. You have the possibility to filter CDRs and to export CDRs in csv (comma-separated values) files.

For viewing and exporting the CDRs you can select (see configuration section) what fields of the CDRs to be displayed or exported. Both operations can be extended to cover all the extra accouted fields from OpenSIPS config file.

You can search by any field and use a wildcard ( '%' - matches a set of characters ). The filters "CDR Field" , "Start Date" , "End Date" can be applied in parallel.

With the help of this tool you can export CDR records in a csv file. The filters applied on "Search" are working on the exported CDRs as well, so it exports what is displayed. When the "Export" button is pressed a download pop-up will show in your browser.

There is a feature to jump to SIP trace of the CDR (if such records exist) if you have enabled the SIPTrace tool - the jump link is behind the 'SIP Call ID' value of the CDR. The correlation between CDRs and the SIPTrace tool is done following the \`call\_id\` field which is common for both cdrs and siptrace tables.

What columns (from the accouting table) should be displayed or what columns may be exported, it is customizable via the tool's settings.

This tool maps over the [*acc* module](https://docs.opensips.org/manual/3-3/modules/acc) from OpenSIPS.

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.

## Screenshots

![CDRviewer](img/cdrviewer.jpg)
