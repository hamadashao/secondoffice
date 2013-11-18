<div id="panel-group">
	<div class="table-list" data-link="<?php echo Yii::app()->createUrl('group/getlist'); ?>">
		<div class="navbar-right">
			<button type="button" class="btn btn-default" data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('group/geteditdialog'); ?>" data-target="#modal-main" data-modal="#modal-groupedit"><?php echo Yii::t('Base', 'Add'); ?></button>
       		<button type="button" class="btn btn-default" data-toggle="click.trigger" data-trigger="group" data-target="body" data-event="show.deletedialog.secondoffice.system"><?php echo Yii::t('Base', 'Delete'); ?></button>
            <div id="group-delete-btn" data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('group/getdeletedialog'); ?>" data-target="#modal-main" data-modal="#modal-groupdelete" style="display:none;"></div>
			<button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-group .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
			<div class="btn-group dropdown-list tableitem-number">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
					<li data-results="10"><a>10</a></li>
					<li data-results="20"><a>20</a></li>
					<li data-results="50"><a>50</a></li>
					<li data-results="0"><a><?php echo Yii::t('Base', 'All'); ?></a></li>
				</ul>
			</div>
		</div>
   		<div class="navbar-right" style="margin-right:20px;">
   			<input type="text" class="form-control tableitem-keyword" placeholder="<?php echo Yii::t('Base', 'Search'); ?>">
   		</div>
   		<table class="table navbar-right table-list-1 table-items-list">
			<thead>
   				<tr>
      				<th class="table_checkbox"><input type="checkbox" class="global-checkbox"></th>
      				<th class="table_tools"></th>  	  				
      				<th data-sort="t.name"><a><?php echo Yii::t('Base', 'Group Name'); ?><span></span></a></th>
				</tr>
       		</thead>
			<tbody></tbody>
		</table>
    </div>
    <script>
		$(document).ready(function(){			
			$('#panel-group').find(".table-list").trigger("refresh.bs.tablelist");
		});
    </script>
</div>
