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
                    <h1 class="page-header">Chapter 6a: SQL Injection</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">What is SQLi?</h3> 
				</div> 
				<div class="panel-body">
				<p> This section dives much deeper into online security to the point that a basic level of coding,
				SQL database understanding and various other concepts should be known before part taking. This being 
				said, this section is optional.</p>
				</br>
				<p>SQLi otherwise known as SQL Injection is a security flaw in applications which talk to a backend database 
				using SQL. SQL is a language used to communicate with a database in order to parse the data it holds. This
				could be as simple as a login form on a web application, where the SQL statement checks that the user and password
				exist in the database. So what is the issue? Well, what if a user tried to put their own SQL statments into
				the login form, rather than a username and password? The form would look like this:</p>
				
				<form action="">
				  <b>Username:</b><br>
				  <input type="text" name="Username" value="Username">
				  <br>
				  <b>Password:</b><br>
				  <input type="text" name="Password" value="Password">
				  <br><br>
				  <input type="submit" value="Submit">
				</form> 
				</br>
				<p>The backend SQL Statement behind this would like something like this:</p>
				
				<p><b>SELECT * from Database WHERE User = Username AND Pass = Password</b></p>
				
				<p>What the above statment is saying is "Select all rows in the database where the username
				and password are the same as the user form input" if the statment returns a result, the user would login</p>
				<p>The issue with this is that it takes input from the user form. This means if a user put "OR 1=1" 
				into the password input. The statment would look like this</p>
				<p>SELECT * from Database WHERE User = Username AND Pass = <b>OR 1=1</b></p>
				<p>What the statment now says is "Select all rows in the database where the username
				and password are the same as the user form input OR 1=1" because 1 is always equal to 1, this returns
				a true statment therefore it will return a result in the database, thus logging a user in bypassing
				the need for a password</p>	

				<h3>Mitigations</h3>
				<p>The reccomended mitigations for this issue reside with the web application developers.
				It is their duty to make sure user input is sanitised to remove SQL statements, such as 
				removing the word "OR" from the input. They could also strip out special characters
				 such as * " !</p>
				
				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li class="active"><a href="Chapter6.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter6b.php">2</a></li> 
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