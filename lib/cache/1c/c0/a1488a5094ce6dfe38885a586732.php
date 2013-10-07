<?php

/* services.html */
class __TwigTemplate_1cc0a1488a5094ce6dfe38885a586732 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page_name"] = "services";
        // line 3
        $context["page_title"] = "Services";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "  ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
  <!-- Enable tooltips -->
  <script type=\"text/javascript\">
    \$('.w-tooltip').tooltip();
  </script>

  <!-- Hook to load data when accordian folds are opened -->
  <script type=\"text/javascript\">
    function service_fetch(serviceName, servicePort, serviceHosts) {
      \$( '#' + serviceName ).on('shown.bs.collapse', function () {
        \$.get( 'data.php?service=' + serviceName + '&port=' + servicePort + '&hosts=' + serviceHosts, function( data ) {
          \$( '#' + serviceName + '-data' ).html( data );
          } )
        .fail(function() {
          \$( '#' + serviceName + '-data' ).html( '<div class=\"alert alert-danger\"><strong>Error!</strong> Unable to retrieve node data!</div>' );
        })
      })
      \$( '#' + serviceName ).on('show.bs.collapse', function () {
        \$( '#' + serviceName + '-data' ).html( '<div style=\"text-align: center\"><img src=\"lib/img/ajax-loader.gif\" /></div>' );
      } );
    }
  </script>
";
    }

    // line 29
    public function block_content($context, array $blocks = array())
    {
        // line 30
        echo "  ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "
  <!-- Accordian panel for each service -->
    <div class=\"panel-group\" id=\"accordion\">
      ";
        // line 33
        if (isset($context["service_list"])) { $_service_list_ = $context["service_list"]; } else { $_service_list_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_service_list_);
        foreach ($context['_seq'] as $context["service_name"] => $context["service_data"]) {
            // line 34
            echo "      <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
          <h4 class=\"panel-title\">
            <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#";
            // line 37
            if (isset($context["service_name"])) { $_service_name_ = $context["service_name"]; } else { $_service_name_ = null; }
            echo twig_escape_filter($this->env, $_service_name_, "html", null, true);
            echo "\">";
            if (isset($context["service_name"])) { $_service_name_ = $context["service_name"]; } else { $_service_name_ = null; }
            echo twig_escape_filter($this->env, $_service_name_, "html", null, true);
            echo "</a>
            &nbsp;<span class=\"badge pull-right\">";
            // line 38
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_service_data_, "host_count"), "html", null, true);
            echo " nodes</span>
          </h4>
        </div><!-- /.panel-heading -->
        <div id=\"";
            // line 41
            if (isset($context["service_name"])) { $_service_name_ = $context["service_name"]; } else { $_service_name_ = null; }
            echo twig_escape_filter($this->env, $_service_name_, "html", null, true);
            echo "\" class=\"panel-collapse collapse\">
          <div class=\"panel-body\">
            <h4>Service Overview</h4>
            <dl class=\"dl-horizontal\">
              <dt>Service Owner</dt><dd>";
            // line 45
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, (($this->getAttribute($_service_data_, "owner")) ? ($this->getAttribute($_service_data_, "owner")) : ("Unknown")), "html", null, true);
            echo "</dd>
              <dt>SLA Classification</dt><dd>";
            // line 46
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, (($this->getAttribute($_service_data_, "sla")) ? ($this->getAttribute($_service_data_, "sla")) : ("Unknown")), "html", null, true);
            echo "</dd>
              <dt>Public URL</dt><dd>";
            // line 47
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, (($this->getAttribute($_service_data_, "url")) ? ($this->getAttribute($_service_data_, "url")) : ("Unknown")), "html", null, true);
            echo "</dd>
            </dl>
            <h4>Deployed Nodes</h4>
            <div id=\"";
            // line 50
            if (isset($context["service_name"])) { $_service_name_ = $context["service_name"]; } else { $_service_name_ = null; }
            echo twig_escape_filter($this->env, $_service_name_, "html", null, true);
            echo "-data\"></div>
            <script type=\"text/javascript\">setup_data_fetch('";
            // line 51
            if (isset($context["service_name"])) { $_service_name_ = $context["service_name"]; } else { $_service_name_ = null; }
            echo twig_escape_filter($this->env, $_service_name_, "html", null, true);
            echo "', '";
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_service_data_, "port"), "html", null, true);
            echo "','";
            if (isset($context["service_data"])) { $_service_data_ = $context["service_data"]; } else { $_service_data_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_service_data_, "host_id_list"), "html", null, true);
            echo "');</script>
          </div><!-- /.panel-body -->
        </div><!-- /.panel-collapse -->
      </div><!-- /.panel -->
    <?php } ?>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['service_name'], $context['service_data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "  </div><!-- /.panel-group -->
";
    }

    public function getTemplateName()
    {
        return "services.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 57,  129 => 51,  124 => 50,  117 => 47,  112 => 46,  107 => 45,  99 => 41,  92 => 38,  84 => 37,  79 => 34,  74 => 33,  67 => 30,  64 => 29,  36 => 5,  33 => 4,  28 => 3,  26 => 2,);
    }
}
