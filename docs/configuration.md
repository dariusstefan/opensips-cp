---
title: 'OpenSIPS Control Panel (OCP) Configuration Guide'
---

This file shows information about the configuration of the OPENSIPS-CP. A minimal knowledge of php is necesarry to configure it.

- [Global Configuration](#global)
- [Tools Configuration](#tools)

1. Global Configuration Files Description

All the files for global configuration are situated in the separated directory *config/*.

## Tools selector

File : *modules.inc.php*

This files allows you to globally enable or disable certians tools in your OpenSIPS Control Panel, depening on your OpenSIPS setup. This will result in which tools (modules) and/or groups of tools should appear in the main menu.

For example :

```
"users" => array (
	"enabled"   => true,
	"name"      => "Users",
	"modules"   => array (
		"acl_management" => array (
			"enabled"   => true,
			"name"      => "ACL Management"
			),
		"alias_management"  => array (
			"enabled"   => false,
			"name"      => "Alias Management"
			)
		)
	)
```

## Database Configuration

File : *db.inc.php*

This configuration file helds the global/default parameters for database connections to mysql or postgres. These parameters cover up the OpenSIPS Control Panel login part and defaults all the tools, unless one of the tools needs to use some other database (see below for more on this).

```
//database driver mysql or pgsql
$config->db_driver = "mysql";

//database host
	$config->db_host = "localhost";

//database port - leave empty for default
$config->db_port = "";

//database connection user
$config->db_user = "opensips";

//database connection password
$config->db_pass = "opensipsrw";

//database name
$config->db_name = "opensips";
```

## Global Options

File : *globals.php*

The globals.php file is used for parameters that are being accessed in more then one module.

```
$config->admin_passwd_mode
```

Password can be saved in plain text mode by setting this option to 0 or in chyphered mode, by setting it to 1.

```
$config->admin_passwd_mode = 1;
```

Also a Two-Factor Authentication (via Google authenticator) may be optionally enabled for Control Panel login.

```
$config->twoFactor = true;
$config->twoFactorDomain = "My OpenSIPS CP";
```

2. Per-tool Configuration Files

The below information is valid only for 9.3.2 version. Starting with 9.3.3, the per-tool DB configuration was moved from files into the tool setting section (via actual web pages). Still the behavior is the same, the per-tool DB setting overriding the default DB settings from the global DB file.

The per-tool configuration files contain database layer connection data and other attributes that are specific to each tool. If the same database is being used for each module, then there should be used the global config file and the local one should be left as it is by default. If one module needs a different configuration, just uncomment the parameters and set them as needed:

```
config/tools/admin|users|system/toolname/db.inc.php
```

The variables in this file are self explanatory.You must set up the mysql connection data through this file.

Not all the tools require access to the database but every tool that uses the database has its own database configuration file.

Documentation for each module can be found by following the specific link.
