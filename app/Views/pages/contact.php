<?= $this->extend('/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class= "col">
            <h1>Hubungi Kami : </h1>
            <?php foreach ($nama as $contact) : ?>
                <h3 class="h3"><?= $contact['hubungi'] ?></h3>
                <p>
                    <hr>
            </p>
            <P  class="lead"><?= $contact['alamat'] ?></p>
            <P  class="lead"><?= $contact['desa'] ?></p>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>