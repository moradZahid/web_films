<?php
//gere connection et les function 
$filmsDao = new FilmsDAO();

//Si titre ou realisateur est soumis
if (isset($_POST['titre'])) {

    $titreFilm = $_POST['titre'];

    $films = $filmsDao->searchFilm($titreFilm);

    foreach ($films as $film) {
        $acteurList = $filmsDao->filmActeur($film->get_idFilm());
        $film->set_tabRoles($acteurList);
    }
    echo $twig->render('recherche_film.html.twig', ['film' => $films[0]]);
} else {
    echo $twig->render('recherche_film.html.twig');
}
