<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ResumeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/bootstrap-datepicker.css',
        'css/jquery-editable-select.css',
        'css/jquery.nselect.css',
        'css/tagsinput.css',

    ];
    public $js = [
        'js/tagsinput.js',
        'js/main.js',
        'js/bootstrap-datepicker.js',
        'js/bootstrap-datepicker.ru.min.js',
        'js/jquery-editable-select.js',
        'js/jquery.nselect.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
