---
title: 'TViewer Tool'
---

## Description

The TViwere tool is a generic framework to be used to provision any DB table - the tool can be derived and customized (via the tviewer.inc.php configuration file) to any table format.

It provides standard DB operations (add, edit, delete, view) for a table (with data validation). It also allow to have attached the triggering of an Management Inteface command.

It also provides support for multiple tables to be provisioned using different tabs.

The configuration file (see below) contains a comprehensive description on how to configure the tviewer tool on top of any kind of custom sql table, with different custom views and operations over records and columns.

## Configuration

In order to create a new tool, you need follow these steps (consider we will add the `$TOOL` name in the `system` section):

1. create two directories with the name of the tool **opensips-cp/config/tools/system** and **opensips-cp/web/tools/system** directories.
  ```
  mkdir opensips-cp/config/{tools,web}/system/$TOOL
  ```
2. copy the **opensips-cp/web/common/tools/tviewer/samples/index.php** sample in the tool's web directory **opensips-cp/config/web/system/$TOOL/index.php** and edit the **$branch** and **$module\_id** variables accordingly. The file should look like:
  ```
  cat <<EOF
  
  $branch = "system";
  $module_id = "$TOOL";
  
  require_once("../../../common/tools/tviewer/redirect.php");
  EOF
  ```
3. copy the rest of the files from the **opensips-cp/web/common/tools/tviewer/samples/** directory to the tool's configuration **opensips-cp/config/tools/system/$TOOL** directory:
  - **db.inc.php** - configuration file that indicates the database to be used by this tool; make sure you adjust the **$module\_id** variable with the name of the tool (**$TOOL**).
  - **settings.inc.php** - contains the dynamic settings that can be adjusted for this module; make sure you adjust the **your\_module** field of the **$config** variable to the name of the tool (**$TOOL**).
  - **tviewer.inc.php** - the main configuration file for your tool, where you should configure the tables you want to provision, its fields, MI commands, tabs, etc; please read the **tviewer.inc.php** file for a comprehensive description of the configuration options.
4. provision the **openisps-cp/config/modules.inc.php** file with your new tool; add in the **$config\_modules** variable your tool:
  ```
  "$TOOL"              => array (
      "enabled"       => true,
      "name"          => "Your Tool's Name"
  ),
  ```
