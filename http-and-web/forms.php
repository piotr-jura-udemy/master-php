<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    echo "The email $email was submitted!";
    die;
}
?>
<html>
<body>
  <h1>Please submit the form</h1>
  <form method="POST">
    <label>Email:</label>
    <input type="email" name="email" />
    <button>Submit</button>
  </form>
</body>
</html>
