<?php $this->setSiteTitle('Donor Details'); ?>




<?php $this->start('body') ?>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2> Blood Donations Report</h2>

    </div>

  </div>
</section>

<div class="container ">

  <div class="row">

    <div class="col-md-6" style="margin-left:200px" >
      <select name="bld_bank" class="form-control" id="bld_bank" value="" style="width: 400px ; height: 50px;">
        <option value="" disabled selected>Select Blood bank</option>
        <?php foreach ($this->banks as $banks) : ?>
          <option value="<?= $banks->bloodbank ?>"><?= $banks->bloodbank ?></option>
        <?php endforeach; ?>


      </select>
    </div>

    <div class="col-md-3">

      <button type="button" id="refresh" class="btn btn-danger">Reset</button>
    </div>
       

  </div>
</div>

<body>




<div class="container" style="justify-content:center;display:flex">


<div id="piechart_3d" class="chart col-md-6"></div>

<div id="top_x_div" class="chart col-md-6" style="width:auto"></div>

</div>


</body>

<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= PROOT ?>vendor/bootstrap/js/popper.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);




  $(document).ready(function() {
    var check = $("#bld_bank").val();
    annualData(' Annual Blood Donations');

    $("#refresh").click(function() {
      $("#search").load("http://localhost/bloodbank/reports/bloodDonation");
      $("#bld_bank").val("");
      annualData(' Annual Blood Donations');
    });


    //loadData(' Annual Blood Donations');



    $('#bld_bank').change(function() {
      var bank = $(this).val();
      if (bank != '') {
        loadData(bank + ' Blood bank Donations');
      }
    });



    function loadData(temp) {

      var temp_ti = temp;

      var blood = $("#bld_bank").val();
      console.log("hh", blood);
      console.log("title", temp_ti);
      $.ajax({
        url: "http://localhost/bloodbank/reports/bloodDonation",
        method: "POST",
        dataType: "JSON",
        data: {
          bld_bank: blood
        },
        success: function(data) {
          console.log("pie chart", data.pie);
          // alert('the server returned ' + data);
          drawChart(data.pie, temp_ti);
          drawStuff(data.bar);


        }

      });
    }

    function annualData(temp) {

      var temp_ti = temp;

      var blood = $("#bld_bank").val();
      console.log("hh", blood);
      console.log("title", temp_ti);
      $.ajax({
        url: "http://localhost/bloodbank/reports/bloodDonation",
        method: "GET",
        dataType: "JSON",
        data: {
          bld_bank: blood
        },
        success: function(data) {
          console.log("pie chart", data.pie);
          // alert('the server returned ' + data);
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
      var bld_grps = jsonData.bld_grp;
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
        title: 'Blood Donations in 2021',
        subtitle: 'popularity by Donations'
      },
      axes: {
        x: {
          0: {
            side: 'Donations',
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