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
				width: 20%;
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
                        <li><a href="Gestore.php">Reserve tournaments</a></li>
                        <li><a href="Winners.php" class="active">Winners</a></li>
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
											<th>Modalità</th>
                                            <th>Vincitore</th>
                                            <th>Vincitore</th>
                                            <th>Vincitore</th>
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
            var table;
            var rispObj;
            var a=0;
				function Requests(){
                    var url="https://radicig.altervista.org/Esame/Tournaments.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("GET", url, true);

					richiesta.send();
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp=this.responseText;
							rispObj=JSON.parse(risp);
                            console.log(rispObj);
                            table = document.getElementById('Table');
							for(i=0; i<rispObj.length; i++){
                            
                            var tr = document.createElement('tr');
                            var td = document.createElement('td');
                            var text1 = document.createTextNode(rispObj[i]["Data"]);
                            td.appendChild(text1);
                            tr.appendChild(td);

                            var td = document.createElement('td');
                            var text1 = document.createTextNode(rispObj[i]["Modalità"]);
                            td.appendChild(text1);
                            tr.appendChild(td);
                            
                            var td = document.createElement('td');
                            var x = document.createElement("INPUT");
                            x.setAttribute("type", "text");
                            x.setAttribute("name",i);
                            x.setAttribute("PlaceHolder", "Vincitore");
                            x.setAttribute("id",a);
                            x.onchange = function() {doSomething(this.id,this.name);};
                            td.appendChild(x);
                            tr.appendChild(td);
                            a++;
                            
                            var td = document.createElement('td');
                            var x = document.createElement("INPUT");
                            x.setAttribute("type", "text");
                            x.setAttribute("name",i);
                            x.setAttribute("PlaceHolder", "Vincitore");
                            x.setAttribute("id",a);
                            x.onchange = function() {doSomething(this.id,this.name);};
                            td.appendChild(x);
                            tr.appendChild(td);
                            a++;
                            
                            var td = document.createElement('td');
                            var x = document.createElement("INPUT");
                            x.setAttribute("id",a);
                            x.setAttribute("name",i);
                            x.setAttribute("type", "text");
                            x.setAttribute("PlaceHolder", "Vincitore");
                            x.onchange = function() {doSomething(this.id, this.name);};
                            td.appendChild(x);
                            tr.appendChild(td);
                            table.appendChild(tr);
                            a++;
                            		}
                            	}
                            }
                            }
                            	
					function doSomething(a,i){
					var url="https://radicig.altervista.org/Esame/Insert.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
					
					var formData = new FormData();
					formData.append("ID", rispObj[i]["ID"]);
                    formData.append("Nickname", document.getElementById(a).value);
					
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