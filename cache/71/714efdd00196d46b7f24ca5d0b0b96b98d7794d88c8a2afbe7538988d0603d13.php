<?php

/* /src/App/Books/View/add.html.twig */
class __TwigTemplate_2d6f8607914250e215ac9c2186e216558ab81cfed1be88ea9f9ee8a46a7eb59a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("src/Web/templates/body.html.twig", "/src/App/Books/View/add.html.twig", 1);
        $this->blocks = array(
            'pageContent' => array($this, 'block_pageContent'),
            'JSBlock' => array($this, 'block_JSBlock'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "src/Web/templates/body.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageContent($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <a href=\"/";
        // line 7
        echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    Nowa ksiażka:
                </div>
                <div class=\"panel-body\">
                    <form method=\"post\" action=\"\">
                        ";
        // line 21
        if (($context["errors"] ?? null)) {
            echo " 
                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <div class=\"alert alert-danger\" role=\"alert\">
                                        <ul>
                                            ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 27
                echo "                                                <li>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "message", array()), "html", null, true);
                echo "</li>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        // line 34
        echo "                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <div class=\"form-group\">
                                    <label for=\"name\">Title</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Title\" name=\"book[name]\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "name", array()), "html", null, true);
        echo "\">
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"price\">Price</label>
                                    <input type=\"text\" class=\"form-control price-mask\" id=\"price\" placeholder=\"Price\" name=\"book[price]\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "price", array()), "html", null, true);
        echo "\">
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"author\">Author</label>
                                    <select class=\"form-control\" id=\"author\" name=\"book[author]\">
                                        <option value=\"0\">Select your option</option>
                                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["authors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 55
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", array()), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "author", array()) == twig_get_attribute($this->env, $this->source, $context["item"], "id", array()))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "surname", array()), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\"><hr></div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <div class=\"form-group\">
                                    <label for=\"description\">Description</label>
                                    <textarea id=\"description\" class=\"form-control\" rows=\"3\" name=\"book[description]\" placeholder=\"Description\">";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "description", array()), "html", null, true);
        echo "</textarea>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\"><hr></div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" value=\"Save\" name=\"book[add]\" class=\"btn btn-success\">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

";
    }

    // line 88
    public function block_JSBlock($context, array $blocks = array())
    {
        // line 89
        echo "    
    ";
        // line 90
        $this->displayParentBlock("JSBlock", $context, $blocks);
        echo "
    
    <script src=\"https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js\"></script>
    
    <script>
        
        CKEDITOR.replace('description');
        
        (function(){

            var inputChange = function(event) {
                
                if(this.value.length === 1){
                    this.value = '0' + this.value;
                }
                
                this.value = parseFloat(this.value.replace(/[^\\d]/g,'').replace(/(\\d\\d?)\$/,'.\$1')).toFixed(2);
  
            };
            
            ['change', 'keyup', 'change', 'keyup'].forEach(function(entry) {
                delegate(document, entry, '.price-mask', inputChange);
            });

        })();
        
    </script>
    
";
    }

    public function getTemplateName()
    {
        return "/src/App/Books/View/add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 90,  172 => 89,  169 => 88,  146 => 68,  133 => 57,  118 => 55,  114 => 54,  103 => 46,  92 => 38,  86 => 34,  79 => 29,  70 => 27,  66 => 26,  58 => 21,  41 => 7,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"src/Web/templates/body.html.twig\"  %}

{% block pageContent %}

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <a href=\"/{{ page }}\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    Nowa ksiażka:
                </div>
                <div class=\"panel-body\">
                    <form method=\"post\" action=\"\">
                        {% if errors %} 
                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <div class=\"alert alert-danger\" role=\"alert\">
                                        <ul>
                                            {% for item in errors %}
                                                <li>{{ item.message }}</li>
                                            {% endfor %}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        {% endif %}
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <div class=\"form-group\">
                                    <label for=\"name\">Title</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Title\" name=\"book[name]\" value=\"{{ book.name }}\">
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"price\">Price</label>
                                    <input type=\"text\" class=\"form-control price-mask\" id=\"price\" placeholder=\"Price\" name=\"book[price]\" value=\"{{ book.price }}\">
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"author\">Author</label>
                                    <select class=\"form-control\" id=\"author\" name=\"book[author]\">
                                        <option value=\"0\">Select your option</option>
                                        {% for item in authors %}
                                            <option value=\"{{ item.id }}\" {{ book.author == item.id ? 'selected' }}>{{ item.name }} {{ item.surname }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\"><hr></div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <div class=\"form-group\">
                                    <label for=\"description\">Description</label>
                                    <textarea id=\"description\" class=\"form-control\" rows=\"3\" name=\"book[description]\" placeholder=\"Description\">{{ book.description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\"><hr></div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" value=\"Save\" name=\"book[add]\" class=\"btn btn-success\">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{% endblock %}

{% block JSBlock %}
    
    {{ parent() }}
    
    <script src=\"https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js\"></script>
    
    <script>
        
        CKEDITOR.replace('description');
        
        (function(){

            var inputChange = function(event) {
                
                if(this.value.length === 1){
                    this.value = '0' + this.value;
                }
                
                this.value = parseFloat(this.value.replace(/[^\\d]/g,'').replace(/(\\d\\d?)\$/,'.\$1')).toFixed(2);
  
            };
            
            ['change', 'keyup', 'change', 'keyup'].forEach(function(entry) {
                delegate(document, entry, '.price-mask', inputChange);
            });

        })();
        
    </script>
    
{% endblock %}", "/src/App/Books/View/add.html.twig", "/home/bagsiur/pr9.andraszyk.lh/src/App/Books/View/add.html.twig");
    }
}
