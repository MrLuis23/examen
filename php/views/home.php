<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="assets/css/styles.css" rel="stylesheet">
    <title>eShop</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary pb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">eShop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" id="category-dropdown">
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    <div class="container-fluid px-4">
        <h1 class="fs-6">
            <strong>
                Productos destacados
            </strong>
        </h1>
        <div class="container d-flex">
            <div class="row d-flex flex-row flex-nowrap row-productos" id="productosDestacados">
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <h1 class="fs-6">
            <strong>
                Productos más vendidos
            </strong>
        </h1>
        <div class="container d-flex">
            <div class="row d-flex flex-row flex-nowrap row-productos" id="productosMasVendidos">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="assets/js/getCategories.js" crossorigin="anonymous"></script>
    <script src="assets/js/getProducts.js" crossorigin="anonymous"></script>
</body>
</html>
