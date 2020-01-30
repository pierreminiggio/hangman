<?php

namespace App\Game;

use App\Game\Loader\LoaderInterface;

class WordList implements DictionaryLoaderInterface, WordListInterface
{
    private $words;
    private $loaders;

    public function __construct()
    {
        $this->words   = array();
        $this->loaders = array();
    }

    public function addLoader($type, LoaderInterface $loader)
    {
        $this->loaders[strtolower($type)] = $loader;
    }

    public function loadDictionaries(array $dictionaries)
    {
        foreach ($dictionaries as $dictionary) {
            $this->loadDictionary($dictionary);
        }
    }

    private function loadDictionary($path)
    {
        $loader = $this->findLoader(pathinfo($path, PATHINFO_EXTENSION));

        $words = $loader->load($path);
        foreach ($words as $word) {
            $this->addWord($word);
        }
    }

    private function findLoader($type)
    {
        $type = strtolower($type);
        if (!isset($this->loaders[$type])) {
            throw new \RuntimeException(sprintf('There is no loader able to load a %s dictionary.', $type));
        }

        return $this->loaders[$type];
    }

    public function getRandomWord($length)
    {
        if (!isset($this->words[$length])) {
            throw new \InvalidArgumentException(sprintf('There is no word of length %u.', $length));
        }

        $key = array_rand($this->words[$length]);

        return $this->words[$length][$key];
    }

    public function addWord($word)
    {
        $length = strlen($word);

        if (!isset($this->words[$length])) {
            $this->words[$length] = array();
        }

        if (!in_array($word, $this->words[$length])) {
            $this->words[$length][] = $word;
        }
    }
}
