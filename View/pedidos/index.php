<div class="card">
    <div class="card-header">
        <h1>Seus Pedidos</h1>
    </div>
    <div class="card-body">
    <?php 
    $dadosPedido = $this->pedidos->getPedidos();

    foreach($dadosPedido as $dados) {
    ?>
        <p>
            <strong>Pedido: <?= $dados->id ?></strong>
            <br>
            Data: <?= $dados->dt ?>
        </p>
        <table class="table table-bordered table-striped">
            <?php 
            $dadosDoce = $this->pedidos->getItens($dados->id);
            foreach($dadosDoce as $doce) {
            ?>
                <tr>
                    <td><?= $doce->nome ?></td>
                    <td><?= $doce->qtde ?></td>
                    <td><?= $doce->valor ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <hr>
    <?php
    }
    ?>
</div>
</div>