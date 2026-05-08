<!-- Importar Bulma desde CDN (Si no lo tienes en tu Header) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
<?= $this->include('layout/header') ?>

<section class="section">
    <div class="container">
        
        <!-- Encabezado de Bienvenida -->
        <div class="box has-background-primary-light">
            <h2 class="title is-3 has-text-primary-dark">Panel de Administrador</h2>
            <p class="subtitle is-5">
                Bienvenido, <strong><?= session()->get('nombre') ?></strong>
            </p>
        </div>

        <hr>

        <div class="columns is-multiline">
            <!-- Botón Crear -->
            <div class="column is-4">
                <a href="<?= base_url('usuarios/crear') ?>" class="button is-link is-fullwidth is-large">
                    <span>➕ Crear nuevo usuario</span>
                </a>
            </div>

            <!-- Botón Listar -->
            <div class="column is-4">
                <a href="<?= base_url('usuarios') ?>" class="button is-info is-fullwidth is-large">
                    <span>📋 Listar usuarios</span>
                </a>
            </div>

            <!-- Botón Cerrar Sesión -->
            <div class="column is-4">
                <a href="<?= base_url('admin/logout') ?>" class="button is-danger is-outlined is-fullwidth is-large">
                    <span>🚪 Cerrar sesión</span>
                </a>
            </div>
        </div>

        <!-- Información Adicional con estilo de Mensaje -->
        <div class="message is-dark mt-5">
            <div class="message-body">
                <p>
                    <strong>Nota:</strong> Para 
                    <span class="tag is-warning is-light">✏️ Editar</span> o 
                    <span class="tag is-danger is-light">❌ Eliminar</span> 
                    usuarios, por favor selecciónalos directamente desde el 
                    <a href="<?= base_url('usuarios') ?>"><strong>Listado General</strong></a>.
                </p>
            </div>
        </div>

    </div>
</section>