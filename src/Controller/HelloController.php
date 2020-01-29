<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{

    /**
      * @Route(
      *     "/hello/{name}",
      *     name="app_hello_index",
      *     methods={"GET"},
      *     requirements={"name": "[a-zA-ZÀ-ú\-]+"},
      *     utf8=true
      * )
      */
    public function index(string $name = 'World'): Response
    {
        return new Response('<h1>Hello ' . $name . ' !</h1>');
    }
}
