<div class="container-fluid" style="background-color: #de1f26;">
    <div class="container">
        <div class="session-title row" style="padding:20px;">
            <div class="col-lg-12 col-md-12">
                <h2 style="color:#fff;"> <?php if ($isvarified['verified']) {
                                                echo 'Welcome to Dashboard';
                                            } else { ?> Account Verifiction<?php } ?></h2>
            </div>
        </div>
    </div>
</div>
<!--################### Our Serprovinceh Starts Here #######################--->
<div class="blog-container  contaienr-fluid" style="padding-top:0px;">
    <div class="container">
        <?php if ($isvarified['verified']) {
            echo '<div class="session-title row">Please provide correct information to make it easy for other people and help them in the time of need.</div>';
        } else { ?>
            <div class="session-title row">
                <p> </p>
            </div>
        <?php  } ?>
        <div class="row card">
            <div class="card-body">
                <?php if ($isvarified['verified']) { ?>
                    <div class="row detailshow">
                        <div class="col-md-12">
                            <div class="row news-row">
                                <div class="col-md-12">
                                    <div class="news-card">
                                        <div class="image">
                                            <img src="<?php if (session()->get('image') != null) {
                                                echo base_url() . '/assets/images/dimages/' . session()->get('image');
                                            } else {
                                                echo base_url().'/assets/images/dimages/noimage.jpg';
                                            } ?>" width="150px" id="myimg">
                                        </div>
                                        <div class="detail">
                                            <h3><?= session()->get('name'); ?> / <?= session()->get('bloodGroup'); ?></h3>
                                            Addres: Tehsil <?= session()->get('tname'); ?> district <?= session()->get('dname'); ?>.
                                            <p class="footp">
                                                Contact info <span>/</span>
                                                <?= session()->get('mobile'); ?> <span>/</span>
                                                Email <span>-</span>
                                                <?= session()->get('email'); ?> 
                                            </p>
                                        </div>
                                        <button id="btnshowupdate" style="margin-left:auto;" class="btn btn-primary">Update Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="updatediv" style="display: none;">
            <form action="<?= base_url(); ?>/update" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (session()->get('message') == true) {
                        ?>
                            <div class="form-group">
                                <div class="alert alert-success" role="alert">
                                    <label style="font-size: 12px;">
                                        <?= session()->get('message'); ?>
                                    </label>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="searchme">Show me in Search</label>
                                    <select name="searchme" id="searchme" class="form form-control">
                                        <option value="1" <?php if (session()->get('searchme') == '1') {
                                                                echo "selected";
                                                            } ?>>Yes</option>
                                        <option value="0" <?php if (session()->get('searchme') == '0') {
                                                                echo "selected";
                                                            } ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= csrf_field() ?>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="<?= session()->get('name'); ?>" class="form form-control  " placeholder="Type your Name...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Father Name</label>
                                    <input type="text" name="fname" id="fname" value="<?= session()->get('fname'); ?>" class="form form-control  " placeholder="Type your Father Name...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="<?= session()->get('email'); ?>" class="form form-control  " placeholder="khan@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone #</label>
                                    <input type="text" name="phone" id="phone" maxlength="11" value="<?= session()->get('phone'); ?>" class="form form-control  " placeholder="0946752472" onkeypress="return event.charCode == 46 || event.charCode == 0 || (event.charCode >= 48 && event.charCode <= 57)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">DOB</label>
                                    <input type="date" name="dob" id="dob" value="<?= session()->get('dob'); ?>" class="form form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloodGroup">Blood Group</label>
                                    <select name="bloodGroup" id="bloodGroup" class="form form-control  ">
                                        <option value="A+" <?php if (session()->get('bloodGroup') == 'A+') {
                                                                echo "selected";
                                                            } ?>>A+</option>
                                        <option value="A-" <?php if (session()->get('bloodGroup') == 'A-') {
                                                                echo "selected";
                                                            } ?>>A-</option>
                                        <option value="B+" <?php if (session()->get('bloodGroup') == 'B+') {
                                                                echo "selected";
                                                            } ?>>B+</option>
                                        <option value="B-" <?php if (session()->get('bloodGroup') == 'B+-') {
                                                                echo "selected";
                                                            } ?>>B-</option>
                                        <option value="AB+" <?php if (session()->get('bloodGroup') == 'AB+') {
                                                                echo "selected";
                                                            } ?>>AB+</option>
                                        <option value="AB-" <?php if (session()->get('bloodGroup') == 'AB-') {
                                                                echo "selected";
                                                            } ?>>AB-</option>
                                        <option value="O+" <?php if (session()->get('bloodGroup') == 'O+') {
                                                                echo "selected";
                                                            } ?>>O+</option>
                                        <option value="O-" <?php if (session()->get('bloodGroup') == 'O-') {
                                                                echo "selected";
                                                            } ?>>O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="drugAdict">Drug Adicted</label>
                                    <select name="drugAdict" id="drugAdict" class="form form-control  ">
                                        <option value="No">No</option>
                                        <option value="Yes">YES</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dimage">Donar Profile Image:</label>
                            <img src="<?php if (session()->get('image') != null) {
                                            echo base_url() . '/assets/images/dimages/' . session()->get('image');
                                        } else {
                                            echo '';
                                        } ?>" width="200px" id="myimg">
                            <input type="file" name="dimage" class="form-control" onchange="khanimg(this)" id="dimage">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select class="form form-control" name="province" id="province">
                                <option value="0">Select Province</option>
                                <?php foreach ($province as $row) { ?>
                                    <option value="<?= $row['id']; ?>" <?php if (session()->get('province') == $row['id']) {
                                                                            echo "selected";
                                                                        } ?>><?= $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="district">District</label>
                            <select name="district" id="district" class="form form-control">
                                <option value="<?= session()->get('did'); ?>" selected> <?= session()->get('dname'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tehsil">Tehsil</label>
                            <select name="tehsil" id="tehsil" class="form form-control">
                                <option value="<?= session()->get('tid'); ?>" selected> <?= session()->get('tname'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" value="UPDATE NOW" class="btn btn-primary btn-lg">
                        </div>
                    </div>
                </div>
                <?php
                    if (isset($validation)) { //service('validation')->listErrors() 
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <label style="color:#de1f26;">
                                    <?= $validation->listErrors() ?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            </form>
            </div>

        <?php } else { ?>
            <form action="<?= base_url(); ?>/verify" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= csrf_field() ?>
                                    <label for="vcode">Verification Code</label>
                                    <input type="text" name="vcode" id="vcode" class="form form-control form-control-lg" placeholder="Enter 4 Digit Verification Code Here">
                                    <small>Please Wait itleast upto 5 mints for Verification Code!</small>
                                </div>
                                <?php if (session()->get('message') == true) {
                                ?>
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            <label style="font-size: 11px;">
                                                <?= session()->get('message'); ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" value="VERIFY NOW" class="btn btn-primary btn-lg">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <?php
                    if (isset($validation)) { //service('validation')->listErrors() 
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <label style="color:#de1f26;">
                                    <?= $validation->listErrors() ?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            </form>

        <?php } ?>
        </div>
    </div>
</div>
</div>
<?php include "templates/footer.php"; ?>
<script src="<?php echo base_url();?>/assets/js/jsfiles/dashboard.js"></script>
<script type="text/javascript">
    function khanimg(input) {
        $('#myimg')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        // $('#txtimg').text('New Image');
    }
</script>