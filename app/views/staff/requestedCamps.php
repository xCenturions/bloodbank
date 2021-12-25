<?php $this->setSiteTitle('Donor Details'); ?>

<?php $this->start('head'); ?>
<?= $this->content('head'); ?>
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
            <h2> Requested Blood Camps</h2>

        </div>

    </div>
</section>
<form action="<?= PROOT ?>staff/searchDonors" method="post" style="margin-top:20px;text-align: center">


    <div class="row" style="margin-left:400px">

        <div class="col-md-3">
            From Date<input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
        </div>
        <div class="col-md-3">
            To Date <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
        </div>

        <div class="col-md-3">
            <br>
            <button type="button" data-toggle="modal" data-target="#modalSubscriptionForm" id="refresh" class="btn btn-danger">Reset</button>
        </div>

    </div>



</form>



<div class="container-table100">
    <div class="wrap-table100" style="width:90%">

        <div class="table100 ver2 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                        <tr class="">
                            <th class=" ">Venue</th>
                            <th class="">Organizer Name</th>
                            <th class=" ">Organizer Email</th>
                            <th class=" ">Organizer Mobile</th>
                            <th class=" ">Requested Date</th>
                            <th class=" ">Status</th>

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

<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Please Select Date and Time</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-start">

                    <div>
                        <h3>Location : <span style="font-weight:bold" id="location"></span> - <span style="font-weight:bold" id="city"></span> </h3><br>
                    </div>


                    Organizer's Email :<span style="font-weight:bold" id="email"></span><br>
                    Organizer's Mobile Number :<span style="font-weight:bold" id="mobile"></span>
                    <hr>

                    <label for="birthdaytime">Date :</label> <input type="date" id="date">
                    <label for="birthdaytime">Time :</label> <input type="time" id="time">
                    <span id="id" style="display:none"></span>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a id="submit" data-toggle="modal" data-dismiss="modal" type="button" class="btn btn-success">Approve <i class="fa fa-check ml-1 text-white"></i></a>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<div class='container'>
    <div class="modal fade" style="top:20%;" id="rejectedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
                <div class='top'>
                    <div class="success-checkmark">
                        <div class="check-icon">
                            <span class="icon-line line-tip"></span>
                            <span class="icon-line line-long"></span>
                            <div class="icon-circle"></div>
                            <div class="icon-fix"></div>
                        </div>
                    </div>
                    <div>
                        <h1>Succesfully Rejected! </h1>
                    </div>
                </div>
                <div class="modal-header border-0 mb-2">

                </div>
                <div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
            </div>
        </div>
    </div>
</div>
<div class='container'>
    <div class="modal fade" style="top:20%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
                <div class='top'>
                    <div class="success-checkmark">
                        <div class="check-icon">
                            <span class="icon-line line-tip"></span>
                            <span class="icon-line line-long"></span>
                            <div class="icon-circle"></div>
                            <div class="icon-fix"></div>
                        </div>
                    </div>
                    <div>
                        <h1>Succesfully Approved! </h1>
                    </div>
                </div>
                <div class="modal-header border-0 mb-2">

                </div>
                <div class="modal-body"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> </div>
            </div>
        </div>
    </div>
</div>

<div id="error" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ooops!</h4>
                <p>Something went wrong. Blood not uploaded</p>
                <button class="btn btn-success" data-dismiss="modal">Try Again</button>
            </div>
        </div>
    </div>
</div>



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
        $("#submit").click(function() {
            approved();
        });



        $("#search").load("http://localhost/bloodbank/staff/requested");
        $("#refresh").click(function() {
            $("#search").load("http://localhost/bloodbank/staff/requested");

            $("#from_date").val("");
            $("#to_date").val("");


        });



    });

    function approve(id) {

        var c_id = id;
        console.log(c_id);
        $.ajax({
            url: "http://localhost/bloodbank/staff/approve",
            method: "POST",
            dataType: "JSON",
            data: {
                c_id: c_id
            },
            success: function(data) {
                console.log("This data", data.location);
                $('#location').html(data.location);
                $('#mobile').html(data.mobile);
                $('#email').html(data.email);
                $('#city').html(data.city);
                $('#id').html(data.id);



            }

        });

    };

    function approved() {

        var location = document.getElementById("location").innerHTML;

        var email = document.getElementById("email").innerHTML;
        var date = $('#date').val();
        var time = $('#time').val();
        var id = document.getElementById("id").innerHTML;

        var city = document.getElementById("city").innerHTML;

        //  console.log(c_id);
        $.ajax({
            url: "http://localhost/bloodbank/staff/approved",
            method: "POST",

            data: {
                nearest_location: location,
                email: email,
                city: city,
                date: date,
                time: time,
                c_id: id,
            },
            success: function(data) {
                console.log("This data", data);

                if (data == 1) {
                    $('#exampleModal').modal('show');
                    $('#city').val('');
                    $('#location').val('');
                    $('#date').val('');
                    $('#time').val('');
                    loadData();
                } else {
                    $('#error').modal('show');
                }




            }

        });

    };

    function rejected(id) {


        var id = $('#id').val();



        //  console.log(c_id);
        $.ajax({
            url: "http://localhost/bloodbank/staff/reject",
            method: "POST",

            data: {

                id: id,
            },
            success: function(data) {
                console.log("This data", data);

                if (data == 1) {
                    $('#rejectedModal').modal('show');

                } else {
                    $('#error').modal('show');
                }




            }

        });

    };

    function loadData() {

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();



        console.log(to_date);
        $.ajax({
            url: "http://localhost/bloodbank/staff/requested",
            method: "POST",
            data: {
                bld_banks: name,
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