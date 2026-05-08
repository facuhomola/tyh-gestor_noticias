<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

<body style="min-height:100vh; display:flex; flex-direction:column;">
    <?= $this->include('layout/header') ?>
    <main style="flex:1;">
    <section class="section">
            <div class="container">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h1 class="title is-3">
                                Bienvenido, <span class="has-text-primary"><?= esc(session()->get('username')) ?></span>
                            </h1>
                        </div>
                    </div>
                    <div class="level-left">
                        <a href="<?= base_url('logout') ?>" class="button is-danger is-light">
                            Cerrar sesión
                        </a>
                    </div>
                </div>

                <hr>

                <div class="box">
                    <h2 class="subtitle is-5">Acciones disponibles:</h2>
                    
                    <div class="buttons">
                        <?php if (session()->get('rol') == 'validador'): ?> <!-- Funciones para validador -->
                            
                            <a href="<?= base_url('validador/listar') ?>" class="button is-link is-outlined">
                                <span class="icon"><i class="fas fa-check-square"></i></span>
                                <span>Lista para validar</span>
                            </a>

                        <?php elseif (session()->get('rol') == 'editor'): ?> <!-- Funciones para editor -->

                            <a href="<?= base_url('crear') ?>" class="button is-success">
                                <span class="icon"><i class="fas fa-plus"></i></span>
                                <span>Crear nueva noticia</span>
                            </a>
                            
                            <a href="<?= base_url('borradores') ?>" class="button is-warning">
                                <span class="icon"><i class="fas fa-edit"></i></span>
                                <span>Lista de borradores</span>
                            </a>

                            <a href="<?= base_url('noticias/revision') ?>" class="button is-warning">
                                Lista de corrección
                            </a>

                        <?php elseif (session()->get('rol') == 'ambos'): ?> <!-- Funciones para validador / editor -->

                            <a href="<?= base_url('crear') ?>" class="button is-success">
                                <span class="icon"><i class="fas fa-plus"></i></span>
                                <span>Crear noticia</span>
                            </a>

                            <a href="<?= base_url('borradores') ?>" class="button is-warning">
                                <span class="icon"><i class="fas fa-edit"></i></span>
                                <span>Lista de borradores</span>
                            </a>

                            <a href="<?= base_url('noticias/revision') ?>" class="button is-warning">
                                Lista de corrección
                            </a>

                            <a href="<?= base_url('validador/listar') ?>" class="button is-link is-outlined">
                                <span class="icon"><i class="fas fa-check-square"></i></span>
                                <span>Listado para validar</span>
                            </a>
                        
                        <?php elseif (session()->get('rol') == 'admin'): ?> <!-- Funciones para admin -->

                        <a href="<?= base_url('admin/usuarios') ?>" class="button is-primary">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span>Administrar usuarios</span>
                        </a>

                        <a href="<?= base_url('admin/auditoria') ?>" class="button is-link">
                        <span class="icon">
                            <i class="fas fa-newspaper"></i>
                        </span>

                            <span>Noticias creadas</span>
                        </a>

                        <?php else: ?>

                            <div class="notification is-danger is-light">
                                <button class="delete"></button>
                                <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                                No tienes permisos asignados. Por favor, contacta al administrador.
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?= $this->include('layout/footer') ?>
</body>
