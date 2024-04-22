<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div class="p-4 bg-white max-w-md space-y-4 rounded-lg shadow-md">
                <div>
                    <label for="title" class="block mb-1 font-medium">Title</label>
                    <input type="text" id="title" name="title" value="<?= $_POST['title'] ?? '' ?>" required class="w-full outline-none border border-stone-300 bg-transparent rounded-md px-2 py-1">
                    <?php if (isset($errors['title'])) : ?>
                        <small class="text-red-500 my-2 block text-xs"><?= $errors['title'] ?></small>
                    <?php endif ?>
                </div>
                <div>
                    <label for="body" class="block mb-1 font-medium">Note text</label>
                    <textarea type="text" id="body" name="body" required class="w-full min-h-24 outline-none border border-stone-300 bg-transparent rounded-md px-2 py-1"><?= $_POST['body'] ?? '' ?></textarea>
                    <?php if (isset($errors['body'])) : ?>
                        <small class="text-red-500 my-2 block text-xs"><?= $errors['body'] ?></small>
                    <?php endif ?>
                </div>
                <button type="submit" class="block px-4 py-1 bg-blue-700 text-white hover:bg-blue-500 transition-colors rounded-full">Create</button>
            </div>
        </form>
    </div>
</main>

<?php require('views/partials/foot.php');
