<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\TapList;

class TapController extends Controller
{
    public function index(){
        $date = ['title' => 'Пользовательская кнопка'];
        
        $date['taplist'] = $this->getDoctrine()->getRepository(TapList::class)->find(1);
        
        return $this->render('tap/tap.html.twig',$date);
    }
    
    public function save(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        $tap = $em->find(TapList::class, 1);
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);
            
            if(!$errors){
                $tap->setDescription($data['tap']);

                $em->persist($tap);
                $em->flush();

                return $this->redirectToRoute('taplist');
            }

        }
        
        return $this->render('tap/tap.html.twig', [
                'title' => 'Пользовательская кнопка',
                'errors' => $errors,
                'taplist' => $tap,
            ]);
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['tap'])){
            $errors['tap'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}