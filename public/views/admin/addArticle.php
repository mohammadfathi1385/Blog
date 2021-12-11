<?php
require_once("layouts/header.php");
?>
<style>
    body {
        margin: 100px;
    }
</style>

<body class="sb-nav-fixed">
    <form class="col-lg-12" action="http://localhost/admin/storeArticle" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
                <label for="inputEmail4">Title : </label>
                <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Enter Article Title ...">
            </div>
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name="body" id="body" required></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Image : </label>
            <input type="file" name="image" class="form-control" id="inputAddress2" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        CKEDITOR.replace('body');
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/public/views/admin/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/public/views/admin/assets/demo/datatables-demo.js"></script>

</body>

</html>