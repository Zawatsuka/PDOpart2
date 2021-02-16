<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered table-primary">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date du Rendez-Vous</th>
                        <th scope="col">Prenom du Patient</th>
                        <th scope="col">Nom du Patient</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rdv as $value){?>
                        <tr scope="col">
                        <td><a href="/controllers/rdvCTRL.php?idRdv=<?=$value->id;?>"><img src="/assets/img/rdvView.png" class="img-fluid" width="45" alt="rdv"></a> <?=$value->id;?></td>
                        <td><?=$value->dateHour;?></td>
                        <td><?=$value->firstname;?></td>
                        <td><?=$value->lastname;?></td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>