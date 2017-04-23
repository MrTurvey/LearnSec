<?php include '../includes/head.php';
//ini_set('session.cookie_httponly', 1);
//ini_set('session.cookie_secure', 1);
session_start();

$TRegistrant = $_SESSION['TRegistrant'];
$TSname = $_SESSION['TSname'];
$TRegistrar = $_SESSION['TRegistrar'];
$TheEntity = $_SESSION['TheEntity'];
$rDNS = $_SESSION['rDNS'];

$reglength = count($TRegistrant);
for ($r = 0; $r < $reglength; $r++) {
	if (in_array($TRegistrant[$r], $allnames) == false){ 
		$allnames[$r] = $TRegistrant[$r];
	} else {
		$allnames[$r] = $TRegistrar[$r];
	}
}
?>

<body>

    <div id="wrapper">
		<?php include '../includes/navbar.php';?>
        <?php include '../includes/leftnavbar.php';?>

           
        <div id="page-wrapper" style="min-height: 539px;">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chapter 2a: Privacy Facts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">Facts</h3> 
				</div> 
				<div class="panel-body"> 
				
				<p><b>1.</b> Websites, particularly retailers will track your online viewing in order to offer you deals specific to your own interests</p>
				<p><b>2.</b> It is possible for marketing emails to be tracked in order for companies to know if you have read them and followed links embedded in them</p>
				<p><b>3.</b> It is possible for websites to gain knowledge about the previous website which lead you to the one you are currently viewing</p>
				<p><b>4.</b> Many people have not opted out of the phonebook, if you get marketing calls, you probably have not either</p>
				<p><b>5.</b> It is possible for a person to find your address using websites that list electoral register voters.</p>
				<p><b>6.</b> Mobile phone applications often ask you for permissions which include access to your pictures and files, many allow this without looking</p>
				<p><b>7.</b> Websites such as insurance and loan comparisons perform lookups on your credit history. This is unlikely to affect your score although leaves a mark.</p>
				<p><b>8.</b> Checking in on Facebook, or tweeting a location such as a holiday could help potential attackers to know when to steal from you</p>
				<p><b>9.</b> Websites such as Facebook have policy which states, data you add to their website becomes the property of them, not you.</p>
				<p><b>10.</b> Free WiFi is often free because you have to enter your details in order to use it. This will likely be sold to 3rd parties for marketing.</p>
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li class="active"><a href="Chapter2.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter2b.php">2</a></li> 
			<li><a href="Chapter2c.php">3</a></li> 
			<li><a href="Chapter2d.php">4</a></li> 
			<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li> </ul>
			<footer class="footer">
			</footer>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../includes/footer.php';?>
	
	<script>	
	$(document).ready(function() {
		$('#example').DataTable({
        "aLengthMenu": [[100, 50, 25, -1], [100, 50, 25, "All"]],
        "iDisplayLength": 100
    });
	} );
	</script>
	<script>
	$(document).ready(function(){
	$(".progress").hide();
  $('#btn-whois').on('click', function(e){
		e.preventDefault();
    // information to be sent to the server
    var info = $('#IPtext').val();
	$(".progress").show();
    $.ajax({
        type: "POST",
        url: 'whois.php',
        data: {IPtext: info},
		success: function(data) {
		var i = 0;
		IPcounting = document.getElementById("IPtext").value;
		IPcounting = IPcounting.replace(/(^\s*)|(\s*$)/gi,"");
		IPcounting = IPcounting.replace(/[ ]{2,}/gi," ");
		IPcounting = IPcounting.replace(/\n /,"\n");
		IPcounting = IPcounting.split(' ').length;
		IPcounting = data * 3.5;
		var counterBack = setInterval(function(){
		i++;
		if (i < 100){
			$('.progress-bar').css('width', i+'%');
		} else {
			clearInterval(counterBack);
			location.reload();
		}
	  
		}, IPcounting);
		}
    });
  });
})
	</script>
	
	
	
	

</body></html>