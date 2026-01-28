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

    <?php
        $prix = [
            "Riz" => 450,
            "Huile" => 1200,
            "Pates" => 700,
            "Sucre" => 550
        ];
    ?>
    <p>Le prix du riz est de <?php echo $prix["Riz"]; ?> FC</p>
    <p>Le prix de l'huile est de <?php echo $prix["Huile"]; ?> FC</p>
    <p>Le prix des pates est de <?php echo $prix["Pates"]; ?> FC</p>
    <p>Le prix du sucre est de <?php echo $prix["Sucre"]; ?> FC</p>

    <h2>Liste des prix des produits</h2>
    <ul>
        <?php foreach($prix as $produit => $cout) : ?>
        <li>Le prix de <?php echo $produit; ?> est de : <?php echo $cout; ?> FC</li>
        <?php endforeach; ?>
    </ul>

    <?php  ?>
</body>

</html>