<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      plugins: [

        require('@tailwindcss/forms'),
      ],
    }
  </script>
</head>
<body>
<section class="flex items-center justify-center h-[100VH]">
<div class="relative overflow-x-auto">
    <table class="text-center text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID DEL PRODUCTO
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre producto
                </th>
                <th scope="col" class="px-6 py-3">
                   Cantidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Vendedor
                </th>
                <th scope="col" class="px-6 py-3">
                    Cliente
                </th>
                <th scope="col" class="px-6 py-3">
                    Subtotal
                </th>
                <th scope="col" class="px-6 py-3">
                    Total + IVA
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $p) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $p['id'] ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $p['descripcion'] ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $p['cantidad'] ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $p['usuario'] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $p['nombre'] ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $p['total'] * $p['cantidad'] ?>$
                </td>
                <td class="px-6 py-4">
                <?php echo $p['total'] * $p['cantidad']*1.16 ?>$
                </td>
                <?php  ?>
                
            </tr>
        <?php endforeach ?>
              
        </tbody>
    </table>
</div>
</section>
</body>
</html>