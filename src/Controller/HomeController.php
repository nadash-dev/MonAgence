<?php

namespace App\Controller;

use App\Repository\PropretyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param PropretyRepository $repository
     * @return Response
     */

    public function index(PropretyRepository $repository): Response
    {
        $propreties=$repository->findLatest();
        return $this->render('home/index.html.twig',
                             ['propreties'=>$propreties]);
    }
}
