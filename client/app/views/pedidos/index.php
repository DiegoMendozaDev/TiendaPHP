<!doctype html>
<html lang="es" data-bs-theme="auto">
<head>
  <script src="http://localhost/Proyecto_tienda_PHP/client/public/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout - Ejemplo</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="http://localhost/Proyecto_tienda_PHP/client/public/assets/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Ejemplo de estilos personalizados */
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1),
                  inset 0 .125em .5em rgba(0, 0, 0, .15);
    }
    /* Otros estilos que necesites... */
  </style>

  <!-- Custom styles for this template -->
  <link href="http://localhost/Proyecto_tienda_PHP/client/public/assets/css/checkout.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
  <!-- Toggle de tema (permanece fijo) -->
  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
      id="bd-theme"
      type="button"
      aria-expanded="false"
      data-bs-toggle="dropdown"
      aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>

  <!-- Contenedor principal centrado verticalmente -->
  <div class="d-flex flex-column min-vh-100">
    <div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <main class="w-100">
        <div class="py-5 text-center">
          <h2>Checkout</h2>
        </div>

        <div class="row g-5 justify-content-center">
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" novalidate>
              <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Tu carrito</span>
                  <span class="badge bg-primary rounded-pill"><?=count($productos->detalles ?? [])?></span>
                </h4>
                <ul class="list-group mb-3">
                  <?php $precio_total = 0;?>
                  <?php if($productos):?>
                  <?php foreach ($productos->detalles as $producto):?>
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0"><?=$producto->nombre?></h6>
                    </div>
                    <span class="text-body-secondary"><?=$producto->precio?> € X <?=$producto->cantidad?></span>
                  </li>
                  <?php $precio_total += $producto->precio * $producto->cantidad?>
                  <?php endforeach?>
                  <!-- Más items del carrito -->
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong><?=$precio_total?>€</strong>
                  </li>

                </ul>
              </div>
              <hr class="my-4">
              <button class="w-100 btn btn-primary btn-lg" type="submit">Comprar</button>
            </form>

            <div class="mt-3 d-flex gap-2">
              <form action="http://localhost/Proyecto_tienda_PHP/client/public/pedidos/vaciarCarrito" method="post" class="flex-grow-1">
                <input type="hidden" name="id_pedido" value="<?=$productos->id_pedido?>">
                <button class="w-100 btn btn-outline-secondary btn-lg" type="submit">Vaciar carrito</button>
              </form>
              <?php endif;?>
              <a href="http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar" class="w-100 btn btn-secondary btn-lg">Seguir comprando</a>
            </div>
          </div>
        </div>
      </main>

      <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <p class="mb-1">&copy; 2025 Tienda de ropa</p>
      </footer>
    </div>
  </div>

  <script src="http://localhost/Proyecto_tienda_PHP/client/public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/Proyecto_tienda_PHP/client/public/assets/js/checkout.js"></script>
</body>
</html>
