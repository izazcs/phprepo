$('#province').change(function(){
    var pid = $('#province').val();
    
    $('#district').empty();
    $('#tehsil').empty();
    $('#district').prepend("<option value='0' selected>Select District</option>");
    $('#tehsil').prepend("<option value='0' selected>Select Tehsil</option>");
    $.ajax({
        type: 'POST',
        data: {
            'pid': pid
        },
        dataType: 'json',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        url: baseURL+'/getDistrict',
        success: function(districts) {
            $.each(districts, function(index, value) {
                $('#district').append(
                    "<option value=" + value.id +">" + value.district +"</option>"
                );
            });
        },
        error: function() {
            console.log('Error while getting District data');
        }
    }); 
});
//get Thsil data when change the districts
$('#district').change(function(){
    var did = $('#district').val();
    $('#tehsil').empty();
    $('#tehsil').prepend("<option value='0' selected>Select Tehsil</option>");
    $.ajax({
        type: 'POST',
        data: {
            'did': did
        },
        dataType: 'json',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        url: baseURL+'/getTehsil',
        success: function(tehsils) {
            $.each(tehsils, function(index, value) {
                $('#tehsil').append(
                    "<option value=" + value.id +">" + value.tehsil +"</option>"
                );
            });
        },
        error: function() {
            console.log('Error while getting Tehsil data');
        }
    }); 
});
 
 

 
 //refresh list
 $('#btnRefresh').click(function() {
    var key = true;
    $.ajax({
        type: 'POST',
        data: {
            'getkey': key
        },
        dataType: 'json',
        url: '',
        success: function(cdata) {
            $('#customerselect').empty();
            $.each(cdata, function(index, value) {
                var ram = value.rAmount;
                if (ram == null) {
                    ram = 0;
                }
                $('#customerselect').prepend(
                    "<option value=" + value.CID + ':' + ram + ">" +
                    value.cname + ' | ' + value.caddress + ' | ' + value.cmobile +
                    "</option>"
                );
            });
            $('#customerselect').prepend("<option value='0:0' selected>Guest</option>");
        },
        error: function() {
            $('#searchlist').empty();
            $('#searchlist').prepend(
                "<a href='#' class='list-group-item'>No Result Found</a>"
            );
            console.log('Error while getting Customer Referesh data');
        }
    }); //ajax end

});

//var cselectval = $('#customerselect').val();
  //              var result = cselectval.split(':');
    //            cid = result[0];


    $('#btnAddCustomerNow').click(function(){
        var cname = $('#addCustomerName').val();
        var cnumber = $('#addCustomerNumber').val();
        if(cname == '' || cnumber == ''){
            alert('Customer Name and Number Required');
        }else{
            //ajax code to save the whole products
            $.ajax({
                type: "POST",
                data: {
                    'addCustomerName': cname,
                    'addCustomerNumber' : cnumber
                },
                dataType: "json",
                url: baseURL+'HoldInvoice_c/addCustomer',
                success: function(response) {
                    if(response.add == '1') {
                        getCustomer();
                        notifyMe("Successfylly", "Customer Added", "success");
                        $('#modalAddCustomer').modal('hide');
                        $('#inputcode').focus();
                    } else {
                        if(response.add == '2'){
                            alert('This Customer Already Exits!');
                        }else{
                            notifyMe("Error", "Customer Add", "warning");
                        }
                    }
                },
                error: function() {
                    alert('unable to process ajax request');
                }
            });
            //end of ajax code
        }
    });
    function getCustomer(){
        var key = true;
                $.ajax({
                    type: 'POST',
                    data: {
                        'getkey': key
                    },
                    dataType: 'json',
                    url: baseURL+'CustomerInvoice_c/getCustomers',
                    success: function(cdata) {
                        $('#customerselect').empty();
                        $.each(cdata, function(index, value) {
                            var ram = value.rAmount;
                            if (ram == null) {
                                ram = 0;
                            }
                            $('#customerselect').prepend(
                                "<option value=" + value.CID + ':' + ram + ">" +
                                value.cname + ' | ' + value.caddress + ' | ' + value.cmobile +
                                "</option>"
                            );
                        });
                        $('#customerselect').prepend("<option value='0:0' selected>Guest</option>");
                    },
                    error: function() {
                        $('#searchlist').empty();
                        $('#searchlist').prepend(
                            "<a href='#' class='list-group-item'>No Result Found</a>"
                        );
                        console.log('Error while getting Customer Referesh data');
                    }
                }); 
                
            }//ajax end