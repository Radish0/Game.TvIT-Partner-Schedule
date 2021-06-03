<!DOCTYPE HTML>
<?php
require('Https.php');
if (isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"]) != 0) $_SESSION["Mail"] = $_REQUEST["Mail"];
if (isset($_REQUEST["Nome"]) || strlen($_REQUEST["Nome"]) != 0) $_SESSION["Nome"] = $_REQUEST["Nome"];
?>

<html>

<head>
  <title>Request access</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<body class="is-preload" onload="Load()">

  <!-- Header -->
  <header id="header">
    <a href="index.html" class="title">Game.TV Partner</a>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Log.php">Login</a></li>
        <li><a href="Register.php">Work with us</a></li>
        <li><a href="Request.php" class="active">Require access</a></li>
      </ul>
    </nav>
  </header>

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Main -->

    <section id="main" class="wrapper">
      <div class="inner">
        <h2>Require access to a community</h2>
        <form>
          <div class="col-6 col-12-xsmall">
            <input type="text" name="demo-nome" id="demonome" value="" placeholder="Name" required="required" />
            <br />
            <input type="text" name="demo-cognome" id="democognome" value="" placeholder="Surname" required="required" />
            <br />
            <input type="text" name="demo-mail" id="demomail" value="" placeholder="Email" required="required" />
            <br />
            <input type="password" name="demo-pass" id="demopass" value="" placeholder="Password" required="required" />
            <br />
            <input type="password" name="demo-pass1" id="demopass1" value="" placeholder="Confrim Password" required="required" />
            <br />
            <input type="text" name="demo-link" id="demolink" value="" placeholder="Link in app" required="required" />
            <br />
            <input type="text" name="demo-Nickname" id="demonickname" value="" placeholder="Nickname" required="required" />
            <br />
            <div class="col-12">
              <select name="democategory" id="democategory">
                <option value="" id="0">- Community -</option>
              </select>
              <h3 id="error"></h3>
            </div>
            <div>
              <center>
                <a class="button" onclick="Submit()" style="width:50%">Require</a>
                <br />
                <br />
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
  var errore="";
  var controllo=true;
    function Load() {
      var comm = '<?php echo $_SESSION["Nome"]; ?>';
      var mail = '<?php echo $_SESSION["Mail"]; ?>';
      if (comm != "" && mail != "") {
        document.getElementById("demomail").value = mail;
        document.getElementById("demomail").disabled = true;
        document.getElementById("0").value = comm;
        document.getElementById("0").innerText = comm;
        document.getElementById("0").disabled = true;
      } else {
        var url = "https://radicig.altervista.org/Esame/CommunityName.php";
        var richiesta = new XMLHttpRequest();
        richiesta.open("GET", url, true);
        richiesta.send();
        richiesta.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var risp = this.responseText;
            rispObj = JSON.parse(risp);

            var sel = document.getElementById("democategory");

            for (i = 1; i < rispObj.length; i++) {
              var opt = document.createElement("option");
              opt.innerText = rispObj[i].Nome;
              opt.setAttribute("value", rispObj[i].Nome);
              sel.appendChild(opt);
            }
          }
        }

      }
    }

    function Submit() {
     Controlla();
      if (controllo == true) {
        var url = "https://radicig.altervista.org/Esame/AccessToACommunity.php";
        var richiesta = new XMLHttpRequest();
        richiesta.open("POST", url, true);
        var formData = new FormData();
        formData.append("Nome", document.getElementById("demonome").value);
        formData.append("Cognome", document.getElementById("democognome").value);
        formData.append("Mail", document.getElementById("demomail").value);
        formData.append("Password", document.getElementById("demopass").value);
        formData.append("Nickname", document.getElementById("demonickname").value);
        formData.append("Link", document.getElementById("demolink").value);
        formData.append("Community", document.getElementById("democategory").value);

        richiesta.send(formData);
        richiesta.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          document.getElementById("wrapper").innerHTML="<div id='wrapper' ><!-- Main --><section id='main' class='wrapper'><div class='inner'><h2>Thank you to complete the registration!</h2><form name='Form1' id='Form1'><p>Click on the button to log into the dashboard</p><a class='button' href='Log.php' style='width:50%'>Home page</a></div></form></div></section></div>";
          }
        }
      } else {
        document.getElementById("error").innerHTML = errore;
      }
    }

    function Controlla() {
      var p1 = document.getElementById("demopass").value;
      var p2 = document.getElementById("demopass1").value;
      var value = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

      if (document.getElementById("demonome").value == '' || document.getElementById("democognome").value == '' || document.getElementById("demolink").value == '' || document.getElementById("demomail").value == '' || document.getElementById("democategory").value == '' || document.getElementById("demonickname").value == '') {
        controllo = false;
        errore = "Si prega di inserire tutti i campi";
      } else if (p1.match(value)) {
        if (p1 == p2) {
        } else {
          controllo = false;
          errore = "Le password non corrispondono";
        }
      } else {
        controllo = false;
        errore = "Minimo otto caratteri, almeno una lettera maiuscola, una lettera minuscola e un numero";
        document.getElementById("demopass").focus();
        document.getElementById("demopass").value="";
        document.getElementById("demopass1").value="";
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
