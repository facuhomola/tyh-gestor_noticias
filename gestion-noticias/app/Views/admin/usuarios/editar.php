<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
</head>
<body>

<?= $this->include('layout/header') ?>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                
                <!-- Botón Volver -->
                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="<?= base_url('usuarios') ?>">Usuarios</a></li>
                        <li class="is-active"><a href="#" aria-current="page">Editar</a></li>
                    </ul>
                </nav>

                <div class="card">
                    <header class="card-header has-background-warning-light">
                        <p class="card-header-title">
                            <span class="icon mr-2">✏️</span> Editar Usuario
                        </p>
                    </header>
                    
                    <div class="card-content">
                        <form action="<?= base_url('admin/usuarios/actualizar/' . $usuario['usuario_id']) ?>" method="post">

                            <!-- Campo: Username -->
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="text" name="username" 
                                           value="<?= $usuario['username'] ?>" required>
                                    <span class="icon is-small is-left">👤</span>
                                </div>
                            </div>

                            <!-- Campo: Contraseña -->
                            <div class="field">
                                <label class="label">Nueva contraseña</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="password" name="contrasenia" 
                                           placeholder="Dejar en blanco para no cambiar">
                                    <span class="icon is-small is-left">🔒</span>
                                </div>
                                <p class="help">Opcional: Solo si desea actualizarla.</p>
                            </div>

                            <!-- Campo: Rol -->
                            <div class="field">
                                <label class="label">Rol</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <!-- Lo ideal sería un select, pero mantenemos tu lógica de input text con estilo -->
                                        <input class="input" type="text" name="rol" 
                                               value="<?= $usuario['rol'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Botones de Acción -->
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-link">
                                        Actualizar Usuario
                                    </button>
                                </div>
                                <div class="control">
                                    <a href="<?= base_url('admin/usuarios') ?>" class="button is-light">
                                        Cancelar
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

</body>
</html>