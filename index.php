<?php
  require 'config.php';

  require 'PhpZabbixApi_Library/ZabbixApiAbstract.class.php';
  require 'PhpZabbixApi_Library/ZabbixApi.class.php';

  # Connect to Zabbix
  try {
    $api = new ZabbixApi($api_dest, $api_user, $api_pass);
  } catch(Exception $e) {
    echo $e->getMessage();
    exit;
  }

  $hostgroup_ids = array(
    16, # AdSys Webroots - Production
    13, # AdSys Webroots - Non-Production
    10, # TDS Webroots - Production
    7,  # TDS Webroots - Non-Production
  );

  # Find the list of hosts in Webroots hostgroups
  $hosts = $api->hostGet(array(
    'groupids' => $hostgroup_ids,
    'output'   => array('hostid', 'name', 'host'),
  ));

  # Determine host counts for progress bar and assemble a list of hostids
  $host_total = $host_dev = $host_stg = $host_tst = $host_prd = $host_adm = 0;
  $host_ids = array();
  foreach($hosts as $host) {
    $host_ids[] = $host->hostid;
    $host_total++;
    switch(substr($host->name,-6,3)) {
      case "dev": $host_dev++; break;
      case "tst": $host_tst++; break;
      case "stg": $host_stg++; break;
      case "prd": $host_prd++; break;
      case "adm": case "utl": $host_adm++; break;
      default: break;
    }
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
  # Alphebetize the service list
  ksort($service_list);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Webroots Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!-- Bootstrap and JQuery JavaScript -->
    <script src="jquery/jquery-2.0.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Peity for sparklines -->
    <script src="peity/jquery.peity.min.js"></script>
    <!-- Enable tooltips -->
    <script type="text/javascript">
      $('.w-tooltip').tooltip();
    </script>
    <!-- Load data when accordian folds are opened -->
    <script type="text/javascript">
      function setup_data_fetch(serviceName, servicePort, serviceHosts) {
        $( '#' + serviceName ).on('shown.bs.collapse', function () {
          $.get( 'data.php?service=' + serviceName + '&port=' + servicePort + '&hosts=' + serviceHosts, function( data ) {
            $( '#' + serviceName + '-data' ).html( data );
            } )
          .fail(function() {
            $( '#' + serviceName + '-data' ).html( '<div class="alert alert-danger"><strong>Error!</strong> Unable to retrieve node data!</div>' );
          })
        })
        $( '#' + serviceName ).on('show.bs.collapse', function () {
          $( '#' + serviceName + '-data' ).html( '<div style="text-align: center"><img src="img/ajax-loader.gif" /></div>' );
        } );
      }
    </script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand">Webroots Dashboard</span>
        </div>
        <div class="collapse navbar-collapse">
          <!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Services</a></li>
            <li><a href="#nodes"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Nodes</a></li>
          </ul>
          -->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://zabbix.huit.harvard.edu/zabbix/"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Go to Zabbix</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
        <!-- Listing of all hosts organized by environment -->
        <!--
        <div class="progress">
          <div class="progress-bar progress-bar-danger w-tooltip" data-toggle="tooltip" title="" data-original-title="<?php print $host_prd ?> nodes" style="width: <?php print round(($host_prd/$host_total)*100) ?>%">production</div>
          <div class="progress-bar progress-bar-warning w-tooltip" data-toggle="tooltip" title="" data-original-title="<?php print $host_stg ?> nodes" style="width: <?php print round(($host_stg/$host_total)*100) ?>%">staging</div>
          <div class="progress-bar progress-bar-info w-tooltip" data-toggle="tooltip" title="" data-original-title="<?php print $host_tst ?> nodes" style="width: <?php print round(($host_tst/$host_total)*100) ?>%">testing</div>
          <div class="progress-bar progress-bar-success w-tooltip" data-toggle="tooltip" title="" data-original-title="<?php print $host_dev ?> nodes" style="width: <?php print round(($host_dev/$host_total)*100) ?>%">development</div>
          <div class="progress-bar w-tooltip" data-toggle="tooltip" title="" data-original-title="<?php print $host_adm ?> nodes" style="width: <?php print round(($host_adm/$host_total)*100) ?>%">admin/utility</div>
        </div>
-->

      <div class="dashboard">

        <!-- Statistics -->
        <div class="row stats">
          <div class="col-md-4">
            <h2>Select a service<br /><small>to dynamically load real-time details and statistics.</small></h2>
          </div>

          <div class="col-md-2">
            <div class="panel panel-danger">
              <div class="panel-heading"><h1><?php print $host_prd ?></h1></div>
              <div class="panel-body">production nodes</div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="panel panel-warning">
              <div class="panel-heading"><h1><?php print $host_stg ?></h1></div>
              <div class="panel-body">staging nodes</div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="panel panel-info">
              <div class="panel-heading"><h1><?php print $host_tst ?></h1></div>
              <div class="panel-body">testing nodes</div>
            </div>
          </div>

          <div class="col-md-2">
            <div class="panel panel-success">
              <div class="panel-heading"><h1><?php print $host_dev ?></h1></div>
              <div class="panel-body">development nodes</div>
            </div>
          </div>
        </div>

        <!-- Accordian panel for each service -->
        <div class="panel-group" id="accordion">
        <?php foreach($service_list as $service_name => $service_data) { ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php print $service_name ?>"><?php print $service_name ?></a>
                &nbsp;<span class="badge pull-right"><?php print count($service_data['hosts']) ?> </span>
              </h4>
            </div><!-- /.panel-heading -->
            <div id="<?php print $service_name ?>" class="panel-collapse collapse">
              <div class="panel-body">
                <h4>Service Overview</h4>
                <dl class="dl-horizontal">
                  <dt>Service Owner</dt><dd>Unknown</dd>
                  <dt>SLA Classification</dt><dd>Unknown</dd>
                  <dt>Public URL</dt><dd>Unknown</dd>
                </dl>
                <h4>Deployed Nodes</h4>
                <div id="<?php print $service_name ?>-data"></div>
                <script type="text/javascript">setup_data_fetch('<?php print $service_name ?>', '<?php print $service_data['port'] ?>','<?php print join($service_data['hosts'], ",") ?>');</script>
              </div><!-- /.panel-body -->
            </div><!-- /.panel-collapse -->
          </div><!-- /.panel -->
        <?php } ?>
      </div><!-- /.panel-group -->
    </div><!-- /.container -->
  </body>
</html>
