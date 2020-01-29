<?php


namespace App\Controller;

use App\ServeHtml;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game")
 */
class GameController
{

    /**
      * @Route(
      *     name="app_game_index",
      *     methods={"GET"}
      * )
      */
    public function index(): Response
    {
        return new Response((new ServeHtml())->serve('game'));
    }

    /**
      * @Route(
      *     "/won",
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
      *     "/failed",
      *     name="app_game_failed",
      *     methods={"GET"}
      * )
      */
    public function failed(): Response
    {
        return new Response((new ServeHtml())->serve('failed'));
    }
}
