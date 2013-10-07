<?php

/* stats.html */
class __TwigTemplate_16f5e1232588d3290f29d035e0cf595c extends Twig_Template
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
        echo "<!-- Statistics -->
<div class=\"row stats\">
  <div class=\"col-md-4 col-xs-12\">
    <h2>Select a ";
        // line 4
        if (isset($context["page_name"])) { $_page_name_ = $context["page_name"]; } else { $_page_name_ = null; }
        echo twig_escape_filter($this->env, $_page_name_, "html", null, true);
        echo "<br /><small>to dynamically load real-time details and statistics.</small></h2>
  </div>

  <div class=\"col-md-2 col-xs-6\">
    <div class=\"panel panel-danger\">
      <div class=\"panel-heading\"><h1>";
        // line 9
        if (isset($context["host_counts"])) { $_host_counts_ = $context["host_counts"]; } else { $_host_counts_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_host_counts_, "prd"), "html", null, true);
        echo "</h1></div>
      <div class=\"panel-body\">production nodes</div>
    </div>
  </div>

  <div class=\"col-md-2 col-xs-6\">
    <div class=\"panel panel-warning\">
      <div class=\"panel-heading\"><h1>";
        // line 16
        if (isset($context["host_counts"])) { $_host_counts_ = $context["host_counts"]; } else { $_host_counts_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_host_counts_, "stg"), "html", null, true);
        echo "</h1></div>
      <div class=\"panel-body\">staging nodes</div>
    </div>
  </div>

  <div class=\"col-md-2 col-xs-6\">
    <div class=\"panel panel-info\">
      <div class=\"panel-heading\"><h1>";
        // line 23
        if (isset($context["host_counts"])) { $_host_counts_ = $context["host_counts"]; } else { $_host_counts_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_host_counts_, "tst"), "html", null, true);
        echo "</h1></div>
      <div class=\"panel-body\">testing nodes</div>
    </div>
  </div>

  <div class=\"col-md-2 col-xs-6\">
    <div class=\"panel panel-success\">
      <div class=\"panel-heading\"><h1>";
        // line 30
        if (isset($context["host_counts"])) { $_host_counts_ = $context["host_counts"]; } else { $_host_counts_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_host_counts_, "dev"), "html", null, true);
        echo "</h1></div>
      <div class=\"panel-body\">development nodes</div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "stats.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 30,  55 => 23,  44 => 16,  24 => 4,  40 => 14,  19 => 1,  76 => 25,  73 => 24,  70 => 23,  52 => 5,  49 => 4,  41 => 26,  39 => 23,  34 => 20,  32 => 19,  21 => 1,  148 => 57,  129 => 51,  124 => 50,  117 => 47,  112 => 46,  107 => 45,  99 => 41,  92 => 38,  84 => 37,  79 => 34,  74 => 33,  67 => 30,  64 => 29,  36 => 5,  33 => 9,  28 => 17,  26 => 4,);
    }
}
