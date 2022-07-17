<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

               
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EDIT Department
                        <!-- Button trigger modal -->
                    </h6>
                </div>

                <div class="card-body">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "elms");
                    if (isset($_POST['edit_btn'])) {
                        $id = $_POST['edit_id'];
                        echo $id;

                        $query = "SELECT * FROM department WHERE id='$id'";
                        $query_run = mysqli_query($connection, $query);

                        foreach ($query_run as $row) {
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name="edit_department" value="<?php echo $row['department'] ?>" placeholder="Department Name">
                            </div>
                            <div class="form-group">
                                <label>Department Short Name</label>
                                <input type="text" class="form-control" name="edit_department_short_name" value="<?php echo $row['department_short_name'] ?>" placeholder="Department Short Name">
                            </div>
                            <a href="department.php" class="btn btn-danger"> CANCLE </a>
                            <button type="submit" class="btn btn-primary" name="updatebtn">Update</button>
                            <br>
                </div>
                </form>
        <?php
                        }
                    }
        ?>
            </div>
        </div>





       



        <?php
        include("includes/scripts.php");
        // include("includes/footer.php");
        ?>