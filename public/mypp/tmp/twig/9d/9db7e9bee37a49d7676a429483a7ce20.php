<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* server/status/variables/index.twig */
class __TwigTemplate_50c4a321e7f76856954808de2cacdeee extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "server/status/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["active"] = "variables";
        // line 1
        $this->parent = $this->loadTemplate("server/status/base.twig", "server/status/variables/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
";
        // line 5
        if (($context["is_data_loaded"] ?? null)) {
            // line 6
            echo "<div class=\"card mb-3\" id=\"tableFilter\">
  <div class=\"card-header\">";
echo _gettext("Filters");
            // line 7
            echo "</div>
  <div class=\"card-body\">
    <form action=\"";
            // line 9
            echo PhpMyAdmin\Url::getFromRoute("/server/status/variables");
            echo "\" method=\"post\" class=\"row row-cols-lg-auto g-3 align-items-center\">
      ";
            // line 10
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "

      <label class=\"col-12 col-form-label\" for=\"filterText\">";
echo _gettext("Containing the word:");
            // line 12
            echo "</label>
      <div class=\"col-12\">
        <input class=\"form-control\" name=\"filterText\" type=\"text\" id=\"filterText\" value=\"";
            // line 14
            echo twig_escape_filter($this->env, ($context["filter_text"] ?? null), "html", null, true);
            echo "\">
      </div>

      <div class=\"col-12\">
        <div class=\"form-check\">
          <input class=\"form-check-input\" type=\"checkbox\" name=\"filterAlert\" id=\"filterAlert\"";
            // line 19
            echo ((($context["is_only_alerts"] ?? null)) ? (" checked") : (""));
            echo ">
          <label class=\"form-check-label\" for=\"filterAlert\">";
echo _gettext("Show only alert values");
            // line 20
            echo "</label>
        </div>
      </div>

      <div class=\"col-12\">
        <label class=\"visually-hidden\" for=\"filterCategory\">";
echo _gettext("Filter by category…");
            // line 25
            echo "</label>
        <select class=\"form-select\" id=\"filterCategory\" name=\"filterCategory\">
          <option value=\"\">";
echo _gettext("Filter by category…");
            // line 27
            echo "</option>
          ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 29
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 29), "html", null, true);
                echo "\"";
                echo ((twig_get_attribute($this->env, $this->source, $context["category"], "is_selected", [], "any", false, false, false, 29)) ? (" selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 29), "html", null, true);
                echo "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "        </select>
      </div>

      <div class=\"col-12\">
        <div class=\"form-check\">
          <input class=\"form-check-input\" type=\"checkbox\" name=\"dontFormat\" id=\"dontFormat\"";
            // line 36
            echo ((($context["is_not_formatted"] ?? null)) ? (" checked") : (""));
            echo ">
          <label class=\"form-check-label\" for=\"dontFormat\">";
echo _gettext("Show unformatted values");
            // line 37
            echo "</label>
        </div>
      </div>

      <div class=\"col-12\">
        <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
echo _gettext("Refresh");
            // line 42
            echo "\">
      </div>
    </form>
  </div>
</div>

  <div id=\"linkSuggestions\" class=\"defaultLinks hide\">
    <p class=\"alert alert-primary\" role=\"alert\">
      ";
echo _gettext("Related links:");
            // line 51
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 52
                echo "        <span class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "name", [], "any", false, false, false, 52), "html", null, true);
                echo "\">
          ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["link"], "links", [], "any", false, false, false, 53));
                foreach ($context['_seq'] as $context["link_name"] => $context["link_url"]) {
                    // line 54
                    echo "            ";
                    if (($context["link_name"] == "doc")) {
                        // line 55
                        echo "              ";
                        echo PhpMyAdmin\Html\MySQLDocumentation::show($context["link_url"]);
                        echo "
            ";
                    } else {
                        // line 57
                        echo "              <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link_url"], "url", [], "any", false, false, false, 57), "html", null, true);
                        echo "\"";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["link_url"], "params", [], "any", false, false, false, 57))) {
                            echo " data-post=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link_url"], "params", [], "any", false, false, false, 57), "html", null, true);
                            echo "\"";
                        }
                        echo ">";
                        echo twig_escape_filter($this->env, $context["link_name"], "html", null, true);
                        echo "</a>
            ";
                    }
                    // line 59
                    echo "            |
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['link_name'], $context['link_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                echo "        </span>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "    </p>
  </div>

  <div class=\"responsivetable row\">
    <table class=\"table table-light table-striped table-hover table-sm\" id=\"serverStatusVariables\">
      <colgroup>
        <col class=\"namecol\">
        <col class=\"valuecol\">
        <col class=\"descrcol\">
      </colgroup>
      <thead class=\"table-light\">
        <tr>
          <th scope=\"col\">";
echo _gettext("Variable");
            // line 75
            echo "</th>
          <th scope=\"col\">";
echo _gettext("Value");
            // line 76
            echo "</th>
          <th scope=\"col\">";
echo _gettext("Description");
            // line 77
            echo "</th>
        </tr>
      </thead>
      <tbody>
        ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["variables"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["variable"]) {
                // line 82
                echo "          <tr";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["variable"], "class", [], "any", false, false, false, 82))) {
                    echo " class=\"s_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "class", [], "any", false, false, false, 82), "html", null, true);
                    echo "\"";
                }
                echo ">
            <th class=\"name\">
              ";
                // line 84
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["variable"], "name", [], "any", false, false, false, 84), ["_" => " "]), "html", null, true);
                echo "
              ";
                // line 85
                echo twig_get_attribute($this->env, $this->source, $context["variable"], "doc", [], "any", false, false, false, 85);
                echo "
            </th>

            <td class=\"value font-monospace text-end\">
              <span class=\"formatted\">
                ";
                // line 90
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 90)) {
                    // line 91
                    echo "                  <span class=\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["variable"], "is_alert", [], "any", false, false, false, 91)) ? ("text-danger") : ("text-success"));
                    echo "\">
                ";
                }
                // line 93
                echo "
                ";
                // line 94
                if ((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["variable"], "name", [], "any", false, false, false, 94)) && is_string($__internal_compile_1 = "%") && ('' === $__internal_compile_1 || $__internal_compile_1 === substr($__internal_compile_0, -strlen($__internal_compile_1))))) {
                    // line 95
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 95), 0, 2), "html", null, true);
                    echo " %
                ";
                } elseif (twig_in_filter("Uptime", twig_get_attribute($this->env, $this->source,                 // line 96
$context["variable"], "name", [], "any", false, false, false, 96))) {
                    // line 97
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::timespanFormat(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 97)), "html", null, true);
                    echo "
                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 98
