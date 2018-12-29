<?php

/* /Books/View/default.html.twig */
class __TwigTemplate_1e912fa6cc4bea7c36f3d07f3d2de96ee105e9295c1dd4f729a3314047b8f72c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello world

";
        // line 3
        echo twig_escape_filter($this->env, ($context["books"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "/Books/View/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/Books/View/default.html.twig", "/home/bagsiur/pr9.andraszyk.lh/src/App/Books/View/default.html.twig");
    }
}
