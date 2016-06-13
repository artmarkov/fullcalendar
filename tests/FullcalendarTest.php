<?php
namespace tecnocen\fullcalendar\tests;

use tecnocen\fullcalendar\assets\Language;
use tecnocen\fullcalendar\widgets\Fullcalendar;
use Yii;
use yii\web\View;

/**
 * Test the functionality for the bootstrap-year-calendar plugin
 */
class FullcalendarTest extends TestCase
{
    public function testLanguage()
    {
        $view = Yii::$app->view;
        $expected = <<<'HTML'
<div id="es-calendar"></div>
HTML;

        $this->assertEquals($expected, Fullcalendar::widget([
            'language' => 'es',
            'options' => ['id' => 'es-calendar'],
        ]));

        $this->assertEquals(
            'jQuery(\'#es-calendar\').fullCalendar({"language":"es"});',
            end($view->js[View::POS_READY])
        );

        $this->assertTrue(isset($view->assetBundles[Language::className()]));
        $languageAsset  = $view->assetBundles[Language::className()];
        $this->assertEquals('es', $languageAsset->language);
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
            'jQuery(\'#basic-widget\').fullCalendar({"language":"en-us"});',
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
                . '.fullCalendar({"startYear":2012,"language":"en-us"});',
            end(Yii::$app->view->js[View::POS_READY])
        );
    }
}
