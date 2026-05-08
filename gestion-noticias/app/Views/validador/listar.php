<?php if(session()->getFlashdata('error')): ?>

    <div class="notification is-danger">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>

    <div class="notification is-success">
        <?= session()->getFlashdata('success') ?>
    </div>

<?php endif; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<?= $this->include('layout/header') ?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <h2 class="title is-3 has-text-grey-dark">Noticias listas para validar</h2>
                </div>
            </div>
            <div class="level-right">
                <span class="tag is-info is-light"><?= count($noticias) ?> pendientes</span>
            </div>
        </div>

        <hr>

        <div class="table-container">
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr class="is-selected">
                        <th><abbr title="Título de la noticia">Título</abbr></th>
                        <th>Descripción</th>
                        <th class="has-text-centered">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($noticias)): ?>
                        <?php foreach ($noticias as $n): ?>
                            <tr>
                                <td class="is-vcentered">
                                    <strong><?= esc($n['titulo']) ?></strong>
                                </td>
                                <td class="is-vcentered">
                                    <span class="is-size-7-mobile"><?= esc($n['descripcion']) ?></span>
                                </td>
                                <td class="is-vcentered">
                                    <div class="buttons is-centered">
                                        <!-- Validar -->
                                        <a href="<?= base_url('validador/validar/'.$n['id_noticia']) ?>" 
                                           class="button is-success is-small is-rounded is-light" onclick="return confirm('¿Desea publicar esta noticia?')">
                                            <span class="icon is-small">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span>Validar</span>
                                        </a>

                                        <!-- Enviar a corrección -->
                                        <a href="<?= base_url('validador/revision/'.$n['id_noticia']) ?>" 
                                           class="button is-warning is-small is-rounded is-light" onclick="return confirm('¿Desea enviar la noticia a corrección?')">
                                            <span class="icon is-small">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span>Enviar a corrección</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="has-text-centered has-text-grey italic">
                                No hay noticias pendientes de validación.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="<?= base_url('inicio') ?>" class="button is-light mb-3">
            ← Volver
        </a>
    </div>
</section>