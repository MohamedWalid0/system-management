<?php

require __DIR__ . '/vendor/autoload.php';



// Change the following with your app details:

// Create your own pusher account @ https://app.pusher.com



$options = array(
  'cluster' => 'mt1',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  'e3bb1da5483d46c37858',
  'ddc4e2e25bac0b966655',
  '1059349',
  $options
);


// Check the receive message

if(isset($_POST['message']) && !empty($_POST['message'])) {

  $data = $_POST['message'];

// Return the received message

if($pusher->trigger('test_channel', 'my_event', $data)) {

echo 'success';

} else {

echo 'error';

}

}
