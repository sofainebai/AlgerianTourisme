<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ_Tourisme</title>
    <link rel="stylesheet" href=".asselts/css/style.css">
    
</head>
<body>
    <div class="container">
    <header>
        <nav>
            <div class="logo"> <div class="A"><p style="font-size: 2rem; ">A</p></div>Lgerian Tourism</div>
            <ul class="nav_links">
                <li><a href="#">Acceuil</a></li>
                <li><a href="#">Destinations</a></li>
                <li><a href="#">Histoire</a></li>
                <li><a href="">Galerie</a></li>
                <li
                style="background-color: #f1d846;border-radius: 5px;
                width: 90px; text-align: center;" ><a style="color: black; font-size: 1.1rem;
                font-weight: bold;" href="login.php">
                Connexion</a></li>
            </ul>
        </nav>
    </header>
    <section class="container1">
     <div class="container_content">
        <div class="h1">
           <h1>Discover</h1><h1 style="color: #f1d846 ;">Algeria</h1><h1>Unveiled</h1>
        </div>
        <div style="width: 70%; margin-left: 15%; margin-top: 20px;">
           <p>Des paysages à couper le souffle, une histoire riche et une culture fascinante font de l’Algérie une destination unique Entre mer montagnes et désert</p>
        </div>
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: row-reverse;">
        <button class="btn">Voire Plus → </button>
        <button style="border-radius: 7px; height: 30px; width: 125px; background-color: #f1d846;
        font-weight: bolder;
        position: relative;
        top: 10px;

        ">explorer l'Algerie</button>
        </div>
      </div>
    </section>
 </div>
    <section>
        <hr style="width: 475px; margin-left: 20%; margin-top: 4.5rem;" color="#f1d846">
        <h2 class="session_title">Destination populaire</h2>
        <div class="destination">
            <div class="destination_items">
                <div class="items_img">
                    <img src=".asselts\image\xlarge_cap_carbon_1399233_cc9853e95b.jpg" alt="Bejaia" width="200px">

                </div>
                <div class="items_content">
                    <h3>🏞 East<h3>
                    <p>Parcourez l’Est algérien, de Kabylie a Constantine la citadelle suspendue à Annaba la radieuse, en passant par les montagnes de Sétif.</p>
                    <a href="region.php?nom=East">Voir les wilayas →</a>
                </div>
            </div>
            <div class="destination_items">
                <div class="items_img">
                    <img src=".asselts\image\MmnDoA.jpg" alt="Alger" width="200px">
                </div>
                <div class="items_content">
                  <h3>🌊Région Nord</h3>
                  <p>Découvrez les wilayas côtières du Nord, entre plages méditerranéennes, grandes villes animées et patrimoine historique unique.</p>
                   <a href="region.php?nom=Nord">Voir les wilayas →</a>
                </div>
            </div>
            <div class="destination_items">
                <div class="items_img">
                    <img src=".asselts\image\7djxxhceebx31.jpg" alt="Oran" width="200px">
                </div>
                <div class="items_content">
                   <h3>🌅Région Ouest</h3>
                   <p>Visitez l’Ouest algérien, entre Tlemcen la perle andalouse, Mostaganem la côtière et les paysages culturels d’Oran.</p>
                   <a href="region.php?nom=Ouest" target="_blank">Voir les wilayas →</a>
                </div>
            </div>
              <div class="destination_items">
                <div class="items_img">
                    <img src="https://th.bing.com/th/id/R.9ed61d0124bd61fe5a13e0331795f662?rik=OIC%2fn4w7tqPSYQ&pid=ImgRaw&r=0" alt="Oran" width="200px">
                </div>
                <div class="items_content">
                   <h3>🏜 Région Sud</h3>
                   <p>Explorez le Sahara : Tamanrasset, Djanet et d'autres merveilles, avec ses dunes dorées et ses oasis spectaculaires.</p>
                   <a href="region.php?nom=Sud">Voir les wilayas →</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy;2025 Algerie Tourism - tous droits réservés</p>
    </footer>
</body>
</html>