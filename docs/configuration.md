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

The global configuration file helds global parameters for database connections to mysql or postgres. These parameters cover up all tools, unless one of the tools needs to use some other database. In such a case, a similar db file (called db.inc.php) is found in config directory of the tool.

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

- $config->permissions The permissions parameter is used by all modules, when setting the modules permissions for a certain admin. This array has 2 values that will remain unchanged: read-only and read-write.
  ```
  $config->permissions = array("read-only","read-write");
  ```
- $config->admin\_passwd\_mode Password can be saved in plain text mode by setting this option to 0 or in chyphered mode, by setting it to 1.
  ```
  $config->admin_passwd_mode = 1;
  ```

## Boxes Definition

File : *boxes.global.inc.php*

For an easy deployment of the Opensips Control Panel , the "boxes.global.inc.php" file has been developed. The ideea was to keep the commonly used data (by multiple tools) in this file (to avoid data redundancy).

This file contains the descriptions of the boxes (servers) that form the platform provisioned/controlled by OpenSIPS Control Panel.

Each machine has an unique identification number ($box\_id) - for each of them, you must configure a set of properties, like the IP addresses of the machine, MI interface, MONIT interface, etc

Following is a description of the associative arrays in the file:

- *$boxes\[$box\_id\]\['desc'\]* The text description of the box as it will show in various OCP tools (like MI, Statistics Monitor, Monit).
  ```
  $boxes[$box_id]['desc']="Routing SIP server";
  ```
- *$boxes\[$box\_id\]\['mi'\]* You must configure the JSON URL pointing to the Management Interface of OpenSIPS. Accepted format is *json:ip:port/JSON*. If the machine does not have a MI you can leave this blank. **Note** that the support for FIFO and XMLRPC backends (for the MI connector) were dropped starting with version 7.2.3 .
  ```
  $boxes[$box_id]['mi']['conn']="json:127.0.0.1:8080/JSON";
  ```
- *$boxes\[$box\_id\]\['monit'\]* This is a description of the web portal provided by the Monit tool on that box. Do not define if the box has no Monit installed. The variables are self explanatory.
  ```
  $boxes[$box_id]['monit']['conn']="127.0.0.1:2812";
  $boxes[$box_id]['monit']['user']="monit_user";
  $boxes[$box_id]['monit']['pass']="monit_pass";
  $boxes[$box_id]['monit']['has_ssl']=1;
  ```
- *$boxes\[$box\_id\]\['assoc\_id'\]* The association ID (assoc\_id) of this machine. This ID is mapping the server/box to a system. All the servers belonging to the same system must have the same \`assoc\_id\`. This is a very important parameter . Some of the tools are designed to interact to multiple server, so to a group of servers / system (there can be multiple servers of the same type). Servers of the same type have same assoc\_id - the tools will use this to identify which are the OpenSIPS servers (typically for MI interaction). Somethe tools that check this variable are: The system allow the tools to perform mass-interactions with multiple OpenSIPS instances - like to send a data reload command to multiple servers in the same time (to all the servers in a system). The \`assoc\_id\` ( which marks the machines the tools interact to ) is set in the local.inc.php config file (for each tool)
  - Dynamic Routing
  - Dialplan
  - Load Balancer
  - Domains
  ```
  $boxes[$box_id]['assoc_id']=1;
  ```

Don't forget to increment the $box\_id variable as you add boxes to the $boxes array.

2. Local Configuration Files Description

The local configuration files contain database layer connection data and other attributes that are specific to each tool. If the same database is being used for each module, then there should be used the global config file and the local one should be left as it is by default. If one module needs a different configuration, just uncomment the parameters and set them as needed:

These files are :

- *opensips-cp/config/tools/admin|users|system/toolname/db.inc.php* The variables in this file are self explanatory.You must set up the mysql connection data through this file. Not all the tools require access to the database but every tool that uses the database has its own database configuration file.
- *opensips-cp/config/tools/admin|users|system/toolname/local.inc.php* Tool specific options are defined in this file (if such options exists). The description of the options is present in those files.

Documentation for each module can be found by following the specific link.
