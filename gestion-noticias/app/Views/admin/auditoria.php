<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<?= $this->include('layout/header') ?>

<section class="section">

    <div class="container">

        <h1 class="title">
            Auditoría de Noticias
        </h1>

        <table class="table is-fullwidth is-striped is-hoverable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado actual</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($noticias as $noticia): ?>

                <tr>

                    <td><?= esc($noticia['id_noticia']) ?></td>

                    <td><?= esc($noticia['titulo']) ?></td>

                    <td>
                        <span class="tag is-info">
                            <?= esc($noticia['estado']) ?>
                        </span>
                    </td>

                    <td><?= esc($noticia['fecha_creacion']) ?></td>

                    <td>

                        <a href="<?= base_url('noticias/historial/'.$noticia['id_noticia']) ?>"
                           class="button is-small is-primary">

                            Ver historial
                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <a href="<?= base_url('inicio') ?>" class="button is-light">
                Volver
        </a>

    </div>

</section>