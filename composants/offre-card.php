<div class="w-full max-w-sm bg-white border border-gray-100 rounded-2xl shadow-md hover:shadow-lg transition dark:bg-gray-800 dark:border-gray-700">
    
    <!-- Image -->
    <div class="relative">
        <img class="w-full h-52 object-cover rounded-t-2xl" 
             src="<?php echo 'images/'.$details['image']; ?>" 
             alt="product image" />

        <!-- Badge promo -->
        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
            -<?php echo round((($details['prix-initial'] - $details['prix-promo']) / $details['prix-initial']) * 100); ?>%
        </span>
    </div>

    <!-- Contenu -->
    <div class="p-4 space-y-3">

        <!-- Titre -->
        <h5 class="text-base font-semibold text-gray-900 dark:text-white leading-snug">
            <?php echo $produit; ?>
        </h5>

        <!-- Prix -->
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-gray-900 dark:text-white">
                <?php echo $details['prix-promo']; ?><?php echo $details['device']; ?>
            </span>
            <span class="text-sm text-gray-400 line-through">
                <?php echo $details['prix-initial']; ?><?php echo $details['device']; ?>
            </span>
        </div>

        <!-- Bouton -->
        <a href="#"
           class="flex items-center justify-center gap-2 w-full bg-green-600 hover:bg-green-700 text-white font-medium text-sm py-2.5 rounded-xl transition focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">

            <!-- Icône WhatsApp (SVG) -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 24 24" 
                 fill="currentColor" 
                 class="w-5 h-5">
                <path d="M12.04 2C6.55 2 2.04 6.51 2.04 12c0 1.97.57 3.86 1.64 5.49L2 22l4.67-1.6A9.94 9.94 0 0 0 12.04 22c5.49 0 10-4.51 10-10s-4.51-10-10-10zm0 18.2c-1.6 0-3.16-.43-4.52-1.24l-.32-.19-2.77.95.93-2.7-.21-.34A8.17 8.17 0 0 1 3.84 12c0-4.51 3.68-8.19 8.2-8.19s8.2 3.68 8.2 8.19-3.68 8.2-8.2 8.2zm4.52-6.15c-.25-.12-1.47-.72-1.7-.8-.23-.08-.4-.12-.57.12-.17.25-.65.8-.8.97-.15.17-.3.19-.55.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.14-.25-.01-.38.11-.5.11-.11.25-.3.37-.45.12-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.12-.57-1.38-.78-1.9-.2-.48-.41-.41-.57-.42h-.48c-.17 0-.45.06-.68.32-.23.25-.9.88-.9 2.14s.92 2.48 1.05 2.65c.12.17 1.8 2.75 4.37 3.85.61.26 1.08.42 1.45.54.61.19 1.17.16 1.61.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.3z"/>
            </svg>

            Profiter
        </a>
    </div>
</div>
