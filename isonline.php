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

<?php
    include_once('esp-database.php');

    //declare variables
    $last_reading = getLastReadings();
    $last_reading_temp = $last_reading["temp"];
    $last_reading_hum = $last_reading["hum"];
    $last_reading_pres = $last_reading["pres"];
    $last_reading_pm10 = $last_reading["pm10"];
    $last_reading_pm25 = $last_reading["pm25"];
    $last_reading_time = $last_reading["reading_time"];

    //timezone(warsaw)
    $last_reading_time = date("Y-m-d H:i:s", strtotime("$last_reading_time + 1 hours"));

    $expected_data_time = date( "Y-m-d H:i:s", strtotime( $last_reading_time ) + 20 * 60 );

    $now = date('Y-m-d H:i:s');
    $now_warsawtime = date("Y-m-d H:i:s", strtotime("$now + 1 hours"));
    $output = "";

    //output

    if($expected_data_time < $now_warsawtime){
      $output = "❌ offline";
    }
    else {
      $output = "✅online";
    }
?>
