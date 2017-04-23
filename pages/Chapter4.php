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
                    <h1 class="page-header">Chapter 4a: Phishing</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">What is Phishing?</h3> 
				</div> 
				<div class="panel-body">
				<p>Pronounced like fishing, phishing is a term used to describe a malicious individual or group of individuals who scam users. 
				They do so by sending e-mails or creating web pages that are designed to collect an individual's online bank, credit card, 
				or other login information. Because these e-mails and web pages look like legitimate companies users trust them and enter their personal information.</p>
				</br>
				<h2>How to identify a phishing e-mail.</h2>
				</br>
				<p><b>1. </b>These e-mails are sent out to thousands of different e-mail addresses and often the person sending these e-mails has no idea who you are. If you have no affiliation with the company the e-mail address is supposedly coming from, it is fake. For example, if the e-mail is coming from Wells Fargo bank but you bank at a different bank.</p>
				<p><b>2. </b>Spelling and grammar - Improper spelling and grammar are almost always a dead giveaway. Look for obvious errors.</p>	
				<p><b>3. </b>No mention of account information - If the company were sending you information regarding errors to your account, they would mention your account or username in the e-mail. In the above example, the e-mail just says "eBay customer", if this was eBay they would mention your username.</p>	
				<p><b>4. </b>Deadlines - E-mail requests an immediate response or a specific deadline. For example, in the above example, the requirement to log in and change your account information within 24 hours.</p>	
				<p><b>5. </b>Links - Although many phishing e-mails are getting better at hiding the true URL you are visiting, often these e-mails will list a URL that is not related to the company's URL. For example, in our above eBay example, "http://fakeaddress.com/ebay" is not an eBay URL, just a URL with an "ebay" directory. If you are unfamiliar with how a URL is structured, see the URL definition for additional information.</p>	
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li class="active"><a href="Chapter4.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter4b.php">2</a></li> 
			<li><a href="Chapter4c.php">3</a></li> 
			<li><a href="Chapter4d.php">4</a></li> 
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