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

/* server/status/advisor/index.twig */
class __TwigTemplate_c74dd1144f2c2c612800b6376542e31f extends Template
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
        $context["active"] = "advisor";
        // line 1
        $this->parent = $this->loadTemplate("server/status/base.twig", "server/status/advisor/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
  <h2>";
echo _gettext("Advisor system");
        // line 6
        echo "</h2>

  ";
        // line 8
        if (twig_test_empty(($context["data"] ?? null))) {
            // line 9
            echo "    ";
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Not enough privilege to view the advisor.")]);
            echo "
  ";
        } else {
            // line 11
            echo "    <button type=\"button\" class=\"btn btn-secondary mb-4\" data-bs-toggle=\"modal\" data-bs-target=\"#advisorInstructionsModal\">
      ";
            // line 12
            echo PhpMyAdmin\Html\Generator::getIcon("b_help", _gettext("Instructions"));
            echo "
    </button>

    <div class=\"modal fade\" id=\"advisorInstructionsModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"advisorInstructionsModalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"advisorInstructionsModalLabel\">";
echo _gettext("Advisor system");
            // line 19
            echo "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
            // line 20
            echo "\"></button>
          </div>
          <div class=\"modal-body\">
            <p>";
echo _gettext("The Advisor system can provide recommendations on server variables by analyzing the server status variables.");
            // line 27
            echo "</p>
            <p>";
echo _gettext("Do note however that this system provides recommendations based on simple calculations and by rule of thumb which may not necessarily apply to your system.");
            // line 32
            echo "</p>
            <p>";
echo _gettext("Prior to changing any of the configuration, be sure to know what you are changing (by reading the documentation) and how to undo the change. Wrong tuning can have a very negative effect on performance.");
            // line 37
            echo "</p>
            <p>";
echo _gettext("The best way to tune your system would be to change only one setting at a time, observe or benchmark your database, and undo the change if there was no clearly measurable improvement.");
            // line 42
            echo "</p>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
            // line 45
            echo "</button>
          </div>
        </div>
      </div>
    </div>

    ";
            // line 51
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 51)) > 0)) {
                // line 52
                echo "      <div class=\"alert alert-danger mt-2 mb-2\" role=\"alert\">
        <h4 class=\"alert-heading\">";
echo _gettext("Errors occurred while executing rule expressions:");
                // line 53
                echo "</h4>
        <ul>
          ";
                // line 55
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "errors", [], "any", false, false, false, 55));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 56
                    echo "            <li>";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                echo "        </ul>
      </div>
    ";
            }
            // line 61
            echo "
    ";
            // line 62
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "fired", [], "any", false, false, false, 62)) > 0)) {
                // line 63
                echo "      <h4>";
echo _gettext("Possible performance issues");
                echo "</h4>

      <div class=\"accordion mb-4\" id=\"rulesAccordion\">
        ";
                // line 66
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "fired", [], "any", false, false, false, 66));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
                    // line 67
                    echo "          <div class=\"accordion-item\">
            <div class=\"accordion-header\" id=\"heading";
                    // line 68
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 68), "html", null, true);
                    echo "\">
              <button class=\"accordion-button";
                    // line 69
                    echo (( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 69)) ? (" collapsed") : (""));
                    echo "\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 69), "html", null, true);
                    echo "\" aria-expanded=\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 69)) ? ("true") : ("false"));
                    echo "\" aria-controls=\"collapse";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 69), "html", null, true);
                    echo "\">
                ";
                    // line 70
                    echo twig_escape_filter($this->env, twig_striptags(twig_get_attribute($this->env, $this->source, $context["rule"], "issue", [], "any", false, false, false, 70)), "html", null, true);
                    echo "
              </button>
            </div>
            <div id=\"collapse";
                    // line 73
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 73), "html", null, true);
                    echo "\" class=\"accordion-collapse collapse";
                    echo ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 73)) ? (" show") : (""));
                    echo "\" aria-labelledby=\"heading";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 73), "html", null, true);
                    echo "\" data-bs-parent=\"#rulesAccordion\">
              <div class=\"accordion-body\">
                <dl>
                  <dt>";
echo _gettext("Issue:");
                    // line 76
                    echo "</dt>
                  <dd>";
                    // line 77
                    echo twig_get_attribute($this->env, $this->source, $context["rule"], "issue", [], "any", false, false, false, 77);
                    echo "</dd>

                  <dt>";
echo _gettext("Recommendation:");
                    // line 79
                    echo "</dt>
                  <dd>";
                    // line 80
                    echo twig_get_attribute($this->env, $this->source, $context["rule"], "recommendation", [], "any", false, false, false, 80);
                    echo "</dd>

                  <dt>";
echo _gettext("Justification:");
                    // line 82
                    echo "</dt>
                  <dd>";
                    // line 83
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "justification", [], "any", false, false, false, 83), "html", null, true);
                    echo "</dd>

                  <dt>";
echo _gettext("Used variable / formula:");
                    // line 85
                    echo "</dt>
                  <dd>";
                    // line 86
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "formula", [], "any", false, false, false, 86), "html", null, true);
                    echo "</dd>

                  <dt>";
echo _gettext("Test:");
                    // line 88
                    echo "</dt>
                  <dd>";
                    // line 89
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "test", [], "any", false, false, false, 89), "html", null, true);
                    echo "</dd>
                </dl>
              </div>
            </div>
          </div>
        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 95
                echo "      </div>
    ";
            }
            // line 97
            echo "  ";
        }
        // line 98
        echo "
";
    }

    public function getTemplateName()
    {
        return "server/status/advisor/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  276 => 98,  273 => 97,  269 => 95,  249 => 89,  246 => 88,  240 => 86,  237 => 85,  231 => 83,  228 => 82,  222 => 80,  219 => 79,  213 => 77,  210 => 76,  199 => 73,  193 => 70,  183 => 69,  179 => 68,  176 => 67,  159 => 66,  152 => 63,  150 => 62,  147 => 61,  142 => 58,  133 => 56,  129 => 55,  125 => 53,  121 => 52,  119 => 51,  111 => 45,  105 => 42,  101 => 37,  97 => 32,  93 => 27,  87 => 20,  83 => 19,  72 => 12,  69 => 11,  63 => 9,  61 => 8,  57 => 6,  53 => 5,  49 => 4,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/advisor/index.twig", "D:\\work\\vht\\public\\mypp\\templates\\server\\status\\advisor\\index.twig");
    }
}
