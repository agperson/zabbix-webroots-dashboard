<?php
  # Fetch hostnames and FQDNs from host IDs
  $hosts = $api->hostGet(array(
    'hostids'  => $host_ids,
    'output'   => array('hostid', 'name', 'host'),
    ));

  # Place hosts into environments
  $envs = array();
  foreach($hosts as $host) {
    $envs[substr($host->name,-6,3)][$host->hostid] = array('hostid' => $host->hostid, 'name' => $host->name, 'host' => $host->host);
  }

  # Fetch standard items
  $items = $api->itemGet(array(
    'hostids'     => $host_ids,
    'filter'      => array('key_' => array('system.cpu.load[,avg1]', 'vm.memory.size[pused]')),
    'output'      => array('hostid', 'itemid', 'key_', 'name'),
    ));

  # Fetch discovery items
  $discovery_items = $api->itemGet(array(
    'hostids'     => $host_ids,
    'search'      => array('key_' => 'vfs.fs.size[*,pfree]'),
    'searchWildcardsEnabled' => true,
    'output'      => array('hostid', 'itemid', 'key_', 'name'),
    ));

  # Merge items into a single array
  $items = array_merge($items, $discovery_items);

  # Reconstruct the array so the history query is more efficient
  foreach($items as $item) {
    $item_hist[$item->itemid] = array(
      'hostid' => $item->hostid,
      'key'    => $item->key_,
      'data'   => array(),
      );
  }

  # Query history, twice to pick up both int and float values
  $history = $api->historyGet(array(
    'itemids'   => array_keys($item_hist),
    'history'   => 0,
    'sortfield' => 'clock',
    'sortorder' => 'DESC',
    'time_from' => time()-959, # When set to 900 we sometimes missed the 10th value
    'time_till' => time(),
    'output'    => 'extend',
    ));

  foreach($history as $hist_val) {
    $item_hist[$hist_val->itemid]['data'][] = $hist_val->value;
  }

  $history = $api->historyGet(array(
    'itemids'   => array_keys($item_hist),
    'history'   => 3,
    'sortfield' => 'clock',
    'sortorder' => 'DESC',
    'time_from' => time()-600,
    'time_till' => time(),
    'output'    => 'extend',
    ));

  foreach($history as $hist_val) {
    $item_hist[$hist_val->itemid]['data'][] = $hist_val->value;
  }
?>
<div class="table-responsive">
<table class="table">
  <tr>
    <th>Environment</th>
    <th>Node</th>
    <th>Load</th>
    <th>RAM</th>
    <th>Disk</th>
    <th>Links</th>
  </tr>
<?php
  $env_abbr_list = array('prd', 'stg', 'tst', 'dev', 'adm');
  $prev_env_abbr = "";
  # Explicit order in which we want to display envs
  foreach($env_abbr_list as $env_abbr) {
    if(array_key_exists($env_abbr, $envs)) {
      $hosts = $envs[$env_abbr];

      switch($env_abbr) {
        case "prd": $label = "danger";  $env_name = "production";  break;
        case "stg": $label = "warning"; $env_name = "staging";     break;
        case "tst": $label = "info";    $env_name = "testing";     break;
        case "dev": $label = "success"; $env_name = "development"; break;
        default: break;
      }
    } else {
      continue;
    }

    foreach($hosts as $host) {
      print " <tr>\n";
      if($prev_env_abbr != $env_abbr) {
        print "   <td rowspan=\"" . count($hosts) . "\"><span class=\"label label-${label}\">${env_name}</span></td>\n";
        $prev_env_abbr = $env_abbr;
      }
      print "   <td>" . $host['name'] . "</td>\n";

      # Find all item history for the given hostid.  This may be over-complicating
      # things, but at the moment I can't think of a better way to do this.
      $host_data = array();
      array_filter($item_hist, function($value, $key) {
        global $host, $host_data;
        if($host['hostid'] == $value['hostid']) {
          $host_data[$value['key']] = $value['data'];
        }
      });

      print '   <td><span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="current: ' . $host_data['system.cpu.load[,avg1]'][14] . '" href="#">' . "\n";
      print '     <span class="line" data-width="40" data-min="0" data-max="4">' . implode(',', $host_data['system.cpu.load[,avg1]']) . '</span>' . "\n    </td>\n";
      print '   <td><span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="current: ' . $host_data['vm.memory.size[pused]'][14] . '%" href="#">' . "\n";
      print '     <span class="bar" data-width="40" data-min="0" data-max="100">' . implode(',', $host_data['vm.memory.size[pused]']) . '</span>' . "\n   </td>\n";
      print '   <td nowrap="nowrap">' . "\n";
      # Find all array keys that are filesystems
      foreach(array_intersect_key($host_data, array_flip(preg_grep('/^vfs.fs.size/', array_keys($host_data)))) as $fs => $data) {
        preg_match('/^vfs.fs.size\[(.*),pfree\]/', $fs, $matches);
        $fs_name = $matches[1];
        $fs_used = (100 - $host_data[$fs][14]);
        print "     <span class=\"w-tooltip\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"${fs_name} (${fs_used}%)\" href=\"#\">\n";
        print "       <span class=\"pie\">${fs_used}/100</span>\n";
        print "     </span>\n";
      }
      print "   </td>\n";
?>
    <td>
      <a type="button" class="btn btn-default btn-xs" href="http://<?php print $host['host'] . ":" . $port ?>/server-health?full">
        <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </a>
      &nbsp;
      <a type="button" class="btn btn-default btn-xs" href="https://zabbix.huit.harvard.edu/zabbix/latest.php?hostid=<?php print $host['hostid'] ?>">
        <span class="glyphicon glyphicon-dashboard"></span> Host Data
      </a>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs w-popover" data-container="body" data-toggle="popover" data-placement="auto" data-content="<?php print $host['host'] ?>" data-original-title="" title="">
        <span class="glyphicon glyphicon-transfer"></span> SSH
      </button>
    </td>
  </tr>
<?php }} ?>
</table>
</div>
<script type="text/javascript">
  $('.line').peity('line');
  $('.bar').peity('bar');
  $('.pie').peity('pie');
  $('.w-tooltip').tooltip();
  $('.w-popover').popover();
</script>
