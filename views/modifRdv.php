<div class="container p-3">
    <div class="row">
        <div class="col-12">
            <form method="POST">
                <h3 class="my-4">Modifier un rendez-vous</h3>
                <p>Rendez vous de :  <?=$getPatient->firstname;?> <?=$getPatient->lastname;?>  </p>
                <div class="mb-3">
                    <input 
                    type="datetime-local"
                    class="form-control"
                    value="<?=$appointementView->dateHour;?>"
                    id="dateHour"
                    aria-describedby="dateHourHelp"
                    name="dateHour"
                    required 
                    placeholder="JJ/MM/AAAA  HH:mm" >
                    <p><?= $errorsArray['dateHour_error'] ?? ''?></p>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg mt-4">Enregistrer</button>
            </form>
        </div>
    </div>
</div>