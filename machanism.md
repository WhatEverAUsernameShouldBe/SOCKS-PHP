#General
This project is a SOCKS proxy. It can be deployed on a PHP hosting service that has socket operation enabled.
#How it works
This project constitutes of two parts, the local side and the remote side. The local side runs unrestricted on a computer, while the remote side runs on a restrictive PHP hosting service. However, details are hidden from outside and the whole thing should work like an ordinary SOCKS proxy.
##Local side
The local side provides a SOCKS proxy service at the local computer. it simply translate and relay between the client and the real proxy server, which exactly, is the remote side.
##Remote side
It directly manages all connections to target hosts and do the real proxy stuff.
##Communication protocol between local and remote side
All communication is done in HTTP/HTTPS requests and answers. Each time the client want to start a connection, the local side should request server.php, in order to start a new instance of server.php to create and maintain a connection to the target host. After that, no direct communication can be made between the instance of server.php and the local side. Therefore, the local side should request messenger.php with appropriate directions and that instance of messenger.php will do the rest for the local side. Because instances of server.php can't actively communicate with the local side, the local side should be responsible for always keeping an instance of messenger.php waiting to receive data from each instance of server.php.
##server.php
- an instance of server.php maintains the connection to the target host and relay traffic between the cient and the target host
- each instance of server.php corresponds to a single connection and share the life time with the connection
- server.php should not connect directly to the client, instead they communicate via instances of sender.php and receiver.php
- instance of server.php wait instances of receiver.php to retreive information sent to the client, and instances of sender.php to tell it what should be sent to the target host
