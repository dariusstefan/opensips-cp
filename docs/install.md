---
title: 'OpenSIPS Control Panel (OCP) version class 9 - Installation Guide'
---

*OpenSIPS Control Panel* has been tested and developed mostly on Debian and Redhat Linux , but, being a web portal qualifies it to work also with other Linux distros and operating systems as well. Most of the paths and commands in this INSTALL guide are be debian/redhat specific.

What do you need for running OCP?

1. A web server (this tutorial focuses only on Apache Web Server)
2. PHP and some of it's extensions
3. A DB server (mysql/postgres/sqlite/oracle etc)

This tutorial assumes that your web directory is */var/www/html/* and the OCP files are located in */var/www/html/opensips-cp/* folder. Your web directory may depend on your Operating System or on the used web server.

## Apache

### Install Apache

Depending on your Linux distro, do:

- **Debian-like**: apt-get install apache2 libapache2-mod-php php-curl
- **Redhat-like**: yum install httpd

### Configure Apache

Add the configuration below into one of Apache's existent VHOSTs or create a new one.

```
<Directory /var/www/html/opensips-cp/web>
	Options Indexes FollowSymLinks MultiViews
	AllowOverride None
	Require all granted
</Directory>
<Directory /var/www/html/opensips-cp>
	Options Indexes FollowSymLinks MultiViews
	AllowOverride None
	Require all denied
</Directory>
Alias /cp /var/www/html/opensips-cp/web

<DirectoryMatch "/var/www/html/opensips-cp/web/tools/.*/.*/(template|custom_actions|lib)/">
	Require all denied
</DirectoryMatch>
```

You can read more about Apache's VHOSTS [here](http://httpd.apache.org/docs/current/vhosts/examples.html).

### File permissions

Apache is going to need write permissions on some files / folders in the *opensips-cp* directory, so you can do:

- for debian: chown -R www-data:www-data /var/www/html/opensips-cp/
- for redhat: chown -R apache:apache /var/www/html/opensips-cp/

## PHP

You must have PHP installed and enabled in the web server. In order to do that you will have to install php and some of it's extensions.

- for debian: apt-get install php php-mysql php-gd php-pear php-cli php-apcu
- for redhat: yum install php php-mysql php-gd php-pear php-pecl-apc

*Do not forget to restart Apache after all the php changes!!!*

## Database server

The OpenSIPS Control Panel requires access to database for two purposes:

- **OCP related data**, like login users and permissions, additional data related to some tools (like statistics to be monitored, etc)
- **OpenSIPS data**, access to the OpenSIPS data to allow OCP to provision different OpenSIPS modules

The OpenSIPS Control Panel can connect to a remote database server, so the DB server can be used from the SIP Server machine or another machine in the network.

### Creating the OCP tables

Before trying to login into OCP, you must create the tables specific to OCP.

From the *opensips-cp/* folder run:

```
mysql -Dopensips -p < config/db_schema.mysql
or
psql -h host_name -U postgres_username -d opensips < config/db_schema.pgsql
```

This will create the OCP specific tables into the *opensips* database and add a first access user, the *admin* user with the *opensips* password.

## Cron jobs

In order to allow OCP to sample the statistics from the OpenSIPS boxes, you need to install some cron jobs. First edit the *config/tools/system/smonitor/opensips\_stats\_cron* file and change/correct the path to your OpenSIPS Control Panel installation:

> [!WARNING]
> For security concerns, make sure you replace in the *config/tools/system/smonitor/opensips\_stats\_cron* file the username that is running the cron job with a user that has limited capabilities (i.e. replace *root* with *www-data* for debian and *apache* for redhat).

Now simply install the cron jobs by doing:

```
cp config/tools/system/smonitor/opensips_stats_cron /etc/cron.d/
```
