<?php foreach($posts as $post): ?>
  <article>
    <h3>
      <a href="/posts/<?= $post->id ?>">
        <?= htmlspecialchars($post->title) ?>
      </a>
    </h3>
    <p>
      <?= htmlspecialchars(substr($post->content, 0, 150)) ?>...
    </p>
  </article>
<?php endforeach; ?>