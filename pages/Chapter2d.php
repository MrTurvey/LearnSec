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

			$Q1 = "B";
			$Q2 = "A";
			$Q3 = "C";
			$Q4 = "C";
			$Q5 = "D";

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
                    <h1 class="page-header">Chapter 2d: Quiz</h1>
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
				
						<form action="Chapter2d.php" method="post" id="quiz">
		
            <ol>
            
                <li>
                
                    <h3>What do marketers commonly impliment within their emails</h3>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Threats masked as presuasion</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Trackers</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) Lies</label>
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
                
                    <h3>What is one way an attacker could find your address</h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) Electoral Register</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) Guess</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) Your mobile number</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Take your email and use a location tracker</label>
                    </div>
					<?php if ($answer1 != null){
					echo "<b><h4>The correct answer is: $answer2</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>WiFi is usually free because..</h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) People are nice</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Public Wifi legally needs to be free</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Your details are being sold to 3rd parties</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) It brings in more customers</label>
                    </div>
					<?php if ($answer1 != null){ echo "<b><h4>The correct answer is: $answer3</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>When you upload a picture to Facebook, who owns it?</h3>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) You</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) Bill Gates</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) Facebook</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) Mark Zuckerberg</label>
                    </div>
					<?php if ($answer1 != null){ echo "<b><h4>The correct answer is: $answer4</h4></b>"; } ?>
                </li>
                
                <li>
                
                    <h3>Which could help an attacker locate you</h3>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                        <label for="question-5-answers-A">A) Checking in on Facebook</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                        <label for="question-5-answers-B">B) Tweeting with Location settings on</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                        <label for="question-5-answers-C">C) Posting photos on Instagram</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                        <label for="question-5-answers-D">D) All of the above</label>
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
			<li><a href="Chapter2.php">1 <span class="sr-only">(current)</span></a></li> 
			<li><a href="Chapter2b.php">2</a></li> 
			<li><a href="Chapter2c.php">3</a></li> 
			<li class="active"><a href="Chapter2d.php">4</a></li> 
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