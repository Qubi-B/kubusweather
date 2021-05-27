  
<!--------------------------------------------------------------------
By Jakub Barszcz (2020-2021)
*Contains parts of someone else's code, will be updated when
I find who I took it from D:
Contact me:
  Discord: h-bi_h#2813
  E-mail:  j.barszcz@op.pl
  Gmail:   kies.jb@gmail.com
--------------------------------------------------------------------->

<!-- PHP initial script -->
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

?>

          <?php
          include 'isonline.php';
          ?>

<div class="container">
  <div style="height: 60px;"></div>
  <div class="dashboard">
      <div class="maindataclass">
      <!-- TEMPERATURE (PHP) -->
      <?php
        echo '<h1 class="maintemp">';
        if($output == "❌ offline"){echo "--";} else{
            if(round($last_reading_temp) == -0){
                echo round($last_reading_temp, 1);
            }
            else{
                echo round($last_reading_temp);
            }

        }
        echo '°</h1>';
      ?>

      <!-- STATUS SCRIPT -->
      <?php
        $tempstatus = "";
        $caqistatus = "";
        $rain = "";
      //temperature status script
        if($last_reading_temp <= -5){
          $tempstatus = "Bardzo zimno dzisiaj. ";
        }
        else if($last_reading_temp > -5 && $last_reading_temp <= 15){
          $tempstatus = "Zimno dzisiaj. ";
        }
        else if($last_reading_temp > 15 && $last_reading_temp<= 27){
          $tempstatus = "Ciepło dzisiaj. ";
        }
        else if($last_reading_temp > 27){
          $tempstatus = "Gorąco dzisiaj. ";
        }
        else {
          $tempstatus = "Wystąpił błąd programu(0x00). ";
        }

      //air quality status script
        
        if ($last_reading_pm10 <= 25) {
          $caqistatus = "Teraz bardzo dobre powietrze. ";
        }
        else if ($last_reading_pm10 > 25 && $last_reading_pm10 <= 50) {
          $caqistatus = "W tej chwili dobre powietrze. ";
        }
        else if ($last_reading_pm10 > 50 && $last_reading_pm10 <= 90) {
          $caqistatus = "Aktualnie średnia jakość powietrza. ";
        }
        else if ($last_reading_pm10 > 90 && $last_reading_pm10 <= 180) {
          $caqistatus = "Słabe powietrze. Aktywność na zewnątrz nie jest zalecana. ";
        }
        else if ($last_reading_pm10 > 180) {
          $caqistatus = "Bardzo słabe powietrze. Odradza się wszelkie aktywności na zewnątrz. ";
        }
        else{
            $caqistatus = "Wystąpił błąd programu(0x01). ";
        }

        //check rain or snow
        
        if($last_reading_hum >= 75 && $last_reading_temp >= 6){
            $rain = "Możliwy deszcz. ";
        }
        else if($last_reading_hum >= 75 && $last_reading_temp < 6){
          $rain = "Możliwe&nbspopady&nbspśniegu. ";
        }
        else if($last_reading_hum < 75){
            $rain = "";
        }
        else{
            $rain = "Wystąpił błąd programu(0x02). ";
        }


        //online/offline script which uses existing lines to write nah I won't give u data D:

        if($output == "❌ offline"){
            $tempstatus = "Brak aktualnych danych.&nbsp;";
            $caqistatus = "Czujnik jest w trybie offline.&nbsp;";
            $rain = "Spróbuj później.";
        }

      //output
        echo '<p class="statusp" style="border-color:none"><b>';
        echo $tempstatus;
        echo $caqistatus;
        echo $rain;
        echo '</b></p>';
      ?>
      </div>
  </div>
</div>
