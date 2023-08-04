<!-- 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\vendor\phpmailer\phpmailer\src\SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $to = "posa.97@gmail.com"; 


    $name = $_POST["Vorname"];
    $email = $_POST["E-Mail"];
   

    $gender = $_POST['Geschlecht'];
    $birthdate = $_POST['birthday'];

    $strase= $_POST['strasse'];
    $ort=$_POST['ort'];
    $plz=$_POST['plz'];

    $tel_mobile=$_POST['tel_mobil'];
    $tel_geschaeft=$_POST['tel_geschaeft'];
    $tel_privat=$_POST['tel_privat'];
    $email=$_POST['E-Mail'];

    $zuweisenderArzt = $_POST['ZuweisenderArzt'];
    $adresseArzt = $_POST['AdresseArzt'];
    $krankenkasse = $_POST['Krankenkasse'];


    $zusatzversicherung_select = $_POST['zusatzversicherung_select'];
    $zusatzversicherung_input = ($_POST['zusatzversicherung_select'] == 6) ? $_POST['zusatzversicherung_input'] : 'Nein';
    $email_versenden = $_POST['email_versenden'];

    $franchise = $_POST["franchise"];
    $isKindUnder18 = isset($_POST["Kind"]) ? $_POST["Kind"] : "No";

    $contactPreference = $_POST["Kontaktaufnahme"];
    $otherContact = ($_POST["Kontaktaufnahme"] == "24") ? $_POST["Kontaktaufnahme_input"] : "";

    $unfallversicherung = $_POST["Unfallversicherung"];
    $unfallDatum = $_POST["UnfallDatum"];
    $schadennummer = $_POST["Schadennummer"];

    $erfahren = $_POST["erfahren"];
    $andereVariante = ($_POST["erfahren"] == "14") ? $_POST["erfahren_input"] : "";
    $googleReviews = $_POST["googel_reviews"];


    $hobbys = $_POST["Hobbys"];
    $beruf = $_POST["Beruf"];
    $covid = $_POST["covid_select"];
    $longCovid = $_POST["long_covid_select"];


    $krebsSelect = $_POST["krebs_select"];
    $krebsInput = $_POST["krebs_input"];
    

    $herzSelect = $_POST["herz_select"];
    $herzInput = $_POST["herz_input"];
    $hoherBlutdruckSelect = $_POST["hoher_select"];
    $kreislaufproblemeSelect = $_POST["kreis"];
    $thrombosenSelect = $_POST["thrombosen"];
    $niedergeschlagenSelect = $_POST["niedergeschlagen_select"];
    $niedergeschlagenInput = $_POST["niedergeschlagen_input"];
    $magengeschwuerSelect = $_POST["Magengeschw_Select"];
    $hepatitisSelect = $_POST["Hepatitis"];
    $alkoholMedikamenteSelect = $_POST["medikament_select"];
    $schilddruesenproblemeSelect = $_POST["senprobleme_select"];
    $diabetesSelect = $_POST["Diabetes"];
    $multipleSkleroseSelect = $_POST["Sklerose"];
    $schlaganfallSelect = $_POST["Schlaganfall"];
    $rheumatoideArthritisSelect = $_POST["Rheumatoide"];
    $gelenkerkrankungenSelect = $_POST["Gelenkerkrankungen_select"];
    $gelenkerkrankungenInput = $_POST["Gelenkerkrankungen_input"];
    $osteoporoseSelect = $_POST["Osteoporose"];
    $depressionSelect = $_POST["depression"];
    $schwindelSelect = $_POST["schwindel"];
    $epilepsieSelect = $_POST["Epilepsie"];
    $urininkontinenzSelect = $_POST["Urininkontinenz"];
    $tuberkuloseSelect = $_POST["Tuberkulose"];
    $hoffnungslosOderDepressivSelect = $_POST["hoffnungslos_oder_depressiv"];
    $freudeGefundenSelect = $_POST["freunde_gefunden"];
    $personBedrohtSelect = $_POST["person_bedroht"];

    $gegenMedikamenteSelect = $_POST["gegen_medikamente_select"];
