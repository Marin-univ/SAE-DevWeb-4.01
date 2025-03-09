document.getElementById("searchButton").addEventListener("click", function() {
    let searchQuery = document.getElementById("searchBar").value;

    if (searchQuery.trim() !== "") {
        fetch("../../../src/controllers/barreRecherche.php?recherche=" + encodeURIComponent(searchQuery))
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erreur réseau !");
                }
                return response.text();
            })
            .then(data => {
                document.getElementById("results").innerHTML = data;
            })
            .catch(error => console.error("Erreur :", error));
    }
});