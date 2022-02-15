function checkValidationSearch(){
    var province  = $('#province').val();
    var district = $('#district').val();
    var tehsil = $('#tehsil').val();
    var bloodGroup = $('#bloodGroup').val();
    if(province == '0' || district == '0' || tehsil == '0'){
        alert('Please Select Valid Address');
        return false;
    }else{
        $.ajax({
            type: 'POST',
            data: {
                'province': province,
                'district' : district,
                'tehsil' : tehsil,
                'bloodGroup' : bloodGroup,
            },
            dataType: 'json',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            url: baseURL+'/',
            success: function(data) {
                if(data.norecord == '0'){
                    $('.serachdata').html(
                        '<h1>Woops no Blood Donar found please try another comibination!</h1>'
                    );
                }else{
                    $('.serachdata').html('');
                    $.each(data, function(index, value) {
                        var img = '';
                        if(value['image'] == 'noimage'){
                            img = 'noimage.jpg';
                        }else{
                            img = value['image'];
                        }
                        $('.serachdata').append(
                            "<div class='row news-row'>"+
                                    "<div class='news-card col-md-12'>"+
                                        "<div class='image'>"+
                                         "<img src="+baseURL+'/assets/images/dimages/'+img+" width='150px' alt=''>"+
                                        "</div>"+
                                        "<div class='detail'>"+
                                            "<h3>"+value['name']+" / "+value['bloodGroup']+"</h3>"+
                                            "<h5>S/D/O:" +value['fname']+ "</h5>"+
                                            "Addres: Tehsil "+ value['tname']+ "  District "+ value['dname']+ "<span> </span>,"+value['pname']+
                                            "<p class='footp'>"+
                                                "Contact info <span>/</span>"+
                                                "Mobile #: "+
                                                value['mobile'] +"<span>/</span>"+
                                                "Phone # :"+
                                                value['phone']+
                                            "</p>"+
                                        "</div>"+
                                "</div>"+
                            "</div>"
                        );
                    });
                }
            },
            error: function() {
                console.log('Error while getting result data');
            }
        });
    }
}