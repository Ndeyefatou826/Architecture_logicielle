<div class="container">
    <h2 class="titre">Les dernières actualités</h2>
    <?php if (isset($articles) && !empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <article>
                <h2><?php echo $article->getTitre(); ?></h2>
                <p><?php echo $article->getContenu(); ?></p>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</div>
