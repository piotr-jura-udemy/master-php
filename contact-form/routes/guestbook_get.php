<?php
$messages = getMessages(connectDb());
// throw new RuntimeException('Whooops!');
// echo $hey;
renderView(
  template: 'guestbook_get', 
  data: ['messages' => $messages]
);