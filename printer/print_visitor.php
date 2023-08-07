<?php 
	include '../handlers/require_files.php';
	include '../include/header.php'; 

?>
<?php 
// HAndles Print Visitor 
	if (isset($_GET['id_no'])):
	 if (count($user->GetVisitors($_GET['id_no']))): 
											
										
	 foreach($user->GetVisitors($_GET['id_no']) as $users): 

  ?>
  <div class="container-fluid">
 <div class="container-fluid modal-content">
    <div class="modal-header">
    	<h5 class="text-center">Vehicle Management Card</h5>
    </div>
      <table width='300px' class="table table-responsive">
		<tr>
			<td>&nbsp;<strong class="text-primary"><?php echo 'Vehicle Management System'; ?></strong>
				<br /><br />
				&nbsp;<strong><span>Visitor ID:</span> # </strong><?php echo $users['id_no'] ?>
				<br />
				&nbsp;<strong><span>Driver Name:</span></strong> <?php echo $users['full_name'] ?>
				<br />
				&nbsp;<strong><span>Driver Phone:</span> </strong><?php echo $users['phone'] ?>
				<br />
				&nbsp;<strong><span>Driver Address:</span></strong> <?php echo $users['address'] ?>
                <br />
				&nbsp;<strong><span>Registration Number:</span></strong> <?php echo $users['registration_number'] ?>
                <br />
				&nbsp;<strong><span>Vehicle Model and Make:</span></strong> <?php echo $users['model_make'] ?>
                <br />
				&nbsp;<strong><span>Vehicle Type:</span></strong> <?php echo $users['vehicle_type'] ?>
                <br />
				&nbsp;<strong><span>Vehicle Colour:</span></strong> <?php echo $users['vehicle_colour'] ?>
				<br />
				&nbsp;<strong><span>Signin Time:</span> </strong><?php echo $users['sign_in_time'] ?>
			</td>
			<td align="center" width="50%">
			<img class="img img-thumbnail" src="<?php echo '../'.$users['image']; ?>" width="130px" style="height: 130px;margin-top: 5px" >
			</td>
		</tr>
	  </table>								   
	<div class="modal-footer">
		<input id="printpagebutton" type="button" onclick="printpage()" class="btn btn-warning btn" value="Print Visitor Badge" /> <button id="printpagebutton2" type="button" class="btn btn-default" data-dismiss="modal" onClick="window.close();">Close</button>
		</div>
</div>  
</div>
<?php 
endforeach;
endif;
endif;

?>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
		var printButton2 = document.getElementById("printpagebutton2");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
		printButton2.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
		printButton2.style.visibility = 'visible';
    }
</script>