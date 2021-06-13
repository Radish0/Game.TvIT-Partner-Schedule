<!DOCTYPE HTML>
<html>
<?php 
    session_start();
    require('Https.php');
    if(!isset($_SESSION["Mail"]) && !isset($_SESSION["Password"]) && !isset($_SESSION["Tipo"]) && !isset($_SESSION["Community"])){
        http_response_code(401);
        header('Location: Log.php');
        die();
    }

?>
	<head>
		<title>Game.TV Partner</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			th{
				width: 25%;
			}
            input[type=time] {
            border: none;
            color: #2a2c2d;
            font-size: 14px;
            font-family: helvetica;
            width: 100px;
          }
		</style>
	</head>
	<body class="is-preload" onload="Requests()">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title">Game.TV Partner</a>
				<nav>
					<ul>
                        <li><a onclick="Requests()" class="active">Reserve tournaments</a></li>
                        <li><a href="Winners.php" >Winners</a></li>
						<li><a href="Logout.php" >Logout</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Main -->
					<center><h2>Tournaments<h2></center>
					<section id="main" class="wrapper">
							<div id="tablearea" class="table-wrapper" style="padding-top: 20px;">
								<table id="Table">
									<thead>
										<tr>
											<th>Data</th>
											<th>Ora</th>
											<th>Gioco</th>
                                            <th>Moalità</th>
										</tr>
                                        <tr>
                                            <th>14/06/2021</th>
											<th><input type="time" id="lun" name="lun" min="09:00" max="23:00" onchange="enable(0)"></th>
											<th id="0"></th>
                                            <th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod0" disabled="true" onchange="Carica(14,06,2021,lun.value,mod0.value)">
                                            <option value="def" >-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>15/06/2021</th>
											<th><input type="time" id="mar" name="mar" min="09:00" max="23:00" onchange="enable(1)"></th>
											<th id="1"></th>
                                            <th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod1" disabled="true" onchange="Carica(15,06,2021,mar.value,mod1.value)">
                                            <option value="def">-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>16/06/2021</th>
											<th><input type="time" id="mer" name="mer" min="09:00" max="23:00" onchange="enable(2)"></th>
											<th id="2"></th>
                                            <th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod2" disabled="true" onchange="Carica(16,06,2021,mer.value,mod2.value)">
                                            <option value="def">-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>17/06/2021</th>
											<th><input type="time" id="gio" name="gio" min="09:00" max="23:00" onchange="enable(3)"></th>
											<th id="3"></th><th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod3" disabled="true" onchange="Carica(17,06,2021,gio.value,mod3.value)">
                                            <option value="def">-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>18/06/2021</th>
											<th><input type="time" id="ven" name="ven" min="09:00" max="23:00" onchange="enable(4)"></th>
											<th id="4"></th>
                                            <th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod4" disabled="true" onchange="Carica(18,06,2021,ven.value,mod4.value)">
                                              <option value="def">-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
										<tr>
                                            <th>19/06/2021</th>
											<th><input type="time" id="sab" name="sab" min="09:00" max="23:00" onchange="enable(5)"></th>
											<th id="5"></th>
                                            <th><label for="cars">Modalità: </label>
                                            <select name="mod" id="mod5" disabled="true" onchange="Carica(19,06,2021,sab.value,mod5.value)">
                                            <option value="def">-- Seleziona --</option>	
                                              <option value="1v1">1v1</option>
                                              <option value="2v2">2v2</option>
                                              <option value="3v3">3v3</option>
                                            </select>
                                            </th>
                                        </tr>
									</thead>
								</table>
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
				function Requests(){
                    var url="https://radicig.altervista.org/Esame/Date.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("GET", url, true);

					richiesta.send();
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp=this.responseText;
							var rispObj=JSON.parse(risp);
                            console.log(rispObj);
							for(i=0; i<6; i++){
                            	document.getElementById(i).innerHTML = rispObj[0];
							}
								}
						else if(this.readyState==4 && this.status==400){
                        document.getElementById("error").innerHTML = "You are not registered";
                        }
                        else if(this.readyState==4 && this.status==401){
                        document.getElementById("error").innerHTML = "Wrong Password";
                        }
						}
						}

				function enable(i){
                var obj="mod"+i;
					document.getElementById(obj).disabled = false;
				}
                function Carica(day,month,year, dayy, mod){
                	var url="https://radicig.altervista.org/Esame/Upload.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
                    var data= year+"-"+month+"-"+day+" "+dayy+":00";
					var formData = new FormData();
					formData.append("Data", data);
                    formData.append("Mod", mod);

					richiesta.send(formData);
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){

				}
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