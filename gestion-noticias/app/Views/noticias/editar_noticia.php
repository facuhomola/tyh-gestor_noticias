<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

<body style="min-height:100vh; display:flex; flex-direction:column;">
    <?= $this->include('layout/header') ?>
    <main style="flex:1;">
        <form action="<?= base_url('actualizar/'.$noticia['id_noticia']) ?>" method="post">

        <div class="field">
            <label class="label">Título</label>
            <input class="input" type="text" name="titulo"
                value="<?= $noticia['titulo'] ?>" required>
        </div>

        <div class="field">
            <label class="label">Descripción</label>
            <textarea class="textarea" name="descripcion" required><?= $noticia['descripcion'] ?></textarea>
        </div>

        <div class="field">
            <label class="label">Imagen</label>
            <input class="input" type="text" name="imagen"
                value="<?= $noticia['imagen'] ?>">
        </div>

        <div class="field is-grouped is-grouped-right">

            <p class="control">
                <button 
                    type="submit"
                    name="accion"
                    value="listaParaPublicar"
                    class="button is-primary">

                    Lista Para Validar
                </button>
            </p>

            <p class="control">
                <button 
                    type="submit"
                    name="accion"
                    value="borrador"
                    class="button is-warning">

                    Guardar borrador
                </button>
            </p>

            <?php if($noticia['estado'] != 'revision'): ?>

            <p class="control">
                <button 
                    type="submit"
                    name="accion"
                    value="anulada"
                    class="button is-danger">

                    Anular
                </button>
            </p>

        <?php endif; ?>

            <p class="control">
                <a href="<?= base_url('inicio') ?>" class="button is-light">
                    Cancelar
                </a>
            </p>

        </div>

        </form> 
    </main>
    <?= $this->include('layout/footer') ?>
</body>

<script>
document.getElementById('formNoticia').addEventListener('submit', function(e) {

    let valido = true;

    const titulo = document.getElementById('titulo').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();

    const errorTitulo = document.getElementById('errorTitulo');
    const errorDescripcion = document.getElementById('errorDescripcion');

    // Limpiar errores
    errorTitulo.textContent = '';
    errorDescripcion.textContent = '';

    // =========================
    // VALIDAR TITULO
    // =========================

    if (titulo.length < 5) {

        errorTitulo.textContent =
            'El título debe tener al menos 5 caracteres';

        valido = false;
    }

    if (titulo.length > 100) {

        errorTitulo.textContent =
            'El título no puede superar los 100 caracteres';

        valido = false;
    }

    // =========================
    // VALIDAR DESCRIPCION
    // =========================

    if (descripcion.length < 20) {

        errorDescripcion.textContent =
            'La descripción debe tener al menos 20 caracteres';

        valido = false;
    }

    if (descripcion.length > 1000) {

        errorDescripcion.textContent =
            'La descripción no puede superar los 1000 caracteres';

        valido = false;
    }

    // Evitar envío
    if (!valido) {
        e.preventDefault();
    }

});
</script>