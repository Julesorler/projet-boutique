<?php

$articles = ["debardeur", "Torchon", "sandale", "bonnet", "veste"];
$quantites = [102, 175, 68, 43, 212];
$ventes = [0, 0, 0, 0, 0];


$choix = 0;


while ($choix != 6) {



    echo "\naccueil:\n";
    echo "1. articles disponibles et quantités\n";
    echo "2. vente\n";
    echo "3. Réapprovisionner un article\n";
    echo "4. stock\n";
    echo "5. ventes totales par article\n";
    echo "6. Supprimer \n";



    $choix = (readline("Choisissez une option : "));


    while ($choix < 1 || $choix > 6) {
        echo "Erreur chosir entre 1 et 6 ! \n";
        $choix = (readline("Choisissez une option : "));
    }

    if ($choix == 1) {
        echo "\nArticles disponibles avec leurs quantités :\n";
        for ($i = 0; $i < count($articles); $i++) {
            if ($quantites[$i] > 0) {
                echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
            }
        }
    }



    if ($choix == 2) {



        echo "\nArticles disponibles avec leurs quantités :\n";
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }

        $index = (readline("Choisissez l'article à vendre : "));
        $quantiteVendue = (readline("Quantité vendue : "));

        if ($index >= 0 && $index < count($articles)) {
            if ($quantites[$index] >= $quantiteVendue) {
                $quantites[$index] -= $quantiteVendue;
                $ventes[$index] += $quantiteVendue;
                echo "DONE: $quantiteVendue $articles[$index]\n";
            } else {
                echo "Stock insuffisant $articles[$index].\n";
            }
        } else {
            echo "erreur\n";
        }
    }



    if ($choix == 3) {
        echo "Quel article souhaitez-vous réapprovisionner ? : \n";



        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }


        $index = (readline("Choisissez l'article que vous souhaitez réapprovisionner : "));

        $quantiteReapro = (readline("Quantité à réapprovisionner : "));
        $quantites[$index] += $quantiteReapro;
        echo "DONE : + $quantiteReapro $articles[$index]\n";
    }



    if ($choix == 4) {
        echo "\n stock :\n";

        for ($i = 0; $i < count($articles); $i++) {

            echo "$articles[$i] - Quantité restante : $quantites[$i] \n";


            if ($quantites[$i] == 0) {
                echo " $articles[$i] est en rupture de stock !\n";
                $tousEnStock = false;
            }
        }
    }



    if ($choix == 5) {
        echo "\n ventes totales par article :\n";

        for ($i = 0; $i < count($articles); $i++) {

            echo "$articles[$i] - Quantité vendue : $ventes[$i] \n";
        }
    }


    if ($choix == 6) {
        echo "Que voulez-vous supprimer ? : \n";


        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }


        $index = (readline("Choisissez l'article à supprimer : "));
        echo "Article supprimé : $articles[$index]\n";

        if ($index >= 0 && $index < count($articles)) {

            array_splice($articles, $index, 1);
            array_splice($quantites, $index, 1);
            array_splice($ventes, $index, 1);
        } else {
            echo "introuvable! \n";
        }
    }
}
