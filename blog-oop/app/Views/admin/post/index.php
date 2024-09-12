<h2>Manage Posts</h2>

<a href="/admin/posts/create">Create New Post</a>

<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Created at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($posts as $post): ?>
      <tr>
        <td><?= htmlspecialchars($post->title) ?></td>
        <td><?= $post->created_at ?></td>
        <td>
          <a href="/admin/posts/<?= $post->id ?>/edit">Edit</a>
          <form action="/admin/posts/<?= $post->id ?>/delete" method="POST">
            <?= csrf_token() ?>
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>