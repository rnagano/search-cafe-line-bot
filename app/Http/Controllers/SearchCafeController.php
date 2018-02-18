<?php

namespace App\Http\Controllers;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\GuzzleHTTPClient;
use LINE\LINEBot\Message\RichMessage\Markup;
use Request;

/**
 * カフェ検索コントローラー
 *
 * @author Rina Nagano
 */
class SearchCafeController extends Controller
{
    private $line_bot = null;

    /**
     * Constructor.
     */
    public function __construct()
    {
        // LINE BOTチャネル設定
        $bot_channel_config = [
            'channelId'     => '******',
            'channelSecret' => '******',
            'channelMid'    => '******',
        ];

        $this->line_bot = new LINEBot($bot_channel_config, new GuzzleHTTPClient($bot_channel_config));
    }

    /**
     * カフェを検索してメッセージを返す
     */
    public function index()
    {
        $request = Request::all();

        // ポストされたデータからユーザーが入力したメッセージを抽出
        $search_text = $request['result'][0]['content']['text'];
        if (preg_match("/^MORE/", $search_text)) {
            $search_text = explode(" ", $search_text)[1];
        }

        // 受信したテキストでカフェを検索
        $cafe = $this->getCafe($search_text);

        // リッチメッセージの背景画像取得用URLを生成
        $rich_message_image_url = $this->getRichMessageImage($cafe["images"][0])["path"], $cafe["name"]);

        // リッチメッセージを生成
        $rich_message_markup = (new Markup(1040))
            // リッチメッセージの白背景部分がタップされた時は、カフェのHPを開く
            ->setAction('OpenCafePage', 'opencafepage', 'https://cafesnap.me/c/' . $cafe["id"])
            ->addListener('OpenCafePage', 0, 0, 1040, 840)
            // リッチメッセージの黒背景部分がタップされた時は、ユーザーに'MORE 入力メッセージ'というメッセージを送信させる
            ->setAction('SearchMoreCafe', 'MORE ' . $search_text, 'https://cafesnap.me', 'sendMessage')
            ->addListener('SearchMoreCafe', 0, 840, 1040, 1040);

        // テキストメッセージを生成
        $send_message = $search_text . "%E3%81%AE%E3%82%AA%E3%82%B9%E3%82%B9%E3%83%A1%E3%82%AB%E3%83%95%E3%82%A7%E3%81%A7%E3%81%99%E2%99%AA";

        // リッチメッセージを送信
        $this->line_bot->sendRichMessage($request['result'][0]['content']['from'], $rich_message_image_url, "おすすめカフェ", $rich_message_markup);
        // テキストメッセージを送信
        $this->line_bot->sendText($request['result'][0]['content']['from'], urldecode($send_message));
    }

    /**
     * CafeSnap APIの店舗検索を使ってカフェを検索し、カフェを1つ返す
     */
    private function getCafe($search_text)
    {
        // 若干無理やり。。
        $cafes_json = file_get_contents("https://******?q=" . $search_text);
        $cafes_array = json_decode(mb_convert_encoding($cafes_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'), true);

        // 複数カフェの中から若干ランダムに1つ選んで返す(雑だけど一旦。。)
        return $cafes_array["records"][mt_rand(0, 9)];
    }

    /**
     * リッチメッセージの背景画像取得用URLを生成
     * (※実際は、このアプリのImageControllerへアクセスするためのURLとなる)
     */
    private function getRichMessageImage($image_url, $cafe_name)
    {
        // ここも若干無理やり。。
        $image_url_parts = explode("/", parse_url($image_url);
        $rich_message_image_url = 'https://******/search-cafe-line-bot/' . $image_url_parts[6] . '/' . explode(".", $image_url_parts[7])[0] . '/' . urlencode($cafe_name);

        return $rich_message_image_url;
    }
}
