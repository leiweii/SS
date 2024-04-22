<?php
require_once 'controleur/Controller.php';
$controller = new Controller();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouterRoman'])) {
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];
    $controller->ajouterRoman($auteur, $titre, $description, $photo);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifierRoman'])) {
    $idR = $_POST['id'];
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];
    $controller->modifierRoman($id, $auteur, $titre, $description, $photo);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimerRoman'])) {
    $id = $_POST['id'];
    $controller->supprimerRoman($id);
}

$romans = $controller->getRomans();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Romans</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
        <h1> Mes Romans</h1>
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
            <h2>Liste des romans</h2>
            <table>
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($romans as $roman): ?>
                        <tr>
                            <td><?php echo $roman['Auteur']; ?></td>
                            <td><?php echo $roman['Titre']; ?></td>
                            <td><?php echo $roman['DescriptionR']; ?></td>
                            <td><img src="<?php echo $roman['Photo']; ?>" alt="Photo"></td>
                            <td>
                                <form action="index.php?action=Romans" method="post">
                                    <input type="hidden" name="id" value="<?php echo $roman['idR']; ?>">
                                    <button type="submit" name="modifierRoman">Modifier</button>
                                    <button type="submit" name="supprimerRoman">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Ajouter un roman</h2>
            <form action="index.php?action=Romans" method="post">
                <input type="text" name="auteur" placeholder="Auteur">
                <input type="text" name="titre" placeholder="Titre">
                <input type="text" name="description" placeholder="Description">
                <input type="text" name="photo" placeholder="Photo">
                <button type="submit" name="ajouterRoman">Ajouter</button>
            </form>
        </section>

        <section>
    <h2>Mes Romans</h2>

    <article>
        <h3>"我的超能力每周刷新"</h3>
        <img src="photos/livre5.jpg" alt="Couverture du roman 我的超能力每周刷新">
        <p>C'est le dernier roman que j'ai lu. Il raconte l'histoire passionnante de Chen Yuan, qui découvre qu'il rafraîchit ses pouvoirs chaque semaine...</p>
        <p>La première semaine, il voit des nombres rouges apparaître sur tous les êtres vivants, allant de quelques centaines à plusieurs milliers, voire des dizaines de milliers...</p>
        <button class="show-link" data-target="link1">Afficher le lien pour continuer à lire</button>
        <a id="link1" class="more-link" href="https://www.qidian.com/chapter/1037632698/761297051/" style="display: none;">Continuer à lire</a>
    </article>

    <article>
        <h3>"我在人间立地成仙"</h3>
        <img src="photos/livre6.jpg" alt="Couverture du roman 我在人间立地成仙">
        <p>Fang Wang explore le monde à la recherche d'une méthode pour devenir immortel. Après des milliers de voyages à travers montagnes et rivières, il cherche le saint-graal de l'immortalité...</p>
        <p>À travers des aventures palpitantes, Fang Wang découvre des secrets anciens et rencontre des êtres exceptionnels dans sa quête de l'immortalité...</p>
        <button class="show-link" data-target="link2">Afficher le lien pour relire</button>
        <a id="link2" class="more-link" href="https://www.qidian.com/chapter/1038162140/768860258/" style="display: none;">Relire</a>
    </article>
</section>

<script>
    // Sélection de tous les éléments avec la classe "show-link"
const showLinks = document.querySelectorAll('.show-link');

// Pour chaque élément avec la classe "show-link", on ajoute un écouteur d'événement pour le clic
showLinks.forEach(button => {
    button.addEventListener('click', function() {
        // On récupère l'ID de l'élément cible à afficher à partir de l'attribut data-target du bouton
        const targetId = button.getAttribute('data-target');
        // On sélectionne l'élément cible à partir de son ID
        const targetLink = document.getElementById(targetId);
        // On change le style de l'élément cible pour le rendre visible (display: block)
        targetLink.style.display = 'block';
        // On masque le bouton sur lequel l'utilisateur a cliqué
        button.style.display = 'none';
    });
});

</script>

    </main>

    <footer>
        <p>&copy; 2024 Mon Site Personnel. Tous droits réservés.</p>
        <p><a href="index.php?action=ML">Mentions Légales</a></p>
    </footer>

</body>
</html>

