<?php


require_once 'vendor/autoload.php';


use Telegram\Bot\Api;

$telegram = new Api('985279648:AAEzgT2VtqEVt8rkV3oT5qQnyblPP_piqMU');



$response = $telegram->getMe();
$botId = $response->getId();
$firstName = $response->getFirstName();
$username = $response->getUsername();


$keyboard = [
    ['7', '8', '9'],
    ['4', '5', '6'],
    ['1', '2', '3'],
    ['0'],
    ['a', 'b', 'c']
];

$reply_markup = $telegram->replyKeyboardMarkup([
    'keyboard' => $keyboard,
    'resize_keyboard' => true,
    'one_time_keyboard' => true
]);

$response = $telegram->sendMessage([
    'chat_id' => 124165625,
    'text' => 'Hello World',
    'reply_markup' => $reply_markup
]);





//Отправка
//$telegram->sendMessage([ 'chat_id' => 124165625, 'text' => 'test' ]);




$response = $telegram->getUpdates();


// echo '<pre>';
// print_r($response);
// echo '</pre>';
foreach ($response as $val) {

    //echo '<pre>';
    //print_r($val->getMessage());
    //echo '</pre>';

    echo $val->getMessage()->getText();
    echo '  ID чата -' . $val->getMessage()->getChat()->getId();
    //$val->getMessage()->;
    echo '<br>';
    //echo $val->getMessage()->getContact()->getUserId();
    echo '<hr>';
}
