<?php
include('../connection.php');
if(isset($_POST["token"]) && password_verify("dataget", $_POST["token"]))
{
	$testname=$_POST['testname'];
	$date=$_POST['date'];
	
	$srno=0;
	if($testname=="all" && $date=="all")
	{
		$query=$db->prepare('Select *,DATE(date) as odate from chaos where testname=? ORDER BY date DESC');
		$data=array('application');
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-6" style="overflow: scroll;">
			<h3>Test Name: Stop_app_myk</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Status</td>
 						<td>Date</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
						<td><?php echo $datarow['status']; ?></td>
						<td><?php echo $datarow['odate']; ?></td>
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
		$query=$db->prepare('Select *,DATE(date) as odate from chaos where testname=? ORDER BY date DESC');
		$data=array('alb-test');
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-6" style="overflow: scroll;">
			<h3>Test Name: Stop_api_myk</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Status</td>
 						<td>Date</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
						<td><?php echo $datarow['status']; ?></td>
						<td><?php echo $datarow['odate']; ?></td>
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
		$query=$db->prepare('Select *,DATE(date) as odate from chaos where testname=? ORDER BY date DESC');
		$data=array('application');
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-6" style="overflow: scroll;">
			<h3>Test Name: Stop_Apache</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Status</td>
 						<td>Date</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
 						<?php if($datarow['status'] == "<Response [200]>")
 						{
 							?><td><?php echo "UP" ?></td><?php
 						}
 						else
 						{
 							?><td><?php echo $datarow['status']; ?></td><?php
 						}
 						?>
						
						<td><?php echo $datarow['odate']; ?></td>
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
		$query=$db->prepare('Select *,DATE(date) as odate from chaos where testname=? ORDER BY date DESC');
		$data=array('eks_node');
		$execute=$query->execute($data);
		if($execute)
		{
		?>
		<div class="col-sm-6" style="overflow: scroll;">
			<h3>Test Name: EKS-Node</h3>
			<div class="contain-body" style="width:100%;float: left;">
				<table class="table table-bordered table-responsive">
					<tr>
						<td>Sr.No</td>
						<td>URL</td>
 						<td>Status</td>
 						<td>Date</td>
					</tr>
					<?php
						while($datarow=$query->fetch())
						{ $srno++;
						?>
						<tr>
						<td><?php echo $srno; ?></td>
 						<td><?php echo $datarow['url']; ?></td>
 						<?php if($datarow['status'] == "<Response [200]>")
 						{
 							?><td><?php echo "UP" ?></td><?php
 						}
 						else
 						{
 							?><td><?php echo $datarow['status']; ?></td><?php
 						}
 						?>
						
						<td><?php echo $datarow['odate']; ?></td>
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
		
		
	}
}
?>