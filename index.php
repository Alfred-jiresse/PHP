<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'shi promo</title>
</head>
<body>
    <h1>Bienvenue sur l'shi Promo</h1>
    <?php
        $Magasin = "Top Market";?>
    <p>
        <?php
            echo "les offres promo de .".$Magasin;?>
    </p>
    <?php 
        $magasins = ["kin Market", "Top Market", "Market Plus", "Super Market"];
    ?>
    <P>le premier magasin : <?php echo $magasins[3]; ?></P>

    <h1>Annuaire de tous les magasins</h1>
    <ol>
        <?php 
            foreach($magasins as $magasin){
                echo "<li>".$magasin."</li>";
            }
        ?>
    </ol>
</body>
</html>