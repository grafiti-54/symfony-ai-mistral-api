<?php
// src/Controller/ChatController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\AI\Agent\AgentInterface;
use Symfony\AI\Platform\Message\Message;
use Symfony\AI\Platform\Message\MessageBag;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'app_chat')]
    public function chat(Request $request, AgentInterface $agent): Response
    {
        $question = $request->request->get('question', '');
        $answer = '';

        if ($question) {
            // Création d’une conversation avec un prompt système et le message utilisateur
            $messages = new MessageBag(
                Message::forSystem('Vous êtes un assistant Symfony AI et répondez en français.'),
                Message::ofUser($question),
            );
            
            // Appel de l’agent : le bundle utilise le modèle et les options définies dans ai.yaml
            $result = $agent->call($messages);
            $answer = $result->getContent();
        }

        return $this->render('chat/chat.html.twig', [
            'question' => $question,
            'answer' => $answer,
        ]);
    }
}
