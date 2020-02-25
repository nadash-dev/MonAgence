<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BiensController extends AbstractController
{

    public function index()
    {
        return $this->render('biens/index.html.twig', ['current_menu'=>'bien']);
    }
}
