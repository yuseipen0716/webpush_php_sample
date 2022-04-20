## Web Push Demo

PHPのweb-pushライブラリ([web-push-libs](https://github.com/web-push-libs/web-push-php))を使用したpush通知を送るためのサンプル。

- 公開鍵と秘密鍵のペアを取得し、所定の箇所へ入力
- `php -S localhost:8080`
- localhost:8080にアクセスし、push通知を許可する
- devtoolsのconsoleにendpoint等の情報が出力される
- 必要な情報が全て揃えば、`php SendPush.php`で通知を送るphpファイルを実行

> [こちら](https://zenn.dev/nnahito/articles/fd2c8b0ad0d19a) を参考にさせていただきました。
