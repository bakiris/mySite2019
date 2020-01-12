<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


<?php

// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $subjectErr = "";
$name = $email = $subject = $phone = $requiredMessage =  $completeMessage= "";
$xName= $xEmail= $xSubject= false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "   Το Όνομα είναι υποχρεωτικό";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z α-ωΑ-ω]*$/",$name)) {
      $nameErr = "   Μόνο γράμματα και κενοί χαρακτήρες επιτρέπονται";
      $name = "";
    }else{
    	$xName=true;
    }

  }
  
  if (empty($_POST["email"])) {
    $emailErr = "   Το Email είναι υποχρεωτικό";
    
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$emailErr = "   Μη έγκυρο Email";
      	$email = "";
      	}else{
    		$xEmail=true;
    	}
  }
    
  if (empty($_POST["phone"])) {
   
  } else {
      $phone = test_input($_POST["phone"]);
      // check if phone is well-formed
      if (!is_numeric($phone)) {

          if (strlen($phone) != 10) {
              $phoneErr = "   Το έγκυρο τηλέφωνο αποτελείται από 10 ψηφία";
              $phone = "";
          } else {
              $phoneErr = "   Μόνο αριθμοί επιτρέπονται";
              $phone = "";
          }
      }
  }
  
  if (empty($_POST["subject"])) {
    $subjectErr= "   Το Μήνυμα είναι υποχρεωτικό";
    $subject= "";
  } else {
    $subject= test_input($_POST["subject"]);
    $xSubject= true; 
  }


