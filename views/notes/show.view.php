<?php require view('partials/head.php') ?>
<?php require view('partials/nav.php') ?>
<?php require view('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h4 class="text-4xl font-medium mb-4"><?= $note['title'] ?></h4>
        <p><?= $note['body'] ?></p>
    </div>
</main>

<?php require view('partials/foot.php');
