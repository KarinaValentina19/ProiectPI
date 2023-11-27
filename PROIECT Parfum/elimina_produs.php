<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];

    // Verificăm dacă există coșul de cumpărături în sesiune și dacă produsul cu ID-ul dat există
    if (isset($_SESSION['cos_cumparaturi'][$productId])) {
        // Eliminăm produsul din coș
        unset($_SESSION['cos_cumparaturi'][$productId]);
        // Reindexăm array-ul pentru a evita găurile în indexare
        $_SESSION['cos_cumparaturi'] = array_values($_SESSION['cos_cumparaturi']);
        echo "Produsul a fost eliminat din coș.";
    } else {
        echo "Produsul nu a fost găsit în coș.";
    }
} else {
    echo "ID-ul produsului lipsă sau invalid.";
}
?>
