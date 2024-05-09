<?php include 'Template/header.html.php';


if (isset($_SESSION['errorPassword'])) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $_SESSION['errorPassword']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['errorPassword']);
}
?>
<?php
if (isset($_SESSION['errorEmail'])) { ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $_SESSION['errorEmail']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['errorEmail']);
}
?>



<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Connexion</h1>

                    <form action="/user/login" method="POST">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">

                        </div>
                        <button type="submit" class="btn btn-primary col-12">Connexion</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="/user/signup">Pas encore de compte ? Inscrivez-vous ici</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Template/footer.html.php'; ?>