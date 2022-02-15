

    <!--################### Our Serach Starts Here #######################--->
    <div id="donar" class="blog-container contaienr-fluid">
        <div class="container">
            <div class="session-title row">
                <h2>Search for Blood Donars</h2>
                <p>Select your blood group and type your address carefully to find out most suitable donar in your near location.</p>
            </div>
                <div class="row card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="bloodGroup" id="bloodGroup" class="form form-control">
                                            <option value="A+" <?php if(set_value('bloodGroup') == 'A+'){echo 'selected';} ?>>A+</option>
                                            <option value="A-" <?php if(set_value('bloodGroup') == 'A-'){echo 'selected';} ?>>A-</option>
                                            <option value="B+" <?php if(set_value('bloodGroup') == 'B+'){echo 'selected';} ?>>B+</option>
                                            <option value="B-" <?php if(set_value('bloodGroup') == 'B-'){echo 'selected';} ?>>B-</option>
                                            <option value="O+" <?php if(set_value('bloodGroup') == 'O+'){echo 'selected';} ?>>O+</option>
                                            <option value="O-" <?php if(set_value('bloodGroup') == 'O-'){echo 'selected';} ?>>O-</option>
                                            <option value="AB+" <?php if(set_value('bloodGroup') == 'AB+'){echo 'selected';} ?>>AB+</option>
                                            <option value="AB-" <?php if(set_value('bloodGroup') == 'AB-'){echo 'selected';} ?>>AB-</option>
                                        </select>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form form-control" name="province" id="province">
                                    <option value="0">Select Province</option>
                                    <?php foreach($province as $row){ ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form form-control" name="district" id="district">
                                    <option value="0">Select District</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form form-control" name="tehsil" id="tehsil">
                                    <option value="0">Select Tehsil</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-danger" onclick="return checkValidationSearch();" value="Search Blood Donar">
                            </div>
                        </div>
                        
                    </div>
                </div>
            <div class="serachdata">

            </div>
        </div>
    </div>
    
    <!--*************** About Us Starts Here ***************-->
    <section id="about" class="contianer-fluid about-us">
        <div class="container">
            <div class="row session-title">
                <h2>About Us</h2>
                <p>“Whoever saves a life saves the world entire”</p>
            </div>
            <div class="row">
                <div class="col-md-6 text">
                    <h2>About WENA Network</h2>
                    <p>
                        Our organization is a non-profit organization working solely for the betterment of humanity. Inspired by those who are doing their best in order to link the blood donors and acceptors, our organization has launched this program. Our program is an online program that will make it easier to search for the donor of the required blood group. Furthermore, it will facilitate to locate and contact the nearby donors and acceptors. Unlike other offline organizations whose services are confined to a specific area, our program will serve across the country. We are hopeful of creating a community where we hold each other’s hand, not letting the weaker fall. With your help and support, we wish to make the burden light for those in distress. If you are blessed with an opportunity to put a smile on someone’s face, you are not a common human, you are a chosen one. We have lived a lot for ourselves, let’s live for others.
                    </p>
                </div>
                <div class="col-md-6 image">
                    <img src="assets/images/wlogo.png" style="margin-left: 20%;" width="30%" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- ################# Donation Process Start Here #######################--->
    <section id="map" class="donation-care">
    <h1>My First Google Map</h1>

        <div id="googleMap" style="width:100%;height:400px;"></div>

    </section>

    <section id="process" class="donation-care">
        <div class="container">
            <div class="row session-title">
                <h2>Donation Process</h2>
                <p>The donation process from the time you arrive center until the time you leave</p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="assets/images/gallery/g1.jpg" alt="">
                        <h4><b>1 - </b>Registration</h4>
                        <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                        <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="assets/images/gallery/g2.jpg" alt="">
                        <h4><b>2 - </b>Seeing</h4>
                        <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                        <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="assets/images/gallery/g3.jpg" alt="">
                        <h4><b>3 - </b>Donation</h4>
                        <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                        <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="assets/images/gallery/g4.jpg" alt="">
                        <h4><b>4 - </b>Save Life</h4>
                        <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                        <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <?php include "templates/footer.php"; ?>
    <script type="text/javascript">

        function myMap() {
        var coordinates = {
            lat: 40.785845,
            lng: -74.020496
        };
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 14,
            center: coordinates,
            scrollwheel: false
        });
        /*
        var marker = new google.maps.Marker({
            position: coordinates,
            map: map,
            icon: {
            url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
            labelOrigin: new google.maps.Point(75, 32),
            size: new google.maps.Size(32, 32),
            anchor: new google.maps.Point(16, 32)
            },
            label: {
            text: "5409 Madison St",
            color: "#C70E20",
            fontWeight: "bold"
            }
        });
        */
        }
        //google.maps.event.addDomListener(window, "load", myMap);
        /*
        myLatLng = { lat: -25.363, lng: 131.044 };
        function myMap() {
        
        var mapProp= {
        center:new google.maps.LatLng(myLatLng),
        zoom:7,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        /*
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                labelOrigin: new google.maps.Point(75, 32),
                size: new google.maps.Size(32,32),
                anchor: new google.maps.Point(16,32)
            },
            label: {
                text: "5409 Madison St",
                color: "#C70E20",
                fontWeight: "bold"
            }
            });*/
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACv8QbioJ2EtcSJYe7tKA22iqMuBYoS20&callback=myMap"></script> 
    </script>
    <script src="<?php echo base_url();?>/assets/js/jsfiles/search.js"></script>

