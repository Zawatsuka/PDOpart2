<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 p-2 ml-4">
            <img src="/assets/img/rdv.png" class="img-fluid" width="130" alt="">
            <h5 class="mt-3">Rendez-vous pour <?=$patients->firstname;?> <?=$patients->lastname;?> </h5>
            <p>Date et Heure du Rendez-vous : <?=$appointementView -> dateHour;?></p>
            <a href="/controllers/modifier-patientCTRL.php?idPatient=<?=$appointementView->id;?>">Modifier</a>
        </div> 
    </div> 
</div> 
                