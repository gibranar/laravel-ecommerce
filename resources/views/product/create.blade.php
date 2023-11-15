<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="price">Harga</label>
        <input type="text" name="price">
        <label for="quantity">Jumlah</label>
        <input type="text" name="quantity">
        <button type="submit">Create</button>
    </form>
</body>
</html>