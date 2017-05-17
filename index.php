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
    <form class="form-group" method="POST" action="index.php">
        <input class="form-control" id='search-box' type="text" name="search" placeholder='Search Note...'>
    </form>

    <!-- Add New Note Button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Note</button>

    <!-- BEGIN: AddNew Form  -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Add New Note</h2>
                </div>

                <form method="POST" action="create.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="Text" name="title" placeholder="Input Title...">
                            <br>
                            <textarea class="form-control" rows='10' name="description" placeholder="Input Content..."></textarea>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss='modal' aria-hidden='true'>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END AddNote Form -->

    <!-- Live Search -->
    <div class="grid" id="result" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
    </div>
    <!-- END Live Search -->

    <!-- BEGIN: ListNote -->
  <!--   <div id="all-note">
    <?php 
        if (!isset($_POST['search'])) {
            require_once('listNote.php');
        }
        else {
            require_once('search.php');
        }
    ?>
    </div> -->
        
    <!-- END: ListNote -->

</div>
