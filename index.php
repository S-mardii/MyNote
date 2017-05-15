<?php 	
	session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    require_once('header.php'); 
	require_once('footer.php'); 
	require_once('db/dbconf.php');
?>

<div id="layout">
    <div id="account">
        <h4><?php echo $_SESSION['username'];?></h4>
        <a href="logout.php">Logout</a><br>
    </div>

    <h1>My Note</h1>
    <br>
    <form class="form-group" method="POST" action="search.php">
        <input class="form-control" id='search-box' type="text" name="search" placeholder='Search Note...'>
    </form>

    <!-- Add New Note Button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Note</button>

    <!-- BEGIN: AddNew Form  -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <h2>New Note</h2>
                <div class="addNote">
                    <form method="POST" action="create.php">
                        <div class="form-group">
                            <input class="form-control" type="Text" name="title" placeholder="Input Title...">
                            <br>
                            <textarea class="form-control" name="description" placeholder="Input Content..."></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-danger" type="button" data-dismiss='modal' aria-hidden='true'>Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END AddNote Form -->

    <!-- BEGIN: ListNote -->
    <div id="all-note">
        <?php 
        $sql = "SELECT * FROM note";
        $result = $db->query($sql);

        while ($row = $result->fetch_object()) {
            $id = $row->id;

            $displayUpdate =    "<div class='single-note'>
                                    <div class='notepad' id='$row->title'>
                                        <h4 class='titleNote'><strong> $row->title </strong></h4>
                                        <p> $row->description </p>

                                        <button type='button' class='btn btn-warning' id='btn-update' data-toggle='modal' data-target='#update-$id'>
                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                        </button>

                                        <div class='modal fade' id='update-$id' tabindex='-1' role='dialog' aria-labelledby='update-note'>
                                            <div class='modal-dialog modal-lg' role='document'>
                                                <div class='modal-content'>
                                                    <h2>Editing Note</h2>
                                                    <form method='POST' action='update.php'>
                                                        <div class='form-group'>
                                                            <input class='form-control' type='hidden' value=$row->id name='id'>
                                                            <input class='form-control' type='text' value='$row->title' name='title'>
                                                            <textarea class='form-control' name='description'>$row->description</textarea>
                                                            <br>
                                                            <button class='btn btn-success' type='submit' name='updateNote'>Confirm</button>
                                                            <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>

                                        <button type='button' class='btn btn-danger' id='btn-delete' data-toggle='modal' data-target='#delete-$id'>
                                            <i class='fa fa-trash' aria-hidden='true'></i>
                                        </button> 

                                        <div class='modal fade' id='delete-$id' tabindex='-1' role='dialog' aria-labelledby='update-note'>
                                            <div class='modal-dialog modal-lg' role='document'>
                                                <div class='modal-content'>
                                                    <h2>Deleting Note</h2>
                                                    <form method='POST' action='delete.php'>
                                                        <div class='form-group'>
                                                            <input class='form-control' type='hidden' value=$row->id name='id'>
                                                            <button class='btn btn-success' type='submit' name='deleteNote'>Confirm</button>
                                                            <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
 
                                    </div>
                                </div> ";   
            echo $displayUpdate;
        }
        ?>
    </div>
    <!-- END: ListNote -->

</div>
