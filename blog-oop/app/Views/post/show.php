<article>
  <h1><?= htmlspecialchars($post->title) ?></h1>
  <p>Views: <?= $post->views ?></p>
  <p>
    <?= nl2br(htmlspecialchars($post->content)) ?>
  </p>
</article>

<section>
  <h2>Comments</h2>
  <?php foreach($comments as $comment): ?>
    <div>
      <p>
        <?= nl2br(htmlspecialchars($comment->content)) ?>
      </p>
      <small>Posted on: <?= $comment->created_at ?></small>
    </div>
  <?php endforeach ?>
</section>