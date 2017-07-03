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
    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        if ($request->get('user_name') != 'slackbot') {
            return json_encode(['text' => 'https://blog-001.west.edge.storage-yahoo.jp/res/blog-61-e0/xl1200rgoidea/folder/472282/50/8578650/img_26?1363606034']);
        }

        return '';
    }
}
