<?php
function showOrderconformationHeader() {
    echo 'Bestelbevestiging';
}

function showOrderConformation ($data) { 
echo '<p>Bedankt voor uw bestelling
 Uw bestelnummer is:'. $data ['invoice_number'].'
 De bevestiging wordt gemaild naar: '. $data ['email'].'</p>';
}