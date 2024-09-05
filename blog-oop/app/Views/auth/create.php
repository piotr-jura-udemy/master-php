<h2>Login</h2>

<?php if (isset($error)): ?>
  <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form action="/login" method="POST">
  <!-- CSRF -->
  <div>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required />
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />
  </div>
  <!-- Remember me feature -->
  <div>
    <button type="submit">Login</button>
  </div>
</form>