<div class="card">
    <div class="card-header">
        <h1>Seus Pedidos</h1>
    </div>
    <div class="card-body">
    <?php 
    $dadosPedido = $this->pedidos->getPedidos();

    foreach($dadosPedido as $dados) {

        $dadosDoce = $this->pedidos->getItens($dados->id);
        $totalPedido = 0; // soma dos itens
        foreach($dadosDoce as $doce) {
            $totalPedido += $doce->qtde * $doce->valor;
        }
    ?>
        <p>
            <strong>Pedido: <?= $dados->id ?></strong>
            <br>
            Data: <?= $dados->dt ?>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Unitário</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dadosDoce as $doce) { ?>
                    <tr>
                        <td><?= $doce->nome ?></td>
                        <td><?= $doce->qtde ?></td>
                        <td>R$ <?= number_format($doce->valor, 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($doce->qtde * $doce->valor, 2, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="text-end">
            <strong>Total do Pedido: R$ <?= number_format($totalPedido, 2, ',', '.') ?></strong>
        </p>
        <hr>
    <?php
    }
    ?>
</div>
</div>
