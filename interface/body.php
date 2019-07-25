
<!-- =========================  -->
<div class="ui container-fluid box_search">
    <div class="row">
        <div class="col-md-12 bg-white m-1 shadow" style="border-radius: 5px;">
            <div class="card-body text-center">
            <img src="./img/logo_oficial/logo-super.market.png" height="45em" alt="">
                <!-- <h1 class="font-weiht-light ui green header">Mercado Facil</h1> -->
            </div>
            <div class="card-body d-flex justify-content-center" ng-controller="formsearchCtrl">
                <form id="form_search" class="ui form" action="" method="post">
                    <div class="ui massive icon input">
                        <i class="search icon"></i>
                        <input type="text" name="search" ng-model="search_nome" id="search" class="border-0" placeholder="Supermercado mais proximo de você">
                    </div>
                    <!-- show card resultado -->
                    <div id="result_search" class="shadow d-flex justify-content-start">
                        <div class="pesquisar">
                            <!-- ==== -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>