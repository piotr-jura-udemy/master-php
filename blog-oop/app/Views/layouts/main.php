<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="/style.css" />
</head>

<body>
  <header>
    <h1>My Blog</h1>
  </header>
  <nav>
    <a href="/">Home</a>
    <a href="/posts">Posts</a>
  </nav>
  <main>
    <?= $content ?>
  </main>

  <footer>
    <p>&copy; <?=date('Y')?> My Blog</p>
  </footer>
</body>
</html>