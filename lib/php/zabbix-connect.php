<?php
  require 'PhpZabbixApi_Library/ZabbixApiAbstract.class.php';
  require 'PhpZabbixApi_Library/ZabbixApi.class.php';

  # Connect to Zabbix
  try {
    $api = new ZabbixApi($api_dest, $api_user, $api_pass);
  } catch(Exception $e) {
    echo $e->getMessage();
    exit;
  }
