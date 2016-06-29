<?php

namespace tecnocen\fullcalendar\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Url;

/**
 * @author Angel (Faryshta) Guevara <aguevara@tecnocen.com>
 */
class AjaxFullcalendar extends Fullcalendar
{
    /**
     * @var mixed Property to be passored to the `Url::top()` helper method to
     * created the events feed.
     * ```php
     * 'url' => ['evento/action', 'id' => $id]
     * ```
     */
    public $url;

    /**
     * @var array list of sources to be used as event feed. Each element must
     * contain an 'url' index.
     */
    public $sources;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (isset($this->url) && isset($this->sources)) {
            throw new InvalidConfigException(
                'At least one of `$url` or `$sources` properties must be defined.'
            );
        }

        if (!isset($this->url)) {
            $this->clientOptions['events'] = Url::to($this->url);
        } else {
            foreach ($this->sources as $source) {
                if (!isset($source['url'])) {
                    throw new InvalidConfigException(
                        'Each element in `$source` must contain an "url" index.'
                    );
                }
                $source['url'] = Url::to($source['url']);
                $this->clientOptions['eventSources'][] = $source;
            }
        }
    }
}
