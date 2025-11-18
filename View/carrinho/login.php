<div class="card">
    <div class="card-header">
        <h1>Faça seu Login ou Cadastre-se</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Login:</h2>
                <form name="formLogin" method="post" action="carrinho/logar" data-parsley-validate>
                    <label for="email">Seu e-mail:</label>
                    <input type="email" name="email" id="email" class="form-control" required
                        data-parsley-required-message="Preencha o e-mail"
                        data-parsley-type-message="Digite um e-mail válido">

                    <label for="senha">Sua senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" required
                        data-parsley-required-message="Preencha a senha" minlength="6"
                        data-parsley-minlength-message="Digite mais de 6 caracteres">

                    <br>
                    <button type="submit" class="btn btn-success">
                        Efetuar Login
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <h2>Cadastro:</h2>
                <form name="formCadastrar" method="post" action="carrinho/cadastrar" data-parsley-validate>
                    <label for="cli_nome">Seu nome:</label>
                    <input type="text" name="nome" id="cli_nome" class="form-control" required
                        data-parsley-required-message="Preencha o nome">

                    <label for="email">Seu e-mail:</label>
                    <input type="email" name="email" id="cli_email" class="form-control" required
                        data-parsley-required-message="Preencha o e-mail"
                        data-parsley-type-message="Digite um e-mail válido">

                    <label for="senha">Sua senha:</label>
                    <input type="password" name="senha" id="cli_senha" class="form-control" required
                        data-parsley-required-message="Preencha a senha" minlength="6"
                        data-parsley-minlength-message="Digite mais de 6 caracteres">

                    <label for="senhaRedigitada">Redigite a sua senha:</label>
                    <input type="password" name="senhaRedigitada" id="cli_senhaRedigitada" class="form-control" required
                        data-parsley-required-message="Redigite a senha"
                        data-parsley-equalto="#cli_senha"
                        data-parsley-equalto-message="As senhas digitadas são diferentes">

                    <br>
                    <button type="submit" class="btn btn-success">
                        Efetuar Cadastro
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>