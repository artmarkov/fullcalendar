<?php

namespace tecnocen\fullcalendar\tests\data;

use yii\web\JsExpression;

class DataItem extends \yii\base\Model
    implements \tecnocen\fullcalendar\data\EventItem
{
    private $id;
    private $title;
    private $start;

    public function getCalendarEventId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getStart()
    {
        return $this->start;
    }
    public function setStart($date)
    {
        $this->start = new JsExpression("new Date('$date')");
    }
}
