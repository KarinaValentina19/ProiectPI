<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coș de cumpărături</title>
    <link rel="stylesheet" type="text/css" href="style_cos.css">
    <link rel="stylesheet" type="text/css" href="style_femei.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
session_start();

if (isset($_SESSION['cos_cumparaturi']) && count($_SESSION['cos_cumparaturi']) > 0) {
?>
    <header>
        <h1>Coșul meu de cumpărături</h1>

        <div class="navbar">
            <a href="main.html">Despre noi</a>
            <div class="dropdown" >
              <button class="dropbtn">Parfumuri pentru femei </button>
              <div class="dropdown-content">
                <a href="apa_de_parfum_femei.html">Apă de parfum</a>              
                <a href="apa_de_toaleta_femei.html">Apă de toaletă</a>
                <a href="apa_de_colonie_femei.html">Apă de colonie</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Parfumuri pentru bărbați</button>
              <div class="dropdown-content">
                <a href="apa_de_parfum_barbati.html">Apă de parfum</a>              
                <a href="apa_de_toaleta_barbati.html">Apă de toaletă</a>
                <a href="apa_de_colonie_barbati.html">Apă de colonie</a>
              </div>
            </div>
            <a href="parfumuri_pentru_casa.html">Parfumuri pentru casă</a>
          </div>
    </header>



    <main>
        <?php
        $total = 0;
        foreach ($_SESSION['cos_cumparaturi'] as $index => $produs) {
            $total += $produs['pret'];
        ?>
            <div class="cart-item" id="product_<?= $index ?>">
                <img src="<?= $produs['imagine'] ?>" alt="<?= $produs['nume'] ?>">
                <div>
                    <h3><?= $produs['nume'] ?></h3>
                    <p>Preț: <?= $produs['pret'] ?> RON</p>
                    <button class="remove-button" data-id="<?= $index ?>">Elimină</button>
                </div>
            </div>
        <?php } ?>
        <div class="spacer"></div>
        <footer>
            <p>Total: <?= $total ?> RON</p>
        </footer>
    </main>

<?php
} else {
?>
    <header>
        <h1>Coșul meu de cumpărături</h1>
    </header>

    <p>Coșul tău de cumpărături este gol.</p>
<?php
}
?>

</body>
</html>
