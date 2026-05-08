<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Login</title>
</head>
<body style="min-height:100vh; display:flex; flex-direction:column;">

<?= $this->include('layout/header') ?>

<main style="flex:1;">
<section class="section">
    <div class="container" style="max-width: 400px;">
        <div class="box">
            <h2 class="title is-4 has-text-centered">Iniciar Sesión</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="notification is-danger is-light">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('autenticar') ?>" method="post">
                
                <div class="field">
                    <label class="label">Usuario</label>
                    <div class="control">
                        <input class="input" type="text" name="username" placeholder="Tu usuario" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contraseña</label>
                    <div class="control">
                        <input class="input" type="password" name="contrasenia" placeholder="*******" required>
                    </div>
                </div>

                <div class="field mt-5">
                    <div class="control">
                        <button type="submit" class="button is-primary is-fullwidth">
                            Ingresar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
</main>

<?= $this->include('layout/footer') ?>
</body>
</html>