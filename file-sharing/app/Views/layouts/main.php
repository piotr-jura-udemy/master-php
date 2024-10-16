<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/">Framework</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Index</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <?php if ($user): ?>
              <li class="nav-item">
                <form action="/logout" method="POST" class="d-flex">
                  <?= csrf_token() ?>
                  <span class="navbar-text me-2">
                    <?= htmlspecialchars($user->email) ?>
                  </span>
                  <button class="btn btn-outline-primary" type="submit">Logout</button>
                </form>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container my-4 flex-grow-1">
    <?= $content ?>
  </main>

  <footer class="bg-light py-3 mt-auto">
    <div class="container text-center">
      <p class="mb-0">&copy; <?=date('Y')?> Framework</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>