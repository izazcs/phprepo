<div class="container-fluid" style="background-color: #de1f26;">
    <div class="container">
        <div class="session-title row" style="padding:20px;">
            <div class="col-lg-12 col-md-12">
                <h2 style="color:#fff;">IMPORT ITEMS</h2>
            </div>
        </div>
    </div>
</div>
<!--################### Our Serprovinceh Starts Here #######################--->
<div class="blog-container  contaienr-fluid" style="padding-top:0px;">
    <div class="container">
        <div class="row card">
            <div class="card-body">
            <form action="<?= base_url();?>/import" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-12 session-title"><h2 >Import Item</h2></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dimage">Select File:</label>
                            <img src="" width="200px" id="myimg">
                            <input type="file" name="dimage" class="form-control">
                        </div>
                        <div class="form-group">
                                        <?php if(session("message")) {?>  
                                        <div class="alert alert-success" role="alert">
                                            <label>
                                                <?= session("message"); ?> 
                                            </label>
                                        </div>
                        
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" value="IMPORT" class="btn btn-primary btn-lg">
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