<?php

namespace tecnocen\fullcalendar\tests\data;

use yii\web\JsExpression;

class DataItem extends \yii\base\Model
    implements \tecnocen\fullcalendar\data\EventItem
{
    private $name;
    private $startDate;
    private $endDate;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function setStartDate($date)
    {
        $this->startDate = new JsExpression("new Date('$date')");
    }
    public function getEndDate()
    {
        return $this->endDate;
    }
    public function setEndDate($date)
    {
        $this->endDate = new JsExpression("new Date('$date')");
    }

    public function getCalendarEventId()
    {
        return "uno";
    }
    public function getTitle()
    {
        return "Conference";
    }
    public function getStart()
    {
        return new JsExpression("new Date('2016-02-03')");
    }
}
