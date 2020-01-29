<?php


namespace App;


class ServeHtml
{
    public function serve(string $view): string
    {
        return file_get_contents(__DIR__ . '/../html/' . $view . '.html');
    }

}
