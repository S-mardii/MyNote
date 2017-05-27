<?php 	
	session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    require_once('header.php'); 
	require_once('footer.php'); 
	require_once('db/dbconf.php');
    require_once('showProfilePic.php');
?>

<div id="nav-section">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><h1>MyNote</h1></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img class="profile" src="<?php echo $profilePic ?>" alt="profile"> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a><h4><?php echo $fullName ?></h4></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a data-toggle="modal" data-target="#updateProfilePic">Change Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<!-- BEGIN updateProfilePic Modal Form -->
    <div class='modal fade' id='updateProfilePic' tabindex='-1' role='dialog' aria-labelledby='update-note'>
        <div class='modal-dialog modal-lg' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Change Profile Picture</h2>
                </div>
                <form enctype="multipart/form-data" role='form' name="loginForm" method='POST' action='updateProfile.php'>
                    <div class='modal-body'>
                        <div class='form-group'>
                            <input class='form-control' type='hidden' value=<?php echo $id ?> name='id'>
                            <input type="file" name="photo">
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <div class='form-group'>
                            <button class='btn btn-success' type='submit' name='updateNote'>Update</button>
                            <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END updateProfilePic Modal Form -->

<div id="layout">
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
    <div id="result">
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
