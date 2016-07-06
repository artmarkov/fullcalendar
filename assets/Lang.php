<?php
namespace tecnocen\fullcalendar\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Angel Guevara <angeldelcaos@gmail.com>
 */
class Lang extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/fullcalendar/dist/lang/';
    /**
     * @var boolean whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;

    /**
     * @var string language to register translation file for
     */
    public $lang;

    /**
     * @inheritdoc
     */

    public $depends = ['tecnocen\fullcalendar\assets\Fullcalendar'];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        if ($this->autoGenerate && $this->lang != 'en') {
            if (!file_exists(Yii::getAlias(
                $this->sourcePath . "/{$this->lang}.js"
            ))) {
                $this->lang = substr($this->lang, 0, 2);
                return parent::registerAssetFiles($view);
            }
            $this->js[] = $this->lang . '.js';
        }
        parent::registerAssetFiles($view);
    }
}
