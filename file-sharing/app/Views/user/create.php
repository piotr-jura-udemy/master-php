<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Register</h2>

          <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <form action="/register" method="POST">
            <?= csrf_token() ?>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required />
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Your full name</label>
              <input type="text" class="form-control" id="name" name="name" required />
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>

            <div class="mb-3">
              <label for="repeat_password" class="form-label">Repeat password</label>
              <input type="password" class="form-control" id="repeat_password" name="repeat_password" required />
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>

      <div class="mt-4 text-center">
        Already have an account? <a href="/login">Login</a>
      </div>
    </div>
  </div>
</div>