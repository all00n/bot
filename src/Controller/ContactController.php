<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contacts;

class ContactController extends Controller
{
    public function index(){
        //заголовок
        $date = ['title' => 'Контакты'];
        
        
        $date['contacts'] = $this->getDoctrine()->getRepository(Contacts::class)->findAll();

        return $this->render('contact/contact.html.twig',$date);
    }
    
    public function show($slug){
        //заголовок
        $date = ['title' => 'Редактирование контакта'];
        
        $date['contact'] = $this->getDoctrine()->getRepository(Contacts::class)->find($slug);

        return $this->render('contact/show.html.twig',$date);
    }
    
    public function save(Request $request, $slug){
        
        $em = $this->getDoctrine()->getManager();
        $contact = $em->find(Contacts::class, $slug);
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);
            
            if(!$errors){
                $contact->setDescription($data['description']);

                $em->persist($contact);
                $em->flush();

                return $this->redirectToRoute('contact');
            }

        }
        
        return $this->render('contact/show.html.twig', [
                'title' => 'Редактирование контакта',
                'errors' => $errors,
                'contact' => $contact,
            ]);
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['description'])){
            $errors['description'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}