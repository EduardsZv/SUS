<?php
date_default_timezone_set('Europe/Athens');
$server = "127.0.0.1:3306";
$database = "uzskaite";
$user = "root";
$password = "";
$mysqli = new mysqli($server, $user, $password, $database);


//Sesijas pārbaude
$UserIP = strval($_SERVER['REMOTE_ADDR']);
//
$CheckSessionQuery = "SELECT * FROM sesija WHERE lietotajsIP = '{$UserIP}'";
$CheckSession = mysqli_query($mysqli, $CheckSessionQuery);
$Session = mysqli_fetch_assoc(mysqli_query($mysqli, $CheckSessionQuery));



if (mysqli_num_rows($CheckSession) == 0 ){ //Ja sesija neeksistē 
    redirect("login.php");
}
else if (mysqli_num_rows($CheckSession) > 0) { //Ja sesija eksistē
    $SessionExpiration = strtotime($Session['Expires']);
    $currDate = strtotime(date("Y-m-d H:i:s", time()));

    if ($SessionExpiration < $currDate) { //Ja sesija ir beigusies
        $DeleteSession = "DELETE FROM sesija WHERE lietotajsIP = '{$UserIP}';";
        mysqli_query($mysqli, $DeleteSession);
        redirect("login.php?login=1");
    }
}
$Session = mysqli_fetch_assoc(mysqli_query($mysqli, $CheckSessionQuery));     


    $query = "SELECT *, concat(Vards, ' ', Uzvards) as combined FROM pacients WHERE concat(Vards, ' ', Uzvards) LIKE '%{$keyword}%';";
    $row_counter = 1;

    $search_output = mysqli_query($mysqli, $query);
    while($row = mysqli_fetch_assoc($search_output)) {
        $row_counter = $row_counter + 1;
    }
    $search_output = mysqli_query($mysqli, $query);
    if ($row_counter == 1) $row_counter = $row_counter + 1;
    $page_height = 40+66.5*$row_counter;
    





?>
<html>
<head>
    <title>SUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/overview.css">
</head>

<body>

    <section class="augsa">
        <div id="page-container">
        <div class="top_banner section">
                <div class="top">
                     <div id="logo"><img src="../images/LOGO.png" alt="Logo"></div>
                    <div class="sveicinajums">Sveicināti,  <?php echo "{$Session['lietotajvards']}" ?></div>
                  
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
        <li class="upper-menu"><a href="https://www.nezinu.lv">Kontakti</a></li>
        <li class="upper-menu right-menu" id="vidavi"><a href="logout">Atslēgties</a></li>
    </ul>
    
    

</nav>
    <div id="otraisdiv" <?php echo "style=\"height:{$page_height}px\"";?>>
        <div class="patientselectscreen">
            <h1 class="header" id="pach1">Atrastie pacienti</h1>
        <div id="listsearch">
    <form method="post" action="patientlist.php">
        <input type="text" name="atslegasvards">
        <input type="image" src="../images/search.png" name="searching" alt="Submit" id="searchbutton">
    </form></div>
    </div><hr>
    <?php 

        if (mysqli_num_rows($search_output) > 0) {
        while($row = mysqli_fetch_assoc($search_output)) {
            $PacientaVards = $row['combined'];
            $PK = $row['PersonasKods'];
            echo "<div class=\"patientselectscreen\">
            <div class=\"patientbutton\">
                <a class=\"header\" href=\"patientinfo?pk={$PK}\" ><h1 style=\"font-size: big\">{$PacientaVards}</h1></a>
            </div>
            <div class=\"patientPK\">
                <h1 class=\"header\">{$PK}</h1>
            </div>";
            }
        } else echo "<div class=\"patientselectscreen\">
        <div class=\"patientbutton\">
            <h1 class=\"header\" style=\"color:#444444;\">Neviens pacients netika atrasts.</h1>
        </div>";
        





?>  
    <hr>
    </div>
        

    </div>
</body>
</html>