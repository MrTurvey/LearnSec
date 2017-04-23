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
                    <h1 class="page-header">Chapter 6b: Cross Site Scripting</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">What is XSS?</h3> 
				</div> 
				<div class="panel-body">
				<p>XSS otherwise known as Cross Site Scripting is another security flaw in applications.
				Much like SQLi, it originates from user input problems, where an attacker attempts to input
				JavaScript into the application. The issue with this is that JavaScript can do many
				malicious things, such as steal a users session cookies to login as them.</p>
				
				<p>Not only this, but it can redirect a user to a malicious website or even be used as a
				Keylogger. There are two main forms of this attack which are; Reflected XSS which is a one off
				attack such as crafting a special URL which a user can click on where the JavaScript will run.
				 The other type of attack is Stored XSS which is much more dangerous. This is because as the name
				 suggests, the applications stores the JavaScript for all users to see meaning no URL
				 sending would be needed.</p>
				 
				 <p>JavaScript could look like this. This specific peice of code just shows an alert box which you
				 would have clicked when entering this page.</p>
				 
				 <script>alert("This is XSS")</script> <b>&lt;script&gt;alert("This is XSS")&lt;/script&gt; </b>
				 
				 <h3>Mitigation</h3>
				 <p>To guard against this attack, again it is the developers duty to sanitise a users input.
				  Much like with SQLi, removing special charaters used in JavaScript, such as quote marks,
				  or removing various JavaScript tags such as SCRIPT</p>
				
			
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li><a href="Chapter6.php">1 <span class="sr-only">(current)</span></a></li> 
			<li class="active"><a href="Chapter6b.php">2</a></li> 
			<li><a href="Chapter6c.php">3</a></li> 
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