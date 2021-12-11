<?php
require_once("layouts/header.php");
?>
<style>
    body {
        margin: 100px;
    }
</style>

<body class="sb-nav-fixed">
    <form class="col-lg-12" action="http://localhost/admin/storeAdmin" method="POST">
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">username : </label>
                <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="Enter username...">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">password : </label>
                <input type="text" name="password" class="form-control" id="inputEmail4" placeholder="Enter password ...">
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