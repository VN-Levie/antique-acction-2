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

/* error/report_modal.twig */
class __TwigTemplate_69dbd6ab550b840cf34cfc22ca1f4cb3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"modal fade\" id=\"errorReportModal\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"errorReportModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-dialog-scrollable modal-lg\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"errorReportModalLabel\">";
echo _gettext("Submit error report");
        // line 5
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Cancel");
        // line 6
        echo "\"></button>
      </div>
      <div class=\"modal-body\"></div>
      <div class=\"modal-footer\">
        ";
        // line 10
        if (($context["allowed_to_send_error_reports"] ?? null)) {
            // line 11
            echo "          <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
echo _gettext("Cancel");
            echo "</button>
          <button type=\"button\" class=\"btn btn-primary\" id=\"errorReportModalConfirm\">";
echo _gettext("Send error report");
            // line 12
            echo "</button>
        ";
        } else {
            // line 14
            echo "          <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
            echo "</button>
        ";
        }
        // line 16
        echo "      </div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "error/report_modal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 16,  66 => 14,  62 => 12,  56 => 11,  54 => 10,  48 => 6,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "error/report_modal.twig", "D:\\work\\s2tv\\public\\mypp\\templates\\error\\report_modal.twig");
    }
}
