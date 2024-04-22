<!-- jeux.php -->
<?php
require_once 'controleur/Controller.php';
$controller = new Controller();
$favoris = $controller->getFavoris();
$romans = $controller->getRomans();
$jeux = $controller->getJeux();

// Si le formulaire d'ajout de jeu est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouterJeu'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];
    $controller->ajouterJeu($nom, $description, $logo);
}

// Si le formulaire de modification de jeu est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifierJeu'])) {
    // Récupérer les autres champs du formulaire pour la modification du jeu
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];
    $controller->modifierJeu($id, $nom, $description, $logo);
}

// Si le formulaire de suppression de jeu est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimerJeu'])) {
    $id = $_POST['id'];
    $controller->supprimerJeu($id);
}

$jeux = $controller->getJeux();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Mes Jeux</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=accueil">Accueil</a></li>
                <li><a href="index.php?action=Romans">Romans</a></li>
                <li><a href="index.php?action=Jeux">Jeux</a></li>
            </ul>
        </nav>
    </header>

    <main>

    <section>
            <h2>Liste des jeux</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jeux as $jeu): ?>
                        <tr>
                            <td><?php echo $jeu['nomJ']; ?></td>
                            <td><?php echo $jeu['DescriptionJ']; ?></td>
                            <td><img src="<?php echo $jeu['Logo']; ?>" alt="Logo"></td>
                            <td>
                                <form action="jeux.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $jeu['id']; ?>">
                                    <button type="submit" name="modifierJeu">Modifier</button>
                                    <button type="submit" name="supprimerJeu">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Le jeu auquel je jouais</h2>
            <p>Voici quelques-uns de mes jeux :</p>


            <article>
                <h3>Minecraft</h3>
                <img src="photos/M.jpg" alt="Image du jeu">
                <p>Minecraft est un jeu vidéo de type aventure « bac à sable » (construction complètement libre) développé par le Suédois Markus Persson, alias Notch, puis par la société Mojang Studios. Il s'agit d'un univers composé de voxels et généré de façon procédurale, qui intègre un système d'artisanat axé sur l'exploitation puis la transformation de ressources naturelles (minéralogiques, fossiles, animales et végétales).</p>
                <h3>Téléchargement </h3>
                <a href="https://www.minecraft.net/fr-fr">Voir le site</a>
            </article>            


            <article>
                <h3>Battle of Balls (球球大作战) </h3>
                <img src="photos/oo.jpg" alt="Image du jeu">
                <p>Ball Battle est un jeu mobile en ligne développé indépendamment par le studio Superpop&amp;Lollipop de Giant Network et gratuit (hors accessoires). Il a été lancé le 27 mai 2015 par Giant Network en Chine continentale. Le jeu est conçu dans le but de PK interactif en temps réel entre les joueurs, et grâce à des règles simples, l'opération du joueur est directement transformée en stratégie de jeu, expérimentant le plaisir de la bataille de la collision intellectuelle.</p>
                <h3>Téléchargement </h3>
                <a href="https://www.battleofballs.com/index_PC.html">Voir le site</a>
            </article>


            <article>
                <h3>PUBG: Battlegrounds (绝地求生)</h3>
                <img src="photos/J.jpg" alt="Image du jeu">
                <p>PUBG: Battlegrounds est un jeu de tir à la première personne et à la troisième personne de type joueur contre joueur dans lequel une centaine de joueurs se battent dans un battle royale. Les joueurs peuvent choisir de participer à la partie en solo, en duo ou avec quatre personnes. La dernière personne ou équipe en vie remporte la partie.</p>
                <h3>Téléchargement </h3>
                <a href="https://pubg.qq.com/">Voir le site</a>
            </article>


            <article>
                <h3>Game of Heroes: Three Kingdoms (三国杀Online)</h3>
                <img src="photos/S.jpg" alt="Image du roman">
                <p>Three Kingdoms est un jeu de cartes stratégique original sur le thème des Trois Royaumes qui combine des éléments d'histoire, d'art et de cartes.</p>
                <h3>Téléchargement </h3>
                <a href="https://www.sanguosha.com/">Voir le site</a>
            </article>


            <article>
                <h3>时空猎人</h3>
                <img src="photos/SK.jpg" alt="Image du roman">
                <p>Un style de combat horizontal classique, 200 millions de joueurs adorent ce jeu de combat mobile !</p>
                <h3>Téléchargement </h3>
                <a href="https://hunter.yh.cn/hunter/index">Voir le site</a>
            </article>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Mon Site Personnel. Tous droits réservés.</p>
        <p><a href="index.php?action=ML">Mentions Légales</a></p>
    </footer>

</body>
</html>