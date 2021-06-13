<!DOCTYPE HTML>
<?php 
    require('Https.php');
?>
<html>
	<head>
		<title>Submit a Partner</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body id="body" class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title">Game.TV Partner</a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="Log.php" >Login</a></li>
						<li><a href="Register.php" class="active">Work with us</a></li>
                        <li><a href="ReqToAcommunity.php">Require access</a></li>
                        
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Main -->
					
					<section id="main" class="wrapper">
						<div class="inner">
							<h2>Submit a new Partner</h2>
								<form name="Form1" id="Form1">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="demoname" id="demoname" value="" placeholder="Community Name" />
										<br/>
										<div class="col-12">
											<select name="democategory" id="democategory">
												<option value="">- Game type -</option>
												<option value="1">Brawl Stars</option>
												<option value="2">BR Games</option>
											</select>
										</div>
										<br/>
										<input type="text" name="demoguild" id="demoguild" value="" placeholder="Guild's name" />
										<br/>
										<input type="text" name="demolink" id="demolink" value="" placeholder="Guild's link" />
										<br/>
										<input type="text" name="demomail" id="demomail" value="" placeholder="Conctact mail" />
										<br/>										
										<div class="col-12">
											<textarea name="demomessage" id="demomessage" placeholder="Describe your community" rows="6"></textarea>
										</div>
										<h3 id="error"></h3>
										<br/>
                                        <p id="errore"></p>
									</div>
									<center>
										<a class="button" onclick="Submit()" style="width:50%">Submit</a>
									</center>
									</div>
							</form>
                            </div>
						</section>
					
		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; All rights reserved.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script>
            var Controllo=true;
            var errore;
				function Submit(){
                Controlla();
				if(Controllo==true){
				var url="https://radicig.altervista.org/Esame/Registration.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
					var formData = new FormData();
					formData.append("Name", document.getElementById("demoname").value);
					formData.append("Game", document.getElementById("democategory").value);
					formData.append("GuildName", document.getElementById("demoguild").value);
					formData.append("Link", document.getElementById("demolink").value);
					formData.append("Mail", document.getElementById("demomail").value);
					formData.append("Description", document.getElementById("demomessage").value);


					richiesta.send(formData);
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							document.getElementById("wrapper").innerHTML="<div id='wrapper' ><!-- Main --><section id='main' class='wrapper'><div class='inner'><h2>Thank you to Submit a request</h2><form name='Form1' id='Form1'><p>Your request will be reviewed by our experts. You will receive an email with the result of our evaluation.Thanks so much!</p><a class='button' href='index.php' style='width:50%'>Home page</a></div></form></div></section></div>";
						}
					}
                    
                    }else{
                    document.getElementById("errore").innerHTML = errore;
                    document.getElementById("demoname").focus;
                    }
				}



				function Controlla(){
                const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                	if(document.getElementById("demoname").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";
                    }
					else if(document.getElementById("democategory").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";}
					else if(document.getElementById("demoguild").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";}
					else if(document.getElementById("demoguild").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";}
					else if(document.getElementById("demolink").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";}
                    else if(document.getElementById("demomessage").value == ''){
                    Controllo = false;
                    errore = "Si prega di inserire tutti i campi";
                    }
					if(document.getElementById("demomail").value == ''){
						Controllo = false;
                        errore = "Si prega di inserire tutti i campi";
					}else if(document.getElementById("demomail").value.match(re)){

					}
                    else{
                    Controllo = false;
                    errore = "Si prega di inserire una mail valida";
                    }
					
				}
			</script>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>