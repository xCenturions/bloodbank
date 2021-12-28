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
<link rel="stylesheet" href="<?= PROOT ?>css/bd_style.css">
<!--===============================================================================================-->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Launch demo modal
</button> -->
</button>



<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Blood Donation Details</h2>

        </div>

    </div>
</section>


<div class="container" style="justify-content:center;">
    <div class="row">

        <div class="col-md-3">
            <input class="form-control" id="name" name="name" value="" style="width: 300px ; height: 50px;" placeholder="Enter Name or NIC ">

            </select>
        </div>
        <div class="col-md-3">
            <select name="donor_city" class="form-control" id="bld_banks" name="bld_banks" value="" style="width: 300px ; height: 50px;">
                <option value="" selected="" disabled="">Select Cluster</option>
                <?php foreach ($this->cluster as $ci) : ?>
                    <option value="<?= $ci->cluster ?>"><?= $ci->cluster ?></option>
                <?php endforeach; ?>
            </select>
        </div>






        <div class="col-md-1">

            <button type="button" id="refresh" class="btn btn-danger">Reset</button>
        </div>

    </div>

</div>



<div class="container-table100">
    <div class="wrap-table100">

        <div class="table100 ver2 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Donor Name</th>
                            <th class="cell100 column2">Donor NIC</th>
                            <th class="cell100 column3">Donated Location</th>
                            <th class="cell100 column8">Blood Group</th>
                            <th class="cell100 column4">Donated Date</th>
                            <th class="cell100 column4">Donation Record</th>

                        </tr>
                    </thead>
                </table>
            </div>

            <div class="table100-body js-pscroll" id="search" name="search">
            </div>
        </div>
    </div>
</div>







<!--===============================================================================================-->
<script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
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


        // 			  $.datepicker.setDefaults({  
        //         dateFormat: 'yy-mm-dd'   
        //    });  
        //    $(function(){  
        //         $("#from_date").datepicker();  
        //         $("#to_date").datepicker();  
        //    });  

        $("#name").change(function() {
            loadData();
        });


        $("#search").load("http://localhost/bloodbank/home/find");
        $("#refresh").click(function() {
            $("#search").load("http://localhost/bloodbank/home/find");
            $("#name").val("");
            $("#from_date").val("");
            $("#to_date").val("");

            $("#nic").val("");
        });



        function loadData() {


            var name = $("#name").val();

            console.log(to_date);
            $.ajax({
                url: "http://localhost/bloodbank/home/find",
                method: "POST",
                data: {
                    bld_banks: name,

                },
                success: function(data) {
                    //console.log("This data", data); 
                    $("#search").html(data);



                }


            });

        };









        $("#bank").keyup(function() {
            var name = $("#name").val();



            //var name = $("#bld_banks").val();
            console.log(nic);
            $.ajax({
                url: "http://localhost/bloodbank/home/find",
                method: "POST",
                data: {
                    //bld_banks: name,

                    name: name
                },
                success: function(data) {
                    console.log("This data", data);
                    $("#search").html(data);

                }


            });
        });


    });
</script>



<?php $this->end(); ?>