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

/* main/add_book.html.twig */
class __TwigTemplate_4db1b8a1b0f13da6265c2ddb2c982efb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/add_book.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/add_book.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "main/add_book.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello MainController!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"container\">
        <div class=\"container\">
            ";
        // line 8
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 8, $this->source); })()), 'form_start');
        echo "

                ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 10, $this->source); })()), "name", [], "any", false, false, false, 10), 'row');
        echo "
                ";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 11, $this->source); })()), "author", [], "any", false, false, false, 11), 'row');
        echo "
                ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 12, $this->source); })()), "cover", [], "any", false, false, false, 12), 'row');
        echo "
                ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 13, $this->source); })()), "file", [], "any", false, false, false, 13), 'row');
        echo "
            <div class=\"form-group\">
                <label for=\"inputDate\">Введите дату:</label>
                <input type=\"date\" id=\"inputDate\" name=\"date\" class=\"form-control\" required=\"required\"
                        ";
        // line 17
        if (((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 17, $this->source); })()) != null)) {
            // line 18
            echo "                            value=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 18, $this->source); })()), "Y-m-d"), "html", null, true);
            echo "\"
                        ";
        }
        // line 19
        echo ">
            </div>
            <div>
                <input type=\"submit\" id=\"submitData\" class=\"btn btn-success mt-3\" required=\"required\">
            </div>


            ";
        // line 26
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["bookForm"]) || array_key_exists("bookForm", $context) ? $context["bookForm"] : (function () { throw new RuntimeError('Variable "bookForm" does not exist.', 26, $this->source); })()), 'form_end');
        echo "
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "main/add_book.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 26,  124 => 19,  118 => 18,  116 => 17,  109 => 13,  105 => 12,  101 => 11,  97 => 10,  92 => 8,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello MainController!{% endblock %}

{% block body %}
    <div class=\"container\">
        <div class=\"container\">
            {{ form_start(bookForm) }}

                {{ form_row(bookForm.name) }}
                {{ form_row(bookForm.author) }}
                {{ form_row(bookForm.cover) }}
                {{ form_row(bookForm.file) }}
            <div class=\"form-group\">
                <label for=\"inputDate\">Введите дату:</label>
                <input type=\"date\" id=\"inputDate\" name=\"date\" class=\"form-control\" required=\"required\"
                        {% if date != null %}
                            value=\"{{ date|date('Y-m-d') }}\"
                        {% endif %}>
            </div>
            <div>
                <input type=\"submit\" id=\"submitData\" class=\"btn btn-success mt-3\" required=\"required\">
            </div>


            {{ form_end(bookForm) }}
        </div>
    </div>
{% endblock %}
", "main/add_book.html.twig", "/Applications/MAMP/htdocs/symfony/templates/main/add_book.html.twig");
    }
}
