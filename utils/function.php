<?php
function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = nl2br($data);
    return $data;
}


function testData($data, $regex, $nameOfInput)
{
    if (!empty($data)) {
        // On test la valeur
        $testRegex = preg_match($regex, $data);

        if ($testRegex == false) {
            return  $nameOfInput . ' n\'est pas valide';
        }
    } else {
        return 'Le champ n\'est pas rempli';   
    }
}