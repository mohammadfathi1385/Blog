<?php
require_once("layouts/header.php");
?>
<style>
    body {
        margin: 100px;
    }
</style>

<body class="sb-nav-fixed">
    <form class="col-lg-12" action="http://localhost/admin/storeSetting" method="POST">
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">title : </label>
                <input type="text" value="<?= $setting['title'] ?>" name="title" class="form-control" id="inputEmail4" placeholder="Enter Menu Title...">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">description : </label>
                <input type="text" value="<?= $setting['description'] ?>" name="description" class="form-control" id="inputEmail4" placeholder="Enter Menu LINK...">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">email : </label>
                <input type="text" value="<?= $setting['email'] ?>" name="email" class="form-control" id="inputEmail4" placeholder="Enter Menu LINK...">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/public/views/admin/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/public/views/admin/assets/demo/datatables-demo.js"></script>

</body>

</html>