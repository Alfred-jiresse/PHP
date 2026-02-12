<?php 
session_start();
$header = "Publier une offre";
?>
<?php require 'portions/header.php' ?>

<style>
    .form-container {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 25%, #7e22ce 50%, #ec4899 75%, #f97316 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: calc(100vh - 400px);
        padding: 60px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Particle effect */
    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
        animation: shimmer 8s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    .form-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(30px);
        border-radius: 20px;
        box-shadow: 
            0 0 60px rgba(0, 0, 0, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        padding: 50px;
        max-width: 600px;
        width: 100%;
        position: relative;
        z-index: 10;
        animation: slideUp 0.9s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #ec4899 0%, #f97316 25%, #eab308 50%, #22c55e 75%, #06b6d4 100%);
        border-radius: 20px 20px 0 0;
        box-shadow: 0 4px 20px rgba(236, 72, 153, 0.3);
    }

    .form-card h1 {
        text-align: center;
        background: linear-gradient(135deg, #ec4899 0%, #f97316 50%, #06b6d4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0 0 40px 0;
        font-size: 32px;
        font-weight: 900;
        letter-spacing: -1px;
        text-shadow: 0 2px 10px rgba(236, 72, 153, 0.1);
    }

    .form-group {
        margin-bottom: 24px;
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .form-group:nth-child(2) { animation-delay: 0.1s; }
    .form-group:nth-child(3) { animation-delay: 0.2s; }
    .form-group:nth-child(4) { animation-delay: 0.3s; }
    .form-group:nth-child(5) { animation-delay: 0.4s; }
    .form-group:nth-child(6) { animation-delay: 0.5s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        background: linear-gradient(135deg, #7e22ce 0%, #ec4899 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 2.5px solid #f0f0f5;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(135deg, #fafbfc 0%, #f5f7fb 100%);
        color: #1a1a2e;
    }

    .form-group input::placeholder {
        color: #a0a0b0;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #ec4899;
        background: white;
        box-shadow: 
            0 0 0 4px rgba(236, 72, 153, 0.12),
            0 5px 20px rgba(236, 72, 153, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #f97316;
        box-shadow: 0 4px 20px rgba(249, 115, 22, 0.1);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-row .form-group {
        margin-bottom: 0;
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #ec4899 0%, #f97316 50%, #eab308 100%);
        background-size: 200% 200%;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin-top: 15px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(236, 72, 153, 0.35);
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s;
    }

    .submit-btn::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.1) 100%);
        border-radius: 10px;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 15px 40px rgba(236, 72, 153, 0.4),
            0 0 30px rgba(249, 115, 22, 0.3),
            0 0 20px rgba(234, 179, 8, 0.2);
        background-position: 200% center;
    }

    .submit-btn:active {
        transform: translateY(-1px);
    }

    .alert {
        margin-bottom: 20px;
        padding: 15px 20px;
        border-radius: 10px;
        font-size: 14px;
        text-align: center;
        font-weight: 700;
        animation: slideDown 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #86efac 0%, #4ade80 100%);
        color: #166534;
        border: 2px solid #22c55e;
        box-shadow: 0 5px 15px rgba(34, 197, 94, 0.25);
    }

    .alert-error {
        background: linear-gradient(135deg, #fca5a5 0%, #f87171 100%);
        color: #991b1b;
        border: 2px solid #ef4444;
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.25);
    }

    /* Custom select styling */
    select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23ec4899' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 18px;
        padding-right: 40px;
    }

    @media (max-width: 768px) {
        .form-card {
            padding: 40px 25px;
        }
        .form-card h1 {
            font-size: 26px;
            margin-bottom: 30px;
        }
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        .form-container {
            padding: 40px 15px;
        }
    }
</style>

<div class="form-container">
    <div class="form-card">
        <h1>Publier une offre</h1>

        <?php if(isset($_SESSION['succes'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['succes']; 
                unset($_SESSION['succes']);
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="controler/creer-offre.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="image">Image du produit</label>
                <input type="file" id="image" name="image" required />
            </div>

            <div class="form-group">
                <label for="nom_produit">Nom du produit</label>
                <input type="text" id="nom_produit" name="nom_produit" placeholder="Ex: Télévision Samsung" required />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="prix_initial">Prix initial</label>
                    <input type="number" id="prix_initial" name="prix_initial" placeholder="0" required />
                </div>
                <div class="form-group">
                    <label for="prix_promo">Prix promo</label>
                    <input type="number" id="prix_promo" name="prix_promo" placeholder="0" required />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="device">Device</label>
                    <select id="device" name="device" required>
                        <option value="">Choisir...</option>
                        <option value="FC">FC</option>
                        <option value="$">$</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="magasin">Magasin</label>
                    <select id="magasin" name="magasin" required>
                        <option value="">Choisir...</option>
                        <option value="Top Marcket">Top Marcket</option>
                        <option value="Kin Marche">Kin Marche</option>
                        <option value="Jambo">Jambo</option>
                        <option value="Rocheio">Rocheio</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="submit-btn">Publier l'offre</button>
        </form>
    </div>
</div>

<?php require 'portions/footer.php' ?>