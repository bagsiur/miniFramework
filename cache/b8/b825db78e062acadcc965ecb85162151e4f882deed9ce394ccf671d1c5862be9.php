<?php

/* /src/App/Books/View/default.html.twig */
class __TwigTemplate_64aebf5ca76df511e8217b76a579726cac431ec9577a53a2095d69a21e10e2b4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("src/Web/templates/body.html.twig", "/src/App/Books/View/default.html.twig", 1);
        $this->blocks = array(
            'CSSBlock' => array($this, 'block_CSSBlock'),
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
    public function block_CSSBlock($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        th span{
            cursor: pointer;
        }
        th span.active{
            color: #d39926;
        }
        th span.active.desc:after{
            font-family: 'Glyphicons Halflings';
            content: \"\\e113\";
            font-size: 9px;
            margin-left: 5px;
        }
        th span.active.asc:after{
            font-family: 'Glyphicons Halflings';
            content: \"\\e114\";
            font-size: 9px;
            margin-left: 5px;
        }
        table tbody tr.coloured{
            background-color: #e1f7d7 !important;
        }
    </style>
";
    }

    // line 29
    public function block_pageContent($context, array $blocks = array())
    {
        // line 30
        echo "
    <div class=\"row\">
        <div class=\"col-lg-12\">
            ";
        // line 33
        if (($context["delete"] ?? null)) {
            // line 34
            echo "                <div class=\"alert alert-success\" role=\"alert\">Ksiązka została usunięta</div>
            ";
        }
        // line 36
        echo "        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <a href=\"/add\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"pull-right\">
                <input type=\"text\" class=\"form-control search-input\" placeholder=\"Szukaj\">
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <table id=\"books\" class=\"table table-bordered table-striped\">
                <thead>
                    <tr>
                        <th><span data-sort=\"id\" class=\"active desc\">ID</span></th>
                        <th><span data-sort=\"name\">Tytuł</span></th>
                        <th><span data-sort=\"author\">Autor</span></th>
                        <th><span data-sort=\"price\">Cena</span></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12 text-center\">
            <nav aria-label=\"Page navigation\">
              <ul class=\"pagination\">
              </ul>
            </nav>
        </div>
    </div>
    
";
    }

    // line 80
    public function block_JSBlock($context, array $blocks = array())
    {
        // line 81
        echo "    
    ";
        // line 82
        $this->displayParentBlock("JSBlock", $context, $blocks);
        echo "
    
    <script>
        
        (function(){

            var url = new URL(window.location.href);
            var id = url.searchParams.get(\"id\");

            var actions = function(id){
                
                return '<a href=\"/edit/' + id + '\" class=\"text-success\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>&nbsp;&nbsp;&nbsp;<a href=\"/remove/' + id + '\" class=\"remove-btn text-danger remove\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></a>';
                
            };

            var getData = function(page = 1, type = null, sortBy = null, filter = ''){
                
                if(type && sortBy){
                    
                    var url = filter ? '/get/' + page + '/' + sortBy + '/' + type + '/' + filter : '/get/' + page + '/' + sortBy + '/' + type;
                    
                } else {
                    
                    var url = '/get';
                    
                }
                
                sendXMLHttpRequest(url, [], function(){

                    try {

                        var data = JSON.parse(this.responseText);

                        if(data.success){

                            var tbody = document.querySelector('#books tbody');
                            tbody.innerHTML = '';
                            
                            if(data.books){

                                data.books.forEach(function(entry) {

                                    var temp = document.createElement('tbody');

                                    var innerHTML =  '<tr ' + (id == entry.id ? 'class=\"coloured\"' : '') + '>';
                                    innerHTML +=         '<td>' + entry.id + '</td>';
                                    innerHTML +=         '<td>' + entry.name + '</td>';
                                    innerHTML +=         '<td>' + entry.author + '</td>';
                                    innerHTML +=         '<td class=\"text-right\">' + parseFloat(entry.price).toFixed(2) + ' PLN</td>';
                                    innerHTML +=         '<td class=\"text-center\">' + actions(entry.id) + '</td>';
                                    innerHTML +=     '</tr>';

                                    temp.innerHTML = innerHTML;
                                    tbody.appendChild(temp.firstChild);

                                });

                            }
                            
                            var pagination = document.querySelector('.pagination');
                            pagination.innerHTML = '';
                                
                            if(data.pagination > 1){
                                        
                                for(let i = 1; i <= data.pagination; ++i) {
                                    
                                    var temp = document.createElement('ul');
                                    temp.innerHTML = '<li ' + (data.page == i ? 'class=\"active\"' : '') + '><a href=\"#\">' + i + '</a></li>';
                                    
                                    pagination.appendChild(temp.firstChild);
                                    
                                }
                                
                            }

                        }

                    } catch(e) {
                        console.log('Error: ' + e);
                    }

                 }, false);
                
            };
            
            var setFiltersState = function(page, type, sortBy, filter){
                
                setCookie('page', page, 1);
                setCookie('type', type, 1);
                setCookie('sortBy', sortBy, 1);
                setCookie('filter', filter, 1);
                
            };
            
            var setInterface = function(type, sortBy, filter){
                
                var btns = document.querySelectorAll('[data-sort]');

                for(let i = 0; i < btns.length; ++i) {
                    btns[i].classList.remove('active', 'desc', 'asc');
                }
                
                document.querySelector('[data-sort=\"' + sortBy + '\"]').classList.add('active', type);
                document.querySelector('.search-input').value = decodeURI(filter);
                        
            };
            
            if(getCookie('page') && getCookie('type') && getCookie('sortBy')){
                getData(getCookie('page'), getCookie('type'), getCookie('sortBy'), getCookie('filter'));
                setInterface(getCookie('type'), getCookie('sortBy'), getCookie('filter'));
            } else {
                getData();
            }
             
            delegate(document, 'click', '[data-sort]', function(){

                var node = this;
                
                if(node.classList.contains('active')){
                    
                    if(node.classList.contains('desc')){
                        node.classList.remove('desc');
                        node.classList.add('asc');
                    } else {
                        node.classList.remove('asc');
                        node.classList.add('desc');
                    }
                    
                } else {
                    
                    var btns = document.querySelectorAll('[data-sort]');

                    for(let i = 0; i < btns.length; ++i) {
                        btns[i].classList.remove('active', 'desc', 'asc');
                    }

                    node.classList.add('active', 'desc');
                }

                var type = node.classList.contains('desc') ? 'desc' : 'asc'
                var sortBy = node.dataset.sort;
                var filter = document.querySelector('.search-input').value;

                getData(1, type, sortBy, encodeURI(filter));
                setFiltersState(1, type, sortBy, encodeURI(filter));

            });
             
            delegate(document, 'keyup', '.search-input', function(){
                
                var btn = document.querySelector('[data-sort].active');
                var type = btn.classList.contains('desc') ? 'desc' : 'asc';
                var sortBy = btn.dataset.sort;
                var node = this;

                getData(1, type, sortBy, encodeURI(node.value));
                setFiltersState(1, type, sortBy, encodeURI(node.value));
                
            });
             
            delegate(document, 'click', '.pagination a', function(e){
                
                e.preventDefault();
                
                var node = this;
                var btn = document.querySelector('[data-sort].active');
                
                var page = parseFloat(node.innerHTML);
                var type = btn.classList.contains('desc') ? 'desc' : 'asc';
                var sortBy = btn.dataset.sort;
                var filter = document.querySelector('.search-input').value;
                
                getData(page, type, sortBy, encodeURI(filter));
                setFiltersState(page, type, sortBy, encodeURI(filter));
                
            });
            
            delegate(document, 'click', '.remove', function(e){
                
                e.preventDefault();
                var node = this;
                
                Swal({
                  title: 'Jesteś pewny?',
                  text: \"Tej operacji nie można cofnąć!\",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Tak, usuń!'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = node.getAttribute('href');
                  }
                });
                
            });
             
        })();
        
    </script>
    
";
    }

    public function getTemplateName()
    {
        return "/src/App/Books/View/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 82,  127 => 81,  124 => 80,  78 => 36,  74 => 34,  72 => 33,  67 => 30,  64 => 29,  37 => 4,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"src/Web/templates/body.html.twig\"  %}

{% block CSSBlock %}
    <style>
        th span{
            cursor: pointer;
        }
        th span.active{
            color: #d39926;
        }
        th span.active.desc:after{
            font-family: 'Glyphicons Halflings';
            content: \"\\e113\";
            font-size: 9px;
            margin-left: 5px;
        }
        th span.active.asc:after{
            font-family: 'Glyphicons Halflings';
            content: \"\\e114\";
            font-size: 9px;
            margin-left: 5px;
        }
        table tbody tr.coloured{
            background-color: #e1f7d7 !important;
        }
    </style>
{% endblock %}

{% block pageContent %}

    <div class=\"row\">
        <div class=\"col-lg-12\">
            {% if delete %}
                <div class=\"alert alert-success\" role=\"alert\">Ksiązka została usunięta</div>
            {% endif %}
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <a href=\"/add\" class=\"btn btn-success\">
                <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
            </a><br><br>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"pull-right\">
                <input type=\"text\" class=\"form-control search-input\" placeholder=\"Szukaj\">
            </div>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <table id=\"books\" class=\"table table-bordered table-striped\">
                <thead>
                    <tr>
                        <th><span data-sort=\"id\" class=\"active desc\">ID</span></th>
                        <th><span data-sort=\"name\">Tytuł</span></th>
                        <th><span data-sort=\"author\">Autor</span></th>
                        <th><span data-sort=\"price\">Cena</span></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-lg-12 text-center\">
            <nav aria-label=\"Page navigation\">
              <ul class=\"pagination\">
              </ul>
            </nav>
        </div>
    </div>
    
{% endblock %}

{% block JSBlock %}
    
    {{ parent() }}
    
    <script>
        
        (function(){

            var url = new URL(window.location.href);
            var id = url.searchParams.get(\"id\");

            var actions = function(id){
                
                return '<a href=\"/edit/' + id + '\" class=\"text-success\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>&nbsp;&nbsp;&nbsp;<a href=\"/remove/' + id + '\" class=\"remove-btn text-danger remove\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></a>';
                
            };

            var getData = function(page = 1, type = null, sortBy = null, filter = ''){
                
                if(type && sortBy){
                    
                    var url = filter ? '/get/' + page + '/' + sortBy + '/' + type + '/' + filter : '/get/' + page + '/' + sortBy + '/' + type;
                    
                } else {
                    
                    var url = '/get';
                    
                }
                
                sendXMLHttpRequest(url, [], function(){

                    try {

                        var data = JSON.parse(this.responseText);

                        if(data.success){

                            var tbody = document.querySelector('#books tbody');
                            tbody.innerHTML = '';
                            
                            if(data.books){

                                data.books.forEach(function(entry) {

                                    var temp = document.createElement('tbody');

                                    var innerHTML =  '<tr ' + (id == entry.id ? 'class=\"coloured\"' : '') + '>';
                                    innerHTML +=         '<td>' + entry.id + '</td>';
                                    innerHTML +=         '<td>' + entry.name + '</td>';
                                    innerHTML +=         '<td>' + entry.author + '</td>';
                                    innerHTML +=         '<td class=\"text-right\">' + parseFloat(entry.price).toFixed(2) + ' PLN</td>';
                                    innerHTML +=         '<td class=\"text-center\">' + actions(entry.id) + '</td>';
                                    innerHTML +=     '</tr>';

                                    temp.innerHTML = innerHTML;
                                    tbody.appendChild(temp.firstChild);

                                });

                            }
                            
                            var pagination = document.querySelector('.pagination');
                            pagination.innerHTML = '';
                                
                            if(data.pagination > 1){
                                        
                                for(let i = 1; i <= data.pagination; ++i) {
                                    
                                    var temp = document.createElement('ul');
                                    temp.innerHTML = '<li ' + (data.page == i ? 'class=\"active\"' : '') + '><a href=\"#\">' + i + '</a></li>';
                                    
                                    pagination.appendChild(temp.firstChild);
                                    
                                }
                                
                            }

                        }

                    } catch(e) {
                        console.log('Error: ' + e);
                    }

                 }, false);
                
            };
            
            var setFiltersState = function(page, type, sortBy, filter){
                
                setCookie('page', page, 1);
                setCookie('type', type, 1);
                setCookie('sortBy', sortBy, 1);
                setCookie('filter', filter, 1);
                
            };
            
            var setInterface = function(type, sortBy, filter){
                
                var btns = document.querySelectorAll('[data-sort]');

                for(let i = 0; i < btns.length; ++i) {
                    btns[i].classList.remove('active', 'desc', 'asc');
                }
                
                document.querySelector('[data-sort=\"' + sortBy + '\"]').classList.add('active', type);
                document.querySelector('.search-input').value = decodeURI(filter);
                        
            };
            
            if(getCookie('page') && getCookie('type') && getCookie('sortBy')){
                getData(getCookie('page'), getCookie('type'), getCookie('sortBy'), getCookie('filter'));
                setInterface(getCookie('type'), getCookie('sortBy'), getCookie('filter'));
            } else {
                getData();
            }
             
            delegate(document, 'click', '[data-sort]', function(){

                var node = this;
                
                if(node.classList.contains('active')){
                    
                    if(node.classList.contains('desc')){
                        node.classList.remove('desc');
                        node.classList.add('asc');
                    } else {
                        node.classList.remove('asc');
                        node.classList.add('desc');
                    }
                    
                } else {
                    
                    var btns = document.querySelectorAll('[data-sort]');

                    for(let i = 0; i < btns.length; ++i) {
                        btns[i].classList.remove('active', 'desc', 'asc');
                    }

                    node.classList.add('active', 'desc');
                }

                var type = node.classList.contains('desc') ? 'desc' : 'asc'
                var sortBy = node.dataset.sort;
                var filter = document.querySelector('.search-input').value;

                getData(1, type, sortBy, encodeURI(filter));
                setFiltersState(1, type, sortBy, encodeURI(filter));

            });
             
            delegate(document, 'keyup', '.search-input', function(){
                
                var btn = document.querySelector('[data-sort].active');
                var type = btn.classList.contains('desc') ? 'desc' : 'asc';
                var sortBy = btn.dataset.sort;
                var node = this;

                getData(1, type, sortBy, encodeURI(node.value));
                setFiltersState(1, type, sortBy, encodeURI(node.value));
                
            });
             
            delegate(document, 'click', '.pagination a', function(e){
                
                e.preventDefault();
                
                var node = this;
                var btn = document.querySelector('[data-sort].active');
                
                var page = parseFloat(node.innerHTML);
                var type = btn.classList.contains('desc') ? 'desc' : 'asc';
                var sortBy = btn.dataset.sort;
                var filter = document.querySelector('.search-input').value;
                
                getData(page, type, sortBy, encodeURI(filter));
                setFiltersState(page, type, sortBy, encodeURI(filter));
                
            });
            
            delegate(document, 'click', '.remove', function(e){
                
                e.preventDefault();
                var node = this;
                
                Swal({
                  title: 'Jesteś pewny?',
                  text: \"Tej operacji nie można cofnąć!\",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Tak, usuń!'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = node.getAttribute('href');
                  }
                });
                
            });
             
        })();
        
    </script>
    
{% endblock %}", "/src/App/Books/View/default.html.twig", "/home/bagsiur/pr9.andraszyk.lh/src/App/Books/View/default.html.twig");
    }
}
