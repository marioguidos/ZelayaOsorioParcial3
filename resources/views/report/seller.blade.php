<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 style="text-center">Reporte Vendedor</h2>
    <table class="table"  style="width: 100%" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">dui</th>
            <th scope="col">address</th>
            <th scope="col">nit</th>
            <th scope="col">usuario</th>
           
          </tr>
        </thead>
        <tbody>
        @foreach ($seller as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->dui}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->nit}}</td>
            <td>{{$item->id_usuario}}</td>
          </tr>
        @endforeach  
        </tbody>
      </table>
</body>
</html>