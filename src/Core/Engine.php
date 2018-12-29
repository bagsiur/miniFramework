<?php

namespace Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class Engine
{
    
    protected $matcher;
    protected $resolver;
    
    public function __construct(UrlMatcher $matcher, ControllerResolver $resolver) {
        
        $this->matcher = $matcher;
        $this->resolver = $resolver;
        
    }
    
    public function handle(Request $request){
        
        $this->matcher->getContext()->fromRequest($request);
        
        try {

            $request->attributes->add($this->matcher->match($request->getPathInfo()));
            $controller = $this->resolver->getController($request);
            
            $argumentResolver = new ArgumentResolver();
            $arguments = $argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);

        } catch (ResourceNotFoundException $ex) {

            return new Response($ex->getMessage(), '404');

        } catch (\Exception $ex) {

            return new Response($ex->getMessage(), '500');

        }
        
    }
    
}