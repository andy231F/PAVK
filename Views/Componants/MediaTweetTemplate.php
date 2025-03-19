<article>
    <div class=" mt-2">
        <?php for ($img = 1; $img <= 4; $img++): ?>
            <?php if ($tweet["media{$img}"] != NULL): ?>
                <div><img src="../<?= $tweet["media{$img}"] ?>" alt="#" class="rounded-3xl p-2 "></div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</article>