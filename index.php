<?php

require_once "vendor/autoload.php";

$remoteRedis = [
    'host' => 'redis',
    'port' => 6379,
    'read_write_timeout' => 0
];

$redis = new \Predis\Client($remoteRedis);


$loop = $redis->pubSubLoop();
$loop->subscribe("canal_exemplo");

foreach($loop as $message) {

    switch ($message->kind) {
        case "subscribe":
            echo "Acabei de me inscrever no canal: {$message->channel}\n";
            break;
        case "message":
            echo "Mesagem recebida do canal {$message->channel}: {$message->payload}\n";
            if ($message->payload == "exit") {
                echo "Saindo do canal {$message->channel}";
                $loop->unsubscribe();
            }
            break;
    }
}

unset($loop);