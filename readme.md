# search-cafe-line-bot
オススメカフェを教えてくれるLINE BOTです。

## 説明
2016年の[開発合宿](http://allabout-tech.hatenablog.com/entry/2016/07/22/094600)で、2日間で作ったアプリです。  
当時弊社のサービスだったCafeアプリのAPIを使ってカフェを検索します。

+ app/Http/Controllers/SearchCafeController.php
    + ユーザーからのメッセージを受け取ってカフェを検索し、メッセージを返信。
+ app/Http/Controllers/ImageController.php
    + リッチメッセージの背景画像を生成。

※動かすことを優先しているので、突貫で作っています。。  
※ソースの一部をマスキングしてあります。

## デモ
![demo_s](https://user-images.githubusercontent.com/1589431/36348880-9ca1dc5c-14bc-11e8-8484-e235a552ee98.png)

## フレームワーク等
+ Laravel 5.0
+ line-bot-sdk-php
    + BOTのメッセージ送信全般の実装が楽になる。特にリッチメッセージのマークアップ部分。
+ Intervention Image
    + 画像の生成・加工が簡単に行えるライブラリ。今回はリッチメッセージ全体画像の生成に利用。

## その他
LINE BOTでのリッチメッセージの実装についてQiitaで解説しました！

+ [LINE BOT API + Laravel5(PHP)でのリッチメッセージ送信方法](https://qiita.com/naga1460/items/f31a57ed015d25694084)

