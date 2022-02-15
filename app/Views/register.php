<div class="container-fluid" style="background-color: #de1f26;">
    <div class="container">
        <div class="session-title row" style="padding:20px;">
            <div class="col-lg-12 col-md-12">
                <h2 style="color:#fff;">Register in WENA Network</h2>
            </div>
        </div>
    </div>
</div>
<!--################### Our Serprovinceh Starts Here #######################--->
<div class="blog-container  contaienr-fluid" style="padding-top:0px;">
    <div class="container">
        <div class="session-title row">
            <p>Please provide correct information to make it easy for other people and help them in the time of need. </p>
        </div>
        <div class="row card">
            <div class="card-body">
            <form action="<?= base_url();?>/register" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-12 session-title"><h2 >Registration Form</h2></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= csrf_field() ?>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="<?= set_value('name'); ?>" class="form form-control  " placeholder="Type your Name...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Father Name</label>
                                    <input type="text" name="fname" id="fname" value="<?= set_value('fname'); ?>" class="form form-control  " placeholder="Type your Father Name...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="<?= set_value('email'); ?>" class="form form-control  " placeholder="khan@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile #</label>
                                    <input type="text" name="mobile" id="mobile" value="<?= set_value('mobile'); ?>" maxlength="11" class="form form-control  " placeholder="03459514672" onkeypress="return event.charCode == 46 || event.charCode == 0 || (event.charCode >= 48 && event.charCode <= 57)">
                                    <small id="mobalert"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone #</label>
                                    <input type="text" name="phone" id="phone" maxlength="11" value="<?= set_value('phone'); ?>" class="form form-control  " placeholder="0946752472" onkeypress="return event.charCode == 46 || event.charCode == 0 || (event.charCode >= 48 && event.charCode <= 57)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">DOB</label>
                                    <input type="date" name="dob" id="dob" value="<?= set_value('dob'); ?>" class="form form-control  " placeholder="khan@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloodGroup">Blood Group</label>
                                    <select name="bloodGroup" id="bloodGroup" class="form form-control  ">
                                        <option value="A+" <?php if(set_value('bloodGroup') == 'A+'){echo 'selected';} ?>>A+</option>
                                        <option value="A-" <?php if(set_value('bloodGroup') == 'A-'){echo 'selected';} ?>>A-</option>
                                        <option value="B+" <?php if(set_value('bloodGroup') == 'B+'){echo 'selected';} ?>>B+</option>
                                        <option value="B-" <?php if(set_value('bloodGroup') == 'B-'){echo 'selected';} ?>>B-</option>
                                        <option value="O+" <?php if(set_value('bloodGroup') == 'O+'){echo 'selected';} ?>>O+</option>
                                        <option value="O-" <?php if(set_value('bloodGroup') == 'O-'){echo 'selected';} ?>>O-</option>
                                        <option value="AB+" <?php if(set_value('bloodGroup') == 'AB+'){echo 'selected';} ?>>AB+</option>
                                        <option value="AB-" <?php if(set_value('bloodGroup') == 'AB-'){echo 'selected';} ?>>AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="drugAdict">Drug Adicted</label>
                                    <select name="drugAdict" id="drugAdict" class="form form-control  ">
                                        <option value="No" <?php if(set_value('drugAdict') == 'No'){echo 'selected';} ?>>No</option>
                                        <option value="Yes" <?php if(set_value('drugAdict') == 'Yes'){echo 'selected';} ?>>YES</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dimage">Donar Profile Image:</label>
                            <img src="" width="200px" id="myimg">
                            <input type="file" name="dimage" class="form-control" onchange="khanimg(this)" id="dimage" placeholder="">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="form form-control">
                                <option value="0">Select Province</option>
                                <?php foreach($province as $row){ ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                <?php } ?>
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="district">District</label>
                            <select name="district" id="district" class="form form-control">
                                <option value="0">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tehsil">Tehsil</label>
                            <select name="tehsil" id="tehsil" class="form form-control">
                                <option value="0">Select Tehsil</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form form-control" placeholder="Type Here....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form form-control" placeholder="Type Here....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" onclick="return checkValidation();" value="REGISTER NOW" class="btn btn-primary btn-lg">
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($validation)){ //service('validation')->listErrors() ?>
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
        </div>
    </div>
</div>
<script type="text/javascript">
    function khanimg(input) {
        $('#myimg')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        // $('#txtimg').text('New Image');
    }
   
</script>
