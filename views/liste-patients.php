<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <form method="GET" class="g-3">
                <!-- <input type="search" name="search">
                <input type="submit" value="go!!!"> -->
                <div class="input-group mb-3">
                    <input type="search" class="form-control mt-1" name="search" placeholder="Rechercher..."
                        aria-label="Rechercher..." aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><img src="/assets/img/search.png" class="img-fluid" width="20" alt="bouton rechercher"></button>
                        <a href="/controllers/liste-patientCTRL.php"><button class="btn btn-outline-secondary" type="button"><img src="/assets/img/clean.png" class="img-fluid" width="35" alt="bouton rechercher"></button></a>
                    </div>
                </div>
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
                    foreach($getPatient as $value){ ?>
                        <tr>
                            <td><a href="/controllers/profil-patientCTRL.php?idPatient=<?= $value->id;?>"><img
                                        src="/assets/img/user-bouton.png" alt="user" class="img-fluid" width="20"></a>
                                <?= $value->id;?></td>
                            <td><?= $value->firstname;?></td>
                            <td><?= $value->lastname;?></td>
                            <td><?= $value->birthdate;?></td>
                            <td><?= $value->phone;?></td>
                            <td><?= $value->mail;?></td>
                            <td><a href="/controllers/liste-patientCTRL.php?idPatients=<?=$value->id;?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </form>
            <ul class="pagination">
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
        </div>
    </div>
</div>