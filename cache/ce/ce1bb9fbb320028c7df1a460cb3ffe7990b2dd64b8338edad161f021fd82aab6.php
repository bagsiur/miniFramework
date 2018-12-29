<?php

/* /src/App/Books/View/book.html.twig */
class __TwigTemplate_19abb37169d8d7db5a1e34386ba28e76fc5725f880266b968d28960d5bd1c937 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("src/Web/templates/body.html.twig", "/src/App/Books/View/book.html.twig", 1);
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
            ";
        // line 7
        if (($context["edited"] ?? null)) {
            // line 8
            echo "                <div class=\"alert alert-success\" role=\"alert\">Dane zostały zmienione poprawnie</div>
            ";
        }
        // line 10
        echo "        </div>
    </div>
        
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, (((($context["template"] ?? null) == "edit")) ? (("/?id=" . twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "id", array()))) : ("/")), "html", null, true);
        echo "\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    ";
        // line 25
        echo (((($context["template"] ?? null) == "edit")) ? ("Informacje o książce") : ("Nowa ksiażka:"));
        echo "
                </div>
                <div class=\"panel-body\">
                    <form method=\"post\" action=\"\">
                        ";
        // line 29
        if (($context["errors"] ?? null)) {
            echo " 
                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <div class=\"alert alert-danger\" role=\"alert\">
                                        <ul>
                                            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 35
                echo "                                                <li>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "message", array()), "html", null, true);
                echo "</li>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        // line 42
        echo "                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <div class=\"form-group\">
                                    <label for=\"name\">Tytuł</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Title\" name=\"book[name]\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "name", array()), "html", null, true);
        echo "\">
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"price\">Cena</label>
                                    <input type=\"text\" class=\"form-control price-mask\" id=\"price\" placeholder=\"Price\" name=\"book[price]\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "price", array()), 2, "."), "html", null, true);
        echo "\">
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"author\">Autor</label>
                                    <select class=\"form-control\" id=\"author\" name=\"book[author]\">
                                        <option value=\"0\">Wybierz</option>
                                        ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["authors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 63
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
        // line 65
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"publishing_house\">Wydawnictwo</label>
                                    <select class=\"form-control\" id=\"publishing_house\" name=\"book[publishing_house]\">
                                        <option value=\"0\">Wybierz</option>
                                        ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["publishing_houses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 74
            echo "                                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", array()), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "publishing_house", array()) == twig_get_attribute($this->env, $this->source, $context["item"], "id", array()))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", array()), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
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
                                    <label for=\"description\">Opis</label>
                                    <textarea id=\"description\" class=\"form-control\" rows=\"3\" name=\"book[description]\" placeholder=\"Description\">";
        // line 87
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
                                <input type=\"submit\" value=\"Zapisz\" name=\"book[add]\" class=\"btn btn-success\">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

";
    }

    // line 107
    public function block_JSBlock($context, array $blocks = array())
    {
        // line 108
        echo "    
    ";
        // line 109
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
            
            ['change', 'keyup'].forEach(function(entry) {
                delegate(document, entry, '.price-mask', inputChange);
            });

        })();
        
    </script>
    
";
    }

    public function getTemplateName()
    {
        return "/src/App/Books/View/book.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 109,  215 => 108,  212 => 107,  189 => 87,  176 => 76,  163 => 74,  159 => 73,  149 => 65,  134 => 63,  130 => 62,  119 => 54,  108 => 46,  102 => 42,  95 => 37,  86 => 35,  82 => 34,  74 => 29,  67 => 25,  54 => 15,  47 => 10,  43 => 8,  41 => 7,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"src/Web/templates/body.html.twig\"  %}

{% block pageContent %}
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            {% if edited %}
                <div class=\"alert alert-success\" role=\"alert\">Dane zostały zmienione poprawnie</div>
            {% endif %}
        </div>
    </div>
        
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <a href=\"{{ template == 'edit' ? '/?id=' ~ book.id : '/' }}\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    {{ template == 'edit' ? 'Informacje o książce' : 'Nowa ksiażka:' }}
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
                                    <label for=\"name\">Tytuł</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Title\" name=\"book[name]\" value=\"{{ book.name }}\">
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"price\">Cena</label>
                                    <input type=\"text\" class=\"form-control price-mask\" id=\"price\" placeholder=\"Price\" name=\"book[price]\" value=\"{{ book.price|number_format(2, '.') }}\">
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"author\">Autor</label>
                                    <select class=\"form-control\" id=\"author\" name=\"book[author]\">
                                        <option value=\"0\">Wybierz</option>
                                        {% for item in authors %}
                                            <option value=\"{{ item.id }}\" {{ book.author == item.id ? 'selected' }}>{{ item.name }} {{ item.surname }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-6\">
                                <div class=\"form-group\">
                                    <label for=\"publishing_house\">Wydawnictwo</label>
                                    <select class=\"form-control\" id=\"publishing_house\" name=\"book[publishing_house]\">
                                        <option value=\"0\">Wybierz</option>
                                        {% for item in publishing_houses %}
                                            <option value=\"{{ item.id }}\" {{ book.publishing_house == item.id ? 'selected' }}>{{ item.name }}</option>
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
                                    <label for=\"description\">Opis</label>
                                    <textarea id=\"description\" class=\"form-control\" rows=\"3\" name=\"book[description]\" placeholder=\"Description\">{{ book.description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\"><hr></div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12\">
                                <input type=\"submit\" value=\"Zapisz\" name=\"book[add]\" class=\"btn btn-success\">
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
            
            ['change', 'keyup'].forEach(function(entry) {
                delegate(document, entry, '.price-mask', inputChange);
            });

        })();
        
    </script>
    
{% endblock %}", "/src/App/Books/View/book.html.twig", "/home/bagsiur/pr9.andraszyk.lh/src/App/Books/View/book.html.twig");
    }
}
