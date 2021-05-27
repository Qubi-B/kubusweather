<!--------------------------------------------------------------------
By Jakub Barszcz (2020-2021)
*Contains parts of someone else's code, will be updated when
I find who I took it from D:
Contact me:
  Discord: h-bi_h#2813
  E-mail:  j.barszcz@op.pl
  Gmail:   kies.jb@gmail.com
--------------------------------------------------------------------->

<!-------------------------------------------------------------------!>
Copyright by Jakub Barszcz (2020-2021)

This code is copyrighted and every time it or it's part(s) is/are used
anywhere else, this notice has to be included at the beginning and the
part that has been used has to be indicated in the code using comment.

Contact me:
  Discord: h-bi_h#2813
  E-mail:  j.barszcz@op.pl
  Gmail:   kies.jb@gmail.com
<--------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Kubusweather v4.0, Bilcza</title>
  <meta name="description" content="Jakość powietrza dla Bilczy. Teraz w wersji v4.0!">
  <meta name="author" content="Jakub Barszcz">
  <meta name="keywords" content="Pogoda, Bilcza, Pogoda Bilcza, Kubusweather, kbwthr, Kuba Pogoda pl, kubusweather v4.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Work+Sans:wght@100&display=swap" rel="stylesheet"> 
  <!-- NOC/DZIEŃ -->
  <?php
  $nowtimee = date('H:i:s');
  $warsawcurrenttime = date("H:i:s", strtotime("$nowtimee + 1 hours"));
  $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, 50.789741479446725, 20.62010660109631, 90, 2);
  $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, 50.789741479446725, 20.62010660109631, 90, 2);
  $date1 = DateTime::createFromFormat('H:i:s', $warsawcurrenttime);
  $date2 = DateTime::createFromFormat('H:i', $sunrise);
  $date3 = DateTime::createFromFormat('H:i', $sunset);
  if ($date1 > $date2 && $date1 < $date3) {
    echo '<link rel="stylesheet" href="clouds/clouds.css">';
  } else {
    echo '<link rel="stylesheet" href="clouds/night.css">';
  }
  ?>

  <!-- PWA -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#081534">
  <meta name="msapplication-TileColor" content="#081534">
  <meta name="theme-color" content="#ffffff">
  <!-- PWA -->
  <!-- PWA script -->
  <script src="/assets/js/app.js"></script>
  <!-- PWA script -->
</head>

<body>
  <?php
  include 'menu.html';
  include 'main.php';
  include 'data.php';
  ?>
  <!--
  </body>
</html>
