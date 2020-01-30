<?php


namespace App\Controller;

use App\Game\GameContext;
use App\Game\GameRunner;
use App\Game\Loader\TextFileLoader;
use App\Game\Loader\XmlFileLoader;
use App\Game\WordList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    public function index(SessionInterface $session): Response
    {
        $wordlist = new WordList();
        $wordlist->addLoader('txt', new TextFileLoader());
        $wordlist->addLoader('xml', new XmlFileLoader());
        $wordlist->loadDictionaries([
            $this->getParameter('kernel.project_dir') . '/data/words.txt',
            $this->getParameter('kernel.project_dir') . '/data/words.xml'
        ]);
        $context = new GameContext($session);
        $runner = new GameRunner($context, $wordlist);
        return $this->render($this->templateFolder() . 'index.html.twig', [
            'game' => $runner->loadGame()
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
