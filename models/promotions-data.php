<?php
$dossier_database = __DIR__ . '/../database/';

// Crée le dossier database s'il n'existe pas
if (!is_dir($dossier_database)) {
    mkdir($dossier_database, 0777, true);
}

// Connexion à la base de données SQLite
$pdo = new PDO('sqlite:' . $dossier_database . 'lshipromo.sqlite');

// Crée la table promotions si elle n'existe pas
// La table contient: id (clé primaire), nom_produit, prix_initial, prix_promo, device, magasin, chemin_image
$pdo->exec("CREATE TABLE IF NOT EXISTS promotions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_produit TEXT NOT NULL,
    prix_initial INTEGER NOT NULL,
    prix_promo INTEGER  NOT NULL,
    device TEXT NOT NULL,
    magasin TEXT NOT NULL,
    chemin_image TEXT NOT NULL
)");

$stmt = $pdo->query("SELECT * FROM promotions");
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
$promotions = [];
foreach($datas as $promo){
    $magasin = $promo['magasin'];
    $nom_produit = $promo['nom_produit'];
    $promotions[$magasin][$nom_produit] = [
        'prix-initial' => $promo['prix_initial'],
        'prix-promo' => $promo['prix_promo'],
        'device' => $promo['device'],
        'image' => $promo['chemin_image'],
    ];
}

