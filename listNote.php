<?php
    require_once('db/dbconf.php');

    $sql = "SELECT * FROM `note` ORDER BY created DESC";
    $result = $db->query($sql);

    while ($row = $result->fetch_object()) {
        $id = $row->id;

        $updateAndDeleteButton =    "   <div class='update-delete-btn'>
                                            <button type='button' class='btn btn-warning' id='btn-update' data-toggle='modal' data-target='#update-$id'>
                                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                            </button>

                                            <button type='button' class='btn btn-danger' id='btn-delete' data-toggle='modal' data-target='#delete-$id'>
                                                <i class='fa fa-trash' aria-hidden='true'></i>
                                            </button>
                                        </div> 
                                    ";

        $updateNoteModal =  "   <div class='modal fade' id='update-$id' tabindex='-1' role='dialog' aria-labelledby='update-note'>
                                    <div class='modal-dialog modal-lg' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                <h2>Editing Note</h2>
                                            </div>
                                            <form method='POST' action='update.php'>
                                                <div class='modal-body'>
                                                    <div class='form-group'>
                                                        <input class='form-control' type='hidden' value=$row->id name='id'>
                                                        <input class='form-control' type='text' value='$row->title' name='title'>
                                                        <br>
                                                        <textarea class='form-control' rows='10'  name='description'>$row->description</textarea>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <div class='form-group'>
                                                        <button class='btn btn-success' type='submit' name='updateNote'>Confirm</button>
                                                        <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ";

        $deleteNoteModal =  "   <div class='modal fade' id='delete-$id' tabindex='-1' role='dialog' aria-labelledby='update-note'>
                                    <div class='modal-dialog modal-lg' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                <h2>Deleting Note</h2>
                                            </div>
                                            <form method='POST' action='delete.php'>
                                                <div class='modal-footer'>
                                                    <div class='form-group'>
                                                        <input class='form-control' type='hidden' value=$row->id name='id'>
                                                        <button class='btn btn-success' type='submit' name='deleteNote'>Confirm</button>
                                                        <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            ";

        $indexDisplay =    "<div class='col-xs-12 col-md-4 single-note'>
                                <div class='notepad' id='$row->title'>
                                    <h4 class='titleNote'><strong> $row->title </strong></h4>
                                    <p> $row->description </p>

                                    $updateAndDeleteButton

                                    $updateNoteModal

                                    $deleteNoteModal

                                </div>
                            </div> ";   
        echo $indexDisplay;
    }
?>