<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        if (isset($pageTitle)) {
            echo $pageTitle;
        }else {
            echo 'Taskeen';
        }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <!-- <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen"> -->
    <link href="layouts/css/jquery-ui-1.10.4.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="layouts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="layouts/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="layouts/css/styles.css" rel="stylesheet">

    <link href="layouts/css/buttons.css" rel="stylesheet">

    <link href="layouts/css/font-awesome.min.css" rel="stylesheet">
    <link href="layouts/vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="layouts/vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="layouts/vendors/tags/css/bootstrap-tags.css" rel="stylesheet">
    <link href="layouts/vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">

    <link href="layouts/css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
