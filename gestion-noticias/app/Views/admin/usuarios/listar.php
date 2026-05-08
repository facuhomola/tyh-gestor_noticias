<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
<?= $this->include('layout/header') ?>

<section class="section">
    <div class="container">
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <h2 class="title is-2">Listado de Usuarios</h2>
                </div>
            </div>

            <div class="level-right">
                <div class="level-item">
                    <a href="<?= base_url('admin/usuarios/crear') ?>" class="button is-primary">
                        <span class="icon">➕</span>
                        <span>Crear nuevo usuario</span>
                    </a>
                </div>
            </div>
        </nav>

        <hr>

        <!-- Contenedor responsivo para la tabla -->
        <div class="table-container">
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Rol / Permisos</th>
                        <th class="has-text-centered">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td>
                            <div class="is-flex is-align-items-center">
                                <strong><?= $u['username'] ?></strong>
                            </div>
                        </td>
                        <td>
                            <span class="tag is-light is-info">
                                <?= strtoupper($u['rol']) ?>
                            </span>
                        </td>
                        <td class="has-text-centered">
                            <div class="buttons is-centered">
                                <a href="<?= base_url('admin/usuarios/editar/'.$u['usuario_id']) ?>" 
                                   class="button is-small is-warning is-light">
                                    <span>✏️ Editar</span>
                                </a>
                                
                                <a href="<?= base_url('admin/usuarios/eliminar/'.$u['usuario_id']) ?>" 
                                   class="button is-small is-danger is-light" 
                                   onclick="return confirm('¿Eliminar usuario?')">
                                    <span>❌ Eliminar</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url('inicio') ?>" class="button is-light">
                Volver
            </a>
        </div>

    </div>
</section>