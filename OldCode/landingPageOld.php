<?php
include "./header.php";
?>

<main>

    <div class="leftBar">
        <img class="avatar" src="images/pp.png" alt="ProfilePicture">
        <a class="updateLink" href="updateUser.php">Update Profile</a>
        <p class="testLink" href="#">Calculate Salary</p>
        <p class="testLink" href="#">Hour</p>
        <p class="testLink" href="#">Calendar</p>
    </div>
    <div class="contentBody">
        <!-- Modal HTML embedded directly into document -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="updateForm"></div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Link to open the modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open modal
        </button>
    </div>
</main>

<script src="js/main.js"></script>

<?php include "./footer.php" ?>