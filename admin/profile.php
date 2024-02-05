<?php
session_start();

include 'connect.php';
include '../templates/header.php';

if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
    $id = $_SESSION['id'];
    // echo "welcome $admin";
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger text-light">
        <div class="container-fluid pe-3">
            <a class="navbar-brand text-white" href="#"><?php echo $admin ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="profile.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">E-Commerce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?do=AddItem">Add Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php">logout</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <?php
    $do = "";
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {
        $do = 'Manage';
    }

    if ($do == 'Manage') {
        // echo "welcome into manage page";
        $sql = "SELECT * FROM users WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $admin);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $fetch = mysqli_fetch_assoc($result);
        // echo $fetch['name'];

    ?>
        <section class="vh-50" style="background-color: #f4f5f7;">
            <div class="container py-5 h-50">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="Avatar" class="img-fluid my-5" style="width: 100px;" />

                                    <i class="far fa-edit mb-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6 class="text-primary "><i class="fas fa-user-circle"></i> Profile</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-4 mb-3">
                                                <h6 class="text-primary">Name</h6>
                                                <p class="text-success"><?php echo $fetch['name'] ?></p>
                                            </div>
                                            <div class="col-8 mb-3">
                                                <h6 class="text-primary">E-mail</h6>
                                                <p class="text-success"><?php echo $fetch['email'] ?></p>
                                            </div>
                                        </div>
                                        <a href="?do=EditUser" class="btn btn-primary">edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $sql = "SELECT * FROM items";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        ?>
        <div class="container">
            <a href="?do=AddItem" class="btn btn-secondary mb-4"><i class="fas fa-plus"></i> add new item</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['item_id'] ?></th>
                            <td>
                                <img src="../images/<?php echo $row['image'] ?>" alt="Avatar" class="img-thumbnail rounded-circle" style="width: 80px;height: 80px" />
                            </td>
                            <td><?php echo $row['item_name'] ?></td>
                            <td><?php echo $row['price'] ?> <i class="fas fa-dollar-sign text-primary"></i></td>
                            <td>
                                <a href="profile.php?do=EditItem&itemid=<?php echo $row['item_id'] ?>" class="btn btn-success rounded-pill"><i class="fas fa-edit"></i> edit</a>
                            </td>
                            <td><a href="profile.php?do=DeleteItem&itemid=<?php echo $row['item_id'] ?>" class="btn btn-danger rounded-pill"><i class="fas fa-trash"></i> delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php



        mysqli_stmt_close($stmt);
    } elseif ($do == 'EditUser') {

        $sql = "SELECT * FROM users WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $admin);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $fetch = mysqli_fetch_assoc($result);
        // echo $admin;

    ?>
        <div class="container mt-5">
            <h3 class="text-center">Edit</h3>
            <form method="POST" action="?do=UpdateUser" autocomplete="off">
                <div class="row mb-3 mt-5 w-50 m-auto">
                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $fetch['name'] ?>">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="hidden" value="<?php echo $fetch['password'] ?>" name="oldpassword">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="leave it empty if you don't want to change it">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Retype Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="repassword" class="form-control" id="inputPassword" placeholder="leave it empty if you don't want to change it">
                    </div>
                </div>
                <div class="row mb-3 w-25 m-auto">
                    <button type="submit" name="update" class="btn btn-primary ms-auto">Update</button>
                </div>
            </form>
        </div>

    <?php } elseif ($do == 'UpdateUser') {

        if (isset($_POST['update'])) {
            $errors = [];
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            if (empty($name)) {
                $errors['name'] = "name can't be empty";
            } elseif (strlen($name) < 4) {
                $errors['name'] = "name can't be less than 4 characters";
            }
            $password = '';

            if (!empty($_POST['password']) && !empty($_POST['repassword'])) {
                if ($_POST['password'] === $_POST['repassword']) {
                    $password = md5($_POST['password']);
                } else {
                    $errors['password'] = "password not matched";
                }
            } else {
                $password = $_POST['oldpassword'];
            }

            if (empty($errors)) {
                $sql = "UPDATE users SET name = ?,password = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssi", $name, $password, $id);
                $result = mysqli_stmt_execute($stmt);
                if ($result) {
                    $_SESSION['admin'] = $name;
                    // echo "<div class='alert alert-success text-center mt-3'>information updated successfully</div>";
                    echo '<div class="loading">
                        <div class="content">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                        </div>
                            </div>';
                    header("Refresh:3;url=profile.php");
                }
            } else {

                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger text-center'>" . $error . "</div>";
                }

                header("Refresh:3;url=?do=EditUser");
            }
        }
    } elseif ($do == 'AddItem') { ?>
        <div class="container mt-5">
            <h3 class="text-center">Add Item</h3>
            <form method="POST" action="?do=InsertItem" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $id ?>">
                <div class="row mb-3 mt-5 w-50 m-auto">
                    <label for="name" class="col-sm-2 col-form-label text-primary">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="price" class="col-sm-2 col-form-label text-primary">Price</label>
                    <div class="col-sm-10">

                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="price" class="col-sm-2 col-form-label text-primary">Category </label>
                    <div class="col-sm-10">

                        <select class="form-select" name="category" aria-label="Default select example">
                            <option value="1" selected>Breakfast </option>
                            <option value="2">Launch </option>
                            <option value="3">Dinner</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label text-primary">Description</label>
                    <div class="col-sm-10">

                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>


                <!-- start item picture -->
                <div class="row mb-3 mt-5 w-50 m-auto">
                    <label class="col-sm-3 control-label text-primary">item picture</label>
                    <div class="col-sm-10 col-md-6">
                        <div class="itemAdd">

                            <div class="upload">
                                <img src="../images/no-image.png" width="200px" id="previewImage">

                                <div class="rightRound" id="upload">
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .jfif, .avif">
                                    <i class="fa fa-camera mt-2"></i>
                                </div>

                                <div class="leftRound" id="cancel" style="display:none">
                                    <i class="fa fa-times mt-2"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mb-3 w-25 m-auto">
                    <button type="submit" name="addItem" class="btn btn-primary ms-auto">add</button>
                </div>
            </form>
        </div>



    <?php } elseif ($do == 'InsertItem') {
        $userid = mysqli_real_escape_string($conn, $_POST['userid']);
        $name   = mysqli_real_escape_string($conn, $_POST['name']);
        $description   = mysqli_real_escape_string($conn, $_POST['description']);
        $price  = mysqli_real_escape_string($conn, $_POST['price']);
        $c_id  = mysqli_real_escape_string($conn, $_POST['category']);
        // echo $userid, $name, $price;
        $formErrors = array();
        if (empty($name)) {
            $formErrors[] = "your item name can't be empty";
        }
        if (empty($price)) {
            $formErrors[] = "your item price can't be empty";
        }
        if (!empty($_FILES['image']['name'])) {
            // image name 
            $imageName = $_FILES['image']['name'];
            // image size 
            $imageSize = $_FILES['image']['size'];
            // image temp name 
            $imageTmp  = $_FILES['image']['tmp_name'];
            // image type 
            $imageType = $_FILES['image']['type'];
            // image allow extension  array accept jpeg,jpg,png,gif
            $allowedExtension = array("jpeg", "jpg", "png", "gif", "avif", "jfif");

            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (!in_array($imageExtension, $allowedExtension)) {
                $formErrors[] = 'This extension is not allowed';
            }

            if ($imageSize > 4194304) {
                $formErrors[] = 'Your profile picture cannot be more than 4 MB';
            }

            if (empty($formErrors)) {
                $image = $imageName . "_" . date("y.m.d") . "." . $imageExtension;
                move_uploaded_file($imageTmp, "../images//" . $image);
            }
        }
        // insert the data into database 
        if (empty($formErrors)) {
            $sql = "INSERT INTO items (item_name, description, price, image, user_id, category_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssdsdd", $name, $description, $price, $image, $userid, $c_id);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                // echo "<div class='alert alert-success text-center'>record inserted</div>";
                echo '<div class="loading">
                        <div class="content">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                        </div>
                            </div>';
                // return to default page ==> Manage 
                // header("Refresh:5,url=profile.php?do=Manage");
                header("Location:profile.php");
            } else {
                echo "<div class='alert alert-danger text-center'>" . mysqli_stmt_error($stmt) . "</div>";
            }

            mysqli_stmt_close($stmt);
        } else {
            foreach ($formErrors as $error) {
                echo "<div class='alert alert-danger text-center'>" . $error . "</div>";
            }
            header("Refresh:3;url=?do=AddItem");
        }
    } elseif ($do == 'EditItem') {
        // echo $_GET['itemid'] . " " . $_GET['userid'];
        $itemid = $_GET['itemid'];

        $sql = "SELECT * FROM items WHERE item_id = '$itemid'";
        $result = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_assoc($result);
    ?>
        <div class="container mt-5">
            <h3 class="text-center">Edit Item</h3>
            <form method="POST" action="?do=UpdateItem" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
                <div class="row mb-3 mt-5 w-50 m-auto">
                    <label for="name" class="col-sm-2 col-form-label text-primary">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="<?php echo $fetch['item_name'] ?>" id="name">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="price" class="col-sm-2 col-form-label text-primary">Price</label>
                    <div class="col-sm-10">

                        <input type="number" name="price" class="form-control" value="<?php echo $fetch['price'] ?>" id="price">
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="price" class="col-sm-2 col-form-label text-primary">Category </label>
                    <div class="col-sm-10">

                        <select class="form-select" name="category">
                            <option value="1" <?php if ($fetch['category_id'] == 1) {
                                                    echo "selected";
                                                } ?>>Breakfast </option>
                            <option value="2" <?php if ($fetch['category_id'] == 2) {
                                                    echo "selected";
                                                } ?>>Launch </option>
                            <option value="3" <?php if ($fetch['category_id'] == 3) {
                                                    echo "selected";
                                                } ?>>Dinner </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 w-50 m-auto">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label text-primary">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $fetch['description'] ?>
                        </textarea>
                    </div>
                </div>


                <!-- start item picture -->
                <div class="row mb-3 mt-5 w-50 m-auto">
                    <label class="col-sm-3 control-label text-primary">item picture</label>
                    <div class="col-sm-10 col-md-6">
                        <div class="itemAdd">

                            <div class="upload">
                                <img src="../images/<?php echo $fetch['image'] ?>" width="200px" id="previewImage">
                                <input type="hidden" name="oldImage" value="<?php echo $fetch['image'] ?>">
                                <div class="rightRound" id="upload">
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .jfif, .avif">
                                    <i class="fa fa-camera mt-2"></i>
                                </div>

                                <div class="leftRound" id="cancel" style="display:none">
                                    <i class="fa fa-times mt-2"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mb-3 w-25 m-auto">
                    <button type="submit" name="addItem" class="btn btn-primary ms-auto">Update</button>
                </div>
            </form>
        </div>


    <?php } elseif ($do == 'UpdateItem') {
        $itemid = mysqli_real_escape_string($conn, $_POST['itemid']);
        $name   = mysqli_real_escape_string($conn, $_POST['name']);
        $description   = mysqli_real_escape_string($conn, $_POST['description']);
        $price  = mysqli_real_escape_string($conn, $_POST['price']);
        $category  = mysqli_real_escape_string($conn, $_POST['category']);
        // echo $userid, $name, $price;
        $formErrors = array();
        if (empty($name)) {
            $formErrors[] = "your item name can't be empty";
        }
        if (empty($price)) {
            $formErrors[] = "your item price can't be empty";
        }
        $image = $_POST['oldImage'];
        if (!empty($_FILES['image']['name'])) {
            // image name 
            $imageName = $_FILES['image']['name'];
            // image size 
            $imageSize = $_FILES['image']['size'];
            // image temp name 
            $imageTmp  = $_FILES['image']['tmp_name'];
            // image type 
            $imageType = $_FILES['image']['type'];
            // image allow extension  array accept jpeg,jpg,png,gif
            $allowedExtension = array("jpeg", "jpg", "png", "gif");

            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (!in_array($imageExtension, $allowedExtension)) {
                $formErrors[] = 'This extension is not allowed';
            }

            if ($imageSize > 4194304) {
                $formErrors[] = 'Your profile picture cannot be more than 4 MB';
            }

            if (empty($formErrors)) {
                $image = $imageName . "_" . date("y.m.d") . "." . $imageExtension;
                move_uploaded_file($imageTmp, "../images//" . $image);
            }
        }
        // insert the data into database 
        if (empty($formErrors)) {
            $sql = "UPDATE  items SET item_name = ?, description = ?, price = ?, image = ?, category_id = ? WHERE item_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssdsdd", $name, $description, $price, $image, $category, $itemid);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                // echo "<div class='alert alert-success text-center'>record Updated</div>";
                echo '<div class="loading">
                        <div class="content">
                                    <div class="circle">update</div>
                                    <div class="circle">update</div>
                                    <div class="circle">update</div>
                                    <div class="circle">update</div>
                        </div>
                            </div>';
                // return to default page ==> Manage 
                header("Refresh:5,url=profile.php?do=Manage");
            } else {
                echo "<div class='alert alert-danger text-center'>" . mysqli_stmt_error($stmt) . "</div>";
            }

            mysqli_stmt_close($stmt);
        } else {
            foreach ($formErrors as $error) {
                echo "<div class='alert alert-danger text-center'>" . $error . "</div>";
            }
            header("Refresh: 3; url=" . $_SERVER['HTTP_REFERER']);
        }
    } elseif ($do ==  "DeleteItem") {
        $itemid = $_GET['itemid'];
        $sql = "DELETE FROM items WHERE item_id = '$itemid' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        echo "<div class='alert alert-danger text-center'>record Deleted successfully</div>";
        header("Refresh:3;url=profile.php");
    } ?>





<?php
} else {
    echo "<h2 class='alert alert-danger text-center'>only admin can access this page<h2>";
    header("Refresh:3;url=login.php");
}
include '../templates/footer.php';
