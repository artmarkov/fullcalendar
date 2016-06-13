<?php

namespace tecnocen\fullcalendar\widgets;

use tecnocen\fullcalendar\assets\Language as LanguageAsset;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * @author Angel (Faryshta) Guevara <aguevara@tecnocen.com>
 */
class Fullcalendar extends \yii\base\Widget
{
    /**
     * @var string the locale ID (e.g. 'fr', 'de', 'en-GB') for the language to
     * be used by the date picker. If this property is empty, then the current
     * application language will be used.
     */
    public $language;

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var array the options for the underlying Bootstrap JS plugin.
     * Please refer to http://fullcalendar.io Web page for possible options.
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying Bootstrap JS plugin.
     * Please refer to http://fullcalendar.io Web page for possible events.
     */
    public $clientEvents = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();
        $id = $this->options['id'];
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $js = "jQuery('#$id').$name($options);";
            $view->registerJs($js);
        }
        $this->registerClientEvents();
    }

    /**
     * Registers JS event handlers that are listed in [[clientEvents]].
     * @since 2.0.2
     */
    protected function registerClientEvents()
    {
        if (!empty($this->clientEvents)) {
            $id = $this->options['id'];
            $js = '';
            foreach ($this->clientEvents as $event => $handler) {
                $js .= "jQuery('#$id').on('$event', $handler);";
            }
            $this->getView()->registerJs($js);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $language = $this->language
            ? $this->language
            : strtolower(Yii::$app->language);

        $assetBundle = LanguageAsset::register($this->getView());
        $assetBundle->language = $language;
        $this->clientOptions['language'] = $language;

        $this->registerPlugin('fullCalendar');
        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        return Html::tag($tag, '', $this->options);
    }
}
