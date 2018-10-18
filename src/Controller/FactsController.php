<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Facts;

class FactsController extends Controller
{
    public function index(){
        $date = ['title' => 'Факты о пиве'];
        $em = $this->getDoctrine()->getManager();
        $date['facts'] = $posts = $em->getRepository(Facts::class)->getFacts();
        //$date['facts'] = $this->getDoctrine()->getRepository(Facts::class)->getFacts();
        
        return $this->render('facts/facts.html.twig',$date);
    }
    
    public function show($slug){
        //заголовок
        $date = ['title' => 'Редактирование фактов'];
        
        $date['fact'] = $this->getDoctrine()->getRepository(Facts::class)->find($slug);

        return $this->render('facts/show.html.twig',$date);
    }

    public function edit(Request $request, $slug){
        
        $em = $this->getDoctrine()->getManager();
        $fact = $em->find(Facts::class, $slug);
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);
            
            if(!$errors){
                $fact->setFact($data['fact']);

                $em->persist($fact);
                $em->flush();

                return $this->redirectToRoute('facts');
            }

        }
        
        return $this->render('facts/show.html.twig', [
                'title' => 'Редактирование фактов',
                'errors' => $errors,
                'fact' => $fact,
            ]);
    }
    
    public function add(Request $request)
    {
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
            
            $errors = $this->Validate($data);
            
            if(!$errors){
                $em = $this->getDoctrine()->getManager();

                $fact = new Facts();
                $fact->setFact($data['fact']);

                $em->persist($fact);

                $em->flush();

                return $this->redirectToRoute('facts');
            }
        }
        
        return $this->render('facts/facts.html.twig', [
            'errors' => $errors,
            'date' => $data
                ]);
    }
    
    public function remove($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $Fact =$em->find(Facts::class, $slug);
        $em->remove($Fact);
        $em->flush();
        return $this->redirectToRoute('facts');
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['fact'])){
            $errors['fact'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }

}