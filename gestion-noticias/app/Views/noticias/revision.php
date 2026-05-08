<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<?= $this->include('layout/header') ?>

<section class="section">
    <div class="container">
        <h2 class="title is-4">Lista de noticias para corregir</h2>

        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha creación</th>
                    <th class="has-text-centered">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($noticias)): ?>
                    <?php foreach ($noticias as $n): ?>
                        <tr>
                            <td><?= $n['titulo'] ?></td>
                            <td><?= $n['descripcion'] ?></td>
                            <td><?= $n['fecha_creacion'] ?></td>
                            <td class="has-text-centered">
                                <a href="<?= base_url('editar/'.$n['id_noticia']) ?>" class="button is-info is-small">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered">
                            No hay noticias en revisión
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <a href="<?= base_url('inicio') ?>" class="button is-link is-light mb-3">
            ← Volver
        </a>

    </div>
</section>