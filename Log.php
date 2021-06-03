<!DOCTYPE HTML>
<?php 
    require('Https.php');
    session_start();
?>

<html>
	<head>
		<title>Game.TV Partner</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Game.TV Partner</a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="Log.php" class="active">Login</a></li>
						<li><a href="Register.php">Work with us</a></li>
                        <li><a href="ReqToAcommunity.php">Require access</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Main -->
					
					<section id="main" class="wrapper">
						<div class="inner">
							<h2>Login</h2>
								<form>
									<div class="col-6 col-12-xsmall">
										<input type="text" name="demo-mail" id="demomail" value="" placeholder="Email" required="required"/>
										<br/>
										<input type="password" name="demo-ps" id="demops" value="" placeholder="Password" required="required"/>
										<h3 id="error"></h3>
									</div>
									<div>
									<center>
										<a class="button" onclick="Submit()" style="width:50%">Login</a>
										<br/>
										<br/>
										<a href="Register.html">Do you want to collaborate with us? Click here</a>
									</center>
									</div>
							</form>
						</div>
						</section>
					
			</div>
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
				function Submit(){
                Controlla();
				if(Controllo==true){
				var url="https://radicig.altervista.org/Esame/Login.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
					var formData = new FormData();
					formData.append("Mail", document.getElementById("demomail").value);
					formData.append("Password", document.getElementById("demops").value);

					richiesta.send(formData);
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp = this.responseText;
            				var rispObj = JSON.parse(risp);
                            console.log(rispObj);
                            if(rispObj["description"]=="Gestore"){
                            	location.href="Gestore.php";
                                }else{
                                location.href="Admin.php";
                                }
						}
                        else if(this.readyState==4 && this.status==404){
                        document.getElementById("error").innerHTML = "You are not registered";
                        }
                        else if(this.readyState==4 && this.status==401){
                        document.getElementById("error").innerHTML = "Wrong Password";
                        }
					}
                    
                    }else{
                    document.getElementById("error").innerHTML = errore;
                    document.getElementById("demomail").focus;
                    }
				}

				function Controlla(){
                	if(document.getElementById("demomail").value == ''){
                    Controllo = false;
					errore = "Compile all the fields";
                    }
					else if(document.getElementById("demops").value == ''){
                    Controllo = false;
                    errore = "Compile all the fields";}
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
