<?php

namespace App\Game;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GameContext implements GameContextInterface
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session  = $session;
    }

    public function reset()
    {
        $this->session->set('hangman', array());
    }

    public function newGame($word)
    {
        return new Game($word);
    }

    public function loadGame()
    {
        $data = $this->session->get('hangman');

        if (!$data) {
            return false;
        }

        return new Game(
            $data['word'],
            $data['attempts'],
            $data['tried_letters'],
            $data['found_letters']
        );
    }

    public function save(Game $game)
    {
        $this->session->set('hangman', $game->getContext());
    }
}
