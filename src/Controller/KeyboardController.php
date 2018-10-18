<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Keyboard;

class KeyboardController extends Controller 
{
    public function index(){
        
        $date = ['title' => 'Клавиатура'];
        $date['keyboard'] = $this->getDoctrine()->getRepository(Keyboard::class)->findAll();
        
        return $this->render('keyboard/keyboard.html.twig',$date);
    }
    
    public function show($slug) {
        $date = ['title' => 'Редактирование клавиатуры'];
        
        $date['keyboard'] = $this->getDoctrine()->getRepository(Keyboard::class)->find($slug);

        return $this->render('keyboard/show.html.twig',$date);
    }
    
    public function edit(Request $request, $slug){
        $em = $this->getDoctrine()->getManager();
        $keyboard = $em->find(Keyboard::class, $slug);
        
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);

            if(!$errors){
                
                $keyboard->setKey($data['key']);
                
                $em->persist($keyboard);
                $em->flush();

                return $this->redirectToRoute('keyboard');
            }
        }
        
        return $this->render('keyboard/show.html.twig', [
                'title' => 'Редактирование клавиатуры',
                'errors' => $errors,
                'keyboard' => $keyboard,
            ]);
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['key'])){
            $errors['key'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}
