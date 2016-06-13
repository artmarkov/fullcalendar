<?php
namespace tecnocen\fullcalendar\tests;

use tecnocen\fullcalendar\assets\Lang;
use tecnocen\fullcalendar\widgets\Fullcalendar;
use Yii;
use yii\web\View;

/**
 * Test the functionality for the bootstrap-year-calendar plugin
 */
class FullcalendarTest extends TestCase
{
    public function testLang()
    {
        $view = Yii::$app->view;
        $expected = <<<'HTML'
<div id="es-calendar"></div>
HTML;

        $this->assertEquals($expected, Fullcalendar::widget([
            'lang' => 'es',
            'options' => ['id' => 'es-calendar'],
        ]));

        $this->assertEquals(
            'jQuery(\'#es-calendar\').fullCalendar({"lang":"es"});',
            end($view->js[View::POS_READY])
        );

        $this->assertTrue(isset($view->assetBundles[Lang::className()]));
        $langAsset  = $view->assetBundles[Lang::className()];
        $this->assertEquals('es', $langAsset->lang);
    }

    public function testWidget()
    {
        $expected = <<<'HTML'
<div id="basic-widget"></div>
HTML;
        $this->assertEquals($expected, Fullcalendar::widget([
            'options' => ['id' => 'basic-widget']
        ]));
        $this->assertEquals(
            'jQuery(\'#basic-widget\').fullCalendar({"lang":"en-us"});',
            end(Yii::$app->view->js[View::POS_READY])
        );

        $expected = <<<'HTML'
<span id="custom-calendar" class="row"></span>
HTML;
        $this->assertEquals($expected, Fullcalendar::widget([
            'options' => [
                'id' => 'custom-calendar',
                'tag' => 'span',
                'class' => 'row'
            ],
            'clientOptions' => [
                'startYear' => 2012,
            ],
        ]));

        $this->assertEquals(
            'jQuery(\'#custom-calendar\')'
                . '.fullCalendar({"startYear":2012,"lang":"en-us"});',
            end(Yii::$app->view->js[View::POS_READY])
        );
    }
}
