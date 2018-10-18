<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reserve;

class HomeController extends Controller
{
    public function index(){
       
        $date = ['title' => 'Заказы столиков'];
        $em = $this->getDoctrine()->getManager();
        $date['reserve'] = $em->getRepository(Reserve::class)->getReserve();
        
        return $this->render('main/home.html.twig',$date);
    }

    public function annulment(){
        
        $date = ['title' => 'Отмененные заказы'];
        $em = $this->getDoctrine()->getManager();
        $date['reserve'] = $em->getRepository(Reserve::class)->getAnnulmentReserve();
        
        return $this->render('main/home.html.twig',$date);
    }
    
    public function show($slug) {
        $date = ['title' => 'Редактирование заказа'];
        
        $date['reserve'] = $this->getDoctrine()->getRepository(Reserve::class)->find($slug);

        return $this->render('reserve/show.html.twig',$date);
    }
    
    public function edit(Request $request, $slug){
        $em = $this->getDoctrine()->getManager();
        $reserve = $em->find(Reserve::class, $slug);
        
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);

            if(!$errors){
                
                $reserve->setName($data['name']);
                $reserve->setPhone($data['phone']);
                $reserve->setTime($data['time']);
                $reserve->setCount($data['count']);
                $reserve->setDate($data['date']);
                $reserve->setStatus($data['status']['0']);
                $reserve->setComment($data['comment']);
                $em->persist($reserve);
                $em->flush();

                return $this->redirectToRoute('home');
            }
        }
        
        return $this->render('reserve/show.html.twig', [
                'title' => 'Редактирование контакта',
                'errors' => $errors,
                'reserve' => $reserve,
            ]);
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['name'])){
            $errors['name'] = true;
        }
        
        if(empty($date['phone'])){
            $errors['phone'] = true;
        }
        
        if(empty($date['time'])){
            $errors['time'] = true;
        }
        
        if(empty($date['count'])){
            $errors['count'] = true;
        }
        
        if(empty($date['date'])){
            $errors['date'] = true;
        }
        
        if(empty($date['comment'])){
            $errors['comment'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}