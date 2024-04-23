<?php require view('partials/head.php') ?>
<?php require view('partials/nav.php') ?>
<?php require view('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h4 class="text-4xl font-medium mb-4"><?= $note['title'] ?></h4>
        <p><?= $note['body'] ?></p>

        <form action="" method="POST" class="mt-6">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
            <button class="bg-red-500 px-4 py-2 text-white rounded-full hover:bg-red-400 transition-colors">Delete</button>
        </form>
    </div>
</main>

<?php require view('partials/foot.php');
