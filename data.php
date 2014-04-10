<?php
  require 'lib/php/config.php';
  require 'lib/php/zabbix-connect.php';

  # Get inputs and filter them
  $type     = filter_input(INPUT_GET, 'type',    FILTER_SANITIZE_STRING);
  $service  = filter_input(INPUT_GET, 'service', FILTER_SANITIZE_STRING);
  $port     = filter_input(INPUT_GET, 'port',    FILTER_SANITIZE_NUMBER_INT);
  $host_ids = filter_input(INPUT_GET, 'hosts',   FILTER_SANITIZE_NUMBER_FLOAT, array('flags' => FILTER_FLAG_ALLOW_THOUSAND));
  $host_ids = explode(',', $host_ids);

  # Ensure values passed validation
  if($type == "host") {
    if(!is_array($host_ids)) {
      print "<strong>Invalid or missing request data.</strong>";
      exit;
    } else {
      require 'data-node.php';
      exit;
    }
  } elseif($type == "service") {
    if($service == "" || $port == "" || !is_array($host_ids)) {
      print "<strong>Invalid or missing request data.</strong>";
      exit;
    } else {
      require 'data-service.php';
      exit;
    }
  } else {
    print "<strong>Invalid request type</strong> ($type $service $port $host_ids).";
    exit;
  }
