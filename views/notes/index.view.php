<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul class="mb-6">
            <?php foreach ($notes as $note) : ?>
                <li class="">
                    <h4 class="text-xl font-medium mb-1">
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= $note['title'] ?>
                        </a>
                    </h4>
                </li>
            <?php endforeach ?>
        </ul>
        <a href="/notes/create" class="d-block px-3 py-2 bg-blue-700 text-white rounded-full hover:bg-blue-500 transition-colors">Create a note</a>
    </div>
</main>

<?php require('views/partials/foot.php');
