<?php
date_default_timezone_set('Europe/Athens');
//Savienojums ar datubāzi
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
} else if (mysqli_num_rows($CheckSession) > 0) { //Ja sesija eksistē
    $SessionExpiration = strtotime($Session['Expires']);
    $currDate = strtotime(date("Y-m-d H:i:s", time()));

    if ($SessionExpiration < $currDate) { //Ja sesija ir beigusies
        $DeleteSession = "DELETE FROM sesija WHERE lietotajsIP = '{$UserIP}';";
        mysqli_query($mysqli, $DeleteSession);
        redirect("login.php?login=1");
    }
}
$Session = mysqli_fetch_assoc(mysqli_query($mysqli, $CheckSessionQuery));    

$query = "SELECT * FROM pacients WHERE PersonasKods = '{$PK}';";
$pacients = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($pacients);

?>

<head>
    <title>SUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/overview.css">
    <style>
        #pirmaisdiv {
            display: none;
        }
    </style>
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
                    <li class="upper-menu"><a href="#">Maiņu grafiks</a></li>
                    <li class="upper-menu"><a href="#">Info par zālēm</a></li>
                    <li class="upper-menu"><a href="#">Pasts</a></li>
                    <li class="upper-menu"><a href="#">Jaunumi medicīnā</a></li>
                    <li class="upper-menu"><a href="#">Kontakti</a></li>
                    <li class="upper-menu right-menu" id="vidavi"><a href="logout.php">Atslēgties</a></li>
                </ul>
            </nav>

            <nav id='menu'>
                <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
                <ul>
                    <li class="upper-menu" id="person-info-menu">
                        <a href="#">Personīgā informācija</a>
                    </li>
                    <li class="upper-menu"><a href="#">Analīzes</a></li>
                    <li class="upper-menu"><a href="#">Vēsture</a></li>
                </ul>
            </nav>

            <div id="pirmaisdiv">
                <h2>Personas dati</h2>
                <p>Vārds: <?php echo $row['Vards']; ?></p>
                <p>Uzvārds: <?php echo $row['Uzvards']; ?></p>
                <p>Personas Kods: <?php echo $row['PersonasKods']; ?></p>
                <p>Vecums: <?php echo $row['Vecums']; ?></p>
                <p>Adrese: <?php echo $row['Adrese']; ?></p>
            </div>

            <script>
                const personInfoMenu = document.getElementById('person-info-menu');
                const personalDataDiv = document.getElementById('pirmaisdiv');

                personInfoMenu.addEventListener('click', function(event) {
                    event.preventDefault();
                    personalDataDiv.style.display = 'block';
                });
            </script>

            <div id="sloppytoppydiv">
                <form method="post" action="patientlist.php">
                    <input type="text" name="atslegasvards">
                    <input type="image" src="../images/search.png" name="searching" alt="Submit" id="searchbutton">
                </form>
            </div>
            <h1 class="header"><?php echo "{$row['Vards']} {$row['Uzvards']}"; ?></h1>

        </div>
    </section>
</body>
