<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HeaderController extends Controller
{
    public function index($title)
    {        
        return $this->render('main/header.html.twig',['title' => $title]);
    }
}