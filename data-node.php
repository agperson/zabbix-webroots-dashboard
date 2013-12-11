<?php
  # Fetch hostnames and FQDNs from host IDs
  $hosts = $api->hostGet(array(
    'hostids'  => $host_ids,
    'output'   => array('hostid', 'name', 'host'),
    ));

  # Build a list of services based on checking for the proc.num item within the application group
  $host_services = $api->itemGet(array(
    'hostids'     => $host_ids,
    'search'      => array('key_' => 'proc.num'),
    'application' => $application,
    'output'      => array('hostid', 'itemid', 'key_', 'name'),
  ));

  $host_service_list = array();
  foreach($host_services as $service) {
    preg_match('/^Service ([^:]+)/', $service->name, $matches);
    $name = $matches[1];
    preg_match('/\[,web-(.*)\]$/', $service->key_, $matches);
    $port = $matches[1];

    $host_service_list[$name] = array('port' => $port);
  }

  # Alphebetize the service list
  ksort($host_service_list);
  $host = (array)$hosts[0];
?>
<div class="table-responsive">
<table class="table">
  <tr>
    <th>Service</th>
    <th>Owner</th>
    <th>SLA</th>
    <th>Links</th>
  </tr>
<?php
    foreach($host_service_list as $name => $data) {
?>
  <tr>
    <td><?php print $name ?></td>
    <td><?php print $data['owner'] ? $data['owner'] : "Unknown" ?></td>
    <td><?php print $data['sla'] ? $data['sla'] : "Unknown" ?></td>
    <td>
      <a type="button" class="btn btn-default btn-xs" href="http://<?php print $host['host'] . ":" . $data['port'] ?>/server-health?full">
        <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </a>
    </td>
  </tr>
<?php } ?>
</table>
</div>
