<?php

if (!isset($_SESSION["carrinho"])) {
    echo "<script>alert('Carrinho vazio!');history.back();</script>";
}

$token = "TEST-2156827143387711-111916-e003623d083222bc38b4f14a67fa0de7-2269138772"; //token do mercado pago

    require 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken($token);

    // Crie um objeto de preferência
    $preference = new MercadoPago\Preference();
    use MercadoPago\Payer;

    $payer = new Payer();
    $payer->name = $_SESSION["cliente"]["nome"];
    $payer->email = $_SESSION["cliente"]["email"];

    $preference->payer = $payer;

    $itens = [];

    foreach ($_SESSION["carrinho"] as $produto) {
        
        $itens[] = array(
            "title"       => $produto["nome"],
            "quantity"    => (int)$produto["qtde"],
            "currency_id" => "BRL",
            "unit_price"  => (float)$produto["valor"]
        );

    }
     $preference->items = $itens;


     // URL de retorno após o pagamento
    $preference->back_urls = array(
        "success" => "https://www.seusite.com.br/meli/sucesso.php",
        "failure" => "https://www.seusite.com.br/meli/falha.php",
        "pending" => "https://www.seusite.com.br/meli/pendente.php"
    );

    $preference->notification_url = "https://www.seusite.com.br/meli/notificacao.php";

    $preference->auto_return = "approved"; // Retorno automático quando aprovado

    $preference->save();

    $msg = $this->carrinho->salvarPedido($preference->id);

    if ($msg == 0) {
    echo "<script>alert('Erro ao cadastrar pedido');history.back();</script>";
}

?>


<div class="card">
    <div class="card-header text-center">
        <img src="../public/images/mercado-pago-logo.png" alt="Mercado pago" width="350px">
    </div>
    <div class="card-body">
    <p class="text-center">
        <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                data-preference-id="<?php echo $preference->id; ?>"
                data-button-label="Pagar com Mercado Pago (Boleto, Cartão de Crédito, Débito)">
        </script>
    </p>
</div>
</div>