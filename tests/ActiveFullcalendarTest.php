<?php
namespace tecnocen\fullcalendar\tests;

use tecnocen\fullcalendar\widgets\ActiveFullcalendar;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\View;
use tecnocen\fullcalendar\tests\TestCase;

/**
 * Test the functionality for the bootstrap-year-calendar plugin active widget.
 */
class ActiveFullcalendarTest extends TestCase
{
    public function testDataWidget()
    {
        $expected = <<<'HTML'
<div id="active-calendar"></div>
HTML;

        $this->assertEquals($expected, ActiveFullcalendar::widget([
            'options' => ['id' => 'active-calendar'],
            'dataProvider' => new ArrayDataProvider([
                'allModels' => [
                    new data\DataItem([
                        'id' => 1,
                        'title' => 'Conference',
                        'start' => '2016-02-03',
                    ])
                ],
            ]),
        ]));
    
        $expected = <<<'JS'
jQuery('#active-calendar').fullCalendar({"events":[
    {
        "id":1,
        "title":"Conference",
        "start":new Date('2016-02-03')
    }
],"lang":"en-us"});
JS;
        $expected = preg_replace('/\n\s*/', '', $expected);
        $this->assertEquals(
            $expected,
            end(Yii::$app->view->js[View::POS_READY])
        );
    }
}
