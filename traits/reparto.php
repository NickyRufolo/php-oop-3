<?php
trait Reparti
{
    public $reparto;
    public $vendite;
    public function getReparto()
    {
        return "$this->reparto - $this->vendite";
    }
}
