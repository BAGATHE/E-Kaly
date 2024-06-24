<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./assets/font/font.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/resto.css">
    <link rel="icon" href="./assets/images/Logo.png">
    <script src="./assets/js/resto.js"></script>
    <title>E-Kaly | Restaurant</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./assets/images/logo.png">
            <h2>E-<span class="kaly">KALY</span></h2>
        </div>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        store
                    </span>
                    Shop
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        analytics
                    </span>
                    Analytics
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        rule_folder
                    </span>
                    Tickets
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        account_box
                    </span>
                    Users
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    Settings
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit">
                        <span class="material-icons-sharp">
                            troubleshoot
                        </span>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <span class="material-icons-sharp">
                    notifications_none
                </span>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <p>resto_nom</p>
                <img src="./assets/images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Dashboard -->
            <ul class="insights">
                <li>
                    <span class="material-icons-sharp">
                        boy
                    </span>
                    <span class="info">
                        <h3>
                            15
                        </h3>
                        <p>Nombres de client actif</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        house
                    </span>
                    <span class="info">
                        <h3>
                            20
                        </h3>
                        <p>Nombre de restaurant</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        assessment
                    </span>
                    <span class="info">
                        <h3>
                            14000 Ar
                        </h3>
                        <p>Revenus mensuel</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        auto_graph
                    </span>
                    <span class="info">
                        <h3>
                            6000 Ar
                        </h3>
                        <p>Difference de revenus</p>
                    </span>
                </li>
            </ul>
            <!-- End of Dashboard -->


        </main>

    </div>

</body>

</html>