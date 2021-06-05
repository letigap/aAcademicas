<?php
 include_once("include/header.php");
 include_once("include/dbConexion.php");

 $sql = 'SELECT id_evento, evento_nombre, evento_imagen, evento_fecha FROM evento ORDER BY evento_fecha ASC LIMIT 3 ';
$eventoActual = getDatos($sql);

?>
<div class="main-header"> 
    <div class="background-overlay text-white py-5">
        <div class="container">
            <div class="row">
                 <div class="col-md-6 text-center justify-content-center align-self-center">
                    <h1>DEPFE</h1>
                    <p>División de Estudios de Posgrado de la Facultad de Economía</p>
                    <p>Fotógrafo: Allen Vallejo</p>
                </div>
            </div>
        </div>
    </div>
</div>
<main>
<div  class="container bg-light">
    <div class="row p-4 text-center justify-content-center">
        <p class="h2" class="text-center">Eventos recientes</p>
    </div>
    <div class="row py-5">
    <div class="col-sm-6 col-md-6 col-lg-9">
 
        <?php
        foreach ($eventoActual as $eventoA){
         ?>
        <div class="card view view-fourth col-sm-12 col-md-12 col-lg-3">
             <img  alt="<?=$eventoA['evento_imagen']?>" src="<?=$eventoA['evento_imagen']?>" />  
            <div class="mask">  
            <!-- <h3>Evento Reciente</h3>   -->
            <h2><?=$eventoA['evento_nombre']?></h2>
            <p><?=$eventoA['evento_fecha']?></p>  
            <!--   <a href="#" class="info">Leer más</a> -->  
            </div>
        </div>  
         <?php
            }
        ?>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
        <div> 
        <hr class="">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
        <!-- 1:1 aspect ratio -->
        <div class="embed-responsive embed-responsive-1by1">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_5fTjM6_oZc"></iframe>
        </div>
    </div>
    </div>
    </div>
</div>
<div class="container p-5">
    <div class="row text-center justify-content-center">
    <p class="h2 text-center">Instituciones que participan</p>
    </div>
  <!--   <div class="row"> -->
        <div class="row p-5">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card text-center border-light h-100">
                    <div class="card-body">
                        <img src="assets/img/logos/FE.jpg" class="img-responsive w-50" alt="logo FE"> 
                            <p class="h4 pt-5">Facultad de Economía</p>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="p-4 red-inst">
                                    <a href="https://www.facebook.com/FEconomiaUNAM/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/FEconomiaUNAMof" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/c/FacultaddeEconomiastreaming" target="_blank"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-3 h-100">
                <div class="card text-center border-light h-100">
                    <div class="card-body">
                        <img src="assets/img/logos/unam.jpg" class="img-fluid w-50" alt="logo UNAM"> 
                        <p class="h4 pt-5">UNAM</p>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4 red-inst">
                                <a href="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="facebook" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="facebook" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card text-center border-light h-100">
                    <div class="card-body">
                        <img src="assets/img/logos/android-icon-96x96.png" class="img-fluid w-50" alt="logo DEPFE"> 
                        <p class="h4 pt-5">División de Estudios de Posgrado</p>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4 red-inst">
                                <a href="https://www.facebook.com/depfeunam" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/depfeunamfacebook" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.youtube.com/DepfePosgradoUNAM" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                                
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card text-center border-light h-100">
                    <div class="card-body">
                        <img src="assets/img/logos/logo_posgrado.jpg" class="img-fluid w-50" alt="logo DEPFE"> 
                        <p class="h4 pt-5">Posgrado UNAM</p>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4 red-inst">
                                <a href="https://www.facebook.com/UNAMPosgrado/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/cepunam" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
        
    <!-- </div> -->
</div>
</main>

<?php
include ("include/footer.php");

