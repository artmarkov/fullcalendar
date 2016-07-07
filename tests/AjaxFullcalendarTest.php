<?php
namespace tecnocen\fullcalendar\tests;

use tecnocen\fullcalendar\widgets\AjaxFullcalendar;
use yii\data\ArrayDataProvider;
use yii\web\View;
use Yii;

class AjaxFullcalendarTest extends TestCase
{
    public function testAjaxWidget()
    {
        $expected = <<<'HTML'
<div id="active-calendar"></div>
HTML;
        $this->assertEquals($expected, AjaxFullcalendar::widget([
            'options' => ['id' => 'active-calendar'],
            'url' => 'evento/action'
        ]));
        

        $expected = <<<'JS'
jQuery('#active-calendar').fullCalendar(
    {
        "events":true,
        "lang":"en-us"
    }
);
JS;
    $expected = preg_replace('/\n\s*/', '', $expected);
        $this->assertEquals(
            $expected,
            end(Yii::$app->view->js[View::POS_READY])
        );
    }
    /**
     * @expectedExceptionCode InvalidConfigException
     */
    public function testException()
    {
    }
}