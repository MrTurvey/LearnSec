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

			$Q1 = "C";
			$Q2 = "B";
			$Q3 = "A";
			$Q4 = "A";
			$Q5 = "A";

			$answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == $Q1) { $totalCorrect++; }
            if ($answer2 == $Q2) { $totalCorrect++; }
            if ($answer3 == $Q3) { $totalCorrect++; }
            if ($answer4 == $Q4) { $totalCorrect++; }
            if ($answer5 == $Q5) { $totalCorrect++; }
			
			echo $answer1;
?>

<body>

    <div id="wrapper">
		<?php include '../includes/navbar.php';?>
        <?php include '../includes/leftnavbar.php';?>

           
        <div id="page-wrapper" style="min-height: 539px;">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chapter 3d: Quiz</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-primary"> 
				<div class="panel-heading"> <h3 class="panel-title">Have you learnt?</h3> 
				</div> 
				<div class="panel-body">
			
				<?php if ($answer1 != null){ 
					echo "<center><h1>$totalCorrect / 5 correct </h1></center>"; 
				} ?>
				
						<form action="Chapter3d.php" method="post" id="quiz">
		
            <ol>
            
                <li>
                
                    <h3>What is an SSL Certificate</h3>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Computer Software </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) A method for Super Secure Logging</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) A method to encrypt website traffic and verify a website.</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) None of the above</label>
                    </div>
					<?php if ($answer1 != null){
						echo "<h4>The correct answer is: $answer1</h4>";
					}
					?>
					
					
                </li>
                
                <li>
                
                    <h3>An SSL Certificate can be noticed in the URL bar</h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) Because of a Red padlock</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) Because of a Green padlock</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) It can not be noticed</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Because of the world "Safe"</label>
                    </div>
					<?php if ($answer1 != null){
					echo "<b><h4>The correct answer is: $answer2</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>Some websites do not use SSL Certificates, what does this mean?</h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) You can't explicitly verify the legitimacy</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Nothing, it just doesn't use one</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) It's probably a phishing website</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) None of the Above</label>
                    </div>
					<?php if ($answer1 != null){ echo "<b><h4>The correct answer is: $answer3</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>SSL Certificates are also used to encrypt your web traffic</h3>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) All the time</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) When you tell it to</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) Sometimes</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) Never</label>
                    </div>
					<?php if ($answer1 != null){ echo "<b><h4>The correct answer is: $answer4</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>When using a website without an SSL certificate, a hacker might be able to intercept your web traffic and..</h3>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                        <label for="question-5-answers-A">A) See all input to the website (Passwords,debt cards)</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                        <label for="question-5-answers-B">B) Do nothing</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                        <label for="question-5-answers-C">C) See your location</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                        <label for="question-5-answers-D">D) Eat cookies</label>
                    </div>
					<?php if ($answer1 != null){ echo "<b><h4>The correct answer is: $answer5</h4></b>"; } ?>
                </li>
            
            </ol>
            
            <input type="submit" value="Submit Quiz" />
		
		</form>

				</div> 
			</div>
			<ul class="pagination"> 
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
			<li><a href="Chapter3.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter3b.php">2</a></li> 
			<li><a href="Chapter3c.php">3</a></li> 
			<li class="active"><a href="Chapter3d.php">4</a></li> 
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