if($xName===true && $xSubject===true && $xEmail=== true){
    $requiredMessage="";
    /*Send Email*/

    $date = date('j, F Y h:i A');
    $to      = 'bakirisgr@gmail.com';
    $sub = 'www.bakiris.gr';
    $message = 'Γειά σας,'."\n\n".'Ευχαριστώ για την επικοινωνία. Θα σας απαντήσω το συντομότερο δυνατό.'."\n\n".'Με εκτίμηση,'."\n".'Χρήστος Μπακίρης';
    $headers .= 'From: ' . 'Χρήστος Μπακίρης <admin@bakiris.gr>' . "\r\n";


    mail($to, $sub, $subject, $headers);
    mail($email, $sub, $message, $headers);

   /*
    $from = "test@hostinger-tutorials.com";
    $to = "test@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;

    mail($to,$subject,$message, $headers);
    */
    $name = $email = $subject = $phone = $requiredMessage = "";
    $completeMessage="Το Μήνυμα σας στάλθηκε με επιτυχία.";
    $phoneErr ="";


}else{
	$xName= $xEmail= $xSubject=false;
    $requiredMessage="* Τα πεδία είναι υποχρεωτικά";
    $completeMessage="";
    }


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
?>

    <script src="myscript.js"></script>

    <div class="containerFull">
        <div class="imagesPanel">
            <div class="images">
                <div class="logo">
                	<a href="#HomePage">
                    <img src="logo.png" alt="Bakiris Christos Logo">
                </div>
            </div>
            <div class="images">
                <div class="socialIcons">
                    <a href="https://www.youtube.com/channel/UCjyN4-pUKyrY-kqlBV9ZC5A" target="_blank">
                        <img src="socialIcons\youtubeIco.png" alt="youtube channel" width="20" height="20">
                    </a>
                </div>
            </div>
            <div class="images">
                <div class="socialIcons">
                    <a href="https://www.facebook.com/BakirisChristos?ref=bookmarks" target="_blank">
                        <img src="socialIcons\facebookIco.png" alt="facebook" width="20" height="20">
                    </a>
                </div>
            </div>
            <div class="images">
                <div class="socialIcons">
                    <a href="https://www.linkedin.com/in/christos-bakiris-6b870a18b" target="_blank">
                        <img src="socialIcons\linkedinIco.png" alt="linkedin" width="20" height="20">
                    </a>
                </div>
            </div>
        </div>

        <div class="bar blueGrey">
            <a href="#HREF0"><button class="bar-item button tablink orange" >Αρχική</button></a>
            <a href="#HREF1"><button class="bar-item button tablink" >Βιογραφικό</button></a>
            <a href="#ContactPage"><button class="bar-item button tablink" >Επικοινωνία</button></a>
        </div>


        <!--/*************** Begin Home Page ***************/-->

        <div id="HomePage" class="container border choice">

                    

        	<div id="HREF0">
            <div class="panelChristos">
                <div class="ChristosFImg">
                    <img src="christos000.jpg" alt="Avatar" class="christosImg">
                </div>
                <div class="textImg">
                    <div class="firstLine">
                        <h2>Γεια σας, είμαι ο<span class="surName"> Χρήστος Μπακίρης.</span><br><span class="idiotitaLine">Καθηγητής Πληροφορικής - Οικονομίας και F&B Controller</span></h2>
                    </div>
                    <div class="MainLines">
                        <p>Εργάζομαι στο χώρο της εκπαίδευσης επί πέντε συναπτά έτη, πιο συγκεκριμένα στη Δημόσια και στην Ιδιωτική Δευτεροβάθμια και Μεταδευτεροβάθμια εκπάιδευση. Επίσης, τα τελευταία επτά χρόνια εργάζομαι στον κλάδο της φιλοξενίας, σε μεγάλες
                            ξενοδοχειακές μονάδες, στα τμήματα λογιστηρίου και ελέγχου-αγορών. </p>
                    </div>

                    <div class="tableInfoF">

                        <div class="column">
                            <table cellspacing="10">
                                <tr>
                                    <th>Ηλικία</th>
                                    <td>31</td>
                                </tr>
                                <tr>
                                    <th>Διεύθυνση</th>
                                    <td>85100, Ρόδος, Ελλάδα</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>bakirisgr@gmail.com</td>
                                </tr>
                            </table>
                        </div>
                        <div class="column">
                            <table cellspacing="10">
                                <tr>
                                    <th>Τηλέφωνο</th>
                                    <td>+30 - 6986212611</td>
                                </tr>
                                <tr>
                                    <th>Ιστοδελίδα</th>
                                    <td>www.bakiris.gr</td>
                                </tr>
                                <tr>
                                    <th>Εθνικότητα</th>
                                    <td>Ελληνική</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

            <div id="cvP" class="panelChristos00">

                <div class="ImgFPanel">

                    <img class="ImgPP" id="imgJob" src="Icons\graduateIco.png" alt="graduate" width="80px">

                </div>


                <div id="educationTitle" class="firstLine">


                    <h2>Εκπαίδευση</h2>
                </div>
                <div class="eduPanel">

                    <div class="AA">
                        <table id="IdT">
                            <tr>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInRight">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2019</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table>
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Μεταπτυχιακό </span>στη Διοίκηση Οικονομικών Μονάδων με κατεύθυνση Λογιστική (MBA Accounting)</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>ΑΕΙ - Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών - <span class="EduColor2">ΕΚΠΑ</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Το MBA Accounting μου έδωσε τη δυνατότητα να κατανοήσω τη λειτουργία μιας επιχείρησης όσον αφορά την οργάνωση, τη δομή και τη διοίκηση της. Βασική ιδέα του μεταπτυχιακού αποτελεί η ορθή λήψη αποφάσεων στα
                                                    Χρηματοοικονομικά, Λογιστικά και Διοικητικά θέματα.</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInLeft">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2019</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table cellspacing="10">
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Δίπλωμα</span> Επαγγελματικής Εκπαίδευσης και Κατάρτισης στη Μηχανογραφημένη Λογιστική</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>Εθνικός Οργανισμός Πιστοποίησης Προσόντων & Επαγγελματικού Προσανατολισμού - <span class="EduColor2">ΕΟΠΠΕΠ</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Η φοίτηση μου στη Μηχανογραφημένη Λογιστική μου έδωσε τη δυνατότητα να αποκτήσω όλες τις απαραίτητες γνώσεις πάνω στη σύγχρονη λογιστική. Επίσης η επιτυχία μου στις κρατικές εξετάσεις του ΕΟΠΕΠ μου παρέχει
                                                    τα πλήρη επαγγελματικά δικαιώματα της ειδικότητας.</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInRight">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2015</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table cellspacing="10">
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Πιστοποιητικό</span> Παιδαγωγικής και Διδακτικής Επάρκειας</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>Ανώτατη Σχολή Παιδαγωγικής και Τεχνολογικής Εκπαίδευσης - <span class="EduColor2">ΑΣΠΑΙΤΕ</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Η φοίτηση μου στο Παιδαγωγικό τμήμα της ΑΣΠΑΙΤΕ μου έδωσε τις κατάλληλες γνώσεις Παιδαγωγικών, καθώς επίσης και τη δυνατότητα να διδάσκω τις ειδικότητες μου σε σχολεία - Πρωτοβάθμια και Δευτεροβάθμια Ευκπαίδευση.</p>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInLeft">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2014</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table cellspacing="10">
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Μεταπτυχιακό</span> στις Πολιτικές, Οικονομικές και Διεθνείς Επιστήμες (MA Politics, Economics and International Studies)</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>ΑΕΙ - <span class="EduColor2">Πανεπιστήμιο Αιγαίου</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Με την επιτυχή ολοκλήρωση του εν λόγω μεταπτυχιακού απέκτησα μια ευρεία γνώση της πολιτικής, οικονομικής και κοινωνικής εξέλιξης του διεθνούς συστήματος. Επίκεντρο αποτέλεσε η στοχευμένη κατανόηση του τρόπου
                                                    λειτουργίας του πολύπλοκου Διεθνούς Συστήματος στις μέρες μας.</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInRight">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2011</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table cellspacing="10">
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Πτυχίο</span> Επιστήμης και Τεχνολογίας Υπολογιστών (BSc Computer Science)</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>ΑΕΙ - <span class="EduColor2">Πανεπιστήμιο Πελοποννήσου</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Η επιτυχής ολοκλήρωση των σπουδών μου στο Πανεπιστήμιο Πελοποννήσου και η απόκτηση του Πτυχίου Πληροφορικής, αποτέλεσε την απαρχή της ακαδημαϊκής μορφώσεως που απέκτησα στο πέρασμα των ετών. Αποκόμισα πολλές
                                                    γνώσεις γύρω από την τεχνολογία και οικοδόμησα γερά θεμέλια γύρω από τα μαθηματικά και τις γλώσσες προγραμματισμού.</p>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td id="IdTA">
                                    <div class="columnEdu">
                                        <div class="columnEduInLeft">
                                            <div class="tableEdu1">
                                                <table>
                                                    <tr>
                                                        <th>2005</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="columnTableEdu">
                                                <div class="tableEdu2">
                                                    <table cellspacing="10">
                                                        <tr>
                                                            <th><img src="Icons/graduateIco.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td><span class="EduColor">Απολυτήριο</span> Λυκείου</td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="Icons/university.png" alt="panepistimio" width="20" height="20"></th>
                                                            <td>Ενιαίο <span class="EduColor2">Λύκειο Αφάντου</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="pEdu">
                                                <p>Το 2005 αποφοίτησα με Άριστα από το Λύκειο, ολοκληρώνοντας έτσι με τον καλύτερο δυνατό τρόπο τον κύκλο της Δευτεροβάθμιας Εκπαίδευσης μου. Ωστόσο η εξίσου καλή απόδοση που είχα στις πανελλαδικές εξετάσεις
                                                    καθόρισαν την εισαγωγή μου στην Τριτοβάθμια Εκπαίδευση, σε Πανεπιστήμιο Θετικών και Τεχνολογικών Επιστημών.</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Begin FirstLine of Edu Panel -->


                    <!-- End FirstLine of Edu Panel -->

                    <!-- Begin SecondLine of Edu Panel -->



                    <!-- End SecondLine of Edu Panel -->

                    <!-- Begin ThirdLine of Edu Panel -->



                    <!-- End ThirdLine of Edu Panel -->





                </div>
            </div>
        

            <!-- Begin Job Exp Panel -->
            
            <div class="panelChristos00">
                <div class="ImgFPanel">
                    <img class="ImgPP" id="imgJob" src="Icons\job.png" alt="job" width="80px">
                </div>

                <div id="ergasia" class="firstLine">
                    <h2>Επαγγελματική Εμπειρία</h2>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Μάρτιος 2018 - Σήμερα</p>
                        <div class="panel001AA">
                            <p>F&B Controller Supervisor</p>
                            <div class="panel002AA">
                                <p>Atrium Hotels *****</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Φεβρουάριος 2017 - Οκτώβριος 2017</p>
                        <div class="panel001AA">
                            <p>F&B Controller - Purchasing Mgr</p>
                            <div class="panel002AA">
                                <p>Lindos Hotels *****</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Μάρτιος 2016 - Οκτώβριος 2016</p>
                        <div class="panel001AA">
                            <p>F&B Controller</p>
                            <div class="panel002AA">
                                <p>Aldemar Hotels *****</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Απρίλιος 2013 - Μάιος 2015</p>
                        <div class="panel001AA">
                            <p>F&B Controller - Purchasing Ast</p>
                            <div class="panel002AA">
                                <p>La Marquise Hotel *****</p>
                            </div>
                        </div>
                    </div>
                </div>






            </div>

            <!-- End PanelChristos00 for Job Exp  -->





            <!-- Begin Edu Teach Panel -->

            <div class="panelChristos00">
                <div class="ImgFPanel">
                    <img class="ImgPP" id="imgJob" src="Icons\teach.png" alt="teach" width="80px">
                </div>

                <div id="ergasia" class="firstLine">
                    <h2>Διδακτική Εμπειρία</h2>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Ακαδ. έτος 2015 - 2016 & 2018 - 2019</p>
                        <div class="panel001AA">
                            <p>Καθηγητής Πληροφορικής</p>
                            <div class="panel002AA">
                                <p>ΙΕΚ & ΕΠΑΣ ΟΑΕΔ</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Σχολ. έτος 2018 - 2019</p>
                        <div class="panel001AA">
                            <p>Καθηγητής Πληροφορικής</p>
                            <div class="panel002AA">
                                <p>Γυμνάσιο Ιαλυσού & Αφάντου</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Σχολ. έτος 2014 - 2015 & 2015 - 2016</p>
                        <div class="panel001AA">
                            <p>Καθηγητής Πληροφορικής</p>
                            <div class="panel002AA">
                                <p>Φροντιστήριο AXON</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel000A">
                    <div class="panel000AA">
                        <p>Ακαδ. έτος 2015 - 2016</p>
                        <div class="panel001AA">
                            <p>Καθηγητής Οικονομικών Επσιτημών</p>
                            <div class="panel002AA">
                                <p>Ι.ΙΕΚ ΑΝΚΟ</p>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
            <!-- End PanelChristos00 for EduTeach  -->

        </div>
            <!--/*************** Begin CV Page ***************/-->

            <div id="CVsPage" >
            	<div id="HREF1">
                <div class="panelChristos00">
                    <div class="ImgFPanel">
                        <img class="ImgPP" id="imgJob" src="Icons\cvImg.png" alt="cv" width="80px">
                    </div>

                    <div id="ergasia" class="firstLine">
                        <h2>Βιογραφικό Σημέιωμα</h2>
                    </div>

                    <div class="MainLines00">
                        <div class="MainLines00Border">
                            <p> Για το πλήρες βιογραφικό μου παρακαλώ πατήστε Λήψη. </p>
                        </div>
                    </div>

                    <div class="btnDownload">
                        <button class="btn00"> <a href="cvBakiris2019.pdf" download="cvBakiris2019.pdf" target="#"><img src="Icons\downloadImg.png" alt="downloadImg" width="40px"> <span> &nbsp; Λήψη</span> </a> </button>
                    </div>

                </div>

            </div>
        </div>

            <!--/*************** End CV Page ***************/-->

            <!--/*************** Begin Contact Page ***************/-->

            <div id="ContactPage"  >
            	<div id="HREF2">
                <div class="panelChristos00">
                    <div class="ImgFPanel">
                        <img class="ImgPP" id="imgJob" src="Icons\contactSupport.png" alt="contactSupport" width="80px">
                    </div>

                    <div id="ergasia" class="firstLine">
                        <h2>Φόρμα Επικοινωνίας</h2>
                    </div>

                    <div class="container">


                        <form id="form0" method="post" action="#ContactPage" >

                            <div class="requiredM00">
                                <p style="color:red"><?php echo $requiredMessage;?></p><p style="color: rgb(64, 180, 249)"><?php echo $completeMessage;?></p>
                            </div>
                            <label for="name">Ονοματεπώνυμο <span class="error" style="color:red">*<?php echo $nameErr;?></span></label>
                            <input type="text" name="name" value="<?php echo $name;?>">

                            <label for="email">Email <span class="error" style="color:red">* <?php echo $emailErr;?></span></label>
                            <input type="text" name="email" value="<?php echo $email;?>">

                            <label for="phone">Τηλέφωνο <span class="error" style="color:blue"> <?php echo $phoneErr;?></span></label>
                            <input type="text" name="phone" value="<?php echo $phone;?>">

                            <label for="subject">Μήνυμα <span class="error" style="color:red">*<?php echo $subjectErr;?></span></label>
                            <textarea id="subject" name="subject" style="height:200px"    ><?php echo $subject; ?></textarea>
                            <input type="submit" value="Αποστολή">

                        </form>


                    </div>


                </div>
            </div>
        </div>
    	</div>

        <!--/*************** End Contact Page ***************/-->


        <!--/*************** End Home Page ***************/-->



    <div class="footer">
        <footer>&nbsp;&nbsp;&nbsp;&copy; Copyright 2019 - Bakiris Christos</footer>
    </div>
    </div>


</body>

</html>