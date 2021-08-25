
<?php $this->setSiteTitle('Donor Details'); ?>


<?php $this->start('head'); ?>


 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php foreach($this->result as $res): 

                    echo "['".$res->bld_grps."', ".$res->count."]," ?> 

                   

                <?php endforeach; ?>
 
        ]);

        var options = {
          title: ' Blood Types as precentage',
         is3D: true,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

 <!-- Bar Chart -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Months', 'Points'],
         <?php foreach($this->results as $res): 

                    echo "['".$res->month_name."', ".$res->count."]," ?> 

                   

                <?php endforeach; ?>
 
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Blood Stock in 2021',
            subtitle: 'popularity by points' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>



<?php $this->end(); ?>

<?php $this->start('body') ?>

<body>
    <div class="row">
     <div id="piechart_3d" class="chart"></div>
     
       <div id="top_x_div" class="chart" ></div>



    </div>
  </body>



<?php $this->end(); ?>
 
 
 


 