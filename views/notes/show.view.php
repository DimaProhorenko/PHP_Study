<?php require view('partials/head.php') ?>
<?php require view('partials/nav.php') ?>
<?php require view('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h4 class="text-4xl font-medium mb-4"><?= $note['title'] ?></h4>
        <p><?= $note['body'] ?></p>

        <div class="flex gap-4 items-center mt-6">
            <form action="" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                <button class="bg-red-500 px-4 py-2 text-white rounded-full hover:bg-red-700 transition-colors">Delete</button>
            </form>
            <a href="/note/edit?id=<?= $note['id'] ?>" class="block px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-700">Edit</a>
        </div>
    </div>
</main>

<?php require view('partials/foot.php');
