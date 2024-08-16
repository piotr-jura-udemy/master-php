<section>
  <h2>Leave a Public Note/Question</h2>
  <form method="POST">
    <!-- CSRF -->
    <input type="hidden" name="csrfToken" value="<?=$data['csrfToken']?>" />
    <label>Name</label>
    <input type="text" name="name" />
    <label>Email</label>
    <input type="text" name="email" />
    <label>Message</label>
    <textarea rows="4" name="message"></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>