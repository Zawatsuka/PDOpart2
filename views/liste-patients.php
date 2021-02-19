<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
        <form method="GET">
        <input type="search" name="search">
        <input type="submit" value="go!!!">
            </form>
            <table class="table table-striped table-bordered table-primary">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date de Naissance</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($patients as $value){ ?>
                    <tr>
                       <td><a href="/controllers/profil-patientCTRL.php?idPatient=<?= $value->id;?>"><img src="/assets/img/user-bouton.png" alt="user" class="img-fluid" width="20"></a> <?= $value->id;?></td>
                        <td><?= $value->firstname;?></td>
                        <td><?= $value->lastname;?></td>
                        <td><?= $value->birthdate;?></td>
                        <td><?= $value->phone;?></td>
                        <td><?= $value->mail;?></td>
                        <td><a href="/controllers/liste-patientCTRL.php?idPatients=<?=$value->id;?>">Supprimer</a></td>
                    </tr>
                    <?php }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>