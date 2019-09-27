<!-- style css dessa pagina esta na body.css -->
<ul class="ui container-fluid">
    <div class="card-body d-flex justify-content-center align-content-center flex-column text-center p-4">
    <!-- <img src="./img/logo_oficial/logo-super.market.png" height="45em" alt="logo oficial mercado facil"> -->
        <div class="mb-3 d-flex justify-content-center align-content-center flex-column flex-wrap">
            <div class="justify-content-center">
                <img src="./img/logo_oficial/logo-super.market.png" width="300em" alt="mercado bay">
            </div>

        </div>
    </div>
    <div class="row d-flex justify-content-center align-content-center">
        <div class="col-md-6">

                <div class="ui fluid massive search icon input">
                    <input type="text" name="search" ng-model="search_nome" id="search" class="prompt" placeholder="Seu supermercado favorito">
                    <i class="search icon"></i>
                <!-- show card resultado -->
                    <div id="result_search" class="results">
                        <!-- <div class="pesquisar">
                        
                        </div> -->
                    </div>
                </div>

        </div>
    </div>
    <div class="card-body d-flex justify-content-center align-content-center">
        <div class="h1 font-weight-bold text-center text-white">Veja como é simples compra!</div>
    </div>
    <div class="card-deck" id="divs">
        <div class="card bg-backgrounds border-0 divsInfor">
            <div class="card-body">
                <div class="d-flex justify-content-center align-content-center">
                    <div class="h1 text-muted divs_icons"><i class="fas fa-search-location"></i></div>
                </div>
                <div class="ui header text-muted text-center">Escolhar seu supermercado favorito</div>
            </div>            
        </div>
        <div class="card bg-backgrounds border-0 divsInfor">
            <div class="card-body">
                <div class="d-flex justify-content-center align-content-center">
                    <div class="h1 text-muted divs_icons"><i class="fas fa-shopping-basket"></i></div>
                </div>
                <div class="ui header text-muted text-center">Escolhar seus produtos</div>
            </div>            
        </div>
        <div class="card bg-backgrounds border-0 divsInfor">
            <div class="card-body">
                <div class="d-flex justify-content-center align-content-center">
                    <div class="h1 text-muted divs_icons"><i class="fas fa-truck-moving"></i></div>
                </div>
                <div class="ui header text-muted text-center">Receba em sua casa</div>
            </div>            
        </div>
        <div class="card bg-backgrounds border-0 divsInfor">
            <div class="card-body">
                <div class="d-flex justify-content-center align-content-center">
                    <div class="h1 text-muted divs_icons"><i class="fas fa-hand-holding-usd"></i></div>
                </div>
                <div class="ui header text-muted text-center">Paga quando receber</div>
                <div class="description text-center text-muted"><strong><i class="fas fa-credit-card"></i> Cartão</strong> ou <strong>Dinheiro <i class="fas fa-dollar-sign"></i></strong></div>
            </div>            
        </div>
    </div>
</ul>