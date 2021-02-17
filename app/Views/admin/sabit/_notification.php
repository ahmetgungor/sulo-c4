<?php if (session()->has('success')) : ?>
    <div class="alert alert-success success">
        <?= session('success') ?>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger error">
        <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <ul class="alert alert-danger error">
    <?php foreach (session('errors') as $error) : ?>
        <li><?= $error ?></li>
    <?php endforeach ?>
    </ul>
<?php endif ?>