<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">
          <h1 class="card-title mb-0">Oops! Something went wrong!</h1>
        </div>
        <div class="card-body">
          <p class="lead"><?= htmlspecialchars($errorMessage) ?></p>
          
          <?php if ($isDebug): ?>
            <div class="mt-4">
              <h2 class="h4">Stack Trace:</h2>
              <pre class="bg-light p-3 rounded"><code><?= htmlspecialchars($trace) ?></code></pre>
            </div>
          <?php endif; ?>

          <div class="mt-4">
            <a href="/" class="btn btn-primary">Return to homepage</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>