<section class="container my-5">
    
<header class="hero-image-html">
    <img src="capa.png" alt="DoceMix Capa Principal" class="w-100 hero-img-content">
</header>
<section id="destaques" class="container my-5">
    </section>

    <div class="text-center mb-5">
        <h2 class="display-4 text-maincolor fw-bold">Nossos Doces em Destaque </h2>
        <p class="lead text-dark-subtitle">As delícias mais pedidas da DoceMix que você precisa provar.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <?php 
        $urlDestaque = "http://localhost/DoceMix/public/apis/destaque.php";
        $dadosDestaque = json_decode(file_get_contents($urlDestaque));

        foreach ($dadosDestaque as $dados) {
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card card-doce h-100 shadow-sm border-0 bg-white">
                    
                    <img src="<?= $img . $dados->imagem ?>" 
                         alt="<?= $dados->nome ?>" 
                         class="card-img-top img-fluid"
                         style="object-fit: cover; height: 200px;">

                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-extra mb-2"><?= $dados->nome ?></h5>
                        
                        <a href="doce/detalhes/<?= $dados->id ?>" 
                           class="btn btn-outline-extra mt-auto">
                            <i class="fas fa-eye me-2"></i>
                            Detalhes
                        </a>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
        </div>

    <div class="text-center mt-5">
        <a href="doce/index" class="btn btn-extra btn-lg shadow-lg pulse-effect">
             Ver Todo o Cardápio de Doces
        </a>
    </div>
</section>

<section class="py-5 bg-thircolor">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-maincolor">Por Que o Sabor da DoceMix é Incomparável?</h2>
            <p class="lead text-maincolor opacity-75">Nossa dedicação à arte da confeitaria garante uma experiência única em cada mordida.</p>
        </div>

        <div class="row text-center g-4">
            
            <div class="col-md-4">
                <div class="feature-box p-4">
                    <i class="fas fa-seedling display-4 text-extra mb-3"></i> 
                    <h3 class="h4 fw-bold text-maincolor">Ingredientes Frescos</h3>
                    <p class="text-maincolor">Utilizamos apenas ingredientes de altíssima qualidade, selecionados diariamente para garantir o frescor e o sabor autêntico.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box p-4">
                    <i class="fas fa-truck-fast display-4 text-extra mb-3"></i>
                    <h3 class="h4 fw-bold text-maincolor">Entrega Rápida e Segura</h3>
                    <p class="text-maincolor">Seu pedido é tratado com o máximo cuidado e chega até você no tempo ideal, preservando a qualidade e a textura.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box p-4">
                    <i class="fas fa-hand-holding-heart display-4 text-extra mb-3"></i>
                    <h3 class="h4 fw-bold text-maincolor">Receitas Artesanais</h3>
                    <p class="text-maincolor">Cada doce é feito à mão, seguindo receitas de família com a paixão e o carinho que só a confeitaria tradicional oferece.</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
<section class="py-5 text-center bg-thircolor">
    <div class="container">
        
        <h2 class="display-4 fw-bold text-maincolor mb-4">
            Pronto para Adoçar o Seu Dia?
        </h2>
        <p class="lead text-maincolor opacity-75 mb-5">
            Explore nosso cardápio completo, feito com os melhores ingredientes e o carinho da DoceMix.
        </p>
        
        <a href="doce/index" class="btn btn-extra btn-lg shadow-lg pulse-effect mb-3">
            <i class="fas fa-cookie-bite me-2"></i> Ver Cardápio Completo
        </a>
        
    </div>
</section>