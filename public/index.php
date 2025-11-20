<?php session_start(); // ESSENCIAL para acessar $_SESSION ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doce Mix</title>
    <base href="http://<?= $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"] ?>">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link href="imagens/logoteste.png" rel="shortcut icon">

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/bindings/inputmask.binding.js"></script>

    <script src="js/sweetalert2.js"></script>

    <script src="js/parsley.min.js"></script>
    

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index">Home</a>
                    </li>
                    <?php
                    $urlCategoria = "http://localhost/DoceMix/public/apis/categoria.php";
                    $dadosCategoria = json_decode(file_get_contents($urlCategoria));

                    foreach ($dadosCategoria as $dados) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="categoria/index/<?php echo $dados->id ?>">
                                <?php echo $dados->descricao ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>


                    <li class="nav-item">
                        <a class="nav-link" href="carrinho">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION["cliente"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pedidos">
                                <i class="fas fa-gift"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho/sair">
                                <i class="fas fa-power-off"></i>
                            </a>
                        </li>
                    <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho/login">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <?php
        $param = "index";
        $img = "http://localhost/DoceMix/public/arquivos/";

        if (isset($_GET["param"])) {
            $param = explode("/", $_GET["param"]);
        }

        $controller = $param[0] ?? "index";
        $acao = $param[1] ?? "index";
        $id = $param[2] ?? null;

        $controller = ucfirst($controller) . "Controller";

        if (file_exists("../Controller/{$controller}.php")) {
            require "../Controller/{$controller}.php";
            $controller = new $controller();
            $controller->$acao($id, $img);
        } else {
                    require "../View/index/erro.php";
                }


        ?>


    </main>
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <section class="nav-link" style="background-color: var(--maincolor); padding-top: 30px;" >
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fa-solid fa-cookie-bite"></i> Doce Mix
          </h6>
          <p>
            Descubra a nossa coleção de doces artesanais, feitos com amor para celebrar o seu dia!
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Links Rápidos
          </h6>
          <p>
            <a href="#!" class="text-reset footr">Sobre Nós</a>
          </p>
          <p>
            <a href="Index" class="text-reset footr">Página de Administrador</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Legal
          </h6>
          <p>
            <a href="#!" class="text-reset footr">Política de Privacidade</a>
          </p>
          <p>
            <a href="#!" class="text-reset footr">Termos de Uso</a>
          </p>
          <p>
            <a href="#!" class="text-reset footr">Política de Cookies</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
          <p>
            <i class="fas fa-envelope me-3"></i>
            contato@docemix.com
          </p>
          <p><i class="fas fa-phone me-3"></i> (44) 9999-9999</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>Campo Mourão, PR - Brasil</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4 footr" style="background-color: var(--maincolor); ">
    © 2025 Copyright DoceMix
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>

</html>