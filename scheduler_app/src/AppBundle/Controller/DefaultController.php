<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {            
        $toolkit = $this->get('app.toolkit');
        $toolkit->setRequest($request);
        
        return $this->render($toolkit->getView('default/index.html.twig'));
    }
}
