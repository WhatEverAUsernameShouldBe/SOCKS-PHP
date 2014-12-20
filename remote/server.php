<?php
#an instance of server.php maintains the connection to the target host and relay traffic between the cient and the target host
#each instance of server.php corresponds to a single connection and share the life time with the connection
#server.php should not connect directly to the client, instead they communicate via instances of sender.php and receiver.php
#instance of server.php wait instances of receiver.php to retreive information sent to the client, and instances of sender.php to tell it what should be sent to the target host
?>
