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
                    <h1 class="page-header">Chapter 3b: Web Browsing - SSL Comparison</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">A comparision</h3> 
				</div> 
				<div class="panel-body">
				<p>It is very likely that you are browsing the internet, not really knowing what an SSL certificate is.
					Can you spot the difference between these two?</p>
				</br>
				<img src="../pics/safeurl.png">
				</br></br>
				<img src="../pics/unsafe2.png">
				</br></br>
				<p>So, one is clearly google and has been verifed to be using an SSL certificate. The other is not google,
				contains many extra 'o's and has no SSL certificate idicated by the padlock. It is usually the case that
				similar URLs such as this are used for attempted phishing scams, talked about in the next chapter.</p>
				</br>
				<p> So what about this website, is this the real eBay?</p>
					</br>
					<img src="../pics/Unsafeurl.png">
					</br></br>
					<p>It is the real eBay, although they have chosen to not use SSL certificates. Some websites choose to not use this yet
					as they feel it could affect users that do not know about SSL. It could even be the website team, do not know about SSL.
					Although as the internet moves on, SSL will start to be a requirement.</p>
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li><a href="Chapter3.php">1 <span class="sr-only">(current)</span></a></li> 
			<li class="active"><a href="Chapter3b.php">2</a></li> 
			<li><a href="Chapter3c.php">3</a></li> 
			<li><a href="Chapter3d.php">4</a></li> 
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