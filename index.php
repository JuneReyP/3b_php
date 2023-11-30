<?php 
    include 'header.php';
    if(!isset($_SESSION['logged_in'])){
        header("location: login.php");
        ob_end_flush();
    }
 ?>
        <!-- row for input -->
        <div class="row justify-content-center mt-5">
            <div class="col-6 align-items-center">

                <?php
                if (isset($_GET['update'])) { ?>
                    <!-- display edit input -->
                    <h2>Edit User Input</h2>

                    <?php
                    $id = $_GET['id'];
                    // fetch the data to our database
                    $getUser = $conn->prepare("SELECT * FROM personal_info WHERE p_id =?");
                    $getUser->execute([$id]);

                    foreach ($getUser as $data) { ?>

                        <form action="process.php" method="POST" class="form shadow p-3">
                            <input type="hidden" name="userID" value="<?= $data['p_id'] ?>">
                            <div class="mb-2">
                                <label for="fname">Firstname: </label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?= $data['fname'] ?>">
                            </div>
                            <div class="mb-2">
                                <label for="lname">Lastname: </label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?= $data['lname'] ?>">
                            </div>
                            <div class="mb-2">
                                <label for="address">Address: </label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $data['address'] ?>">
                            </div>
                            <div class="mb-2">
                                <label for="age">Age: </label>
                                <input type="number" class="form-control" id="age" name="age" value="<?= $data['age'] ?>">
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="update" value="Update" class="form-control btn btn-warning">
                            </div>
                        </form>
                    <?php } ?>
                <?php } else { ?>
                    <!-- display user input -->
                    <h2>Utang Input</h2>
                    
                    <?php if (isset($_GET['msg'])) { ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?= $_GET['msg']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php   } ?>

                    <form action="process.php" method="POST" class="form shadow p-3">
                        <input type="hidden" name="userID" value="<?= $_SESSION['u_id'] ?>">
                        <div class="mb-2">
                            <label for="fname">Firstname: </label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="mb-2">
                            <label for="lname">Lastname: </label>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                        <div class="mb-2">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="mb-2">
                            <label for="age">Utang: </label>
                            <input type="number" class="form-control" id="age" name="age">
                        </div>
                        <div class="mb-2">
                            <input type="submit" name="add" value="Submit" class="form-control btn btn-success">
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
        <hr>
        <!-- table for display -->
        <div class="row mt-5 justify-content-center mb-5">
            <div class="col-8 mb-5">
                <h2>Display Data from Database</h2>
                <div class="table shadow p-2">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>Utang</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $userID = $_SESSION['u_id'];
                            $cnt = 1;
                            $select = $conn->prepare("SELECT * FROM personal_info WHERE user_id = ?");
                            $select->execute([$userID]);
                            foreach ($select as $data) { ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $data['fname'] ?></td>
                                    <td><?= $data['lname'] ?></td>
                                    <td><?= $data['address'] ?></td>
                                    <td><?= $data['age'] ?></td>
                                    <td>
                                        <a href="index.php?update&id=<?= $data['p_id'] ?>" class="text-decoration-none">✏️</a>
                                        |
                                        <a href="process.php?delete&id=<?= $data['p_id'] ?>" class="text-decoration-none">❌</a>
                                    </td>
                                </tr>

                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>