$gegenMedikamenteInput = ($_POST["gegen_medikamente_select"] == "29") ? $_POST["gegen_medikamente_input"] : "";

$latexSelect = $_POST["latex_select"];

$andereAllergien = $_POST["AndereAllergien"];

$hausarztSelect = $_POST["Hausarzt"];
$psychiaterSelect = $_POST["Psychiater"];
$osteopathSelect = $_POST["osteopath"];
$physiotherapeutSelect = $_POST["Physiotherapeut"];
$zahnarztSelect = $_POST["Zahnarzt"];
$chiropraktikerSelect = $_POST["Chiropraktiker"];
$lastExamDate = $_POST["last_exam"];
$vorsorgeuntersuchungenSelect = $_POST["Vorsorgeuntersuchungen"];
$letzten_drei_monate = $_POST['letzten_drei_monate'];
$beschwerden_grund = $_POST['beschwerden_grund'];

// Operationen and Krankenhausaufenthalt
$alleoperationen = array(
    $_POST['alleoperationen1'],
    $_POST['alleoperationen2'],
    $_POST['alleoperationen3'],
    $_POST['alleoperationen4'],
    $_POST['alleoperationen5'],
    $_POST['alleoperationen6']
);

// Verletzungen
$verletzungen = array(
    $_POST['verletzung1'],
    $_POST['verletzung2'],
    $_POST['verletzung3'],
    $_POST['verletzung4'],
    $_POST['verletzung5'],
    $_POST['verletzung6']
);
$verletzung_datums = array(
    $_POST['verletzung1_datum'],
    $_POST['verletzung2_datum'],
    $_POST['verletzung3_datum'],
    $_POST['verletzung4_datum'],
    $_POST['verletzung5_datum'],
    $_POST['verletzung6_datum']
);

// Familienerkrankungen
$fam_diabetes = $_POST['fam_diabetes'];
$fam_krebs = $_POST['fam_krebs'];
$fam_herzerkrankungen = $_POST['fam_herzerkrankungen'];
$fam_abhangigkeit = $_POST['fam_abhangigkeit'];
$fam_hoher_blutdruck = $_POST['fam_hoher_blutdruck'];
$fam_depression = $_POST['fam_depression'];
$fam_schlaganfall = $_POST['fam_schlaganfall'];
$fam_nierenerkrankungen = $_POST['fam_nierenerkrankungen'];
$fam_entzundliche_gelenkerkrankungen = $_POST['fam_entzundliche_gelenkerkrankungen'];

// Medikamente
$vergangen_aspirin = $_POST['vergangen_aspirin'];
$vergangen_vitamine_mineralien = $_POST['vergangen_vitamine_mineralien'];
$vergangen_paracetamol = $_POST['vergangen_paracetamol'];
$vergangen_pflanzliche_mittel = $_POST['vergangen_pflanzliche_mittel'];
$vergangen_ibuprofen_diclofenac = $_POST['vergangen_ibuprofen_diclofenac'];
$vergangen_medikamente_magengeschwure = $_POST['vergangen_medikamente_magengeschwure'];
$andere_nicht_verordnete_mittel = $_POST['andere_nicht_verordnete_mittel'];
$medikamente = array(
    $_POST['medikamente1'],
    $_POST['medikamente2'],
    $_POST['medikamente3'],
    $_POST['medikamente4'],
    $_POST['medikamente5'],
    $_POST['medikamente6']
);

// Genussmittel
$koffein_pro_tag = $_POST['koffein_pro_tag'];
$zigaretten_pro_tag = $_POST['zigaretten_pro_tag'];
$zigaretten_seit_jahren = $_POST['zigaretten_seit_jahren'];
$rauchen_aufgehort = $_POST['rauchen_aufgehort'];
$alkohol_pro_woche = $_POST['alkohol_pro_woche'];
$alkohol_pro_tag = $_POST['alkohol_pro_tag'];

