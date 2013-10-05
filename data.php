<?php
  $service = $_GET['service'];
  if ($service == "adsys-aurora") {
?>
<table class="table">
  <tr>
    <th>Environment</th>
    <th>Node</th>
    <th>Load</th>
    <th>RAM</th>
    <th>Disk</th>
    <th width=80%>Links</th>
  </tr>
  <tr>
    <td rowspan=2><span class="label label-danger">production</span></td>
    <td>adsysprd101</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
  <tr>
    <td>adsysprd201</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
  <tr>
    <td rowspan=2><span class="label label-warning">staging</span></td>
    <td>adsysstg101</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
  <tr>
    <td>adsysstg201</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
  <tr>
    <td><span class="label label-info">testing</span></td>
    <td>adsystst101</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
  <tr>
    <td><span class="label label-success">development</span></td>
    <td>adsysstg101</td>
    <td><span class="line" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td><span class="bar" data-width="40">5,3,9,6,5,9,7,3,5,2</span></td>
    <td nowrap="nowrap">
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/" href="#">
        <span class="pie">1/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/var" href="#">
        <span class="pie">2/5</span>
      </span>
      <span class="w-tooltip" data-toggle="tooltip" title="" data-original-title="/u01" href="#">
        <span class="pie">7/10</span>
      </span>
      &nbsp;
    </td>
    <td>
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-plus-sign"></span> Health Check
      </button>
      &nbsp;
      <button type="button" class="btn btn-default btn-xs">
          <span class="glyphicon glyphicon-dashboard"></span> Zabbix
      </button>
      &nbsp;
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-xs" style="background-color: #eee; color: #000" disabled="disabled">
          <span class="glyphicon glyphicon-transfer"></span> <strong>SSH</strong>
        </button>
        <button type="button" class="btn btn-default btn-xs" disabled="disabled">
          <span>adsysprd101.webroots.fas.harvard.edu</span>
        </button>
      </div>
  </tr>
</table>
    <script type="text/javascript">
      $('.line').peity('line')
      $('.bar').peity('bar')
      $('.pie').peity('pie')
    </script>
<?php } else { ?>
<p>This is not adsys-aurora, it is <?php print $service; ?></p>
<?php } ?>
