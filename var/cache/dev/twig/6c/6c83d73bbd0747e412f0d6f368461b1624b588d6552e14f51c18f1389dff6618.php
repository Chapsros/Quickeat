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

/* nav.html.twig */
class __TwigTemplate_6f84b0e45346439f94e6c1dcca6554a64488c28c11d796dd4588808220d36612 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nav.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nav.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-warning\">
    <a class=\"navbar-brand\" href=\"";
        // line 2
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index");
        echo "\">
        <img src=\"https://www.rts.ch/2019/11/12/12/50/10858955.image?w=1200&h=630\" width=\"40\" height=\"30\" class=\"d-inline-block align-top\" alt=\"image burger\">
        QuickEat
    </a>
    <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo02\">
        <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Accueil</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Bonjour User</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Inscription</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Connexion</a>
            </li>
        </ul>
    </div>
</nav>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-lg navbar-light bg-warning\">
    <a class=\"navbar-brand\" href=\"{{ path('index') }}\">
        <img src=\"https://www.rts.ch/2019/11/12/12/50/10858955.image?w=1200&h=630\" width=\"40\" height=\"30\" class=\"d-inline-block align-top\" alt=\"image burger\">
        QuickEat
    </a>
    <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo02\">
        <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Accueil</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Bonjour User</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Inscription</a>
            </li>
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"#\">Connexion</a>
            </li>
        </ul>
    </div>
</nav>
", "nav.html.twig", "/Users/sbo/Documents/Projet web/QuickEat/templates/nav.html.twig");
    }
}
