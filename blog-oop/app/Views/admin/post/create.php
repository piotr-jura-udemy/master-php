<h2>Create New Post</h2>

<form action="/admin/posts" method="POST">
  <?= csrf_token() ?>
  <div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" required />
  </div>
  <div>
    <label for="content">Content</label>
    <textarea id="content" name="content" required></textarea>
  </div>
  <button type="submit">Create Post</button>
</form>