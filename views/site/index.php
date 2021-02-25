<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="col-md-12">
        <div id='work_chat_mes' class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Чат</h4>
            </div>
            <div class="panel-body" id="messageList" style="height: 38vh; overflow-y: scroll;">
                <?php try {
                    echo \rmrevin\yii\module\Comments\widgets\CommentListWidget::widget(['entity' => (string)'contract-' . $model->id,]);
                } catch (Exception $e) {
                } ?>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
