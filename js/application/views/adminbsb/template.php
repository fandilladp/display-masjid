<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>XbX Team</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/node-waves/waves.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/animate-css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- <link href="<?php echo base_url(); ?>assets/adminbsb/css/materialize.css" rel="stylesheet"> -->
        <link href="<?php echo base_url(); ?>assets/adminbsb/css/style.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/adminbsb/css/themes/theme-indigo.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.css" rel="stylesheet">
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery/jquery.min.js"></script>
        
    </head>
    <body class="theme-indigo">
        
        <?php echo $header; ?>

        <!--Main layout-->
        <section class="content">
            <div class="container-fluid">
        		<?php echo $content; ?>
            </div>
        </section>
        <!--/Main layout-->


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap-notify/bootstrap-notify.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/momentjs/moment.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/node-waves/waves.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery-countto/jquery.countTo.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/js/admin.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/js/pages/tables/jquery-datatable.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminbsb/plugins/sweetalert/sweetalert.min.js"></script>

        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.form.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-validation-md.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/localization/messages_id.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                function redirect(url) {
                    window.location.href = decodeURIComponent(url);
                }

            });

        </script>

    </body>
</html>