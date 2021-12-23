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
                            <div class="title">This Month Donations</div>
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
                            <div class="title">Patients on this Month</div>
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
                            <a href="<?= PROOT ?>mlt/checkDonations">
                                <button type="button" style="width:300px" class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark">
                                    Uncheck Blood Samples
                                </button></a><br>
                            <a href="<?= PROOT ?>mlt/checkedBlood">
                                <button type="button" style="width:300px" class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark">
                                    Checkd Blood Samples
                                </button></a><br>
                            <a href="<?= PROOT ?>donor/register">
                                <button type="button" style="width:300px" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">
                                    Check Donations
                                </button></a><br>
                            <a href="<?= PROOT ?>staff/searchDonors">
                                <button type="button" style="width:300px" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">
                                    Search Donors
                                </button></a>
                        </div>
                    </center>

                </div>

            </div>

            <div class="chart-data">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <!-- <div id="piechart_3d" class="chart radar-chart dark"> -->

                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- <div id="piechart_3d2" class="chart radar-chart dark"> -->

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

        annualData(' Annual Blood Donations in Sri Lanka');
        // currentStock('Our Blood bank Currently Available Stock')


        //loadData(' Annual Blood Donations');



    });


    function annualData(temp) {

        var temp_ti = temp;

        var blood = "";
        console.log("hh", blood);
        console.log("title", temp_ti);
        $.ajax({
            url: "http://localhost/bloodbank/reports/mltChart",
            method: "GET",
            dataType: "JSON",
            data: {
                bld_bank: blood
            },
            success: function(data) {
                //console.log("pie chart", data.pie);
                console.log("bar chart", data);
                // alert('the server returned ' + data);
                // drawChart(data.pie, temp_ti);
                drawStuff(data.bar);


            }

        });
    }







    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff(bar_data) {
        var jsonData = bar_data;
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Month');
        data.addColumn('number', 'Approved');
        data.addColumn('number', 'Rejected');

        $.each(jsonData, function(i, jsonData) {
            var month = jsonData.month_name;
            var count = parseInt(jsonData.app_count);
            var count2 = parseInt(jsonData.rej_count);

            data.addRows([
                [month, count, count2]
            ]);
        });



        var options = {
            width: '100 %',
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Approved And Rejected Blood Samples in 2021',
                subtitle: 'popularity by Blood Samples'
            },
            series: {
                0: {
                    axis: 'Approved'
                }, // Bind series 0 to an axis named 'distance'.
                1: {
                    axis: 'Rejected'
                } // Bind series 1 to an axis named 'brightness'.
            },

            axes: {
                x: {
                    0: {
                        side: 'Months',
                        label: 'Months'
                    } // Top x-axis.
                },

                y: {

                    Approved: {
                        label: 'Approved'
                    }, // Left y-axis.
                    Rejected: {
                        side: 'right',
                        label: 'Rejected'
                    } // Right y-axis.


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