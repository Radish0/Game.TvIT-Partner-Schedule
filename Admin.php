<!DOCTYPE HTML>
<html>
<?php 
    session_start();
    require('Https.php');
    if(!isset($_SESSION["Nome"]) && !isset($_SESSION["Password"]) && !isset($_SESSION["Tipo"])){
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
	</head>
	<body class="is-preload" onload="Requests()">

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Game.TV Partner</a>
				<nav>
					<ul>
                        <li><a onclick="Requests()" class="active">Request</a></li>
                        <li><a onclick="Score()" >Score</a></li>
						<li><a href="Logout.php" >Logout</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Main -->
					<center><h2>New Partners<h2></center>
					<section id="main" class="wrapper">
							<div id="tablearea" class="table-wrapper" style="padding-top: 20px;">
								<table id="Table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Game</th>
											<th>Guild's Name</th>
											<th>Link</th>
											<th>Mail</th>
											<th colspan="2">Approved</th>
										</tr>
									</thead>
								</table>
							</div>
						</section>
                        
                        <center><h2>Partners' Summary<h2></center>
                        <section id="main" class="wrapper">
							<div id="tablearea" class="table-wrapper" style="padding-top: 20px;">
								<table id="Table2">
									<thead>
										<tr>
											<th>Name</th>
											<th>Game</th>
											<th>Guild's Name</th>
											<th>Link</th>
											<th>Mail</th>
											<th>State</th>
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
				var rispObj="";
                var table;
                var table2;
				function Requests(){
                    var url="https://radicig.altervista.org/Esame/Richieste.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
                    
                    var formData = new FormData();
					formData.append("Type", 0);

					richiesta.send(formData);
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp=this.responseText;
							rispObj=JSON.parse(risp);
                            console.log(rispObj);
							
							table = document.getElementById('Table');
							for(i=0; i<rispObj.length;i++){
								var tr = document.createElement('tr');
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj[i]["Nome"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj[i]["Gioco"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj[i]["NomeGilda"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
 								var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj[i]["Link"]);
                                td.appendChild(text1);
								tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj[i]["Mail"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var a = document.createElement('a');
                                a.setAttribute("class", "button primary");
                                a.setAttribute("id", i);
                                a.onclick = function() {doSomething(this.id, "Approved");};
                                var text1 = document.createTextNode("Accept");
                                a.appendChild(text1);
                                td.appendChild(a);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var a = document.createElement('a');
                                a.setAttribute("class", "button primary");
                                a.setAttribute("id", i);
    							a.onclick = function() {doSomething(this.id, "Rejected");};
                                var text1 = document.createTextNode("Reject");
                                a.appendChild(text1);
                                td.appendChild(a);
                                tr.appendChild(td);
                                table.appendChild(tr);
								}
							}
						}
                    var url="https://radicig.altervista.org/Esame/Richieste.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
                    var formData = new FormData();
					formData.append("Type", 1);

					richiesta.send(formData);
					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
							var risp=this.responseText;
							var rispObj2=JSON.parse(risp);
                            console.log(rispObj2);
							
							table2 = document.getElementById('Table2');
							for(i=0; i<rispObj2.length;i++){
								var tr = document.createElement('tr');
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["Nome"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["Gioco"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["NomeGilda"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
 								var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["Link"]);
                                td.appendChild(text1);
								tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["Mail"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                var td = document.createElement('td');
                                var text1 = document.createTextNode(rispObj2[i]["Stato"]);
                                td.appendChild(text1);
                                tr.appendChild(td);
                                
                                table2.appendChild(tr);
								}
							}
					}
			}
            
            function doSomething(i, state){
            	document.getElementById(i).enabled=false;

				var url="https://radicig.altervista.org/Esame/Notification.php";
					var richiesta=new XMLHttpRequest();
					richiesta.open("POST", url, true);
					
					var formData = new FormData();
					formData.append("Mail", rispObj[0]["Mail"]);
                    formData.append("Name", rispObj[0]["Nome"]);
					formData.append("Stato", state);


					richiesta.send(formData);

					richiesta.onreadystatechange=function(){
						if (this.readyState==4 && this.status==200){
                        location.reload();
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
