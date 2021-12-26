<?php $this->start('head'); ?>

<?= $this->content('head'); ?>
<?php $this->setSiteTitle('Camps'); ?>
<?php $this->end(); ?>


<?= $this->start('body'); ?>
<?= $this->content('body'); ?>

<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?= PROOT ?>img/icons/favicon.ico" />
<!--===============================================================================================-->

<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/appo_tb_util.css">
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/appo_tb_main.css">
<link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/check.css">
<!--===============================================================================================-->


<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2> All Blood Camps</h2>

        </div>

    </div>
</section>
<form action="<?= PROOT ?>staff/searchDonors" method="post" style="margin-top:20px;text-align: center">


    <div class="row" style="margin-left:400px">

        <div class="col-md-3 "></br>
            <input class="form-control" id="city" name="city" value="" style="width: 300px ; height: 50px;" placeholder="Enter City">

        </div>

        <div class="col-md-3 ">
            From Date<input type="date" name="from_date" id="from_date" class="form-control" style="width: 300px ; height: 50px;" placeholder="From Date" />
        </div>
        <div class="col-md-3">
            To Date <input type="date" name="to_date" id="to_date" class="form-control" style="width: 300px ; height: 50px;" placeholder="To Date" />
        </div>

        <div class="col-3 ">
            </br>
            <button type="button" data-toggle="modal" data-target="#modalSubscriptionForm" id="refresh" class="btn btn-danger">Reset</button>
        </div>

    </div>



</form>



<div class="container-table100">
    <div class="wrap-table100" style="width:70%">

        <div class="table100 ver2 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                        <tr class="">
                            <th class=" ">Location</th>
                            <th class="">City</th>
                            <th class=" ">Date</th>
                            <th class=" ">Time</th>


                        </tr>
                    </thead>
                </table>
            </div>

            <div class="table100-body js-pscroll" id="search" name="search">
            </div>
        </div>
    </div>
</div>
</div>

<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>




<!-- Central Modal Medium Danger-->


<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/bootstrap/js/popper.js"></script>

<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="<?= PROOT ?>js/appo_tb_main.js"></script>

<script>
    $(document).ready(function() {



        $("#to_date").change(function() {
            loadData();
        });
        $("#city").change(function() {
            loadData();
        });



        $("#search").load("http://localhost/bloodbank/home/allCamps");
        $("#refresh").click(function() {
            $("#search").load("http://localhost/bloodbank/home/allCamps");
            $("#city").val("");
            $("#from_date").val("");
            $("#to_date").val("");

            $("#cm_no").val("");
        });



        $("#city").keyup(function() {
            var city = $("#city").val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();



            // console.log(cm_no);
            $.ajax({
                url: "http://localhost/bloodbank/home/allCamps",
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    city: city
                },
                success: function(data) {
                    console.log("This data", data);
                    $("#search").html(data);

                }


            });
        });


    });


    function loadData() {

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        var city = $("#city").val();

        console.log(to_date);
        $.ajax({
            url: "http://localhost/bloodbank/home/allCamps",
            method: "POST",
            data: {
                city: city,
                from_date: from_date,
                to_date: to_date
            },
            success: function(data) {
                console.log("This data", data);
                $("#search").html(data);



            }


        });

    };
</script>



<?php $this->end(); ?>