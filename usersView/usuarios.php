<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creditos</title>

    <link rel="stylesheet" href="../public/css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

    <style>

    </style>
</head>

<body class=" bg-body-secondary ">

    <?php include 'dashboard_usuarios.php'; ?>

    <br><br>
    <button class="btn btn-info float-end mx-3 my-2">
        <a class=" text-decoration-none text-black" href="nuevo_usuario.php">Nuevo Usuario</a>
    </button>
    <h2 class="px-3 w-auto">Lista usuarios</h2>

   
    <div class="bg-white px-3 position-fixed overflow-auto" style="top:150px; left:17px; right:17px; bottom:70px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:0px 8px;" scope="row">1</td>
                    <td style="padding:0px 8px;">Mark</td>
                    <td style="padding:0px 8px;">Otto</td>
                    <td style="padding:0px 8px;">@mdo</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">
                        <a class=" text-decoration-none text-white" href="editar_usuario.php">Editar</a>
                    </button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">2</td>
                    <td style="padding:0px 8px;">Jacob</td>
                    <td style="padding:0px 8px;">Thornton</td>
                    <td style="padding:0px 8px;">@fat</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Editar</button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">3</td>
                    <td style="padding:0px 8px;">Larry the Bird</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Editar</button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">1</td>
                    <td style="padding:0px 8px;">Mark</td>
                    <td style="padding:0px 8px;">Otto</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Editar</button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>

                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">2</td>
                    <td style="padding:0px 8px;">Jacob</td>
                    <td style="padding:0px 8px;">Thornton</td>
                    <td style="padding:0px 8px;">@fat</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Editar</button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">3</td>
                    <td style="padding:0px 8px;">Larry the Bird</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Editar</button></td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example" class="px-3 fixed-bottom">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

</body>

</html>