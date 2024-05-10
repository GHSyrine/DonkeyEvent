<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link href="../style.css" rel="stylesheet">
    <title>Pathy</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-lightp-3 mb-2 bg-dark border-bottom">
        <a class="navbar-brand text-warning" href="/home/all">Pathy Cinéma</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php
                if ($_SERVER['REQUEST_URI'] == "/movie" || $_SERVER['REQUEST_URI'] == "/cinema") {


                    echo '<li class="nav-item">';
                    echo '<form class="d-flex" role="search" action="/movie/find" method="POST">';
                    echo '<input class="form-control m-1 me-1 p-1" id="autoComplete" name="search" type="text" placeholder="Recherche dans la page" aria-label="Search">';
                    echo '<div id="result"></div>';
                    echo '<button class="btn btn-warning m-1" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">';
                    echo '<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />';
                    echo '</svg></button>';
                    echo '</form>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/"><i class="fas fa-home">&nbsp;</i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/cinema"><i class="fas fa-film">&nbsp;</i>Cinémas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/movie"><i class="fas fa-ticket-alt">&nbsp;</i>Films</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/user"><i class="fas fa-user">&nbsp;</i></a>
                </li>
                <?php if (isset($_SESSION['login'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="user/">
                    <li class="fa-solid fa-arrow-right-from-bracket"></li> Déconnexion</a>
                <?php   } ?>
            </ul>
        </div>
    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</script>

<body class="container-body bg-dark">