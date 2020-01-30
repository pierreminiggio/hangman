<?php

namespace App\Game\Loader;

class TextFileLoader implements LoaderInterface
{
    public function load($dictionary)
    {
        return array_map('trim', file($dictionary));
    }
}
