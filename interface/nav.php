<div class="row d-flex justify-content-center background-login">
        <div class="col-md-6 m-3">
                <div class="card-body">
                        <div class="d-flex justify-content-center">
                                <img src="./img/logo_oficial/logo-super-market-2.png" alt="">
                        </div>
                </div>
                <div>
                <!-- login do google -->
                </div>
                <div class="card-body">
                        <form id="form-login-inicial" class="ui d-flex justify-content-center align-content-center flex-column flex-wrap form" action="./logica/verify_login.php" method="post">
                                <div class="field">
                                        <div class="ui left massive icon input">
                                                <input type="email" name="email" ng-model="login.email" id="email" placeholder="Email">
                                        <i class="user outline icon"></i>
                                        </div>
                                </div>
                                <div class="field">
                                        <div class="ui left massive icon input">
                                                <input type="password" name="password" ng-model="login.password" id="password" placeholder="Senha">
                                                <i class="asterisk icon"></i>
                                        </div>
                                </div>
                                <div class="fields">
                                        <button class="ui button m-1" style="background: #f9f960; border-radius: 30px; color: #ffa20a; box-shadow: 0px 5px 10px -5px #f9f960;">login <i class="fas fa-sign-in-alt"></i></button>
                                        
                                        <a class="ui button m-1" style="background: #ff9b83; color: #fff; box-shadow: 0px 5px 10px -5px #ff9b83; border-radius: 30px;" href="interface/signup">cadastre-se</a>
                                        <a class="nav-link text-white" href="interface/esqueceu_senha">esqueceu a senha?</a>
                                </div>
                        </form>
                </div>
        </div>
</div>
