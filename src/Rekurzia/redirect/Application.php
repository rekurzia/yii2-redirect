<?php
/**
 * @link https://github.com/rekurzia/yii2-redirect
 * @copyright Copyright (c) 2016 Vladimír Kriška
 * @license MIT
 */

namespace Rekurzia\redirect;

use Yii;
use yii\helpers\Url;

class Application extends \yii\web\Application
{
    /**
     * @var array of request URLs and corresponding routes.
     * For example:
     * ~~~
     * [
     *     'some/route' => ['/site/index'],
     *     'another/route' => ['/site/index', 'page' => 'another'],
     *     'some/route?a=b&c=d' => ['/site/index', 'page' => 'abcd'],
     *     'outside/route' => 'http://127.0.0.1',
     * ]
     * ~~~
     */
    public $redirectRoutes = [];


    /**
     * @param \yii\web\Request $request
     * @return \yii\web\Response
     */
    public function handleRequest($request)
    {
        return $this->handleRedirectRequest($request) ?: parent::handleRequest($request);
    }

    /**
     * @param \yii\web\Request $request
     * @return \yii\web\Response|null
     */
    protected function handleRedirectRequest($request)
    {
        $key = ltrim(str_replace($request->getBaseUrl(), '', $request->getUrl()), '/');
        if (array_key_exists($key, $this->redirectRoutes)) {
            return $this->getResponse()->redirect(Url::to($this->redirectRoutes[$key]));
        } else {
            return null;
        }
    }
}
