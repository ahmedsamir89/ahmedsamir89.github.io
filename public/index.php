<?php
require __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;


$messageHandler = new \Tests\Model\MessageHandler('2123123123', ['asdsdasdad'], 'sdfs,mdbfakjsdhakjhdkjahdkahdakjshdkajshdkajhdkashdkajshdakshdakjhdkashdkajshdaksjhakdhaskdhsmnbfmsbfmsbfmsbfmsbfmsbfmsdbfmsdbfmsbfmsbfmsdbfmsdbfmsdbfmsbfmsbfmsdbfmsdbfmsbfmsdfbmnsdbfmdfbsm');

foreach ($messageHandler->getMessages() as $message) {
    dump(unserialize(serialize($message)));
}
exit;