<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 style="text-center">Reporte todos los productos</h2>
    <table class="table"  style="width: 100%" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Producto</th>
            <th scope="col">description</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Stock</th>
            <th scope="col">Garantia</th>
            <th scope="col">Vendedor</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($product as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->unitPrice}}</td>
            <td>{{$item->existence}}</td>
            <td>{{$item->warranty}}</td>
            <td>{{$item->fk_seller}}</td>
          </tr>
        @endforeach  
        </tbody>
      </table>
</body>
</html>