$context["variable"], "is_numeric", [], "any", false, false, false, 98) && (twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 98) >= 1000))) {
                    // line 99
                    echo "                  <abbr title=\"";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 99), 0), "html", null, true);
                    echo "\">
                    ";
                    // line 100
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 100), 3, 1), "html", null, true);
                    echo "
                  </abbr>
                ";
                } elseif (twig_get_attribute($this->env, $this->source,                 // line 102
$context["variable"], "is_numeric", [], "any", false, false, false, 102)) {
                    // line 103
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 103), 3, 1), "html", null, true);
                    echo "
                ";
                } else {
                    // line 105
                    echo "                  ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 105), "html", null, true);
                    echo "
                ";
                }
                // line 107
                echo "
                ";
                // line 108
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 108)) {
                    // line 109
                    echo "                  </span>
                ";
                }
                // line 111
                echo "              </span>
              <span class=\"original hide\">
                ";
                // line 113
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 113)) {
                    // line 114
                    echo "                  <span class=\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["variable"], "is_alert", [], "any", false, false, false, 114)) ? ("text-danger") : ("text-success"));
                    echo "\">
                ";
                }
                // line 116
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 116), "html", null, true);
                echo "
                ";
                // line 117
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 117)) {
                    // line 118
                    echo "                  </span>
                ";
                }
                // line 120
                echo "              </span>
            </td>

            <td class=\"w-50\">
              ";
                // line 124
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "description", [], "any", false, false, false, 124), "html", null, true);
                echo "
              ";
                // line 125
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variable"], "description_doc", [], "any", false, false, false, 125));
                foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
                    // line 126
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 126) == "doc")) {
                        // line 127
                        echo "                  ";
                        echo PhpMyAdmin\Html\MySQLDocumentation::show(twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 127));
                        echo "
                ";
                    } else {
                        // line 129
                        echo "                  <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 129), "url", [], "any", false, false, false, 129), "html", null, true);
                        echo "\" data-post=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 129), "params", [], "any", false, false, false, 129), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 129), "html", null, true);
                        echo "</a>
                ";
                    }
                    // line 131
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 132
                echo "            </td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variable'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "      </tbody>
    </table>
  </div>
";
        } else {
            // line 139
            echo "  ";
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Not enough privilege to view status variables.")]);
            echo "
";
        }
        // line 141
        echo "
";
    }

    public function getTemplateName()
    {
        return "server/status/variables/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 141,  399 => 139,  393 => 135,  385 => 132,  379 => 131,  369 => 129,  363 => 127,  360 => 126,  356 => 125,  352 => 124,  346 => 120,  342 => 118,  340 => 117,  335 => 116,  329 => 114,  327 => 113,  323 => 111,  319 => 109,  317 => 108,  314 => 107,  308 => 105,  302 => 103,  300 => 102,  295 => 100,  290 => 99,  288 => 98,  283 => 97,  281 => 96,  276 => 95,  274 => 94,  271 => 93,  265 => 91,  263 => 90,  255 => 85,  251 => 84,  241 => 82,  237 => 81,  231 => 77,  227 => 76,  223 => 75,  208 => 63,  201 => 61,  194 => 59,  180 => 57,  174 => 55,  171 => 54,  167 => 53,  162 => 52,  157 => 51,  146 => 42,  138 => 37,  133 => 36,  126 => 31,  113 => 29,  109 => 28,  106 => 27,  101 => 25,  93 => 20,  88 => 19,  80 => 14,  76 => 12,  70 => 10,  66 => 9,  62 => 7,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/variables/index.twig", "D:\\work\\vht\\public\\mypp\\templates\\server\\status\\variables\\index.twig");
    }
}
