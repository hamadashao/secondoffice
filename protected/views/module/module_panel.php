<div id="panel-module">
	<div class="table-list" data-link="<?php echo Yii::app()->createUrl('module/getlist'); ?>">
		<div class="navbar-right">
			<button type="button" class="btn btn-default" data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('module/getinstalldialog'); ?>" data-target="#modal-main" data-modal="#modal-moduleedit"><?php echo Yii::t('Base', 'Install'); ?></button>
       		<button type="button" class="btn btn-default" data-toggle="click.trigger" data-trigger="module" data-target="body" data-event="show.deletedialog.secondoffice.system"><?php echo Yii::t('Base', 'Uninstall'); ?></button>
            <div id="module-delete-btn" data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('module/getuninstalldialog'); ?>" data-target="#modal-main" data-modal="#modal-moduleuninstall" style="display:none;"></div>
			
            
            <button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-module .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Enable'); ?></button>
            <button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-module .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Disable'); ?></button>
            
            <button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-module .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
            
			<div class="btn-group dropdown-list">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu tableitem-number" role="menu">
					<li data-results="10"><a>10</a></li>
					<li data-results="20"><a>20</a></li>
					<li data-results="50"><a>50</a></li>
					<li data-results="0"><a><?php echo Yii::t('Base', 'All'); ?></a></li>
				</ul>
			</div>
		</div>
   		<div class="navbar-right" style="margin-right:20px;">
   			<input type="text" class="form-control tableitem-keyword" data-toggle="enter.trigger" data-target="#panel-module .table-list" data-event="refresh.bs.tablelist" placeholder="<?php echo Yii::t('Base', 'Search'); ?>">
   		</div>
   		<table class="table navbar-right table-list-5">
			<thead>
   				<tr>
      				<th class="table_tools"><input type="checkbox" class="global-checkbox"></th>
      				<th class="table_tools"></th>  	  				
      				<th data-sort="t.name"><a><?php echo Yii::t('Base', 'Module Name'); ?><span></span></a></th>
                    <th data-sort="t.active"><a><?php echo Yii::t('Base', 'Active'); ?><span></span></a></th>
				</tr>
       		</thead>
			<tbody></tbody>
		</table>
    </div>
    <script>
		$(document).ready(function(){			
			$('#panel-module').find(".table-list").trigger("refresh.bs.tablelist");
		});
    </script>
</div>
