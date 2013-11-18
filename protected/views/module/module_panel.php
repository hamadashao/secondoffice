<div id="panel-module">
	<div class="table-list" data-link="<?php echo Yii::app()->createUrl('module/getlist'); ?>">
		<div class="navbar-right">            
            <button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-module .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
            
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
   		<table class="table navbar-right table-list-5 table-items-list">
			<thead>
   				<tr>
      				<th class="table_tool"></th>  	  				
      				<th data-sort="t.name"><a><?php echo Yii::t('Base', 'Module Name'); ?><span></span></a></th>
                    <th data-sort="t.version"><a><?php echo Yii::t('Base', 'Version'); ?><span></span></a></th>
                    <th data-sort="t.author"><a><?php echo Yii::t('Base', 'Author'); ?><span></span></a></th>
                    <th data-sort="t.author"><a><?php echo Yii::t('Base', 'Install'); ?><span></span></a></th>
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
