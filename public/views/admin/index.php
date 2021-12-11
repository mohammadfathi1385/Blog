<?php
require_once("layouts/header.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div style="text-align: right;" class="card bg-primary text-white mb-6">
                        <div class="card-body"><?php echo ("تعداد پست ها : " . $countArticles["COUNT(*)"]) ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div style="text-align: right;" class="card bg-danger text-white mb-6">
                        <div class="card-body"><?php echo ("تعداد ادمین ها : " . $countAdmins["COUNT(*)"]) ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div style="text-align: right;" class="card bg-dark text-white mb-6">
                        <div class="card-body"><?php echo ("تعداد منو ها : " . $countMenus["COUNT(*)"]) ?></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>body</th>
                                    <th>image</th>
                                    <th>actions</th>
                                    <th>create_time</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>title</th>
                                    <th>body</th>
                                    <th>image</th>
                                    <th>actions</th>
                                    <th>create_time</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($articles as $article) { ?>
                                    <tr>
                                        <td><?= $article["title"] ?></td>
                                        <td><?= htmlentities(substr($article["body"], 0, 15) . "...") ?></td>
                                        <td><img width="150px" height="100px" src="http://localhost/public/images/<?= $article['image'] ?>" alt=""></td>
                                        <td><a class="btn-block btn btn-danger" href="http://localhost/admin/rmArticle/<?= $article['id'] ?>">Delete</a></td>
                                        <td><?= $article["create_time"] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("layouts/footer.php");
    ?>