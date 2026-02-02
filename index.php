<?php 
    $header = "Bienvenue sur l'shie Promo";
?>
<?php require 'portions/header.php' ?>

<h1 class="text-2xl font-bold text-white">Profiter de  nos meilleures offres</h1>

<?php require 'models/promotions-data.php' ?>

<?php foreach($promotions as $magasin => $produits): ?>

<div>
    <h1 class='text-white'>Magasin : <?php echo $magasin; ?></h1>
    <?php foreach($produits as $produit => $details): ?>
    <p class='text-white'>Nom de l'article : <?php echo $produit; ?></p>
    <p class='text-white'>Prix initial : <?php echo $details['prix-initial']; ?><?php echo $details['device']; ?></p>
    <p class='text-white'>Prix promo: <?php echo $details['prix-promo']; ?><?php echo $details['device']; ?></p>
    <p class='text-white'>reductionPourcentage: <?php echo '-'.round((($details['prix-initial'] - $details['prix-promo']) / $details['prix-initial']) * 100); ?>%</p>
    <br>
    <?php endforeach; ?>
</div>

<?php endforeach; ?>

<?php require 'portions/footer.php' ?>