<!DOCTYPE HTML>
<?php 
    require('Https.php');
?>

<html>
	<head>
		<title>Request access</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload" onload="Load()">

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Game.TV Partner</a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="Log.php" >Login</a></li>
						<li><a href="Register.php">Work with us</a></li>
                        <li><a href="Request.php" class="active">Require access</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Main -->
					
					<section id="main" class="wrapper">
						<div class="inner">
							<h2>Require access to a community</h2>
								<form>
									<div class="col-6 col-12-xsmall">
										<input type="text" name="demo-nome" id="demo-nome" value="" placeholder="Name" required="required"/>
										<br/>
                                        <input type="text" name="demo-cognome" id="demo-cognome" value="" placeholder="Surname" required="required"/>
										<br/>
                                        <input type="text" name="demo-mail" id="demomail" value="" placeholder="Email" required="required"/>
										<br/>
                                        <input type="password" name="demo-pass" id="demopass" value="" placeholder="Password" required="required"/>
										<br/>
                                        <input type="password" name="demo-pass1" id="demopass1" value="" placeholder="Confrim Password" required="required"/>
										<br/>
                                        <input type="text" name="demo-link" id="demomail" value="" placeholder="Link in app" required="required"/>
										<br/>
                                        <input type="text" name="demo-Nickname" id="demonickname" value="" placeholder="Nickname" required="required"/>
										<br/>
                                        <div class="col-12">
											<select name="democategory" id="democategory">
												<option value="">- Community -</option>
											</select>
										<h3 id="error"></h3>
										<br/>
										<h4 id="error"></h4>
									</div>
									<div>
									<center>
										<a class="button" onclick="Submit()" style="width:50%">Require</a>
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
				function Load(){
				var url="https://radicig.altervista.org/Esame/CommunityName.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("GET", url, true);
					richiesta.send();
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp=this.responseText;
							rispObj=JSON.parse(risp);

							var sel= document.getElementById("democategory");

							for (i=1;i<rispObj.length;i++){
							var opt=document.createElement("option");
								opt.innerText=rispObj[i].Nome;
								opt.setAttribute("value",rispObj[i].Nome);
								sel.appendChild(opt);
						}
						}
					}
                    
				}

				function Submit(){
					
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
