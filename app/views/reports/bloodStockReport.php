<?php $this->setSiteTitle('Donor Details'); ?>


<?php $this->start('head'); ?>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<!-- <div id="chart"></div> -->
<!--  -->


<!-- Bar Chart -->




<?php $this->end(); ?>

<?php $this->start('body') ?>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2> Blood Stock Report</h2>

    </div>

  </div>
</section>


<body>

  <center>
    <h3 style="margin-top: 20px;"> Select Blood bank </h3>
    <div class="col-md-3">

      <select name="bld_bank" class="form-control" id="bld_bank" value="" style="width: 400px ; height: 50px;">
        <option value="<?= $this->currentBank ?>"><?= $this->currentBank ?></option>
        <?php foreach ($this->banks as $banks) : ?>
          <option value="<?= $banks->bloodbank ?>"><?= $banks->bloodbank ?></option>
        <?php endforeach; ?>


      </select>

    </div>
  </center>


  <div class="container" style="justify-content:center;display:flex">


    <div id="piechart_3d" class="chart col-md-6"></div>

    <div id="top_x_div" class="chart col-md-6" style="width:auto"></div>

  </div>


</body>
<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= PROOT ?>vendor/bootstrap/js/popper.js"></script>

<script type="text/javascript">

</script>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  //  	console.log("",check);


  $(document).ready(function() {
    var check = $("#bld_bank").val();

    loadData(check + ' Blood Bank Current Stock');

    $('#bld_bank').change(function() {
      var bank = $(this).val();
      if (bank != '') {
        loadData(bank + ' Blood bank Current Stock');
      }
    });



    function loadData(temp) {

      var temp_ti = temp;

      var check = $("#bld_bank").val();
      console.log("ti", temp_ti);
      $.ajax({
        url: "http://localhost/bloodbank/reports/bloodStock",
        method: "POST",
        dataType: "JSON",
        data: {
          bld_bank: check
        },
        success: function(data) {
          console.log("This data", data.pie);

          drawChart(data.pie, temp_ti);
          drawStuff(data.bar);



        }

      });
    }


  });


  function drawChart(chart_data, main_title) {
    var jsonData = chart_data;

    var data = new google.visualization.DataTable();


    data.addColumn('string', 'Blood Group');
    data.addColumn('number', 'Count');

    $.each(jsonData, function(i, jsonData) {
      var bld_grps = jsonData.bld_grps;
      var count = parseInt(jsonData.count);
      data.addRows([
        [bld_grps, count]
      ]);
    });

    var options = {
      title: main_title,
      is3D: true,
      chartArea: {
        left: "20%",
        bottom: "30%",
        width: 400,
        height: 300
      },

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }



  google.charts.load('current', {
    'packages': ['corechart', 'bar']
  });
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff(bar_data) {
    var jsonData = bar_data;
    var data = new google.visualization.DataTable();

    data.addColumn('string', 'Month');
    data.addColumn('number', 'Count');

    $.each(jsonData, function(i, jsonData) {
      var month = jsonData.month_name;
      var count = parseInt(jsonData.count);

      data.addRows([
        [month, count]
      ]);
    });



    var options = {
      width: 800,
      legend: {
        position: 'none'
      },
      chart: {
        title: 'Blood Stock in 2021',
        subtitle: 'popularity by pints'
      },
      axes: {
        x: {
          0: {
            side: 'Pints',
            label: 'Months'
          } // Top x-axis.
        }
      },
      bar: {
        groupWidth: "20%"
      }
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    // Convert the Classic options to Material options.
    chart.draw(data, google.charts.Bar.convertOptions(options));
  };
</script>


<?php $this->end(); ?>