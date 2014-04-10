<?php
# Load PHP libraries provided by Composer
require 'vendor/autoload.php';

# Enable Twig templating
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('lib/templates');
$twig = new Twig_Environment($loader, array(
#  'cache' => 'lib/cache',
));

require 'lib/php/config.php';
require 'lib/php/zabbix-connect.php';

$hostgroup_ids = array(
  16, # AdSys Webroots - Production
  13, # AdSys Webroots - Non-Production
  10, # TDS Webroots - Production
  7,  # TDS Webroots - Non-Production
);

# Construct the list of hosts in Webroots hostgroups
$hosts = $api->hostGet(array(
  'groupids' => $hostgroup_ids,
  'output'   => array('hostid', 'name', 'host'),
));

# Determine host counts for progress bar and assemble a list of hostids
$host_counts = array();
$host_ids = array();
# This structure is for per-service host counts
$host_env_mapping = array();
foreach($hosts as $host) {
  $host_env   = substr($host->name,-6,3);
  $host_env_mapping[$host->hostid] = $host_env;
  if(!array_key_exists($host_env, $host_counts)) {
    $host_counts[$host_env] = 1;
  } else {
    $host_counts[$host_env]++;
  }
  $host_ids[] = $host->hostid;
}

# Build a list of services based on checking for the proc.num item within the application group
$services = $api->itemGet(array(
  'hostids'     => $host_ids,
  'search'      => array('key_' => 'proc.num'),
  'application' => $application,
  'output'      => array('hostid', 'itemid', 'key_', 'name'),
));

$service_list = array();
foreach($services as $service) {
  preg_match('/^Service ([^:]+)/', $service->name, $matches);
  $name = $matches[1];
  preg_match('/\[,web-(.*)\]$/', $service->key_, $matches);
  $port = $matches[1];

  # If this is the first time seeing this key, create a new array
  if(!array_key_exists($name, $service_list)) {
    $service_list[$name] = array('port' => $port, 'hosts' => array());
  }
  $service_list[$name]['hosts'][] = $service->hostid;
}

# Iterate through the complete service list to add some additional logical data
# for template display
foreach ($service_list as $service_name => $service_data) {
  $service_list[$service_name]['host_count'] = count($service_data['hosts']);
  $service_list[$service_name]['host_id_list'] = join($service_data['hosts'], ",");

  # Place hosts into environments
  foreach($service_data['hosts'] as $host) {
    $service_list[$service_name]['host_env'][$host_env_mapping[$host]]++;
  }
}

# Alphebetize the service list
ksort($service_list);

# Output the page
echo $twig->render('services.html', array('host_counts' => $host_counts, 'service_list' => $service_list));
?>
