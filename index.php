<?php date_default_timezone_set('Asia/Kolkata'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Date test</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
if(@$_GET['date']){
	$date = strtotime($_GET['date']);
	if(!$date) $date = time();
}else{
	$date = time();
}
$this_month_start = 01;
$this_month_end = (int)date('t', $date);
$this_year_month = date('Y-m');
$date_year_month = date('Y-m',$date);
$start_week = (int)date('N', strtotime(date('Y-m-01',$date)));
$count = 1;
$days = array();
if($start_week<7){
	for($i=1; $i<=$start_week; $i++){
		switch($i){
			case 1:
				$day = 'Sun';
				break;
			case 2:
				$day = 'Mon';
				break;
			case 3:
				$day = 'Tue';
				break;
			case 4:
				$day = 'Wed';
				break;
			case 5:
				$day = 'Thu';
				break;
			case 6:
				$day = 'Fri';
				break;
			case 7:
				$day = 'Sat';
				break;
		}
		$days[$day][] = false;
	}
}
for($i=$this_month_start; $i<=$this_month_end; $i++){
	if($count>=7){
		$count = 1;
	}
	$days[date('D', strtotime(date('Y-m-'.$i,$date)))][] = $i;
	$count++;
}
?>
<div class="date_wrap">
	<div class="cur_date_txt">
		<?=date("F, Y", $date)?>
	</div>
	<div class="date_nav">
		<div class="left"> <!--<a href="<?=$_SERVER['PHP_SELF'].'?date='.date("Y-m-d", strtotime("-1 year", $date))?>">&lt;&lt;</a>--> <a href="<?=$_SERVER['PHP_SELF'].'?date='.date("Y-m-d", strtotime("-1 month", $date))?>">&lt;</a> </div>
		<div class="right"> <a href="<?=$_SERVER['PHP_SELF'].'?date='.date("Y-m-d", strtotime("+1 month", $date))?>">&gt;</a> <!--<a href="<?=$_SERVER['PHP_SELF'].'?date='.date("Y-m-d", strtotime("+1 year", $date))?>">&gt;&gt;</a>--> </div>
		<br class="clear">
	</div>
	<table class="calender">
		<thead>
			<tr>
				<th><span>Sun</span></th>
				<th><span>Mon</span></th>
				<th><span>Tue</span></th>
				<th><span>Wed</span></th>
				<th><span>Thu</span></th>
				<th><span>Fri</span></th>
				<th><span>Sat</span></th>
			</tr>
		</thead>
		<tbody>
			<?php for($i=0; $i<=5; $i++): ?>
			<tr>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Sun'][$i]?'cur_dt':''?>" data-date="<?=@$days['Sun'][$i]?$date_year_month.'-'.$days['Sun'][$i]:''?>"><span>
					<?=@$days['Sun'][$i]?@$days['Sun'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Mon'][$i]?'cur_dt':''?>" data-date="<?=@$days['Mon'][$i]?$date_year_month.'-'.$days['Mon'][$i]:''?>"><span>
					<?=@$days['Mon'][$i]?@$days['Mon'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Tue'][$i]?'cur_dt':''?>" data-date="<?=@$days['Tue'][$i]?$date_year_month.'-'.$days['Tue'][$i]:''?>"><span>
					<?=@$days['Tue'][$i]?@$days['Tue'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Wed'][$i]?'cur_dt':''?>" data-date="<?=@$days['Wed'][$i]?$date_year_month.'-'.$days['Wed'][$i]:''?>"><span>
					<?=@$days['Wed'][$i]?@$days['Wed'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Thu'][$i]?'cur_dt':''?>" data-date="<?=@$days['Thu'][$i]?$date_year_month.'-'.$days['Thu'][$i]:''?>"><span>
					<?=@$days['Thu'][$i]?@$days['Thu'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Fri'][$i]?'cur_dt':''?>" data-date="<?=@$days['Fri'][$i]?$date_year_month.'-'.$days['Fri'][$i]:''?>"><span>
					<?=@$days['Fri'][$i]?@$days['Fri'][$i]:'&nbsp;'?>
					</span></td>
				<td class="<?=date('Y-m-d')==$date_year_month.'-'.@$days['Sat'][$i]?'cur_dt':''?>" data-date="<?=@$days['Sat'][$i]?$date_year_month.'-'.$days['Sat'][$i]:''?>"><span>
					<?=@$days['Sat'][$i]?@$days['Sat'][$i]:'&nbsp;'?>
					</span></td>
			</tr>
			<?php 
			if(!@$days['Sat'][$i] || @$days['Sat'][$i]>=$this_month_end){
				break;
			}
			endfor;
			?>
		</tbody>
	</table>
</div>
</body>
</html>