<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="https://getbootstrap.com/"
               class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./dashboard" class="nav-link px-2 text-white">Salas</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">
            Filtrado
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div>
                    <label for="capacidad">Capacidad:</label>
                    <select name="capacidad" id="capacidad" class="form-select">
                        <option value="">Todos</option>
                    </select>
                </div>
                <div>
                    <label for="ubicacion">Ubicacion:</label>
                    <select name="ubicacion" id="ubicacion" class="form-select">
                        <option value="">Todos</option>
                    </select>
                </div>
                <div>
                    <label for="equipamiento">Equipamiento:</label>
                    <select name="equipamiento" id="equipamiento" class="form-select">
                        <option value="">Todos</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center gap-5 mt-4">
                    <button type="submit" class="btn btn-primary ">Filtrar</button>
                    <a href="/dashboard" class="btn btn-secondary">Limpiar</a>
                </div>
            </form>

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="bg-dark text-white">Imagen</th>
                        <th class="bg-dark text-white">Capacidad</th>
                        <th class="bg-dark text-white">Ubicacion</th>
                        <th class="bg-dark text-white">Equipamiento</th>
                        <th class="bg-dark text-white">Ver Detalles</th>
                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
