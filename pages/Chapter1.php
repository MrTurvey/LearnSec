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
                    <h1 class="page-header">Chapter 1a: Saftey Facts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">Facts</h3> 
				</div> 
				<div class="panel-body"> 
				
				<p><b>1.</b> Using a password such as Password123 can be cracked in under 1 minute.</p>
				<p><b>2.</b> Viruses are not the only issue to worry about online. Attackers often try to call phones or email users pretending 
				to be from a well known company in order to gain your trust and attempt to get you to give out your password to them. This is called SOCIAL ENGINEERING</p>
				<p><b>3.</b> Using a pattern lock on a phone can be dangerious because of leftover finger marks on the screen.</p>
				<p><b>4.</b> When deleting files from your computer, phone, USB stick or many other storage mediums, files are never fully gone and can be recovered</p>
				<p><b>5.</b> When connecting to public WiFi spots, it is possible for others on the same WiFi to see and change your internet useage</p>
				<p><b>6.</b> Anti Virus software is not a holy grail and should not be relied on. Using common sense such as not opening random downloaded files is more secure.</p>
				<p><b>7.</b> If selling a phone, laptop or other device with a hard drive. Remember deleting files using the operating system never usually fully deletes files.</p>
				<p><b>8.</b> When signing into websites using another computer or mobile device, browsers can save your password meaning the next user could potentially login as you.</p>
				<p><b>9.</b> Always lock you PC when walking away from it to avoid anyone using it maliciously while you are away</p>
				<p><b>10.</b> Using email to send personal data such as Bank information is bad because it is never encrypted and if your email is hacked, this will be found.</p>
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li class="active"><a href="Chapter1.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter1b.php">2</a></li> 
			<li><a href="Chapter1c.php">3</a></li> 
			<li><a href="Chapter1d.php">4</a></li> 
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