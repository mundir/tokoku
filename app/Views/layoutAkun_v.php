<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
    <?php foreach ($akuns as $akun) : ?>
        <a href="<?= base_url($akun['link']); ?>" class="dropdown-item notify-item">
            <i class="<?= $akun['icon']; ?>"></i> <span><?= $akun['label']; ?></span>
        </a>
    <?php endforeach ?>

</div>