<form method="POST">
    <div class="container p-3 fadeInLeft ">
        <div class="row">

            <div class="col-12">
                <?php
        if(isset($testRegister) && $testRegister==true){
        include(dirname(__FILE__).'/../utils/alertPatient.php');
    }?>

                <h3 class="my-4">Ajout d'un client</h3>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="lastname" aria-describedby="lastnameHelp"
                        name="lastname" required pattern="^[A-Za-z-éèêëàâäôöûüç\' ]+$">
                    <p><?= $errorsArray['lastname_error'] ?? ''?></p>
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="firstname" aria-describedby="firstnameHelp"
                        name="firstname" required pattern="^[A-Za-z-éèêëàâäôöûüç\' ]+$">
                    <p><?= $errorsArray['firstname_error'] ?? ''?></p>
                </div>

                <div class="mb-3">
                    <label for="birthDate" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="birthDate" aria-describedby="birthDateHelp"
                        name="birthdate" required pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$">
                    <p><?= $errorsArray['birthdate_error'] ?? ''?></p>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone"
                        required
                        pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$">
                    <p><?= $errorsArray['phone_error'] ?? ''?></p>
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Adresse Mail</label>
                    <input type="mail" class="form-control" id="mail" aria-describedby="mailHelp" name="mail" required
                        pattern="^[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$">
                    <p><?= $errorsArray['mail_error'] ?? ''?></p>
                </div>

                <h3 class="my-4">Ajout d'un rendez-vous</h3>
                <div class="mb-3">

                    <input type="datetime-local" class="form-control"
                        value="<?php $today= date('Y-m-d');?>T<?php $hour= date('H:i');?>" id="dateHour"
                        aria-describedby="dateHourHelp" name="dateHour"
                        placeholder="JJ/MM/AAAA  HH:mm">
                    <p><?= $errorsArray['dateHour_error'] ?? ''?></p>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg mt-4">Enregistrer</button>

                <?= isset($errorMsg)? $errorMsg : ''?>
            </div>

        </div>
    </div>
</form>