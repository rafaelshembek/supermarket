<?php 
    session_start();
?>
<div class="row">
    <div class="col-md-12">
        <section class="card-body">
            <form class="ui form" action="../logica/alter_login.php" method="post">
                <h4 class="ui dividing header p-2 font-weight-light"><i class="info icon"></i> Altere seu dados de login</h4>
                <div class="field">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                    <input type="hidden" name="id_loja" value="<?php echo $_SESSION['id_user']?>">
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" placeholder="Seu Email de login" required>
                    </div>
                    <div class="field">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" placeholder="Seu Username" required>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Sua nova Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Sua nova Senha" required>
                    </div>
                    <div class="field">
                        <label for="">Digite novamente sua Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha novamente" required>
                    </div>
                </div>
                <div class="field">
                    <button class="ui red button" type="submit">Salvar</button>
                </div>
            </form>
        </section>
    </div>
</div>