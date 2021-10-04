
<?php $this->setSiteTitle('Donor Details'); ?>




<?php $this->start('body') ?>

<div class="row" style="margin-left:400px ;margin-top:20px;text-align: center"> 

			
					<div class="col-md-3">
						 <select name="bld_bank" class="form-control" id="bld_bank"   value="" style="width: 400px ; height: 50px;">		 
							<option value="" disabled selected>Select Blood bank</option>
							<?php foreach($this->banks as $banks): ?>
								<option value="<?= $banks->bloodbank ?>" ><?= $banks->bloodbank?></option>
							<?php endforeach; ?>
						
						
						</select>
					</div>
				
          	<div class="col-md-1">
					
						<button type="button" id="refresh" class="btn btn-danger">Reset</button>
						</div>
     	
					
</div>

<body>
    <div class="row" style="margin-left:300px">
     
     <div id="piechart_3d" class="chart"  ></div>
     
       <div id="top_x_div" class="chart" ></div>

    </div>

    <div id="dnd"></div>
  </body>

  	<script src="<?=PROOT?>vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="<?=PROOT?>vendor/bootstrap/js/popper.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    

    google.charts.load("current", {packages:["corechart"]});
     google.charts.setOnLoadCallback(drawChart);
    
			
 
	
$(document).ready(function(){
  var check=$("#bld_bank").val();
  	
    $("#refresh").click(function(){
				$("#search").load("http://localhost/bloodbank/staff/bloodDonation");
				$("#bld_bank").val("");
        loadData(' Annual Blood Donations');
    });


     loadData(' Annual Blood Donations');



    $('#bld_bank').change(function(){
        var bank = $(this).val();
        if(bank != '')
        {
            loadData(bank + ' Blood bank Donations');
        }
    });


     
		function loadData(temp) {

      var temp_ti = temp;

				var blood=$("#bld_bank").val();
        console.log("hh",blood);
				console.log("title",temp_ti);
				$.ajax({
					url:"http://localhost/bloodbank/staff/bloodDonation",
					method:"POST",
          dataType:"JSON",
					data:{bld_bank:blood},
					success:function(data){
						 console.log("pie chart", data.pie); 
           // alert('the server returned ' + data);
						 drawChart(data.pie,temp_ti);
             drawStuff(data.bar);
          
					
          }
					
				});
      }
   
			
    });
   

      function drawChart(chart_data,main_title) {
        var jsonData = chart_data; 
    
        var data = new google.visualization.DataTable();
         

    data.addColumn('string', 'Blood Group');
    data.addColumn('number', 'Count');

     $.each(jsonData, function(i, jsonData){
        var bld_grps = jsonData.bld_grp;
        var count = parseInt(jsonData.count);
        data.addRows([[bld_grps, count]]);
    });
              
        var options = {
          title: main_title,
         is3D: true,
      chartArea: {left: "20%",
        bottom: "30%",width: 400, height: 300},

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    

  
      google.charts.load('current', {'packages':['corechart','bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff(bar_data) {
        var jsonData =bar_data; 
        var data = new google.visualization.DataTable();
        
          data.addColumn('string', 'Month');
    data.addColumn('number', 'Count');

     $.each(jsonData, function(i, jsonData){
        var month = jsonData.month_name;
        var count = parseInt(jsonData.count);
      
        data.addRows([[month, count]]);
    });
 
        

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Blood Donations in 2021',
            subtitle: 'popularity by Donations' },
          axes: {
            x: {
              0: { side: 'Donations', label: 'Months'} // Top x-axis.
            }
          },
          bar: { groupWidth: "20%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
 
      
    </script>



<?php $this->end(); ?>
 
 
 


 