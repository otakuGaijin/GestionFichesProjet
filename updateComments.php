<?php
include 'bdd.php';
$ficheid = $_GET['id'];
$email_pil= "";
$to = "";
$subject = "";
$headers = "";
$message = "";
$commentaires = "";
$lastcomment = $_POST['comm_proj'];
      // $to3 = 'adouardcamille@hotmail.com';
      // $subject3 = 'Hello';
      // $message3 = '<h1> Hello ma friend ! </h1>';
      // $message3 .= '<p> This is a <u>test message</u></p>';
      // $message3 .= '<p> If you receive me you did succeed !!<p>';
      // $headers3 = 'Content-Type: text/html; charset=\"iso-8859\"';
      // $headers .= 'From: "adouardcamille.com"';
      // $headers .= 'Reply-To: adouardcamille@hotmail.com';
      //
      // mail($to3, $subject3, $message3, $headers3);

    $req_ap = $bdd->query('SELECT commentaire_fiche FROM fiches WHERE id_fiche="'.$ficheid.'"');
    while ($donnees3 = $req_ap->fetch())
    {
      $commentaires=$donnees3['commentaire_fiche']." <br><br> ".$_POST['comm_proj'];
    }
    $req_ap->closeCursor();

    $req_ap2 = $bdd->prepare('UPDATE fiches SET commentaire_fiche = :comm_proj WHERE id_fiche = :id');
    $req_ap2->execute(array(
      'comm_proj' => $commentaires,
      'id' => $ficheid,
      ));

      $req_mail = $bdd->query('SELECT * FROM fiches WHERE id_fiche="'.$ficheid.'"');
      while ($donnees4 = $req_mail->fetch())
      {
        $email_pil=$donnees4['pilote_email_fiche'];
        $nom_pil=$donnees4['pilote_nom_fiche'];
        $tel_pil=$donnees4['pilote_mobile_fiche'];
        $titre_proj=$donnees4['titre_projet'];

        $to = $email_pil;
        $subject .= 'Un commentaire a été ajouté sur votre projet!';
        $headers .= 'Content-Type: text/html; charset=\"iso-8859-1\"';
        $headers .= 'From: "adouardcamille.com"';
        $headers .= 'Reply-To: adouardcamille@hotmail.com';
        $message .= '<h2> Bonjour !<h2>';
        $message .= '<h3> un nouveau commentaire a été ajouté sur votre projet: </h3>';
        $message .= '<h4>'.$titre_proj.'</h4>';
        $message .= '<h3> commentaire : </h3>';
        $message .= '<h4>'.$lastcomment.'</h4>';
      }
      $req_mail->closeCursor();

      mail($to, $subject, $message, $headers);


    header('location:index.php');

 ?>
