<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered table-primary">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date du Rendez-Vous</th>
                        <th scope="col">Patients</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rdv as $value){?>
                        <tr scope="col">
                        <td><?=$value->id;?></td>
                        <td><?=$value->dateHour;?></td>
                        <td><?=$value->idPatients;?></td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>