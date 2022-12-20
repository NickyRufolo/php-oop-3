

<?php

include_once __DIR__ . '/../traits/reparto.php';

class Impiegato
{
    public $nome;
    public $eta;

    use Reparti;

    public function __construct(
        String $nome

    ) {
        $this->nome = $nome;
    }

    public function setEta($_eta)
    {

        if (!is_int($_eta)) {
            throw new Exception("ATTENZIONE: $_eta non è unnumero!");
        } elseif ($_eta < 0) {
            throw new Exception("ATTENZIONE: $_eta è minore di zero!");
        } else {
            $this->eta = $_eta;
        }
    }
}
