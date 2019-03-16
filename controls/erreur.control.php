<?php
/**
 * Created by PhpStorm.
 * User: mecxer
 * Date: 2/8/18
 * Time: 10:53 PM
 */


if(isset($ex)) {
    include 'views/erreur.view.php';
}else
{
    echo'
         <main class="pt-5 mx-lg-5">        
            <div class="container-fluid mt-5">
                <div class="card text-center">
                      <h2 class="text-danger " style="padding: 100px" align="center">404 PAGE NOT FOUND</h2>    
                </div>
            </div>
           </main>
  
    ';
}
