<link rel="stylesheet" href="<?= PROOT ?>css/adminHome.css">
<script src="<?= PROOT ?>js/admin.js"></script>







<div class="contain">
    <div class="row justify-content-center">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
            <div class="card-list">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card blue">
                            <div class="title">Total Donations in 2021</div>
                            <i class="zmdi zmdi-upload"></i>
                            <div class="value"><?= $this->total ?></div>
                            <div class="stat">Your Blood Bank</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card green">
                            <div class="title">Donations On This Month</div>
                            <i class="zmdi zmdi-upload"></i>
                            <div class="value"><?= $this->totalBank ?></div>
                            <div class="stat">Your Blood Bank</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card orange">
                            <div class="title">Total Registered Donors </div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value"><?= $this->donors ?></div>
                            <div class="stat">In Sri Lanka</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card red">
                            <div class="title">Patients On this Month</div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value"><?= $this->patients ?></div>
                            <div class="stat">Your Blood Bank</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">

                <div id="top_x_div" class="col-md-8 bar">


                </div>
                <div class="col-md-3 bar  ">

                    <center>
                        <div style="margin-top:20px;">
                            <h3>Quick Access</h3><br>
                            <button type="button" style="width:300px" class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark">
                                Add A New Donor
                            </button><br>
                            <button type="button" style="width:300px" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">
                                Add A Patient
                            </button><br>
                            <button type="button" style="width:300px" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">
                                Search Donors
                            </button>
                        </div>
                    </center>

                </div>

            </div>

            <div class="chart-data">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div id="piechart_3d" class="chart radar-chart dark">

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div id="piechart_3d2" class="chart radar-chart dark">

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="chart doughnut-chart dark">
                            <div class="actions">
                                <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                            <h3 class="title">Exports of Goods</h3>
                            <p class="tagline">2015 (in billion US$)</p>
                            <canvas height="400" id="doughnutChartDark"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        annualData(' Annual Blood Donations in Sri Lanka');
        currentStock('Your Blood bank Currently Available Stock')


        //loadData(' Annual Blood Donations');



    });


    function annualData(temp) {

        var temp_ti = temp;

        var blood = "";
        console.log("hh", blood);
        console.log("title", temp_ti);
        $.ajax({
            url: "http://localhost/bloodbank/reports/homeCharts",
            method: "GET",
            dataType: "JSON",
            data: {
                bld_bank: blood
            },
            success: function(data) {
                console.log("pie chart", data.pie);
                console.log("pie chart", data.bar);
                // alert('the server returned ' + data);
                drawChart(data.pie, temp_ti);
                drawStuff(data.bar);


            }

        });
    }

    function currentStock(temp) {

        var temp_ti = temp;

        var blood = "";
        console.log("hh", blood);
        console.log("title", temp_ti);
        $.ajax({
            url: "http://localhost/bloodbank/reports/bloodStock",
            method: "GET",
            dataType: "JSON",
            data: {
                bld_bank: blood
            },
            success: function(data) {
                console.log("pie chart", data.pie);

                // alert('the server returned ' + data);
                drawChart2(data.pie, temp_ti);



            }

        });
    }





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
                top: "20%",
                width: '100%',
                height: '100%'
            },

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }

    function drawChart2(chart_data, main_title) {
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
                top: "20%",
                width: '100%',
                height: '100%'
            },

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
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
            width: '100 %',
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Our Blood bank Donations in 2021',
                subtitle: 'popularity by Donations'
            },

            axes: {
                x: {
                    0: {
                        side: 'Donations',
                        label: 'Months'
                    } // Top x-axis.
                },
                y: {
                    0: {
                        side: 'Donations',
                        label: 'Donations'
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