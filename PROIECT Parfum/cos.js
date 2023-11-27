function adaugaInCos(id, nume, pret, imagine) {
    $.ajax({
        type: "GET",
        url: "cos.php",
        data: { id: id, nume: nume, pret: pret, imagine: imagine },
        success: function(response) {
            if (response === 'success') {
                console.log("Produsul a fost adăugat în coș: " + nume);
                // Aici poți adăuga cod pentru a actualiza vizual coșul
                $.ajax({
                    type: "GET",
                    url: "afisare_cos.php",
                    success: function(data) {
                        $('.cos-cumparaturi').html(data); // Actualizează containerul coșului cu noile informații
                    },
                    error: function(xhr, status, error) {
                        console.error("Eroare la actualizarea coșului:", error);
                    }
                });
            } else {
                console.error("Eroare la adăugarea în coș: răspuns incorect");
            }
        },
        error: function(xhr, status, error) {
            console.error("Eroare la adăugarea în coș:", error);
        }
    });
}
