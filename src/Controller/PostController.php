<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ChatId;

class PostController extends Controller
{
    public function index() {
        $date = ['title' => 'Рассылка поста'];
        
        return $this->render('post/post.html.twig',$date);
    }
    
    public function send(Request $request) {
        $date = ['title' => 'Рассылка завершена'];
        $allChatId = $this->getDoctrine()->getRepository(ChatId::class)->findAll();
        
        $data = $request->request->all();
        $description = $data['description'];

        $file = $request->files->get ( 'file' );
        $fileName = 'post.jpg';
        $file->move('./img/', $fileName);
        $reply = "./img/post.jpg";
        
        foreach ($allChatId as $chatid) {
              $this->sendPhoto($chatid->chat_id, $reply,$description );
        }
        
        return $this->render('post/post_send.html.twig',$date);  
    }
    public function sendPhoto($chat_id, $file, $text = null){

        $response = $this->query_file('sendPhoto',$file,[
            'chat_id' => $chat_id,
            'text' => $text
            ]);

        return $response;
    }
    protected function query_file($method, $file, $params){
        $url = "https://api.telegram.org/bot";
        $url.= "547927933:AAE5rEuUS0dJTgB_OOSakVXgU6GoaIRRn6w";
        $url.= "/" . $method.'?chat_id='.$params['chat_id'];

        if (isset($params['text'])) {
          $url.="&caption=".$params['text'];
        }

        $client = new Client(['base_uri' => $url]);

        $result = $client->request('POST', $url, [
                                    'multipart' => [
                                       [
                                           'Content-type' => 'multipart/form-data',
                                           'name'     => 'photo',
                                           'contents' =>  fopen($file, 'r'),
                                           'filename' => 'photo',
                                        ]
                                    ],
                                ]);

        return json_decode($result->getBody());
    }
}
