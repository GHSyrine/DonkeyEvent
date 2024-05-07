<?php include 'Template/header.html.php';
if (isset($_SESSION['user'])) {
    echo '<div class="alert alert-sucess">Bienvenue,' . $_SESSION['user'] . '!</div>';
} ?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Connexion</h1>
                    <?php if (isset($data['error'])) : ?>
                        <div class="alert alert-danger"><?= $data['error'] ?></div>
                    <?php endif; ?>
                    <form action="/user/login" method="POST">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                            <?php if (isset($data['errorEmail'])) : ?>
                                <div class="text-danger"><?= $data['errorEmail'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <?php if (isset($data['errorPassword'])) : ?>
                                <div class="text-danger"><?= $data['errorPassword'] ?></div>
                            <?php endif; ?>
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

<<<<<<< HEAD
<?php include 'Template/footer.html.php';?>
=======
<?php include 'footer.php'; ?>
>>>>>>> 1378be89a0a17ccef85fe8b45a4f0d31a7b019ec
