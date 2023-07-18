
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/pdfstyle.css">
    <title>Reporte Fundae</title>

</head>
    <body>
        <main class="table">
            <section class="table__header">
            <div class="input-group">
                <img src="../public/img/transaction.png" alt="">

            </div>

            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Concepto</th>
                            <th> Actividad</th>
                            <th> Monto</th>
                            <th> Fecha </th>
                            <th> Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($result as $movimiento)
                        <tr>
                            <td>{{$movimiento->concepto->nombre}}</td>
                            <td>{{$movimiento->actividad->nombre}}</td>
                            <td>{{$movimiento->monto}}</td>
                            <td>{{$movimiento->created_at}}</td>
                            <td>{{$movimiento->descripcion}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <td></td>
                <td></td>
                <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">Total: ${{ $result->sum('monto') }}</th>
                <td></td>
                <td></td>

            </table>
        </section>
        </main>
        <footer class="container">
            <p>Telefono: 381-5041253/381-152343298 </p>
            <p>Contacto: 9 de Julio 613, Planta Baja, Departamento A. San Miguel de Tucumán - Tucumán - Argentina.</p>
      </footer>
    </body>
</html>
