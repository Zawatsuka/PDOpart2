<div class="container p-3">
    <div class="row">
        <div class="col-12">
            <?php
        if(isset($testRegister) && $testRegister==true){
        include(dirname(__FILE__).'/../utils/alertRdv.php');
    }?>
            <form method="POST">
                <h3 class="my-4">Ajout d'un rendez-vous</h3>
                <div class="mb-3">

                    <input 
                    type="datetime-local"
                    class="form-control"
                    value="<?php $today= date('Y-m-d');?>T<?php $hour= date('H:i');?>"
                    id="dateHour"
                    aria-describedby="dateHourHelp"
                    name="dateHour"
                    required pattern="^[A-Za-z-éèêëàâäôöûüç\' ]+$"
                    placeholder="JJ/MM/AAAA  HH:mm" >
                    <p><?= $errorsArray['dateHour_error'] ?? ''?></p>
                </div>
                <div class="mb-3">
                    <select class="custom-select" id="inputGroupSelect02" name='idPatients'>
                    
                        <option selected>Votre patient...</option>
                        <?php
                    foreach($patients as $value){ ?>
                        <option value="<?=$value->id;?>"><?= $value->firstname;?>  <?= $value->lastname;?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg mt-4">Enregistrer</button>
            </form>
            <?= isset($errorMsg)? $errorMsg : ''?>
        </div>
    </div>
</div>