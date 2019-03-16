<main class="pt-5 mx-lg-5">

    <div class="container-fluid mt-5">
        <div class="card">
            <span class="text-danger"> Erreur :
                <?= $ex->getMessage() ?>
            </span>
            <span class="text-info"> Code Erreur :
                <?= $ex->getCode() ?>
            </span>
        </div>
    </div>
</main>
