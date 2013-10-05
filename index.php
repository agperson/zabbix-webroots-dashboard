<!DOCTYPE html>
<html>
  <head>
    <title>Webroots Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
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
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Services</a></li>
            <li><a href="#nodes"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Nodes</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://zabbix.huit.harvard.edu/zabbix/"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Zabbix</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="dashboard">

        <div class="progress">
          <div class="progress-bar progress-bar-danger w-tooltip" data-toggle="tooltip" title="" data-original-title="12 nodes" style="width: 29%">production</div>
          <div class="progress-bar progress-bar-warning w-tooltip" data-toggle="tooltip" title="" data-original-title="9 nodes" style="width: 21%">staging</div>
          <div class="progress-bar progress-bar-info w-tooltip" data-toggle="tooltip" title="" data-original-title="4 nodes" style="width: 10%">testing</div>
          <div class="progress-bar progress-bar-success w-tooltip" data-toggle="tooltip" title="" data-original-title="11 nodes" style="width: 26%">development</div>
          <div class="progress-bar w-tooltip" data-toggle="tooltip" title="" data-original-title="6 nodes" style="width: 14%">admin/utility</div>
        </div>

        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#adsys-aurora">
                  adsys-aurora
                  &nbsp;<span class="badge">6</span>
                </a>
              </h4>
            </div>
            <div id="adsys-aurora" class="panel-collapse collapse">
              <div class="panel-body">
                <h4>Overview</h4>
                <dl class="dl-horizontal">
                  <dt>Service Owner</dt><dd>FAS Administrative &amp; Student Financial Systems</dd>
                  <dt>SLA Classification</dt><dd>Business Hours</dd>
                  <dt>Public URL</dt><dd><a href="https://aurora.fas.harvard.edu">https://aurora.fas.harvard.edu</a></dd>
                </dl>
                <h4>Deployed Nodes</h4>
                <div id="adsys-aurora-data">
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#gitorious">
                  gitorious
                  &nbsp;<span class="badge">6</span>
                </a>
              </h4>
            </div>
            <div id="gitorious" class="panel-collapse collapse">
              <div class="panel-body">
                <h4>Overview</h4>
                <dl class="dl-horizontal">
                  <dt>Service Owner</dt><dd>FAS Administrative &amp; Student Financial Systems</dd>
                  <dt>SLA Classification</dt><dd>Business Hours</dd>
                  <dt>Public URL</dt><dd><a href="https://aurora.fas.harvard.edu">https://aurora.fas.harvard.edu</a></dd>
                </dl>
                <h4>Deployed Nodes</h4>
                <div id="gitorious-data">
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#isites-myharvard">
                  isites-myharvard
                  &nbsp;<span class="badge">8</span>
                </a>
              </h4>
            </div>
            <div id="isites-myharvard" class="panel-collapse collapse">
              <div class="panel-body">
                <h4>Overview</h4>
                <dl class="dl-horizontal">
                  <dt>Service Owner</dt><dd>FAS Administrative &amp; Student Financial Systems</dd>
                  <dt>SLA Classification</dt><dd>Business Hours</dd>
                  <dt>Public URL</dt><dd><a href="https://aurora.fas.harvard.edu">https://aurora.fas.harvard.edu</a></dd>
                </dl>
                <h4>Deployed Nodes</h4>
                <div id="isites-myharvard-data">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
      function setup_data_fetch(serviceName) {
        $( '#' + serviceName ).on('shown.bs.collapse', function () {
          $.get( 'data.php?service=' + serviceName, function( data ) {
            $( '#' + serviceName + '-data' ).html( data );
            } );
        })
        $( '#' + serviceName ).on('show.bs.collapse', function () {
          $( '#' + serviceName + '-data' ).html( '<div style="text-align: center"><img src="img/ajax-loader.gif" /></div>' );
        } );
      }
      setup_data_fetch('adsys-aurora');
      setup_data_fetch('gitorious');
      setup_data_fetch('isites-myharvard');
    </script>
  </body>
</html>
