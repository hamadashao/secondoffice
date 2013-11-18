<div id="panel-profile-staff">
	<div class="table-list" data-link="<?php echo Yii::app()->createUrl('profile/main/getstafflist'); ?>" data-items="t.real_name,department.name,position.name,t.email,t.work_phone">
		<div class="navbar-right">
        	<button type="button" class="btn btn-default" data-toggle="click.trigger" data-target="#panel-profile-staff .table-list" data-event="refresh.bs.tablelist"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
        	<div class="btn-group dropdown-list">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" type="button"><?php echo Yii::t('Base', 'Operations'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
                    <li><a><?php echo Yii::t('Base', 'Export to excel '); ?></a></li>
					<li><a><?php echo Yii::t('Base', 'Print'); ?></a></li>
				</ul>
			</div> 
            <div class="btn-group dropdown-list tableitem-item">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" type="button"><?php echo Yii::t('Profile', 'Show Item'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
					<li data-type="checkbox" value-type="string" data-results="t.real_name"><a><input type="checkbox" checked="checked"><?php echo Yii::t('Profile', 'Real Name'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.sex"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Sex'); ?></a></li>
					<li data-type="checkbox" value-type="string" data-results="department.name"><a><input type="checkbox" checked="checked"><?php echo Yii::t('Profile', 'Department'); ?></a></li>
					<li data-type="checkbox" value-type="string" data-results="position.name"><a><input type="checkbox" checked="checked"><?php echo Yii::t('Profile', 'Position'); ?></a></li>
					<li data-type="checkbox" value-type="string" data-results="t.email"><a><input type="checkbox" checked="checked"><?php echo Yii::t('Profile', 'Email'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.work_phone"><a><input type="checkbox" checked="checked"><?php echo Yii::t('Profile', 'Work Phone'); ?></a></li>
                    <li data-type="checkbox" value-type="date" data-results="t.birthday"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Birthday'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.hometown"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Hometown'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.education"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Education'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.mobie_phone"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Mobie Phone'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="t.remark"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Remark'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="career"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Career'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="companyrecord"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Company Record'); ?></a></li>
                    <li data-type="checkbox" value-type="string" data-results="photo"><a><input type="checkbox"><?php echo Yii::t('Profile', 'Photo'); ?></a></li>
				</ul>
			</div>
			<div class="btn-group dropdown-list tableitem-number">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
					<li data-results="10"><a>10</a></li>
					<li data-results="20"><a>20</a></li>
					<li data-results="50"><a>50</a></li>
					<li data-results="0"><a><?php echo Yii::t('Base', 'All'); ?></a></li>
				</ul>
			</div>
		</div>
   		<div class="navbar-right input-group advanced-search-navbar">
   			<input type="text" class="form-control tableitem-keyword" placeholder="<?php echo Yii::t('Base', 'Search'); ?>">
            <div class="input-group-btn">
        		<button class="btn btn-default btn-sm dropdown-toggle table-advanced-search" data-toggle="dropdown" type="button"><?php echo Yii::t('Base', 'Advanced'); ?><span class="caret"></span></button>
                <ul class="dropdown-menu pull-right">
                	<div class="advanced-search-button">
                        <button class="btn btn-default btn-xs" data-toggle="click.trigger" data-target="#panel-profile-staff .table-list" data-event="advanced.search.bs.tablelist"><?php echo Yii::t('Base', 'Search'); ?></button>
                    </div>
                    <div class="advanced-search-option">
                    	<table>
                        	<tr>
                            	<td><input type="checkbox"></td>
                                <td align="left"><span><?php echo Yii::t('Profile', 'Real Name'); ?></span></td>
                        		<td align="left">
                                <select>
                        		<option value="1">test1</option>
                            	<option value="2">test2</option>
                            	<option value="3">test3</option>
                        		</select>
                                </td>
                        		<td style="padding-right:0px;"><input type="text" class="advanced-search-keyword" /></td>
                            </tr>
                            <tr>
                            	<td><input type="checkbox"></td>
                                <td align="left"><span><?php echo Yii::t('Profile', 'Real Name'); ?><?php echo Yii::t('Profile', 'Real Name'); ?><?php echo Yii::t('Profile', 'Real Name'); ?><?php echo Yii::t('Profile', 'Real Name'); ?></span></td>
                        		<td align="left">
                                <select>
                        		<option value="1">test1test3</option>
                            	<option value="2">test2test3test3</option>
                            	<option value="between">test3</option>
                        		</select>
                                </td>
                        		<td style="padding-right:0px;"><input type="text" class="advanced-search-keyword keyword1" /><span class="addition_keyword"> to <input type="text" class="advanced-search-keyword keyword2" /></span></td>
                            </tr>
                    	</table>
                    </div>
        		</ul>
            </div>
   		</div>        
   		<table class="table navbar-right table-list-5 table-items-list">
			<thead>
   				<tr>
      				<th class="table_tools"><input type="checkbox" class="global-checkbox"></th>
      				<th class="table_tools"></th>  	  				
      				<th data-sort="t.real_name"><a><?php echo Yii::t('Base', 'Real Name'); ?><span></span></a></th>
                    <th data-sort="t.sex"><a><?php echo Yii::t('Base', 'Sex'); ?><span></span></a></th>
      				<th data-sort="department.name"><a><?php echo Yii::t('Base', 'Department'); ?><span></span></a></th>
      				<th data-sort="position.name"><a><?php echo Yii::t('Base', 'Position'); ?><span></span></a></th>
      				<th data-sort="t.email"><a><?php echo Yii::t('Base', 'Email'); ?><span></span></a></th>
                    <th data-sort="t.work_phone"><a><?php echo Yii::t('Base', 'Work Phone'); ?><span></span></a></th>
				</tr>
       		</thead>
			<tbody></tbody>
		</table>
    </div>
    <script>
		$(document).ready(function(){			
			$('#panel-profile-staff').find(".table-list").trigger("refresh.bs.tablelist");
		});
    </script>
</div>
