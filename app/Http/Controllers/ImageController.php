<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

/**
 * リッチメッセージの画像生成コントローラー
 *
 * @author Rina Nagano
 */
class ImageController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * カフェ画像を生成して返す.
     */
    public function index($image_dir, $image_name, $cafe_name, $image_width)
    {
        $base_image_width  = $image_width;
        $base_image_height = $image_width;
        $cafe_image_width  = $image_width / 1.5;
        $cafe_image_height = $image_width / 1.5;

        // カフェの写真からImage生成
        $cafe_image = Image::make($this->getImageUrl($base_image_width, $base_image_height, $image_dir, $image_name));
        $cafe_image->resize($cafe_image_width, $cafe_image_height);

        // ベース画像生成
        $base_image = Image::canvas($base_image_width, $base_image_height, '#ffffff');

        // ベース画像にカフェ画像を貼り付け
        $base_image->insert($cafe_image, 'top', 0, 50);

        // ベース画像のカフェ画像の下にカフェの名前を記載
        $base_image->text($cafe_name, $base_image_width / 2, $cafe_image_height + 70, function ($font) {
            $font->file(5);
            $font->size(100);
            $font->color('#000000');
            $font->align('center');
        });

        // ベース画像の右上にCafeSnapロゴを入れる
        $cafesnap_logo_image = Image::make('http://******/logo.jpg');
        $cafesnap_logo_image->resize($base_image_width / 7, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $base_image->insert($cafesnap_logo_image, 'top-right', 10, 10);

        // フッター部のImageを生成してベース画像に貼り付け
        $footer_image = Image::canvas($base_image_width, 100, '#000000');
        $footer_image->text('more', $base_image_width / 2, 50, function ($font) {
            $font->file(5);
            $font->size(100);
            $font->color('#ffffff');
            $font->align('center');
        });
        $base_image->insert($footer_image, 'bottom');

        return $base_image->response();
    }

    /**
     * 画像の取得元URLを生成.
     */
    private function getImageUrl($image_width, $image_height, $image_dir, $image_name)
    {
        return 'https://******/' . $image_width . '/' . $image_height . '/******/' . $image_dir . '/' . $image_name . '.jpg';
    }
}
