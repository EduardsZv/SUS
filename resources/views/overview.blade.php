<?php
session_start();
date_default_timezone_set('Europe/Athens');
$UserIP = strval($_SERVER['REMOTE_ADDR']);
if (isset($_GET['username'])) {
    $usr = $_GET['username'];
}
else {header("Location: login"); exit();}
// Savienojums ar datubāzi
$server = "127.0.0.1:3306";
$database = "uzskaite";
$user = "root";
$password = "";
$mysqli = new mysqli($server, $user, $password, $database);


$SessionExpiration = date("Y-m-d H:i:s", time()+ 3600); //Sesija ilgst 1 stundu

    
    //sesijas izveide
    $CheckSessionQuery = "SELECT * FROM sesija WHERE lietotajsIP = '{$UserIP}'";
    $CheckSession = mysqli_query($mysqli, $CheckSessionQuery);
if (mysqli_num_rows($CheckSession) == 0 ) {
    $AddSessionQuery = "INSERT INTO sesija (lietotajvards, lietotajsIP, Expires) VALUES ('{$usr}', '{$UserIP}', '{$SessionExpiration}')";
    mysqli_query($mysqli, $AddSessionQuery);
}

//Sesijas pārbaude
$CheckSessionQuery = "SELECT * FROM sesija WHERE lietotajsIP = '{$UserIP}'";
$CheckSession = mysqli_query($mysqli, $CheckSessionQuery);
$Session = mysqli_fetch_assoc(mysqli_query($mysqli, $CheckSessionQuery));



if (mysqli_num_rows($CheckSession) == 0 ){ //Ja sesija neeksistē 
    redirect("/login?login=1");
}
else if (mysqli_num_rows($CheckSession) > 0) { //Ja sesija eksistē
    $SessionExpiration = strtotime($Session['Expires']);
    $currDate = strtotime(date("Y-m-d H:i:s", time()));

    if ($SessionExpiration < $currDate) { //Ja sesija ir beigusies
        $DeleteSession = "DELETE FROM sesija WHERE lietotajsIP = '{$UserIP}';";
        mysqli_query($mysqli, $DeleteSession);
        redirect("/login?login=1");
    }
}
$Session = mysqli_fetch_assoc(mysqli_query($mysqli, $CheckSessionQuery));

?>

<head>
    <title>SUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/overview.css">


</head>

<body>

    <section class="augsa">
        <div id="page-container">
        <div class="top_banner section">
                <div class="top">
                     <div id="logo"><img src="../images/LOGO.png" alt="Logo"></div>
                    <div class="sveicinajums">Sveicināti, {{$Session['lietotajvards']}}</div>
                  
                </div>
                
        </div>
<nav id="main-menu" class="section">
    <ul class="parent-menu">
        <li class="sub-menu-caption">+
            <ul class="sub-menu">
                <li><a href="https://www.nezinu.lv">Jauni analīžu rezultāti</a></li>
                <li><a href="https://www.nezinu.lv">Jauna zāļu izmantošana</a></li>
                <li><a href="https://www.nezinu.lv">Pacients</a></li>
            </ul>
        </li>
        <li class="upper-menu"><a href="overview.php">Pacienti</a></li>
        <li class="upper-menu"><a href="https://www.nezinu.lv">Maiņu grafiks</a></li>
        <li class="upper-menu"><a href="https://www.nezinu.lv">Info par zālēm</a></li>
        <li class="upper-menu"><a href="https://www.nezinu.lv">Pasts</a></li>
        <li class="upper-menu"><a href="https://www.nezinu.lv">Jaunumi medicīnā</a></li>
        <li class="upper-menu"><a href="https://www.nezinu.lv">{{implode($Session)}}</a></li>
        <li class="upper-menu right-menu"><a href="/logout">Atslēgties</a></li>
    </ul>
    <section class="shit">
        <h1 class="rumb">Pacientu meklēšana</h1>
        <div class="box"><form method="post" action="{{ route('meklesana') }}">@csrf<input type="search" name="atslegasvards" id="search" placeholder="" /></form>
         
    </div>
    </section>
    <div id="demobox">
        
        </div>

</nav>
</body>
