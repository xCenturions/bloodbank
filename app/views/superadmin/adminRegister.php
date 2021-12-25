<?php $this->start('body'); ?>
<!-- MATERIAL DESIGN ICONIC FONT -->
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

            <form class="form-detail" id="form" action="<?= PROOT ?>superadmin/register" method="post">
                <h2>Admin Registration Form</h2>



                <div class="form-row">
                    <label for="donor_name">Full Name:</label>
                    <input type="text" name="name" id="name" class="input-text" placeholder="ex: Lindsey Wilson" required>
                </div>
                <div class="form-row">
                    <label for="pt_nic">NIC Number:</label>
                    <input type="text" name="nic" id="nic" class="input-text" required>
                </div>
                <div class="form-row">
                    <label for="dob">Username :</label>
                    <input type="text" name="username" id="username" class="input-text" required>
                </div>

                <div class="form-row">
                    <label for="dob">Email :</label>
                    <input type="email" name="email" id="email" class="input-text" required>
                </div>
                <div class="form-row">
                    <label for="dob">Mobile :</label>
                    <input type="text" name="mobile" id="mobile" class="input-text" required>
                </div>

                <div class="form-row">
                    <label for="pt_city">Assigned Blood bank</label>
                    <select class="form-control" id="assigned" name="assigned" required>
                        <option value="" selected="" disabled="">Select City</option>
                        <?php foreach ($this->banks as $value) : ?>
                            <option value="<?= $value->bloodbank ?>"><?= $value->bloodbank ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>





                <div class="form-row-last">
                    <input type="submit" name="register Now" class="register" id="submit" value="Register Now">
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
                            <h1>Account Created! </h1>

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

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
                username: $('#username').val(),
                mobile: $('#mobile').val(),
                email: $('#email').val(),
                bank: $('#bank').val(),
                assigned: $('#assigned').val(),



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
    </script>
</body>
<?php $this->end(); ?>