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
    $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, 50.789741479446725, 20.62010660109631, 90, 2);
    $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, 50.789741479446725, 20.62010660109631, 90, 2);

    //timezone(warsaw)
    $last_reading_time = date("Y-m-d H:i:s", strtotime("$last_reading_time + 1 hours"));
    $last_reading_date = date("d-m-Y", strtotime("$last_reading_time + 1 hours"));
?>

<!-- BEGIN datasection -->
<section class="section2">
<div class="data">
 <!-- <img class="margintop" src="assets\decoration1.png" alt=""> -->
      <table class="datatable">
        <tr>
          <th></th>
          <th></th>
        </tr>
      </table>
      <table class="datatable">
        <tr>
          <td><img class="icon" src="thermometer.png" alt=""></td>
          <td class="dataname">&nbspTemperatura:&nbsp</td>
          <td class="data"> <?php if($output == "❌ offline"){echo "--";} else{echo $last_reading_temp; }?> °C</td>
        </tr>
        </table>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="waterdrop.png" alt=""></td>
          <td class="dataname">&nbspWilgotność:&nbsp</td>
          <td class="data"> <?php if($output == "❌ offline"){echo "--";} else{echo round($last_reading_hum);} ?> %</td>
        </tr>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="gauge.png" alt=""></td>
          <td class="dataname">&nbspCiśnienie:&nbsp</td>
          <td class="data"> <?php if($output == "❌ offline"){echo "--";} else{echo round($last_reading_pres);} ?> hPa</td>
        </tr>
        </table>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="cloud1.png" alt=""></td>
          <td class="dataname">&nbsppm 2.5:&nbsp</td>
          <td class="data"> <?php if($output == "❌ offline"){echo "--";} else{echo $last_reading_pm25;}?> µg/m³</td>
        </tr>
        </table>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="cloud2.png" alt=""></td>
          <td class="dataname">&nbsppm 10:&nbsp</td>
          <td class="data"> <?php if($output == "❌ offline"){echo "--";} else{echo $last_reading_pm10;}?> µg/m³</td>
        </tr>
        </table>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="sunrise.png" alt=""></td>
          <td class="dataname">&nbsp&nbsp</td>
          <td class="data"> <?php {echo "🠕"; echo $sunrise; echo "&nbsp&nbsp🠗"; echo $sunset;}?></td>
        </tr>
        </table>
        <table class="datatable">
        <tr>
          <td><img class="icon" src="online.png" alt=""></td>
          <td class="dataname">&nbspStatus:&nbsp</td>
          <td class="data"> <?php
          include 'isonline.php';
          echo $output;
          ?> </td>
        </tr>
      </table>
</div>
<p class="copyright">Ostatni pomiar: <?php echo $last_reading_time; ?></p>
<p class="copyright">Następny pomiar ok. <?php echo date("H:i:s", strtotime("$expected_data_time - 300 seconds"));  ?> (± 5 min)</p>
<p class="copyright"><br>(c)Jakub Barszcz 2020-2021</p> <!-- lower datasection notation ex.copyright information -->
</section>
