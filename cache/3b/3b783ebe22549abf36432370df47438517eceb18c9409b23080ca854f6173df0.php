<?php

/* src/Web/templates/body.html.twig */
class __TwigTemplate_c3b63d8e1811d5350b1dbbcfc0a59c6c7dbbf846e18c563a3df52f43d5d8052e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'CSSBlock' => array($this, 'block_CSSBlock'),
            'pageContent' => array($this, 'block_pageContent'),
            'JSBlock' => array($this, 'block_JSBlock'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pl\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title></title>
    <meta name=\"Description\" content=\"Zadanie testowe\">
    <meta name=\"author\" content=\"Radosław Andraszyk\">
    <meta name=\"robots\" content=\"\">

    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">

    <!-- Optional theme -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css\" integrity=\"sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp\" crossorigin=\"anonymous\">

    ";
        // line 18
        $this->displayBlock('CSSBlock', $context, $blocks);
        // line 20
        echo "    
  </head>
  <body>
  
      <header class=\"container\">
          <h1 class=\"text-center\">Zadanie testowe ITCenter</h1>
          <span class=\"btn btn-success procedure\">Zwróć wynik procedury</span>
          <hr>
      </header>    
      
      <section class=\"container\">
          
        ";
        // line 32
        $this->displayBlock('pageContent', $context, $blocks);
        // line 34
        echo "          
      </section>
      
      <footer class=\"container\">  
          <div class=\"row\">
              <div class=\"col-lg-12\">
                  <hr><p class=\"text-center\">Radosław Andraszyk - <a href=\"http://andraszyk.eu\" target=\"_blank\">andraszyk.eu</a></p>
              </div>
          </div>
      </footer>

    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\" integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\" crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js\" integrity=\"sha256-Qfxgn9jULeGAdbaeDjXeIhZB3Ra6NCK3dvjwAG8Y+xU=\" crossorigin=\"anonymous\"></script>
    
    ";
        // line 49
        $this->displayBlock('JSBlock', $context, $blocks);
        // line 126
        echo "    
  </body>
</html>
";
    }

    // line 18
    public function block_CSSBlock($context, array $blocks = array())
    {
        // line 19
        echo "    ";
    }

    // line 32
    public function block_pageContent($context, array $blocks = array())
    {
        // line 33
        echo "        ";
    }

    // line 49
    public function block_JSBlock($context, array $blocks = array())
    {
        // line 50
        echo "        <script>  
            
            function delegate(el, evt, sel, handler) {
                el.addEventListener(evt, function(event) {
                    var t = event.target;
                    while (t && t !== this) {
                        if (t.matches(sel)) {
                            handler.call(t, event);
                        }
                        t = t.parentNode;
                    }
                });
            }
            
            function sendXMLHttpRequest(url, data, onload, async = true){

                var xhr = new XMLHttpRequest();
                xhr.open('POST', url, async);
                xhr.onload = onload;
                xhr.send(data);

            }
            
            function setCookie(name,value,days) {
                var expires = \"\";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = \"; expires=\" + date.toUTCString();
                }
                document.cookie = name + \"=\" + (value || \"\")  + expires + \"; path=/\";
            }

            function getCookie(name) {
                var nameEQ = name + \"=\";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            (function(){

                delegate(document, 'click', '.procedure', function(e){
                    
                    sendXMLHttpRequest('/procedure', [], function(){

                        try {

                            var data = JSON.parse(this.responseText);

                            if(data.success){

                                Swal(
                                  data.result,
                                  'SELECT SUM(price) FROM books;',
                                  'success'
                                );

                            }

                        } catch(e) {
                            console.log('Error: ' + e);
                        }

                     }, false);
                    
                });
                
            })();

        </script>
    ";
    }

    public function getTemplateName()
    {
        return "src/Web/templates/body.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  106 => 50,  103 => 49,  99 => 33,  96 => 32,  92 => 19,  89 => 18,  82 => 126,  80 => 49,  63 => 34,  61 => 32,  47 => 20,  45 => 18,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"pl\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title></title>
    <meta name=\"Description\" content=\"Zadanie testowe\">
    <meta name=\"author\" content=\"Radosław Andraszyk\">
    <meta name=\"robots\" content=\"\">

    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">

    <!-- Optional theme -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css\" integrity=\"sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp\" crossorigin=\"anonymous\">

    {% block CSSBlock %}
    {% endblock %}
    
  </head>
  <body>
  
      <header class=\"container\">
          <h1 class=\"text-center\">Zadanie testowe ITCenter</h1>
          <span class=\"btn btn-success procedure\">Zwróć wynik procedury</span>
          <hr>
      </header>    
      
      <section class=\"container\">
          
        {% block pageContent %}
        {% endblock %}
          
      </section>
      
      <footer class=\"container\">  
          <div class=\"row\">
              <div class=\"col-lg-12\">
                  <hr><p class=\"text-center\">Radosław Andraszyk - <a href=\"http://andraszyk.eu\" target=\"_blank\">andraszyk.eu</a></p>
              </div>
          </div>
      </footer>

    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\" integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\" crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js\" integrity=\"sha256-Qfxgn9jULeGAdbaeDjXeIhZB3Ra6NCK3dvjwAG8Y+xU=\" crossorigin=\"anonymous\"></script>
    
    {% block JSBlock %}
        <script>  
            
            function delegate(el, evt, sel, handler) {
                el.addEventListener(evt, function(event) {
                    var t = event.target;
                    while (t && t !== this) {
                        if (t.matches(sel)) {
                            handler.call(t, event);
                        }
                        t = t.parentNode;
                    }
                });
            }
            
            function sendXMLHttpRequest(url, data, onload, async = true){

                var xhr = new XMLHttpRequest();
                xhr.open('POST', url, async);
                xhr.onload = onload;
                xhr.send(data);

            }
            
            function setCookie(name,value,days) {
                var expires = \"\";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = \"; expires=\" + date.toUTCString();
                }
                document.cookie = name + \"=\" + (value || \"\")  + expires + \"; path=/\";
            }

            function getCookie(name) {
                var nameEQ = name + \"=\";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            (function(){

                delegate(document, 'click', '.procedure', function(e){
                    
                    sendXMLHttpRequest('/procedure', [], function(){

                        try {

                            var data = JSON.parse(this.responseText);

                            if(data.success){

                                Swal(
                                  data.result,
                                  'SELECT SUM(price) FROM books;',
                                  'success'
                                );

                            }

                        } catch(e) {
                            console.log('Error: ' + e);
                        }

                     }, false);
                    
                });
                
            })();

        </script>
    {% endblock %}
    
  </body>
</html>
", "src/Web/templates/body.html.twig", "/home/bagsiur/pr9.andraszyk.lh/src/Web/templates/body.html.twig");
    }
}
