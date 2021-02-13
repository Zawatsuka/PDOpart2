<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/img/user.png" alt="user" class="p-4">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?=$patients->firstname;?> <?=$patients->lastname;?> </h5>
                            <p class="card-text"> Date de naissance : <?=$patients->birthdate;?></p> 
                            <p class="card-text"> Numéro de Téléphone : <?=$patients->phone;?></p> 
                            <p class="card-text"> Adresse Mail : <?=$patients->mail;?></p> 
                            <a href="/controllers/modifier-patientCTRL.php?idPatient=<?=$patients->id;?>">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>