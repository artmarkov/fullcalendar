<?php

namespace tecnocen\fullcalendar\data;

use Date;
use yii\web\JsExpression;

/**
 * Interface to provide the structure for the items in the `dataSource` option
 * for bootstra-year-calendar plugin.
 *
 * @author Angel (Faryshta) Guevara <aguevara@tecnocen.com>
 */
interface EventItem extends \yii\base\Arrayable
{
    /**
     * Gets the `endDate` property of a `dataSource` item.
     *
     * @return string|integer
     */
    public function getCalendarEventId();

    /**
     * Gets the `name` property of the `dataSource` item.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Gets the `startDate` property of a `dataSource` item.
     *
     * @return JsExpression|string containing a js `Date` object
     */
    public function getStart();
}
