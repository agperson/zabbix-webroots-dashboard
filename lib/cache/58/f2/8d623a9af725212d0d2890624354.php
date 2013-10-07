<?php

/* base.html */
class __TwigTemplate_58f28d623a9af725212d0d2890624354 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 17
        echo "  </head>
  <body>
    ";
        // line 19
        $this->env->loadTemplate("header.html")->display($context);
        // line 20
        echo "
    <div class=\"container\">
      <div class=\"dashboard\">
        ";
        // line 23
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "      </div>
    </div>
  </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    <title>Webroots Dashboard - ";
        if (isset($context["page_title"])) { $_page_title_ = $context["page_title"]; } else { $_page_title_ = null; }
        echo twig_escape_filter($this->env, $_page_title_, "html", null, true);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <!-- Bootstrap core CSS -->
    <link href=\"vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
    <!-- Custom styles for this template -->
    <link href=\"lib/css/dashboard.css\" rel=\"stylesheet\">
    <!-- Bootstrap and JQuery JavaScript -->
    <script src=\"vendor/frameworks/jquery/jquery.min.js\"></script>
    <script src=\"vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
    <!-- Peity for sparklines -->
    <script src=\"lib/peity/jquery.peity.min.js\"></script>
    ";
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "          ";
        $this->env->loadTemplate("stats.html")->display($context);
        // line 25
        echo "        ";
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 25,  73 => 24,  70 => 23,  52 => 5,  49 => 4,  41 => 26,  39 => 23,  34 => 20,  32 => 19,  21 => 1,  148 => 57,  129 => 51,  124 => 50,  117 => 47,  112 => 46,  107 => 45,  99 => 41,  92 => 38,  84 => 37,  79 => 34,  74 => 33,  67 => 30,  64 => 29,  36 => 5,  33 => 4,  28 => 17,  26 => 4,);
    }
}
