<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datas';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

$year2015Count = \app\models\Data::find()->andFilterWhere(['>=','date', '2015-04-01'])->count();
$aprilCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-04-01'])->andFilterWhere(['<=', 'date', '2015-05-01'])->count();
$mayCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-05-01'])->andFilterWhere(['<=', 'date', '2015-06-01'])->count();
$juneCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-06-01'])->andFilterWhere(['<=', 'date', '2015-07-01'])->count();
$julyCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-07-01'])->andFilterWhere(['<=', 'date', '2015-08-01'])->count();
$augustCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-08-01'])->andFilterWhere(['<=', 'date', '2015-09-01'])->count();
$septemberCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-09-01'])->andFilterWhere(['<=', 'date', '2015-10-01'])->count();
$octoberCount =  \app\models\Data::find()->andFilterWhere(['>=',  'date','2015-10-01'])->andFilterWhere(['<=', 'date', '2015-11-01'])->count();

?>
<div class="row">
    <div class="col-md-2">
        <?php
        echo \yii\bootstrap\Nav::widget([
                'items' =>[
                    [
                        'label' => "2015($year2015Count)",
                        'items' =>[
                            [
                                'label' => "апрель($aprilCount)",

                            ],
                            [
                                'label' => "май($mayCount)",

                            ],
                            [
                                'label' => "июнь($juneCount)",

                            ],
                            [
                                'label' => "июль($julyCount)",

                            ],
                            [
                                'label' => "август($augustCount)",

                            ],
                            [
                                'label' => "сентябрь($septemberCount)",

                            ],
                            [
                                'label' => "октябрь($octoberCount)",

                            ],
                        ]
                    ],

                ]
        ])
        ?>
    </div>
    <div class="col-md-10">
        <div class="panel panel-inverse data-index">
            <div class="panel-heading">

                <div class="row"style="margin-bottom: -10px">

                </div>

            </div>
            <div class="panel-body">
                <div id="ajaxCrudDatatable">
                    <?= GridView::widget([
                        'id' => 'crud-datatable',
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pjax' => true,
                        'columns' => require(__DIR__ . '/_columns.php'),
                        'panelBeforeTemplate' => Html::a('Добавить <i class="fa fa-plus"></i>', ['create'],
                                [
                                    'role' => 'modal-remote',
                                    'title' => 'Добавить Счет',
                                    'class' => 'btn btn-success'
                                ]) . '&nbsp;' .
                            Html::a('<i class="fa fa-repeat"></i>', [''],
                                ['data-pjax' => 1, 'class' => 'btn btn-white', 'title' => 'Обновить']),
                        'striped' => true,

                        'condensed' => true,
                        'responsive' => true,
                        'responsiveWrap' => false,
                        'panel' => [
                            'headingOptions' => ['style' => 'display: none;'],
//                    'after' => BulkButtonWidget::widget([
//                            'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Удалить',
//                                ["bulk-delete"],
//                                [
//                                    "class" => "btn btn-danger btn-xs",
//                                    'role' => 'modal-remote-bulk',
//                                    'data-confirm' => false,
//                                    'data-method' => false,// for overide yii data api
//                                    'data-request-method' => 'post',
//                                    'data-confirm-title' => 'Вы уверены?',
//                                    'data-confirm-message' => 'Вы действительно хотите удалить данный элемент?'
//                                ]),
//                        ]) .
//                        '<div class="clearfix"></div>',
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
<?php

$script = <<< JS

$('#search-form select').change(function(){
    $('#search-form').submit();
});

JS;

$this->registerJs($script, \yii\web\View::POS_READY);

?>