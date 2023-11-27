document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-button');
    
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            // Trimite o cerere către server pentru a elimina produsul din coș
            fetch('eliminare_produs.php?id=' + productId)
                .then(response => response.text())
                .then(data => {
                    // Actualizează vizual coșul de cumpărături sau afișează mesajul de coș gol
                    const productElement = document.getElementById('product_' + productId);
                    if (productElement) {
                        productElement.remove();
                    }
                    console.log(data); // Afișează mesajul returnat de PHP
                })
                .catch(error => {
                    console.error('Eroare:', error);
                });
        });
    });
});