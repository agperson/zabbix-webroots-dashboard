zabbix-webroots-dashboard
=========================

This single-page dashboard gives developers, DevOps engineers, and managers insight into the state of the Harvard
University Information Technology "Webroots" application environment.  Data is pulled from Zabbix monitoring using
the PHPZabbixApi library, processed inline, and outputted with Bootstrap and jQuery.  Live monitoring data for each
service is loaded dynamically when the service is expanded.

Data is collected by querying Zabbix for items in a specific "application" across all hosts, finding hosts on which
the application is running, and then querying for live monitoring data using the Zabbix history API.  Peity sparklines
display the data in a pretty way.

![screenshot](lib/screenshot.png "Screenshot")
