<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/car", name="offer")
     */
    public function indexAction()
    {
        
        $cars = [
            ['make' => 'Volvo', 'name' => 'xc60'],
            ['make' => 'Audi', 'name' => 'Q7'],
            ['make' => 'KIA', 'name' => 'Ceed']
        ];
        return $this->render('@Car/Default/index.html.twig', ['cars' => $cars]);
    }
}
