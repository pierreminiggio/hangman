<?php


namespace App\Controller;

use App\ServeHtml;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController
{
    /**
      * @Route(
      *     "/",
      *     name="app_main_index",
      *     methods={"GET"}
      * )
      */
    public function index(): Response
    {
        return new Response((new ServeHtml())->serve('index'));
    }
}
