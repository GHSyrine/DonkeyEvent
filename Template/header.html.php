<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                <li class="nav-item">
                    <a class="nav-link text-white" href="/"><i class="fas fa-home">&nbsp;</i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/cinema"><i class="fas fa-film">&nbsp;</i>Cinémas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/movie"><i class="fas fa-ticket-alt">&nbsp;</i>Films</a>
                </li>
                <form class="d-flex">
                    <input class="form-control m-1 me-1 p-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-warning m-1" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg></button>
                </form>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/user"><i class="fas fa-user">&nbsp;</i></a>
                </li>
                <li class="nav-item">


                    <form class="d-flex" role="search" action="/movie/find" method="POST">
                        <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
            </ul>
        </div>
    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>