<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
<?= $this->include('layout/header') ?>
<section class="section">
    <div class="container">
        <h3 class="title is-3 has-text-centered">Lista de Borradores</h3>

        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noticias as $n): ?>
                    <tr>
                        <td><?= $n['titulo'] ?></td>
                        <td>
                            <a href="<?= base_url('editar/'.$n['id_noticia']) ?>" 
                               class="button is-info is-small">
                                Ver
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