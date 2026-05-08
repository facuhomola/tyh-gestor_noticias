<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>
<?= $this->include('layout/header') ?>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                
                <div class="box">
                    <h2 class="title is-3 has-text-centered">Nuevo Usuario</h2>

                    <form action="<?= base_url('admin/usuarios/guardar') ?>" method="post">
                        
                        <!-- Campo: Username -->
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control">
                                <input class="input" type="text" name="username" placeholder="Ingrese el nombre de usuario" required>
                            </div>
                        </div>

                        <!-- Campo: Contraseña -->
                        <div class="field">
                            <label class="label">Contraseña</label>
                            <div class="control">
                                <input class="input" type="password" name="contrasenia" placeholder="*******" required>
                            </div>
                        </div>

                        <!-- Campo: Rol -->
                        <div class="field">
                            <label class="label">Rol</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="rol" required>
                                        <option value="0">Selecciona un rol</option>
                                        <option value="editor">Editor</option>
                                        <option value="validador">Validador</option>
                                        <option value="ambos">Ambos Validador / Editor</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Botones -->
                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Guardar Usuario</button>
                            </div>
                            <div class="control">
                                <a href="<?= base_url('admin/usuarios') ?>" class="button is-light">Volver</a>
                            </div>
                        </div>

                    </form>
                </div> <!-- Fin del Box -->

            </div>
        </div>
    </div>
</section>
</body>
</html>