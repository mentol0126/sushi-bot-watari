<?php
/**
 * Created by PhpStorm.
 * User: satouyasuhito
 * Date: 2017/07/03
 * Time: 20:21
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SushiController
 * @package App\Http\Controllers
 */
class SushiController extends Controller
{
    const TUNA = 0;     // マグロ
    const SALMON = 1;   // サーモン
    const SERIOLA = 2;  // ハマチ（らしい）

    const SUSHI_LIST = [
        self::TUNA => 'マグロ',
        self::SALMON => 'サーモン',
        self::SERIOLA => 'ハマチ',
    ];



    /**
     * @param Request $request
     * @return string|null
     */
    public function index(Request $request)
    {
        // TODO:APIちゃんと返るんかテストも含めてるので全体的に雑、後でリファクタリング
        if ('slackbot' === $request->get('user_name')) {
            // 投げられてくるPOSTには、slackbot自身のものも含まれるため
            // リターンしないと無限ループに入る
            return null;
        }

        $text = $request->get('text');
        $sushi_neta = explode(' ', $text)[1];   // こことかひどい

        // TODO:とりあえずべたに返してる. 後々JSONとか
        // TODO:画像はCDNに置いた無料素材使おうか
        // TODO:数増やそう
        $res_text = '';
        switch ($sushi_neta) {
            case self::SUSHI_LIST[self::TUNA]:
                $res_text = 'https://blog-001.west.edge.storage-yahoo.jp/res/blog-61-e0/xl1200rgoidea/folder/472282/50/8578650/img_26?1363606034';
                break;
            case self::SUSHI_LIST[self::SALMON]:
                $res_text = 'http://itamae.co.jp/images/salmon/rare_salmon.jpg';
                break;
            case self::SUSHI_LIST[self::SERIOLA]:
                $res_text = 'http://cdn.amanaimages.com/preview640/11012020150.jpg';
                break;
            case 'メニュー':
                $res_text = implode(', ', self::SUSHI_LIST);
                break;
        }

        return json_encode(['text' => $res_text]);
    }
}
