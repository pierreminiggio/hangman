<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{

    public function templateFolder(): string
    {
        return 'main/';
    }

    /**
      * @Route(
      *     "/",
      *     name="app_main_index",
      *     methods={"GET"}
      * )
      */
    public function index(): Response
    {
        return $this->render($this->templateFolder() . 'index.html.twig');
    }
}