// Aktuelle Beschwerden
$gewichtsveranderung = $_POST['gewichtsveranderung'];
$gelenk_muskelschwellung = $_POST['gelenk_muskelschwellung'];
$ubelkeit_erbrechen = $_POST['ubelkeit_erbrechen'];
$unerklarliche_hamato = $_POST['unerklarliche_hamato'];
$mudigkeit = $_POST['mudigkeit'];
$starke_blutung = $_POST['starke_blutung'];
$schwachegefuhl = $_POST['schwachegefuhl'];
$atemnot = $_POST['atemnot'];
$fieber_schuttelfrost_schwitzen = $_POST['fieber_schuttelfrost_schwitzen'];
$hautveranderungen = $_POST['hautveranderungen'];
$veranderungen_des_stuhlgangs = $_POST['veranderungen_des_stuhlgangs'];
$ruckenschmerzen = $_POST['ruckenschmerzen'];
$haufiger_harndrang = $_POST['haufiger_harndrang'];
$schmerzen_beim_wasserlassen = $_POST['schmerzen_beim_wasserlassen'];

// Zusätzliche Informationen
$aktuelle_beschwerden = $_POST['aktuelle_beschwerden'];
$diagnosen = array(
    $_POST['diagnosen1'],
    $_POST['diagnosen2'],
    $_POST['diagnosen3'],
    $_POST['diagnosen4'],
    $_POST['diagnosen5']
);
$diagnosen_text = $_POST['diagnosen_text'];
$zusatzliche_informationen = $_POST['zusatzliche_informationen'];
    
    

    // Create the email message
    $subject = 'Form Submission from ' . $name;

    $message = "Subject: Form Submission from $name\n\n";
    
    $message .= "Dear $name,\n\n";
    
    $message .= "Thank you for submitting the form. Below are the details you provided:\n\n";
    
    $message .= "Personal Information:\n";
    $message .= "- Gender: $gender\n";
    $message .= "- Birthdate: $birthdate\n";
    $message .= "- Address: $strase, $plz, $ort\n";
    $message .= "- Mobile Tel: $tel_mobile\n";
    $message .= "- Business Tel: $tel_geschaeft\n";
    $message .= "- Private Tel: $tel_privat\n";
    $message .= "- Email: $email\n";
    $message .= "- Referring Physician: $zuweisenderArzt\n\n";
    
    $message .= "Additional Information:\n";
    $message .= "- Do you have additional insurance coverage? " . ($zusatzversicherung_select == 6 ? 'Yes' : 'No') . "\n";
    $message .= "- Additional Insurance: $zusatzversicherung_input\n";
    $message .= "- Send a copy of the invoice by email? " . ($email_versenden == 'A' ? 'Yes' : 'No') . "\n\n";
    
    $message .= "Medical History:\n";
    $message .= "- Last Examination Date: $lastExamDate\n";
    $message .= "- Go to Checkups: $goToCheckups\n";
    $message .= "- Treated for Complaints: $treatedForComplaints\n";
    $message .= "- Details of Treated Complaints: $treatedForComplaintsDetails\n\n";
    
    $message .= "Operations:\n";
    foreach ($alleoperationen as $operation) {
        $message .= "- $operation\n";
    }
    
    $message .= "\nInjuries:\n";
    foreach ($verletzungen as $key => $verletzung) {
        $message .= "- $verletzung: {$verletzung_datums[$key]}\n";
    }
    
    $message .= "\nFamily History:\n";
    $message .= "- Diabetes: $fam_diabetes\n";
    $message .= "- Cancer: $fam_krebs\n";
    $message .= "- Heart Diseases: $fam_herzerkrankungen\n";
    $message .= "- Addictions: $fam_abhangigkeit\n";
    $message .= "- High Blood Pressure: $fam_hoher_blutdruck\n";
    $message .= "- Depression: $fam_depression\n";
    $message .= "- Stroke: $fam_schlaganfall\n";
    $message .= "- Kidney Diseases: $fam_nierenerkrankungen\n";
    $message .= "- Inflammatory Joint Diseases: $fam_entzundliche_gelenkerkrankungen\n\n";
    
    $message .= "Medications in the Last Week:\n";
    $message .= "- Aspirin: $vergangen_aspirin\n";
    $message .= "- Vitamins/Minerals: $vergangen_vitamine_mineralien\n";
    $message .= "- Paracetamol: $vergangen_paracetamol\n";
    $message .= "- Herbal Remedies: $vergangen_pflanzliche_mittel\n";
    $message .= "- Ibuprofen/Diclofenac: $vergangen_ibuprofen_diclofenac\n";
    $message .= "- Medications for Stomach Ulcers: $vergangen_medikamente_magengeschwure\n";
    $message .= "- Other Non-Prescribed Medications: $andere_nicht_verordnete_mittel\n\n";
    
    $message .= "Current Medications:\n";
    foreach ($medikamente as $medication) {
        $message .= "- $medication\n";
    }
    
    $message .= "\nLifestyle:\n";
    $message .= "- Caffeine Intake Per Day: $koffein_pro_tag\n";
    $message .= "- Cigarettes Per Day: $zigaretten_pro_tag\n";
    $message .= "- Smoking Since: $zigaretten_seit_jahren\n";
    $message .= "- Quit Smoking Date: $rauchen_aufgehort\n";
    $message .= "- Alcohol Days Per Week: $alkohol_pro_woche\n";
    $message .= "- Alcohol Glasses Per Day: $alkohol_pro_tag\n\n";
    
    $message .= "Current Complaints:\n";
    $message .= "- Weight Changes: $gewichtsveranderung\n";
    $message .= "- Joint/Muscle Swelling: $gelenk_muskelschwellung\n";
    $message .= "- Nausea/Vomiting: $ubelkeit_erbrechen\n";
    $message .= "- Unexplained Bleeding: $unerklarliche_hamato\n";
    $message .= "- Fatigue: $mudigkeit\n";
    $message .= "- Excessive Bleeding: $starke_blutung\n";
    $message .= "- Weakness: $schwachegefuhl\n";
    $message .= "- Shortness of Breath: $atemnot\n";
    $message .= "- Fever/Chills/Sweating: $fieber_schuttelfrost_schwitzen\n";
    $message .= "- Skin Changes: $hautveranderungen\n";
    $message .= "- Changes in Stool: $veranderungen_des_stuhlgangs\n";
    $message .= "- Back Pain: $ruckenschmerzen\n";
    $message .= "- Frequent Urination: $haufiger_harndrang\n";
    $message .= "- Painful Urination: $schmerzen_beim_wasserlassen\n\n";
    
    $message .= "Additional Information:\n";
    $message .= "$aktuelle_beschwerden\n\n";
    $message .= "Diagnoses:\n";
    foreach ($diagnosen as $diagnose) {
        $message .= "- $diagnose\n";
    }
    $message .= "Additional Diagnoses: $diagnosen_text\n";
    $message .= "Additional Information: $zusatzliche_informationen\n\n";
    
    $message .= "Thank you for providing this valuable information. We will review it carefully and get back to you soon.\n\n";
    
    $message .= "Best regards,\n";
    $message .= "Your Medical Center Team";
    $templateFilePath = './template.html'; // Replace with the path to your HTML file
    $htmlContent = file_get_contents($templateFilePath);
   
    $headers = 'From: sender@example.com' . "\r\n" .
        'Reply-To: sender@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.ethereal.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'vicenta.roob57@ethereal.email';
    $mail->Password = 'BmWKduWvSRyG5jX2gH';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom("posa.97@gmail.com", $name); // Set the sender's email and name
    $mail->addAddress($to); // Set the recipient email
    $mail->Subject = "New message from $name";
    $mail->Body = $message;

    
   
    try {
        $mail->send();
     
    } catch (Exception $e) {
        echo "Oops! Something went wrong. Please try again later. Error: {$mail->ErrorInfo}";
    }
}
?> -->







