<?php
namespace tecnocen\fullcalendar\assets;

use yii\web\AssetBundle;

/**
 * @author Angel Guevara <angeldelcaos@gmail.com>
 */
class Fullcalendar extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/fullcalendar/dist';
    /**
     * @inheritdoc
     */
    public $js = ['fullcalendar.js'];
    /**
     * @inheritdoc
     */
    public $css = ['fullcalendar.css'];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\\web\\JqueryAsset',
        'omnilight\\assets\\MomentAsset',
    ];
}
