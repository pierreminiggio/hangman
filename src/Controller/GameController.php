<?php


namespace App\Controller;

use App\ServeHtml;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController
{

    /**
      * @Route(
      *     "/game",
      *     name="app_game_game",
      *     methods={"GET"}
      * )
      */
    public function game(): Response
    {
        return new Response((new ServeHtml())->serve('game'));
    }

    /**
      * @Route(
      *     "/game/won",
      *     name="app_game_won",
      *     methods={"GET"}
      * )
      */
    public function won(): Response
    {
        return new Response((new ServeHtml())->serve('won'));
    }

    /**
      * @Route(
      *     "/game/failed",
      *     name="app_game_failed",
      *     methods={"GET"}
      * )
      */
    public function failed(): Response
    {
        return new Response((new ServeHtml())->serve('failed'));
    }
}
