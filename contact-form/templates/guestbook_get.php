<?php
$messages = $data['messages'];
?>
<section>
  <h2>Guest Messages</h2>
  <?php if (empty($messages)): ?>
    <p>No messages yet. Be the first to leave a message</p>
  <?php else: ?>
    <?php foreach ($messages as $message): ?>
      <h3>
        <?=htmlspecialchars($message['name'])?>
      </h3>
      <p>Email: <?=htmlspecialchars($message['email'])?></p>
      <p><?=nl2br(htmlspecialchars($message['message']))?></p>
      <small>Posted on: <?=htmlspecialchars($message['created_at'])?></small>
    <?php endforeach ?>
  <?php endif; ?>
</section>