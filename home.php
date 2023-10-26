<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <style>
        /* CSS untuk layar kecil */
        @media (max-width: 767px) {
            .navbar-toggler-icon {
                order: 2;
            }
            .navbar-brand {
                text-align: center;
                order: 1;
            }
            .navbar-nav {
                display: none;
                flex-direction: column;
                width: 100%;
            }
            .navbar.show .navbar-nav {
                display: flex;
                order: 3;
            }
            .dark-mode-toggle {
                order: 2;
            }
        }

        /* CSS untuk layar besar */
        @media (min-width: 768px) {
            .navbar-toggler-icon {
                order: -1;
            }
            .navbar-brand {
                order: 0;
            }
            .navbar-nav {
                display: flex;
                flex-direction: row;
                order: 1;
            }
            .dark-mode-toggle {
                order: 3;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Poliklinik</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbarTogglerDemo01">
                <li class="nav-item">
                    <a class="nav-link active disabled" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dokter.php">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pasien.php">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="periksa.php">Periksa</a>
                </li>
            </ul>
            <div class="form-check form-switch dark-mode-toggle">
                <input class="form-check-input" type="checkbox" id="darkModeToggle">
                <label class="form-check-label" for="darkModeToggle">Dark Mode</label>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar.classList.contains('show')) {
                navbar.classList.remove('show');
            } else {
                navbar.classList.add('show');
            }
        });
    </script>
</body>
</html>
