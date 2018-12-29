<?php

namespace Core\Providers;

use Twig_Loader_Filesystem;
use Twig_Environment;

class TwigServiceProvider extends ServiceProvider
{
    
    public function provide() {
        
        $loader = new Twig_Loader_Filesystem($this->config['dir']);
        $twig = new Twig_Environment($loader, array(
            'cache' => $this->config['cache'],
            'auto_reload' => true,
            'debug' => true,
        ));
        
        return $twig;
        
    }
    
}