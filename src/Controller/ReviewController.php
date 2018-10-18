<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Review;



class ReviewController extends Controller {
    
    public function index(){
       
        $date = ['title' => 'Отзывы'];
        $em = $this->getDoctrine()->getManager();
        $date['reviews'] = $em->getRepository(Review::class)->getReview();
        return $this->render('review/review.html.twig',$date);
    }
    
    public function show($slug) {
        
        $date = ['title' => 'Ответ на отзыв'];
        $date['review'] = $this->getDoctrine()->getRepository(Review::class)->find($slug);
        return $this->render('review/show.html.twig',$date);
    }
    
    public function reply(Request $request, $slug) {
                
        $em = $this->getDoctrine()->getManager();
        $review = $em->find(Review::class, $slug);
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);

            if(!$errors){
                $this->sendMessage($review->getChat_id(),$data['reply']);
                $review->setStatus(0);
                $em->persist($review);
                $em->flush();

                return $this->redirectToRoute('review');
            }

        }
        
        return $this->render('review/show.html.twig', [
                'title' => 'Редактирование фактов',
                'errors' => $errors,
                'review' => $review,
            ]);
    }
    
    public function remove($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $Review =$em->find(Review::class, $slug);
        $em->remove($Review);
        $em->flush();
        return $this->redirectToRoute('review');
    }
    
    private function Validate($date){
        $errors = [];
        if(empty($date['reply'])){
            $errors['reply'] = true;
        }
        if($date){
             return $errors;
        }
        return FALSE;
    }
    
    private function sendMessage($chat_id, $text){

        $response = $this->query('sendMessage',[
            'text' => $text,
            'chat_id' => $chat_id,
            ]);

        return $response;
    }
    
    private function query($method, $params = []){
        $url = "https://api.telegram.org/bot";
        $url.= "547927933:AAE5rEuUS0dJTgB_OOSakVXgU6GoaIRRn6w";
        $url.= "/" . $method;

        if(!empty($params)){
            $url .= "?" . http_build_query($params);
        }

        $client = new Client(['base_uri' => $url]);

        $result = $client->request('GET');

        return json_decode($result->getBody());
    }
}
