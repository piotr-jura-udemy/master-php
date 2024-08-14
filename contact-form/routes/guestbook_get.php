<?php
$messages = getMessages(connectDb());
renderView(
  template: 'guestbook_get', 
  data: ['messages' => $messages]
);