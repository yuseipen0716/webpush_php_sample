<?php
require_once 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

const VAPID_SUBJECT = 'http://localhost:8080';
const PUBLIC_KEY = '生成した公開鍵を入力';
const PRIVATE_KEY = '生成した秘密鍵を入力';

// push通知認証用のデータ
// 1はandroid 2はPC
$subscription1 = Subscription::create([
    'endpoint' => 'requestで生成されたendpointの値を入力',
    'publicKey' => 'requestで生成されたuserPublicKeyの値を入力',
    'authToken' => 'requestで生成されたuserAuthTokenの値を入力',
]);
// 個別ユーザーへの通知を試すためにsubscriptionもう一つベタ書きしています。
$subscription2 = Subscription::create([
    'endpoint' => 'requestで生成されたendpointの値を入力',
    'publicKey' => 'requestで生成されたuserPublicKeyの値を入力',
    'authToken' => 'requestで生成されたuserAuthTokenの値を入力',
]);


// ブラウザに認証させる
$auth = [
    'VAPID' => [
        'subject' => VAPID_SUBJECT,
        'publicKey' => PUBLIC_KEY,
        'privateKey' => PRIVATE_KEY,
    ]
];


$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    $subscription1,
    'push通知の本文だよ!!'
);

$endpoint = $report->getRequest()->getUri()->__toString();

if ($report->isSuccess()) {
    echo '送信成功！';
} else {
    echo '送信失敗...';
}
// 2端末目の通知確認のコード、ベタ書きしてあります。
$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    $subscription2,
    'push通知の本文だよ!!'
);

$endpoint = $report->getRequest()->getUri()->__toString();

if ($report->isSuccess()) {
    echo '送信成功！';
} else {
    echo '送信失敗...';
}
