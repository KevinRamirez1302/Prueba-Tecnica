<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
         plugins: [
      
      require('@tailwindcss/forms'),
    ],
  }
  </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="flex min-h-[70vh] flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Agregar Cliente</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST" name="venta">
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
        <div class="mt-2">
          <input autocomplete="off" id="name" name="nombre" type="text" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="telefono" class="block text-sm font-medium leading-6 text-gray-900">Telefono</label>
        <div class="mt-2">
          <input autocomplete="off" min="15" id="telefono" name="telefono" type="text" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="direccion" class="block text-sm font-medium leading-6 text-gray-900">Direccion</label>
        <div class="mt-2">
          <input autocomplete="off" id="direccion" name="direccion" type="text" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="rif" class="block text-sm font-medium leading-6 text-gray-900">Documento de identidad</label>
        <select name="documento" id="">
          <option value="CI">CI</option>
          <option value="RIF">RIF</option>
        </select>
        <div class="mt-2">
          <input autocomplete="off" min='9' max="9" id="rif" name="rif" type="text" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button class="flex w-full hover:transition-all justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar Producto</button>
      </div>

      <?php if (!empty($errores)) : ?>
          <div>
            <ul>
              <li class="text-center w-full bg-red-500 p-2 rounded-sm">
                <?php echo ($errores); ?>
              </li>
            </ul>
          </div>
        <?php endif; ?>
        <?php if ($success) : ?>
          <div>
            <ul>
              <li class="text-center w-full bg-green-500 p-2 rounded-sm">
                <?php echo ($success); ?>
              </li>
            </ul>
          </div>
        <?php endif; ?>

    </form>
  </div>
</div> 
<script>

      function ajax()
      
    { 
      let datos = $('#venta').serialize()
      $.ajax({
        data: datos,
        url: 'productForm.php',
        type: 'POST',
        
        success: function(mensaje)
        {
          alert('ENVIADO')
        }
      });
    }

    </script>
</body>
</html>