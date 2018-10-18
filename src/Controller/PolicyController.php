<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PolicyController extends Controller {
    
    /**
     * @Route("/policy")
     */
    public function Policy() {
        return $this->render('policy/policy.html.twig');

    }
    
}
