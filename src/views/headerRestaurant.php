<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="/public/assets/css/header.css">
    
  </head>
  <body>
    <header id="header">
        <div>
        <button class="like-btn" id="likeBtn">
            <i class="farfa-heart"></i>
        </button>
        </div>
        <nav>
            <ul>
                <li><a href="Plan">Plan des restaurants</a></li>
                <li><a href="Une">Restaurants à la une</a></li>
                <?php if($_SESSION["id"]!=null){ ?>
                    <li><a href="Favoris">Restaurants favoris</a></li>
                    <li><a href="FY">Pour vous</a></li>
                <?php } ?>
                <li><a href="Perso">Nos infos</a></li>
            </ul>
        </nav>
    </header>

    <script>
        // Sélection des éléments HTML
        const likeBtn = document.getElementById('likeBtn');
        const likeText = document.getElementById('likeText');
        const heartIcon = likeBtn.querySelector("i");

        // Variable pour stocker l'état du like
        let isLiked = false;

        // Événement au clic sur le bouton
        likeBtn.addEventListener('click', () => {
            isLiked = !isLiked; // On bascule l'état

            if (isLiked) {
                likeBtn.classList.add("liked");
                heartIcon.classList.replace("far", "fas"); // Remplace l'icône cœur vide par un cœur plein
            } else {
                likeBtn.classList.remove("liked");
                heartIcon.classList.replace("fas", "far"); // Remet le cœur vide
            }

            likeCountDisplay.textContent = likeCount; // Mise à jour du compteur
        });
    </script>

  </body>
</html>
