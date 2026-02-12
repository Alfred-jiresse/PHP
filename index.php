<?php 
    $header = "Bienvenue sur l'shie Promo";
?>
<?php require 'portions/header.php' ?>

<!-- Hero -->
<section class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight">
            Nos meilleures offres 
        </h1>
        <p class="text-gray-400 mt-1 text-sm">
            Sélection exclusive de promotions en temps limité
        </p>
    </div>

    <?php require 'models/promotions-data.php' ?>

    <?php foreach($promotions as $magasin => $produits): ?>

        <!-- Section magasin -->
        <section class="mb-12">

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-white">
                    <?php echo $magasin; ?>
                </h2>

                <span class="text-xs text-gray-400 uppercase tracking-wide">
                    <?php echo count($produits); ?> offres
                </span>
            </div>

            <!-- Grille produits -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach($produits as $produit => $details): ?>
                    <?php require 'composants/offre-card.php'; ?>
                <?php endforeach; ?>
            </div>

        </section>

    <?php endforeach; ?>
</section>

<?php require 'portions/footer.php' ?>
