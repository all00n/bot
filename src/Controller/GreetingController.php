<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Greeting;

class GreetingController extends Controller
{
    public function index(){
        $date = ['title' => 'Редактирование приветствия'];
        
        $date['greeting'] = $this->getDoctrine()->getRepository(Greeting::class)->find(1);
        
        return $this->render('greeting/greeting.html.twig',$date);
    }
    
    public function save(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        $greeting = $em->find(Greeting::class, 1);
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);
            
            if(!$errors){
                $greeting->setDescription($data['greeting']);

                $em->persist($greeting);
                $em->flush();

                return $this->redirectToRoute('greeting');
            }

        }
        
        return $this->render('greeting/greeting.html.twig', [
                'title' => 'Редактирование приветствия',
                'errors' => $errors,
                'greeting' => $greeting,
            ]);
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['greeting'])){
            $errors['greeting'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}