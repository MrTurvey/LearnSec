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
                    <h1 class="page-header">Chapter 3a: Web Browsing - SSL Certificates</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">What is an SSL certificate?</h3> 
				</div> 
				<div class="panel-body">
				<p>SSL Certificates are very important in the online world of today. They help establish a brand by ensuring you are 
				interacting with the correct website, not a fake. They also provide encryption, should anyone manage to intercept the traffic
				which you are sending from your computer to the website, such as bank details.</p>
				</br>
				<p>To put this in a simple way. You want to pass a note from you all the way across the room to Suzy. Normally, you just pass the note and say 
				"get it to suzy" and the kids in the room will keep pushing it towards her until she gets it. 
				The problem is, the teacher or anyone who gets the note can just open it up and read it.</p>
				</br>
				<p>
					SSL is a type of certificate used to make sure the contents of a packet (note) don't get read. 
					It's like putting your note in a lockbox and you've given Suzy the key ahead of time. 
					She's the only one who can see what's in the box, because she has the key (the SSL certificate). 
					HTTPS is an altered version of the HTTP protocol which makes sure whoever tries to open the box has the key. 
					If anyone tries to read the note and they don't have the key, all they'll see is garbled (encrypted) data, which will most likely just look like random characters. 
					it's like they took the box and just tried smashing it on the floor, but it ripped the note apart in the process.</p>
					</br>
					<p>You may not understand the technical details, although you do not need to as someone just looking to be protected online</p>
					</br>
					<p>The next page will show you where you will see SSL certificates</p>
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li class="active"><a href="Chapter3.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter3b.php">2</a></li> 
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