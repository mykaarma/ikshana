<?php
include('../connection.php');
if(isset($_POST["token"]) && password_verify("dataget", $_POST["token"]))
{
	$backend=$_POST['backend'];
	$time=$_POST['time']+1;
	
	$srno=0;
	if($backend=="all")
	{
		$query=$db->prepare('SELECT *,count(*) as count FROM errors504 WHERE DATE(timestamp) >= NOW() - INTERVAL ? DAY group by backend Order BY count DESC');
		$data=array($time);
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-4" style="overflow: scroll;">
			<h3>Backends</h3>
			<div class="contain-body" style="width:100%;float: left;height: 425px!important;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>Backend</td>
 						<td>Count</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['backend']; ?></td>
						<td><?php echo $datarow['count']; ?></td>
						</tr> 

						<?php	
						}
					?>
				</table>
			</div>
		</div>

		<?php	

		}
		$srno=0;
		$query=$db->prepare('SELECT *,count(*) as count FROM errors504 WHERE DATE(timestamp) >= NOW() - INTERVAL ? DAY group by url Order BY count DESC');
		$data=array($time);
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-4" style="overflow: scroll;">
			<h3>Requested URL</h3>
			<div class="contain-body" style="width:100%;float: left;height: 425px!important;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>Requested URL</td>
 						<td>Count</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
						<td><?php echo $datarow['count']; ?></td>
						</tr> 

						<?php	
						}
					?>
				</table>
			</div>
		</div>

		<?php	
		}
		$srno=0;
		$query=$db->prepare('SELECT *,count(*) as count FROM errors504 WHERE DATE(timestamp) >= NOW() - INTERVAL ? DAY group by source Order BY count DESC');
		$data=array($time);
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-4" style="overflow: scroll;">
			<h3>Source</h3>
			<div class="contain-body" style="width:100%;float: left;height: 425px!important;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>Backend</td>
 						<td>Count</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['source']; ?></td>
						<td><?php echo $datarow['count']; ?></td>
						</tr> 

						<?php	
						}
					?>
				</table>
			</div>
		</div>

		<?php	
		}

	}
	else
	{
		$srno=0;
		$query=$db->prepare('SELECT *,count(*) as count FROM errors504 WHERE backend=? AND DATE(timestamp) >= NOW() - INTERVAL ? DAY group by url Order BY count DESC');
		$data=array($backend,$time);
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-12" style="overflow: scroll;">
			<h3>Requested URL</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Count</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
						<td><?php echo $datarow['count']; ?></td>
						</tr> 

						<?php	
						}
					?>
				</table>
			</div>
		</div>

		<?php	
		}
		$srno=0;
		$query=$db->prepare('SELECT *,count(*) as count FROM errors504 WHERE backend=? AND DATE(timestamp) >= NOW() - INTERVAL ? DAY group by source Order BY count DESC');
		$data=array($backend,$time);
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-12" style="overflow: scroll;">
			<h3>Source</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Count</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['source']; ?></td>
						<td><?php echo $datarow['count']; ?></td>
						</tr> 

						<?php	
						}
					?>
				</table>
			</div>
		</div>

		<?php	
		}
		
	}
}
?>