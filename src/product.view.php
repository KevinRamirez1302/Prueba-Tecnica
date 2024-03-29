<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
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
  <div class="bg-white">
    <div class="mx-auto flex max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

        <?php foreach ($resultado as $p) : ?>

          <div class="group relative">
            <div class="aspect-h-1 aspect-w-1 w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
              <img class="w-full h-full object-cover object-center" src="<?php echo $p['imagen'] ?>">
            </div>
            <div class="mt-4 flex justify-between">
              <div>
                <h3 class="text-sm font-bold text-gray-700 text-ellipsis ">
                    <?php echo $p['descripcion'] ?> 
                </h3>
                <div class="flex items-center">
                  <p>Subtotal</p>
                  <p class="m-2"><?php echo round($p['precio'],2) ?>$</p>
                </div>

              </div>
              <div class="" >
                <p class="font-bold">Total</p>
                <p class="text-sm font-medium text-gray-900">$<?php echo round($p['precio'] * 1.16,2) ?></p>
              </div>

            </div>
          </div>


        <?php endforeach ?>
      </div>
    </div>

  </div>
</body>

</html>