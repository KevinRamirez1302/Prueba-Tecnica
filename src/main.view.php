<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Management Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      plugins: [

        require('@tailwindcss/forms'),
      ],
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Poppins&family=Roboto:ital@1&display=swap');
  </style>

</head>

<body>
  <div class="bg-white">
    <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">BIENVENIDO <?php echo strtoupper($resultado['nombre']) ?></h2>
        <p class="mt-4 text-gray-500">Aqui podras visualizar todas tus estadisticas y cual a sido el producto que mas has vendido.</p>

        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Nombre</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo $bestproductresult['descripcion'] ?></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Precio</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo $bestproductresult['precio'] ?>$</dd>
          </div>
          <div class=" pt-4">
            <button class="mt-20 m-w-40 bg-purple-500 text-white active:bg-pink-600 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
              Mis estadisticas
            </button>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Clientes</dt>
            <ul role="list" class="divide-y divide-gray-100">

              <?php foreach ($clienteresult as $c) : ?>
                <li class="flex justify-between gap-x-6 py-5">
                  <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://sandstormit.com/wp-content/uploads/2021/06/incognito-2231825_960_720-1.png" alt="">
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900"><?php echo $c['nombre'] ?></p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $c['documento'] ?></p>
                    </div>
                  </div>
                  <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900"><?php echo $c['direccion'] ?></p>

                  </div>
                </li>


              <?php endforeach ?>

            </ul>
          </div>


        </dl>
      </div>
      <div class="flex flex-col">
        <div class="flex items-center justify-center">
          <p class="text-2xl font-bold">PRODUCTO MAS VENDIDO</p>
        </div>
        <img src="<?php echo $bestproductresult['imagen'] ?>" alt="Side of walnut card tray with card groove and recessed card area." class="rounded-lg bg-gray-100">
      </div>
    </div>
  </div>


  <section>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
      <div class="relative w-auto my-6 mx-auto max-w-3xl">

        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">

          <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
            <h3 class="text-3xl font-semibold">
              Estadisticas
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
              <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
            </button>
          </div>

          <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                  <dt class="text-base leading-7 text-gray-600">Ganacia en ventas</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo $total ?>$</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                  <dt class="text-base leading-7 text-gray-600">Cantidad de ventas</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo count($sell) ?></dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                  <dt class="text-base leading-7 text-gray-600">Total de clientes</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo $clientes ?></dd>
                </div>
              </dl>
            </div>
          </div>


          <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
              Close
            </button>

          </div>
        </div>
      </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
  </section>
  <script>
    function toggleModal(modalID) {
      document.getElementById(modalID).classList.toggle("hidden");
      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
      document.getElementById(modalID).classList.toggle("flex");
      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
  </script>
</body>

</html>