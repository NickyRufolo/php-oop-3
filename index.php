<!-- Ciao ragazzi,
esercizio di oggi:
nome repo: php-oop-3
Oggi pomeriggio espandiamo il book store aggiungendo i tipi di prodotti presenti: possono esserci cd, dvd ecc. Dove possono tornarci utili le exceptions?
Quali trait possiamo utilizzare per condividere talune caratteristiche tra prodotti di tipo diverso?
Inventiamo anche una classe per gli addetti dei punti vendita della catena di book store. Sembrerà strano ma gli impiegati possono avere qualcosa in comune con i libri/cd/dvd ecc. e quel qualcosa si può implementare in php usando i trait.
Creiamo le classi che ci servono, instanziamo alcuni prodotti di tipo diverso e stampiamo in pagina un elenco di prodotti che troviamo nel punto vendita e anche l'impiegato del mese di quel punto vendita :nerd_face:
Buon lavoro! -->
<?php

//includo Estensioni della classe prodotto
include_once __DIR__ . '/classi/generi.php';
include_once __DIR__ . '/classi/libro.php';
include_once __DIR__ . '/classi/audiolibro.php';
include_once __DIR__ . '/classi/cd.php';
include_once __DIR__ . '/classi/dvd.php';
include_once __DIR__ . '/classi/impiegato.php';



$generi = [
    'giallo' => new Generi('giallo', 'icon-font-awesome-giallo'),
    'horror' => new Generi('horror', 'icon-font-awesome-horror'),
    'autobiografia' => new Generi('autobiografia', 'icon-font-awesome-horror'),
    'azioneCd' => new Generi('azione', 'icon-font-awesome-giallo'),
    'comicoCd' => new Generi('comico', 'icon-font-awesome-horror'),
    'fantasyCd' => new Generi('fantasy', 'icon-font-awesome-horror')

];
var_dump($generi);

$prodotti = [
    new Libro('La scelta di Natan', 'Antonio Puccio', 23.40, $generi['giallo'], true, 'https://immagine-copertina.com', 250, 'flessibile'),
    new audioLibro('Ciao Ciao', 'Maria Nazionale', 55.90, $generi['autobiografia'], true, 'https://media.gettyimages.com/id/616044734/es/foto/maria-nazionale-attends-the-photocall-during-the-11th-rome-film-fest-at-the-auditorium-parco.jpg?s=2048x2048&w=gi&k=20&c=y3JDRK9UIqt4Azi-EIRDSV0N7q99RyJpRKvUofCoCXY=', 120, 'spotify', 'https://spotify-libri.com'),
    new Cd('Batman', 'Carl Gray', 29.99, $generi['azioneCd'], true, 'https://cdn1.epicgames.com/undefined/offer/batman-arkham-knight_promo-2048x1152-ed2be22b3f24f446534b90b122ed560d.jpg', 130, 'netflix', 'https://spotify-libri.com'),
    new Dvd('Batman', 'Carl Gray', 29.99, $generi['azioneCd'], true, 'https://cdn1.epicgames.com/undefined/offer/batman-arkham-knight_promo-2048x1152-ed2be22b3f24f446534b90b122ed560d.jpg', 130, 'netflix', 'https://spotify-libri.com'),

];

var_dump($prodotti);

$impiegati = [
    $impiegato1 = new Impiegato('Paolo Verdi'),
    $impiegato2 = new Impiegato('Marco Verdi'),
    $impiegato3 = new Impiegato('Fabio Verdi'),
    $impiegato4 = new Impiegato('Ezio Verdi')
];

$impiegato1->reparto = 'Cd';
$impiegato2->reparto = 'Dvd';
$impiegato3->reparto = 'Libri';
$impiegato4->reparto = 'Audiolibro';
$impiegato1->vendite = 43;
$impiegato2->vendite = 55;
$impiegato3->vendite = 22;
$impiegato4->vendite = 33;

try {
    $impiegato1->setEta(21);
    $impiegato1->setEta(25);
    $impiegato1->setEta(28);
    $impiegato1->setEta(20);
} catch (Exception $e) {
    echo 'Si è verificato un errore: ' . $e->getMessage();
}

var_dump($impiegati);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    foreach ($prodotti as $card) {
        echo
        ' 
        <div class="col-3 row">
        <div class="card" style="width: 18rem;">
            <img src="' . $card->immagine . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $card->nome . '</h5>
                <li>Genere: ' . $card->generi->name . '</li>
                <li>Prezzo: ' . $card->prezzo . '$</li>
                <li>Autore: ' . $card->autore . '</li>
            </div>
    </div>
    </div>';
    }
    ?>
</body>

</html>