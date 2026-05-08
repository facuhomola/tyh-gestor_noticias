<div class="has-text-centered has-background-dark py-4">
    <h3 class="title is-3 has-text-white" style="font-family: sans-serif;">
        Sistema de Gestión de Noticias
    </h3>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->getFlashdata('success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: '<?= session()->getFlashdata('success') ?>',
    confirmButtonText: 'Aceptar'
});
</script>
<?php endif; ?>