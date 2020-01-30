<?php


namespace App\Controller;

use App\Game\GameRunner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{

    public function templateFolder(): string
    {
        return 'game/';
    }

    /**
      * @Route(
      *     name="app_game_index",
      *     methods={"GET"}
      * )
      */
    public function index(GameRunner $runner): Response
    {
        return $this->render($this->templateFolder() . 'index.html.twig', [
            'game' => $runner->loadGame()
        ]);
    }

    /**
      * @Route(
      *     "/reset",
      *     name="app_game_reset",
      *     methods={"GET"}
      * )
      */
    public function reset(GameRunner $runner): Response
    {
        return $this->render($this->templateFolder() . 'index.html.twig', [
            'game' => $runner->resetGame()
        ]);
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
        return $this->render($this->templateFolder() . 'won.html.twig');
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
        return $this->render($this->templateFolder() . 'lost.html.twig');
    }
}
