<?php
require_once("layouts/header.php");
?>
<div class="col-lg-12">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>password</th>
                        <th>create_time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>password</th>
                        <th>create_time</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($admins as $admin) { ?>
                        <tr>
                            <td><?= $admin["id"] ?></td>
                            <td><?= $admin["username"] ?></td>
                            <td><?= $admin["password"] ?></td>
                            <td><?= $admin["create_time"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/public/views/admin/js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/public/views/admin/assets/demo/datatables-demo.js"></script>
</body>

</html>