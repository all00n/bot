<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    public function index(){
        $date = ['title' => 'Меню'];
        
        return $this->render('menu/menu.html.twig',$date);
    }
    
    public function edit(Request $request) {
        $file = $request->files->get ( 'file' );
        $fileName = 'menu.jpg';
        $file->move('./img/', $fileName);
        return $this->redirectToRoute('menu');
    }
}