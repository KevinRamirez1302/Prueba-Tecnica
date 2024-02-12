<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="main.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CleanAll</span>
  </a>
  <div class="flex md:order-2">
    <a href="logout.php">
      <button class="bg-purple-500 px-2 py-2 rounded-md hover:transition-all hover:bg-purple-600 text-white">Cerrar sesion</button>
    </a>
  </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
     
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="main.php" class="bg-purple-500 transition-all hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full" aria-current="page">STATS</a>
        </li>
        <li>
          <a  href="productForm.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Agregar Producto</a>
        </li>
        <li>
          <a  id='cliente' href="cliente.php"  class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Agregar Cliente</a>
        </li>
        <li>
          <a href="product.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Productos</a>
        </li>
        <li>
          <a href="ventas.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Ventas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
 
      
  </script>
</body>

</html>