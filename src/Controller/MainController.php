<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/home', name: 'home',requirements:['var'=>'\d+'])]
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            'firstname'=>'john',
        ]);
    } 
    #[Route('/main2', name: 'app_main2')]
    public function main2(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
