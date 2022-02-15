

    <!--*************** Footer  Starts Here *************** -->
    <footer id="contact" class="container-fluid">
        <div class="container">

            <div class="row content-ro">
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2>Contact Informatins</h2>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"><span style="padding-left: 10px;">Main Bazar Barikot Swat.</span></i>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="far fa-envelope"><span style="padding-left: 10px;">wenanetwork@gmail.com</span></i>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-phone"><span style="padding-left: 10px;">+92 345 9514672, +92 311 9092360</span></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                    <div class="row no-margin mt-2">
                        <h2>For Financial Assistance</h2>
                        <ul>
                            <li>Please provide your financial support for continuing this noble cause.</li>
                            <li>Easy Paisa Acc#: 03459514672</li>
                            <li></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2>Develop and Maintained By</h2>
                    <div class="address-row">
                        <div class="detail">
                            <p>DIGI GO FAST</p>
                            <small>Office:</small>
                            <p>Main Bazar Barikot Swat.</p>
                            <small>Contact #:</small>
                            <p>0345 9514672</p>
                            <small>Email:</small>
                            <p>digigofast@gmail.com</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
<style>
    .mobclass{
        color:red;
    }
</style>

</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/jsfiles/address.js"></script>
<script type="text/javascript">
     var baseURL = "<?php echo base_url(); ?>";
     $('#mobile').keydown(function(){
        var mobile = $('#mobile').val();
        //var str1 = "ABCDEFGHIJKLMNOP";
        var str2 = "03";
        if(mobile.indexOf(str2) != -1){
            $('#mobalert').text('');
        }else{
            $('#mobalert').text('Plz Enter Correct # e.g. 03459514672!');
            $('#mobalert').addClass('mobclass');
        }
    });
    function checkValidation(){
        var province  = $('#province').val();
        var district = $('#district').val();
        var tehsil = $('#tehsil').val();
        if(province == '0' || district == '0' || tehsil == '0'){
            alert('Please Select Valid Address');
            return false;
        }else{
            return true;
        }
    }
</script>

</html>