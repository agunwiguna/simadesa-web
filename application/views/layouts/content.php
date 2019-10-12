 <!-- Main Content -->
 <div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Penduduk</h4>
            </div>
            <div class="card-body">
              <?= count_content('tbl_penduduk') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Alat</h4>
            </div>
            <div class="card-body">
              <?= count_content('tbl_alat') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Layanan</h4>
            </div>
            <div class="card-body">
              <?= count_content('tbl_layanan') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Usulan</h4>
            </div>
            <div class="card-body">
              <?= count_content('tbl_usulan') ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
          <div class="col-6">
            <div class="card">
              <!-- <div class="card-header">
              
              </div> -->
              <div class="card">
                <h4 class="p-3" style="margin-bottom:-15px">Grafik Penduduk</h4>
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" style="list-style-type: none;">
                      <a class="nav-link active tab-penduduk" href="#" id="jk">Jenis Kelamin</a>
                    </li>
                    <li class="nav-item" style="list-style-type: none;">
                      <a class="nav-link tab-penduduk" href="#" id="usia">Usia</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body penduduk-data jk">
                  <div class="container">
                      <canvas id="jkchart" width="100" height="100"></canvas>
                  </div>
                </div>
                <div class="card-body penduduk-data usia" style="display:none">
                  <div class="container">
                      <canvas id="usiachart" width="100" height="100"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">


              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <!-- <div class="card-header">
              
              </div> -->
              <div class="card-body">
                <?php
                    $feed = file_get_contents("http://rss.detik.com/index.php/detikcom");           
                    
//$feed = file_get_contents($_GET['url']);
                    $xml = new SimpleXmlElement($feed, LIBXML_NOCDATA);

                    if(isset($xml->channel)) {
                      $cnt = count($xml->channel->item);
                      echo "<table>";
                      for($i=0; $i<$cnt; $i++)
                      {
                        echo "<tr><td>";
                        $url = $xml->channel->item[$i]->link;
                        $title = $xml->channel->item[$i]->title;
                        $desc = $xml->channel->item[$i]->description;
                        echo '<h4><a href="'.$url.'">'.$title.'</a></h4>'.$desc.'<br>';
                        echo "</tr></td>";
                      }
                      echo "</table>";
                    }
                    else
                    {
                      echo "Bukan RSS, kemungkinan besar ATOM, gunakan cara membaca atom";
                    }
                ?>

              </div>
            </div>
          </div>
      </div>
    </div>            

  </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    $(document).ready(function () {
      JKChart();
      $('.tab-penduduk').on('click',function (e) {
        let id = $(this).attr('id');
        e.preventDefault();
        $('.tab-penduduk').removeClass('active');
        $(this).addClass("active");
        $('.penduduk-data').hide();
        $('.'+id).show();
        if(id == 'jk'){
          JKChart();
        } else if(id=='usia') {
          usiaChart()
        }
      });
    });
    // Jk Chart
    function JKChart() {
      var jk_chart = document.getElementById("jkchart");
      var d_jk = {
              labels: ["Laki-Laki","Perempuan"],
              datasets: [
              {
                label: "Jenis Kelamin Penduduk",
                data: [<?= '"'.count_content('tbl_penduduk','jk','Laki-Laki').'"' ?>,<?= '"'.count_content('tbl_penduduk','jk','Perempuan').'"' ?>],
                backgroundColor: [
                  '#0038ff',
                  '#FA5ABB'
                ]
              }
              ]
              };

    var jenis_kelamin = new Chart(jk_chart, {
                    type: 'doughnut',
                    data: d_jk,
                    options: {
                      responsive: true
                 
                  }
                });
    }
    // usia Chart
    function usiaChart() {
      var jk_chart = document.getElementById("usiachart");
      var d_jk = {
              labels: ["0 - 17","18 - 35","36 - 55","56 > "],
              datasets: [
              {
                label: "Jenis Kelamin Penduduk",
                data: [<?='"'.count_age(1).'"' ?>,<?= '"'.count_age(2).'"' ?>,<?= '"'.count_age(3).'"' ?>,<?= '"'.count_age(4).'"' ?>],
                backgroundColor: [
                  '#00ff45',
                  '#0004ff',
                  '#f9a404',
                  '#f0ff00'
                ]
              }
              ]
              };

    var jenis_kelamin = new Chart(jk_chart, {
                    type: 'doughnut',
                    data: d_jk,
                    options: {
                      responsive: true
                 
                  }
                });
    }
    

</script>