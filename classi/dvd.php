<?php

include_once __DIR__ . '/prodotto.php';

class Dvd extends Prodotto
{
    public $durata;
    public $poster;

    public function __construct(
        String $nome,
        String $autore,
        Float $prezzo,
        Generi $generi,
        Bool $pubblicato,
        String $immagine,

        Int $durata,
        String $poster
    ) {
        $this->durata = $durata;
        $this->poster = $poster;
        parent::__construct($nome, $autore, $prezzo, $generi, $pubblicato, $immagine);
    }
}
