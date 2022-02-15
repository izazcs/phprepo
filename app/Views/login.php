<div class="container-fluid" style="background-color: #de1f26;">
    <div class="container">
        <div class="session-title row" style="padding:20px;">
            <div class="col-lg-12 col-md-12">
                <h2 style="color:#fff;">Login to WENA Network</h2>
            </div>
        </div>
    </div>

    <!--################### Our Serach Starts Here #######################--->
    <div class="blog-container contaienr-fluid">
        <div class="container">
            <div class="row card">
                <div class="card-body">
                    <form action="<?= base_url(); ?>/login" method="post">
                        <div class="row">

                            <div class="col-lg-4 col-md-4">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-card" style="border:#de1f26 2px solid; padding:18px; border-radius:10px;">
                                    <div class="form-title">
                                        <h4>Enter Credentials</h4>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="mobile">Mobile #</label>
                                            <input type="number" name="mobile" id="mobile"  value="<?= set_value('mobile'); ?>" placeholder="Enter Mobile no" class="form-control form-control-lg">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"> Password</label>
                                            <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control form-control-lg">
                                        </div>
                                        <div class="form-group">
                                            <?php if (session()->get('message') == true) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <label>
                                                        <?= session()->get('message'); ?>
                                                    </label>
                                                </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (isset($validation)) { //service('validation')->listErrors() 
                                    ?>
                                        <div class="form-group">
                                            <div class="alert alert-danger" role="alert">
                                                <label style="font-size: 11px;">
                                                    <?= $validation->listErrors() ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                    <button class="btn btn-lg btn-primary w-100 ">LOG IN</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>