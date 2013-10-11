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
  'selectInventory' => array('os', 'location', 'software', 'hw_arch', 'contact'),
  'output'   => array('hostid', 'name', 'host'),
));

# Determine host counts for progress bar and calculate number of webroots
$host_counts = array();
$host_ids = array();
$host_list = array();
foreach($hosts as $host) {
  $host_env   = substr($host->name,-6,3);
  if(!array_key_exists($host_env, $host_counts)) {
    $host_counts[$host_env] = 1;
  } else {
    $host_counts[$host_env]++;
  }
  $host_ids[] = $host->hostid;
  switch($host_env) {
    case "prd": $label = "danger";  $env_name = "production";  break;
    case "stg": $label = "warning"; $env_name = "staging";     break;
    case "tst": $label = "info";    $env_name = "testing";     break;
    case "dev": $label = "success"; $env_name = "development"; break;
    case "adm":
    case "utl": $label = "primary"; $env_name = "admin/utility"; break;
    default: break;
  }
  $host->inventory->webroots_count = count(explode(",", $host->inventory->software));
  $host->inventory->webroots_env = $env_name;
  $host->inventory->webroots_env_label = $label;
  $host_list[$host->name] = $host;
}

# Sort the hosts by name alphabetically
ksort($host_list);

# Output the page
echo $twig->render('nodes.html', array('host_counts' => $host_counts, 'host_list' => $host_list));
?>
