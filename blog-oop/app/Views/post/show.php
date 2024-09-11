<article>
  <h1><?= htmlspecialchars($post->title) ?></h1>
  <p>Views: <?= $post->views ?></p>
  <p>
    <?= nl2br(htmlspecialchars($post->content)) ?>
  </p>
</article>

<section>
  <h2 id="comments">Comments</h2>

  <?php if($user && check('comment')): ?>
    <form action="/posts/<?= $post->id ?>/comments" method="POST">
      <?= csrf_token() ?>
      <textarea name="content" required rows="3"></textarea>
      <button type="submit">Add Comment</button>
    </form>
  <?php else: ?>
    <p>
      <a href="/login">Login to comment.</a>
    </p>
  <?php endif ?>

  <?php foreach($comments as $comment): ?>
    <div>
      <p>
        <?= nl2br(htmlspecialchars($comment->content)) ?>
      </p>
      <small>Posted on: <?= $comment->created_at ?></small>
    </div>
  <?php endforeach ?>
</section>