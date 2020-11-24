<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../css/all.css" rel="stylesheet" type="text/css">
    <link href="../css/Stylesheet.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <div class="site-nav_Logo">
        <img alt="" src="../img/Aus de Berg Logo_ohne Text.png" width="50px">
        <p class="site-nav_Logo">Grafikdesign<br>Veronika Fischer</p>
    </div>
    <nav class="site-nav">
        <i class="fas fa-bars"></i>
        <ul>
            <a href="../index.html">
                <li>Home</li>
            </a>
            <a href="designvorschlaege.html">
                <li>Designmuster</li>
            </a>
            <a href="Blog.html">
                <li>Portfolio</li>
            </a>
            <a href="Bergshop.html">
                <li>Berg-Shop</li>
            </a>
            <a href="Kontakt.php">
                <li>Kontakt</li>
            </a>
        </ul>
    </nav>
    <div class="basket-icon">
        <a href="Basket.html"><i class="fa fa-shopping-cart button"></i>
        </a>
    </div>
</header>

<center>
    <main>
        <?php
        if (isset($_POST["submit"])) {
            mail("info@ausdeberg.de", "Kontaktformular", 'Vorname: ' . $_POST["Vorname"] . 'Name: ' . $_POST["Name"] . ' Email: ' . $_POST["email"] . ' Priorität: ' . $_POST["prioritat"] . ' Nachricht: ' . $_POST["message"]);
            ?>

            <p Nachricht>Forumular wurde gesendet</p>
            <?php
        }
        ?>
        <br>
        <section class="Kontaktformulargross">
            <p class="headline">Kontakt</p><br>
            <p class="text">Ich freue mich auf deine Nachricht</p><br>
            <form action="Kontakt.php" method="post">
                <input type="text" name="Vorname" placeholder="Vorname" required>
                <input type="text" name="Name" placeholder="Name" required><br>
                <input type="email" name="email" placeholder="E-Mail" required>
                <select name="prioritat">
                    <option value="DesignmusterButton">Designmuster</option>
                    <option value="BlogButton">Portfolio</option>
                    <option value="BergshopButton">Berg-Shop</option>
                    <option value="DesignmusterButton">Individuelle Anfrage</option>
                </select>
                <br>
                <br>
                <br>
                <textarea name="message" rows="8" cols="80" placeholder="Nachricht" required></textarea><br>
                <br>
                <button type="submit" name="submit">Absenden</button>
                <br>
                <br>
            </form>
        </section>

    </main>

    <footer>
        <div class="footer_content">
            <img src="../img/Aus de Berg Logo_Online.png" alt="" width="150" height="150">
            <nav class="nav-ende">
                <ul>
                    <li><a href="Impressum.html">Impressum</a></li>
                    <li><a href="Datenschutz.html">Datenschutz</a></li>
                </ul>
            </nav>
        </div>
    </footer>

</center>

<script src="http://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="../js/mobile-menu.js"></script>


</body>
</html>
