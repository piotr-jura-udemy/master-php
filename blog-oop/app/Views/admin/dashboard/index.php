<h2>Overview</h2>

<section>
  <h3>Stats</h3>
  <p>Total Posts: <?= $totalPosts ?></p>
  <p>Total Comments: <?= $totalComments ?></p>
</section>

<section>
  <h3>Recent Posts</h3>
  <ul>
    <?php foreach ($recentPosts as $post): ?>
      <li>
        <a href="/posts/<?= $post->id ?>">
          <?= htmlspecialchars($post->title) ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</section>

<section>
  <h3>Recent Comments</h3>
  <ul>
    <?php foreach ($recentComments as $comment): ?>
      <li>
        <a href="/posts/<?= $comment->post_id ?>">
          <?= htmlspecialchars(substr($comment->content, 0, 50)) ?>...
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</section>