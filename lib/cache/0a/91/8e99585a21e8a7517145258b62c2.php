<?php

/* header.html */
class __TwigTemplate_0a918e99585a21e8a7517145258b62c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"navbar navbar-inverse navbar-fixed-top\">
  <div class=\"container\">
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
      <span class=\"navbar-brand\">Webroots Dashboard</span>
    </div>
    <div class=\"collapse navbar-collapse\">
      <ul class=\"nav navbar-nav\">
        <li";
        // line 13
        if (isset($context["page_name"])) { $_page_name_ = $context["page_name"]; } else { $_page_name_ = null; }
        if (($_page_name_ == "services")) {
            echo " class=\"active\"";
        }
        echo "><a href=\"#services\"><span class=\"glyphicon glyphicon-list-alt\"></span>&nbsp;&nbsp;Services</a></li>
        <li";
        // line 14
        if (isset($context["page_name"])) { $_page_name_ = $context["page_name"]; } else { $_page_name_ = null; }
        if (($_page_name_ == "nodes")) {
            echo " class=\"active\"";
        }
        echo "><a href=\"#nodes\"><span class=\"glyphicon glyphicon-th\"></span>&nbsp;&nbsp;Nodes</a></li>
      </ul>
      <ul class=\"nav navbar-nav navbar-right\">
        <li><a href=\"https://zabbix.huit.harvard.edu/zabbix/\"><span class=\"glyphicon glyphicon-dashboard\"></span>&nbsp;&nbsp;Go to Zabbix</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

PHP Fatal error:  Uncaught exception 'Twig_Error_Syntax' with message 'Unexpected token \"name\" of value \"matches\" (\"end of statement block\" expected) in \"header.html\" at line 13'
";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 14,  19 => 1,  76 => 25,  73 => 24,  70 => 23,  52 => 5,  49 => 4,  41 => 26,  39 => 23,  34 => 20,  32 => 19,  21 => 1,  148 => 57,  129 => 51,  124 => 50,  117 => 47,  112 => 46,  107 => 45,  99 => 41,  92 => 38,  84 => 37,  79 => 34,  74 => 33,  67 => 30,  64 => 29,  36 => 5,  33 => 13,  28 => 17,  26 => 4,);
    }
}
