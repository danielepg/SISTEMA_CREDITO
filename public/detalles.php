<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>

    <link rel="stylesheet" href="./css/DASHBOARD.css">
    <link rel="stylesheet" href="../bootstrap532/css/bootstrap.min.css">

    <style>

    </style>
</head>

<body class=" bg-body-secondary ">

    <?php include 'dashboard_clientes.php'; ?>

    <br><br>
    <button class="btn btn-secondary float-end mx-3 my-2">Nuevo Pago</button>
    <h3 class="px-3 w-auto m-0">Pagos</h3>
    <h4 class="px-3 w-auto m-0">De: Cliente</h4>

   <br>
    <div class="container-fluid px-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:0px 8px;" scope="row">1</td>
                    <td style="padding:0px 8px;">Mark</td>
                    <td style="padding:0px 8px;">Otto</td>
                    <td style="padding:0px 8px;">@mdo</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">2</td>
                    <td style="padding:0px 8px;">Jacob</td>
                    <td style="padding:0px 8px;">Thornton</td>
                    <td style="padding:0px 8px;">@fat</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">3</td>
                    <td style="padding:0px 8px;">Larry the Bird</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">1</td>
                    <td style="padding:0px 8px;">Mark</td>
                    <td style="padding:0px 8px;">Otto</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>

                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">2</td>
                    <td style="padding:0px 8px;">Jacob</td>
                    <td style="padding:0px 8px;">Thornton</td>
                    <td style="padding:0px 8px;">@fat</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>
                </tr>
                <tr>
                    <td style="padding:0px 8px;" scope="row">3</td>
                    <td style="padding:0px 8px;">Larry the Bird</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;">@twitter</td>
                    <td style="padding:0px 8px;"><button class="text-white rounded border-0 py-1 px-2 bg-secondary float-end m-2">Accion</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example" class="px-3">
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