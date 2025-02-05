<?php

namespace App\Controller;

use App\Service\LoginHistoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageController extends AbstractController
{
    #[Route('/', name: 'app_homepage', methods: ['GET'])]
    public function index(Request $request, LoginHistoryService $lhs): Response
    {
        if (
                $this->getUser() && // Si l'utilisateur est connecté
                $request->headers->get('referer') == 'https://127.0.0.1:8000/login'
            ) 
        {
            $lhs->addHistory(
                $this->getUser(),
                $request->headers->get('user-agent'),
                $request->getClientIp()
            );
        }

        //dd($request);

        if (!$this->getUser()) {
            return $this->render('page/lp.html.twig');
        }
        return $this->render('page/homepage.html.twig');
    }
}
                    