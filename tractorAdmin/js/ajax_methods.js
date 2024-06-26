jQuery(function($) {

    //check mobile number 
    $(document).on('submit', '#loginform', function(e) {
        e.preventDefault();
        $('#loginbtn').text('').text('Wait...');
        $('.lerror').text('');
        var phone = $('#mnumber').val();
        var fullname = $('#fname').val();
        var otp = $('#lotp').val();
        var lead = 'no';
        let _token = $('meta[name="csrf-token"]').attr('content');
        let action = $(this).attr('action');
        //$('#ajax_loader').show();
        $.ajax({
            url: action,
            type: 'post',
            data: { phone: phone, fullname: fullname, otp: otp, lead: lead, _token: _token },
            success: function(response) {
                $('#ajax_loader').hide();
                if (response.status) {

                    if (response.step == 'final') {
                        $('.lerror').css('color', 'green');
                        $('.lerror').text(response.msg);
                        setTimeout(function() {

                            if (response.type == 'vendor') {
                                //window.location.href = baseurl+"/vendor";
                                location.reload();
                            } else if (response.type == 'admin') {
                                //window.location.href = baseurl+"/admin/dashboard";
                                location.reload();
                            }
                        }, 2000);
                        return;
                    }

                    if (response.step == 'third') {
                        $('#mobilediv').hide();
                        $('#lotp').attr('required', true);
                        $('#otpdiv').show();
                        $("#resendotp").show();
                        $('#fname').val(response.user.name);
                        $('#namediv').hide();
                    } else if (response.step == 'second') {
                        $('#mobilediv').hide();
                        $('#namediv').show();
                        $('#fname').attr('required', true);
                    }
                } else {
                    //alert(response.error);
                    $('.lerror').text(response.msg);

                }
                $('#loginbtn').text('').text('Continue');
            },
            error: function(data) {
                // Not found
                //console.log(error);
                //$('#ajax_loader').hide();
                $('.lerror').text(data);
                $('#loginbtn').text('').text('Continue');
            }
        });
    });

    // resend otp
    $("#resendotp").on("click", function(e) {
        $('.lerror').text('');
        var mobile = ($('#mnumber').val()) ? $('#mnumber').val() : $('#phone').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: baseurl + "/resend-otp",
            data: { mobile: mobile, _token: _token },
            dataType: "json",
            success: function(data) {
                if (data.resendotp) {
                    $('.lerror').text(data.resendotp);
                }

            },

        });

    });

    //generate lead new/old
    $(document).on('submit', '#tr-web-form', function(e) {

        e.preventDefault();
        $('#sendotplead').val('Wait...');
        $('.lerror').text('');
        var phone = $('#phone').val();
        var fullname = $('#name').val();
        var lead = 'yes';
        var otp = $('#otp').val();
        var tractorId = $('#tractorId').val();
        var url = $('#tractorUrl').val();
        var tractor = $('#tractorName').val();
        var leadType = $('#leadType').val();
        var offer_price = ($('#offer_price').val()) ? $('#offer_price').val() : '';
        let _token = $('meta[name="csrf-token"]').attr('content');
        let action = $(this).attr('action');
        //$('#ajax_loader').show();
        $.ajax({
            url: action,
            type: 'post',
            data: { phone: phone, fullname: fullname, otp: otp, lead: lead, tractorId: tractorId, leadType: leadType, url: url, tractor: tractor, offer_price: offer_price, _token: _token },
            success: function(response) {
                $('#ajax_loader').hide();
                if (response.status) {

                    if (response.step == 'final') {
                        $('#verify').val('Wait...');
                        $('#userId').val(response.user.id);
                        addLead(response.user);
                        return;
                    }

                    if (response.step == 'third') {

                        $('#otp').attr('required', true);
                        $('#otp').show();
                        $('#offer_price').show();
                        $('#verify').show();
                        $("#resend-otp").show();
                        $('#name').hide();
                        $('#phone').hide();
                        $('#sendotplead').hide();
                        var tractorName = $('#tractorname').text();
                        var tractorType = $('#tractorname').attr('data-type');
                        window.open('https://wa.me/919649727200?text=' + encodeURI("I'm inquiring about the " + tractorType + " " + tractorName + " tractor. " + window.location.href + " "), '_blank');
                    }

                } else {
                    //alert(response.error);
                    $('.lerror').text(response.msg);

                }
                $('#sendotplead').val('Send Otp');
            },
            error: function(data) {
                // Not found
                //console.log(error);
                //$('#ajax_loader').hide();
                $('.lerror').text(data.message);
                $('#sendotplead').val('Send Otp');
            }
        });
    });

    //add lead
    function addLead(user) {

        var phone = $('#phone').val();
        var fullname = $('#name').val();
        var otp = $('#otp').val();
        var tractorId = $('#tractorId').val();
        var leadType = $('#leadType').val();
        var offer_price = ($('#offer_price').val()) ? $('#offer_price').val() : '';
        let _token = $('meta[name="csrf-token"]').attr('content');
        var userid = user.id;

        $.ajax({
            type: "POST",
            url: baseurl + "/otp-verify",
            data: { userid: userid, phone: phone, tractorId: tractorId, leadType: leadType, fullname: fullname, offer_price: offer_price, _token: _token },
            dataType: "json",
            success: function(response) {
                $('#verify').val('Verify');

                if (response.status) {
                    $('.lerror').css('color', 'green');
                    $('.lerror').text(response.msg);
                    //window.open('https://wa.me/919649727200?text='+encodeURI("I'm inquiring about the apartment tractor"), '_blank');
                    setTimeout(function() {
                        //window.location.href = baseurl+"/vendor";
                        location.reload();
                    }, 2000);
                    return;
                }
                $('.lerror').text(response.msg);
            },

        });
    }

    // update profile image
    $('#profileimage').on('change', (function(event) {
        //e.preventDefault();
        var formData = new FormData($('#profileForm')[0]);

        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

        $.ajax({
            type: 'POST',
            url: $('#profileForm').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status) {
                    $('#reserrr').css('color', 'green').text(data.message);
                } else {
                    $('#reserrr').css('color', 'red').text(data.message);
                }
                console.log("success");
                console.log(data);
            },
            error: function(data) {
                console.log("error");
                console.log(data);
            }
        });
    }));


    //filter home data
    // update profile image

    $(document).on('change', '#type', function() {
        var thisVal = $(this).val();
        if (thisVal == 'New') {
            $('#year').parent().hide();
        } else {
            $('#year').parent().show();
        }
    });

    $('#filterform').on('submit', (function(e) {
        e.preventDefault();
        var type = $('#type').val();
        var year = $('#year').val();
        var brand = $('#brand').val();
        var model = $('#model').val();
        if (type == "New") {
            var url = baseurl + '/new-tractors';
        } else {
            var url = baseurl + '/buy-used-tractors';
        }
        var fr = '<form action=\"' + url + '\" method=\"get\">' +
            '<input type=\"hidden\" name=\"year[]\" value=\"' + year + '\" />' +
            '<input type=\"hidden\" name=\"brand[]\" value=\"' + brand + '\" />' +
            '<input type=\"hidden\" name=\"model[]\" value=\"' + model + '\" />' +
            '</form>';
        var form = jQuery(fr);
        jQuery('body').append(form);
        form.submit();

    }));

    $('#txtSearch').on('input focus', (function(e) {
        e.preventDefault();
        var type = $(this).val();
        if (type.length > 2) {
            //$('#loclist').empty('');
            var url = baseurl + '/get-match-locations';
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: url,
                data: { _token: _token, type: type },
                dataType: "json",
                success: function(data) {
                    $('#loclist').empty().append(data.content)
                    console.log("success");
                    console.log(data.content);
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                    $('#loclist').empty().append('<li class="nodatali"><p class="nodatafound">Something went wrong!!</p></li>')
                }
            });
        }

    }));

    $('.addTocmp').on('click', (function(e) {
        e.preventDefault();
        var tractor_type = $(this).attr('data-type');
        var tractor_id = $(this).attr('data-id');

        var url = baseurl + '/add-to-compare';
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: url,
            data: { _token: _token, tractor_type: tractor_type, tractor_id: tractor_id },
            dataType: "json",
            success: function(data) {
                location.reload()
                console.log("success");
                console.log(data.content);
            },
            error: function(data) {
                console.log("error");
                console.log(data);
                //$('#loclist').empty().append('<li class="nodatali"><p class="nodatafound">Something went wrong!!</p></li>')
            }
        });


    }));

    $('.removeFromcmp').on('click', (function(e) {
        e.preventDefault();
        var tractor_type = $(this).attr('data-type');
        var tractor_id = $(this).attr('data-id');

        var url = baseurl + '/remove-compare';
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: url,
            data: { _token: _token, tractor_type: tractor_type, tractor_id: tractor_id },
            dataType: "json",
            success: function(data) {

                console.log("success");
                console.log(data.content);
            },
            error: function(data) {
                console.log("error");
                console.log(data);
                //$('#loclist').empty().append('<li class="nodatali"><p class="nodatafound">Something went wrong!!</p></li>')
            }
        });


    }));


});


/*$(window).on('load', function() {
  // code here
  var location = $('#txtSearch').val();
  var shortname = $('#txtSearch').attr('data-shortname');
  let _token   = $('meta[name="csrf-token"]').attr('content'); 
  $.ajax({    
    type: "POST",
    url: baseurl+"/setlocation",
    data: {mobile:mobile ,_token: _token},
    dataType: "json",
    success: function (data) {
      if(data.resendotp){
      	$('.lerror').text(data.resendotp);
      }
    },

  });
  alert(location);
});

*/