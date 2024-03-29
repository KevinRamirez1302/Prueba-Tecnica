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
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Agregar productos</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" method="POST" id="productForm" name="login">
        <div>
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
          <div class="mt-2">
            <input id="name" name="nombre" autocomplete="off" type="text" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div>
          <label for="precio" class="block text-sm font-medium leading-6 text-gray-900">Precio</label>
          <div class="mt-2">
            <input id="price" name="precio" autocomplete="off" type="text" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div>
          <label for="img" class="block text-sm font-medium leading-6 text-gray-900">URL de imagen</label>
          <div class="mt-2">
            <input minlength="30" id="img" name="img" type="text" autocomplete="off" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="flex items-center ">
          <div class="felx content-center m-2">
            <label for="">Categoria</label>
          </div>
          <select class="bg-gray-200 p-1 rounded-s" name="categoria" id="">
            <option value="limpieza">Limpieza</option>
            <option value="limpia_vidrios">Limpia vidrios</option>
            <option value="jabon_polvo">Jabon en polvo</option>
            <option value="escoba">Escobas de barrer</option>
          </select>
        </div>


        <div>
          <button class="flex w-full hover:transition-all justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar Producto</button>
        </div>
        <?php if (!empty($errors)) : ?>
          <div>
            <ul>
              <li class="text-center w-full bg-red-500 p-2 rounded-sm">
                <?php echo ($errors); ?>
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
      let datos = $('#productForm').serialize()
      $.ajax({
        data: datos,
        url: 'productForm.php',
        type: 'POST',
        beforesend: function() {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },
        success: function() {
          
        },
        
      });
      
    }
  </script>
</body>

</html>