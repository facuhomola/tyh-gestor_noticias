<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<?= $this->include('layout/header') ?>

<section class="section">
    <div class="container">

        <h1 class="title">Historial de la noticia</h1>

        <table class="table is-fullwidth is-striped">

            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                    <th>Estado anterior</th>
                    <th>Estado nuevo</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($historial as $item): ?>

                <tr>
                    <td><?= esc($item['username']) ?></td>
                    <td><?= esc($item['accion']) ?></td>
                    <td><?= esc($item['estado_anterior']) ?></td>
                    <td><?= esc($item['estado_nuevo']) ?></td>
                    <td><?= esc($item['fecha']) ?></td>
                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <a href="<?= base_url('admin/auditoria') ?>" class="button is-light">
            Volver
        </a>

    </div>
</section>