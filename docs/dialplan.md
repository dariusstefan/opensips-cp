---
title: 'Dialplan Tool (dialplan)'
---

## Description

The OCP dialplan tool maps over the [Dialplan OpenSIPS module](https://docs.opensips.org/manual/2-3/modules/dialplan). The tool is used to perform modifications in OpenSIPS's dialplan rules during runtime. The rules are kept in a database and they can be reloaded into OpenSIPS from the web interface (see the *Apply Changes to Server* button).

The tool displays a table with the OpenSIPS dialplan rules, offering the ability to add, edit, clone or delete rules.

Following is an explanation of the actions performed by the buttons on the page:

- "Search": Searches through the dialplan rules, displaying only the rules with the dialplan ID submited by the user.
- "Show all": Shows all the dialplan rules from all dialplans.
- "Clone Dialplan": Creates a new entry of the selected dialplan rule identical with the selected one.
- "Delete Dialplan": Deletes all entries with a certain dialplan ID.
- "Add New Rule": Inserts a form to add new rule into dialplan.

> [!NOTE]
> All the changes are done in database. To apply them into your OpenSIPS, you need to click on "Apply Changes to Server" button

## Configuration

- Database layer configuration file : **opensips-cp/config/tools/system/dialplan/db.inc.php** Attributes set in this file :
  - database host
  - database port
  - database username
  - database password
  - database name
- Local configuration file : **opensips-cp/config/tools/system/dialplan/local.inc.php** Attributes set in this file :
  - $config->table\_dialplan the database table name for storing the diaplan rules
  - $config->results\_per\_page and $config->results\_page\_range control over the pagination when displaying the dialplan rules
  - $talk\_to\_this\_assoc\_id As OCP can manage multiple OpenSIPS instances, this is the association ID pointing to the group of servers (system) which needs to be provision with this dialplan information.
  - $dialplan\_attributes\_mode How the interpret the attributes of the rules: 0 - an checkbox with predefined value; 1 - an opaque string
  - $config->attrs\_cb If $dialplan\_attributes\_mode is set to 1, this array must define the possible attribute options. Each options is a char, the resulting string being the set of the options/chars that are enabled.
    ```
    $config->attrs_cb=array(
    	// name , description
    	array("a","Attribute a"),
    	array("b","Attribute b"),
    	);
    ```

## Screenshots

![Dialplan](img/dialplan.jpg)
