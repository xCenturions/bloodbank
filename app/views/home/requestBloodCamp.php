<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>

<head>
    <meta charset="utf-8">
    <title>Form-v2 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="<?= PROOT ?>css/roboto-font.css">
    <link rel="stylesheet" type="text/css" href="<?= PROOT ?>fonts/line-awesome/css/line-awesome.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="<?= PROOT ?>css/pt_style.css" />
</head>

<body class="form-v2">
    <div class="page-content">
        <div class="form-v2-content">
            <div class="form-left">
                <!-- <img src="<?= PROOT ?>img/home/qw.jpg" alt="form"> -->
                <div class="text-1">
                    <p>Register A Patient Here</p>
                </div>

            </div>
            <form class="form-detail" id="form" action="<?= PROOT ?>home/request" method="post">
                <h2>Request to organize a Blood Donation Camp</h2>

                <div class="form-row">
                    <label for="pt_name">Your Full Name:</label>
                    <input type="text" name="name" id="name" class="input-text" placeholder="ex: Lindsey Wilson">
                </div>
                <div class="form-row">
                    <label for="pt_nic">Your NIC Number:</label>
                    <input type="text" name="nic" id="nic" class="input-text" required>
                </div>
                <div class="form-row">
                    <label for="pt_nic">Location</label>
                    <input type="text" name="location" id="location" class="input-text" required>
                </div>
                <div class="form-row">
                    <label for="pt_nic">Nearest City For The Location</label>
                    <select name="donor_city" class="form-control" id="bld_banks" name="bld_banks" value="" style="width: 300px ; height: 50px;">
				<option value="" selected="" disabled="">Select city</option>
				<?php foreach ($this->cities as $ci) : ?>
					<option value="<?= $ci->name ?>"><?= $ci->name ?></option>
				<?php endforeach; ?>
			</select>
                </div>

                <div class="form-row">
                    <label for="pt_city">Nearest Blood Bank</label>
                    <select name="donor_city" class="form-control" id="bld_banks" name="bld_banks" value="" style="width: 300px ; height: 50px;">
				<option value="" selected="" disabled="">Select Blood bank</option>
				<?php foreach ($this->bloodbank as $ci) : ?>
					<option value="<?= $ci->bloodbank ?>"><?= $ci->bloodbank ?></option>
                    <?php endforeach; ?>
                </div>
                <div class="form-row" style="padding-top:20px" >
                    <label for="pt_mobile">Your Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" class="input-text" required>
                </div>
                <div class="form-row">
                    <label for="pt_mobile">Your Email</label>
                    <input type="text" name="email" id="email" class="input-text" required>
                </div>

                <div class="form-row-last">
                    <button id="submit" class="btn btn-danger">Request</button>
                </div>
            </form>
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
                            <h1>Request Sent! </h1>

                        </div>
                    </div>
                    <div class="modal-header border-0 mb-2">

                    </div>
                    <div class="modal-body"><a href="<?= PROOT ?>home"> <button type="button" class="btn btn-primary">Ok</button></a> </div>
                </div>
            </div>
        </div>
    </div>

    <div id="error" style="top:20%;" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="fa fa-times fa-4x mb-3 animated "></i>
                    </div>

                </div>
                <div class="modal-body text-center">
                    <h4>Ooops!</h4>
                    <h4 id="errors"></h4>
                    <button class="btn btn-success" data-dismiss="modal">Try Again</button>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= PROOT ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        // just for the demos, avoids form submit
        jQuery.validator.setDefaults({
            debug: true,
            success: function(label) {
                label.attr('id', 'valid');
            },
        });
        $("#myform").validate({
            rules: {
                password: "required",
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                full_name: {
                    required: "Please provide an username"
                },
                your_email: {
                    required: "Please provide an email"
                },
                password: {
                    required: "Please provide a password"
                },
                confirm_password: {
                    required: "Please provide a password",
                    equalTo: "Wrong Password"
                }
            }
        });
    </script>

    <script type="text/javascript">
        $("#form").submit(function(event) {

            /* stop form from submitting normally */
            event.preventDefault();

            /* get the action attribute from the <form action=""> element */
            var $form = $(this),
                url = $form.attr('action');

            /* Send the data using post with element id name and name2*/
            var posting = $.post(url, {
                name: $('#name').val(),
                nic: $('#nic').val(),
                location: $('#location').val(),
                mobile: $('#mobile').val(),
                email: $('#email').val(),
                nst_bank: $('#nst_bank').val(),
                city: $('#city').val()

            });

            /* Alerts the results */
            posting.done(function(data) {

                if (data == 1) {
                    $('#exampleModal').modal('show');
                } else {
                    $('#error').modal('show');
                    $('#errors').html(data);

                }




            });
            posting.fail(function() {
                $('#result').text('failed');


            });
        });


















        // $('#submit').click(function() {

        //     var name = $('#name').val();
        //     var nic = $('#nic').val();
        //     var location = $('#location').val();
        //     var mobile = $('#mobile').val();
        //     var email = $('#email').val();
        //     var nst_bank = $('#nst_bank').val();

        //     //console.log(donor_id);
        //     $.ajax({
        //         url: "http://localhost/bloodbank/home/request",
        //         method: "POST",
        //         data: {
        //             name: name,
        //             nic: nic,
        //             location: location,
        //             mobile: mobile,
        //             email: email,
        //             nst_bank: nst_bank,

        //         },
        //         success: function(data) {
        //             console.log("This data", data);


        //             // if (data == 1) {
        //             //     $('#exampleModal').modal('show');

        //             //     $('#name').val('');
        //             //     data == 0;
        //             // }


        //         }

        //     });

        // })
    </script>




</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<?php $this->end(); ?>