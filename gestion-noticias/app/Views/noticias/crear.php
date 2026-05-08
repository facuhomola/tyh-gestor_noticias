<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

<body style="min-height:100vh; display:flex; flex-direction:column;">
    <?= $this->include('layout/header') ?>
    <main style="flex:1;">
        <section class="section">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6-tablet is-5-desktop">
                        
                        <div class="card">
                            <header class="card-header has-background-primary">
                                <p class="card-header-title">
                                    <span class="icon mr-2">
                                        <i class="fas fa-newspaper"></i>
                                    </span>
                                    Crear Nueva Noticia
                                </p>
                            </header>

                            <div class="card-content">
                                <form action="<?= base_url('guardar') ?>" method="post" id="formNoticia">
                                    
                                    <div class="field">
                                        <label class="label">Título</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" name="titulo" placeholder="Ingrese el título" required minlength="10" maxlength="100" id="titulo">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-heading"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label">Descripción</label>
                                        <div class="control">
                                            <textarea class="textarea" name="descripcion" placeholder="Escribe el contenido de la noticia..." rows="3" required id="descripcion" minlength="50"></textarea>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label">Imagen (URL)</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" name="imagen" placeholder="https://ejemplo.com/imagen.jpg">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-image"></i>
                                            </span>
                                        </div>
                                        <p class="help">Pega el enlace directo a la imagen.</p>
                                    </div>

                                    <hr>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <button type="submit" name="accion" value="publicar" class="button is-primary">
                                                <span class="icon">
                                                    <i class="fas fa-save"></i>
                                                </span>
                                                <span>Lista Para Validar</span>
                                            </button>
                                        </p>
                                        <p class="control">
                                            <button type="submit" name="accion" value="borrador" class="button is-warning">
                                                <span class="icon">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span>Guardar Borrador</span>
                                            </button>
                                        </p>
                                        <p class="control">
                                            <a href="<?= base_url('inicio') ?>" class="button is-light">
                                                Cancelar
                                            </a>
                                        </p>
                                    </div>

                                </form>
                            </div>
                        </div> </div>
                </div>
            </div>
        </section>
    </main>
    <?= $this->include('layout/footer') ?>
</body>

<!-- Script de control del formulario -->
<script>
document.getElementById('formNoticia').addEventListener('submit', function(e){

    let titulo = document.getElementById('titulo').value.trim();
    let descripcion = document.getElementById('descripcion').value.trim();

    let errores = [];

    // Validar título
    if(titulo.length < 10 || titulo.length > 100){
        errores.push('El título debe tener entre 10 y 100 caracteres.');
    }

    // Validar descripción
    if(descripcion.length < 50){
        errores.push('La descripción debe tener mínimo 50 caracteres.');
    }

    // Mostrar errores
    if(errores.length > 0){
        e.preventDefault();
        alert(errores.join('\n'));
    }

});
</script>