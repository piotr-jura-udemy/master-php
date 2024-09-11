<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/style.css" />
</head>

<body>
  <header>
    <h1>Dashboard</h1>
  </header>
  <nav>
    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/posts">Manage Posts</a>
    <form action="/logout" method="POST">
      <?= csrf_token() ?>
      <button>Logout (<?= $user->email ?>)</button>
    </form>
  </nav>
  <main>
    <?= $content ?>
  </main>

  <footer>
    <p>&copy; <?=date('Y')?> My Blog - Admin Panel</p>
  </footer>
</body>
</html>