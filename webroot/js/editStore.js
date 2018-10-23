var userId = localStorage.getItem('user-id'),
    storeId = localStorage.getItem('store-id'),
    storeSettingId = localStorage.getItem('store-setting-id'),
    headerId = localStorage.getItem('header-id'),
    bodyId = localStorage.getItem('body-id'),
    footerId = localStorage.getItem('footer-id');

function getDefaultDesgin() {
    $.ajax({
        url: `http://localhost/parashote/api/stores/gettemplatedata/${userId}.json`,
        type: 'GET',
        accept: 'application/json',
        success: function (result) {
            $('#screens').empty()
            console.log(result)
            // if(result.data[0].template.html){
            //     $('#screens').append(result.data[0].template.html)
            //     $('.mob-slider').slick({
            //         arrows: false,
            //         dots: true,
            //         slidesToShow: 1,
            //         slidesToScroll: 1,
            //         rtl: true,
            //         autoplay: true,
            //         autoplaySpeed: 3000,
            //     });
    
            //     $('.most-rated-items').slick({
            //         arrows: false,
            //         dots: false,
            //         slidesToShow: 3,
            //         slidesToScroll: 3,
            //         rtl: true
            //     });
            //     $('.categories3').slick({
            //         arrows: false,
            //         dots: false,
            //         infinite: false,
            //         slidesToShow: 3,
            //         slidesToScroll: 2,
            //         rtl: true
            //     });
            // }
            
        }
    })
    $.ajax({
        url: `http://localhost/parashote/api/stores/getalluserstoredata/${userId}.json`,
        type: 'GET',
        accept: 'application/json',
        success: function (result) {
            console.log(result)
            //header
            $('.mobile-header').css('background', result.data[0].storesettings[0].design.header.background)
            $('.favourite img').attr('src', `${result.data[0].storesettings[0].design.header.right_icon}`);
            $('.chat img').attr('src', `${result.data[0].storesettings[0].design.header.left_icon}`)
            $('.logo img').attr('src', `${result.data[0].storesettings[0].design.header.logo}`);
            //footer
            $('.mobile-footer').css('background', result.data[0].storesettings[0].design.footer.background);
            $('.icon-title span').css('color', result.data[0].storesettings[0].design.footer.font_color)
            $('.icon:first-child span').text(result.data[0].storesettings[0].design.footer.first_label);
            $('#homeIconLabel').val(result.data[0].storesettings[0].design.footer.first_label)
            $('.icon:first-child img').attr('src', result.data[0].storesettings[0].design.footer.first_icon);

            $('.icon:nth-child(2) span').text(result.data[0].storesettings[0].design.footer.second_label);
            $('#myOrdersIconLabel').val(result.data[0].storesettings[0].design.footer.second_label)
            $('.icon:nth-child(2) img').attr('src', result.data[0].storesettings[0].design.footer.second_icon);

            $('.icon:nth-child(3) span').text(result.data[0].storesettings[0].design.footer.third_label);
            $('#offersIconLabel').val(result.data[0].storesettings[0].design.footer.third_label)
            $('.icon:nth-child(3) img').attr('src', result.data[0].storesettings[0].design.footer.third_icon);

            $('.icon:nth-child(4) span').text(result.data[0].storesettings[0].design.footer.forth_label);
            $('#notificationsIconLabel').val(result.data[0].storesettings[0].design.footer.forth_label)
            $('.icon:nth-child(4) img').attr('src', result.data[0].storesettings[0].design.footer.forth_icon);

            $('.icon:nth-child(5) span').text(result.data[0].storesettings[0].design.footer.fifth_label);
            $('#moreIconLabel').val(result.data[0].storesettings[0].design.footer.fifth_label)
            $('.icon:nth-child(5) img').attr('src', result.data[0].storesettings[0].design.footer.fifth_icon);
            if (result.data[0].storesettings[0].design.footer.border === "false") {
                $('.icon').removeClass('border');
            } else {
                $('.icon').addClass('border');

            }
            if (result.data[0].storesettings[0].design.footer.shadow === "false") {
                $('.mobile-footer').removeClass('shadow');
            } else {
                $('.mobile-footer').addClass('shadow');
            }

            //body
            $('#title1').val(result.data[0].storesettings[0].design.body.first_label)
            $('#section-title-1').text(result.data[0].storesettings[0].design.body.first_label)
            $('#title2').val(result.data[0].storesettings[0].design.body.second_label)
            $('#section-title-2').text(result.data[0].storesettings[0].design.body.second_label)
            $('#title3').val(result.data[0].storesettings[0].design.body.third_label)
            $('#section-title-3').text(result.data[0].storesettings[0].design.body.third_label);

            $('.main').css('background', result.data[0].storesettings[0].design.body.background);
            $('.section-title span').css('color', result.data[0].storesettings[0].design.body.font_color);
            $('.category').css("background", result.data[0].storesettings[0].design.body.categorybackground);
            //store data
            $('#appName').val(result.data[0].name);
            $('#appDescription').val(result.data[0].description);
            $('#appCommericalRegisterNo').val(result.data[0].commercial_register_number);
            $('#appbranches').val(result.data[0].branches);
            $('#appBankAccount').val(result.data[0].bank_accounts);
            $('#appPhone').val(result.data[0].phone);
            $('#appPhoneAlternative').val(result.data[0].alternative_phone);
            $('#appWebsite').val(result.data[0].link);
            $('#appOpenStart').val(result.data[0].storesettings[0].open_time);
            $('#appOpenEnd').val(result.data[0].storesettings[0].close_time);
            $('.app-icon-preview img').attr('src', result.data[0].storesettings[0].logo);
            $('.app-commerical-register-preview img').attr('src', result.data[0].commercial_register_photo);
            $('#firstSplash').attr('src', result.data[0].storesettings[0].first_splash);
            $('#secondSplash').attr('src', result.data[0].storesettings[0].second_splash);
            $('#thirdSplash').attr('src', result.data[0].storesettings[0].third_splash);
            $('#fourthSplash').attr('src', result.data[0].storesettings[0].forth_splash);
            $('#visibility .ui-switcher').attr('aria-checked', result.data[0].visible);
            $('.ui-switcher').siblings('#payment-1').attr('aria-checked', result.data[0].visible);
            //fonts
            $(function () {
                $.ajax({
                    url: 'http://localhost/parashote/api/fonts/getallFonts.json',
                    type: 'GET',
                    accept: 'application/json',
                    success: function (results) {
                        for (var i = 0; i < results.data.length; i++) {
                            $('#appFont').append(`<option value="${results.data[i].fontname}">${results.data[i].fontname}</option>`)
                        }
                        $('#appFont').val(result.data[0].storesettings[0].font);
                    }
                })
            })
            //font
            $('.mobile-simualtion').children().css('font-family', result.data[0].storesettings[0].font);


            
            $('#storeMap').locationpicker(
                {
                    location: {
                        latitude: result.data[0].storesettings[0].latitude,
                        longitude: result.data[0].storesettings[0].longitude
                    },
                    locationName: "",
                    radius: 500,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [],
                    mapOptions: {},
                    scrollwheel: true,
                    inputBinding: {
                        latitudeInput: $('#latitude'),
                        longitudeInput: $('#longitude'),
                        radiusInput: null,
                        locationNameInput: $('#appLocation')
                    },
                    enableAutocomplete: true,
                    enableAutocompleteBlur: true,
                    autocompleteOptions: null,
                    addressFormat: 'postal_code',
                    enableReverseGeocode: true,
                    draggable: true,
                    onchanged: function (currentLocation, radius, isMarkerDropped) { },
                    onlocationnotfound: function (locationName) { },
                    oninitialized: function (component) { },
                    // must be undefined to use the default gMaps marker
                    markerIcon: undefined,
                    markerDraggable: true,
                    markerVisible: true
                }
            );
        }
    })
    $.ajax({
        url:`http://localhost/parashote/api/Productdesigns/getproduct/${storeSettingId}.json`,
        type:'GET',
        accept:'application/json',
        success:function(result){
            //$('.store-title span').css('color',result.data[0].header_color);
            //$('#storeTitleFontColor div').css('background',result.data[0].header_color)
            // $('.border-right,.border-right span,.border-left,.border-left span,#storeArowColor div').css('background',result.data[0].arrow_background);
            // $('.notification-msg span').css('color',result.data[0].cart_color_text);
            // $('#msgColorFont div').css('background',result.data[0].cart_color_text);
            // $('#msgColor div,#notification').css('background',result.data[0].cart_background);
            // $('#btnMsgColor div,.notification-button button').css('background',result.data[0].shipping_button_color);
            // $('#btnMsgColorFont div').css('background',result.data[0].shipping_text_color)
            // $('.notification-button button').css('color',result.data[0].shipping_text_color)
            // $('#productColor div,.product').css('background',result.data[0].ceil_background);
            // $('#productBorderColor div').css('background',result.data[0].bordercolor_ceil);
            // $('.product').css('border-color',result.data[0].bordercolor_ceil)
            // $('#btnAddColor div,.buy-btn button').css('background',result.data[0].add_cart_background_button);
            // $('#btnAddColorFont div').css('background',result.data[0].add_cart_color_button);
            // $('.buy-btn button').css('color',result.data[0].add_cart_color_button);
            // $('#freeShippingBackground div,.product-price-shipping span:last-child').css('background',result.data[0].free_shipping_background);
            // $('#freeShippingColor div').css('background',result.data[0].free_shipping_color);
            // $('.product-price-shipping span:last-child').css('color',result.data[0].free_shipping_color);
        }
    })
}

 getDefaultDesgin();
function homePage() {
    function scaleSelectedStructure() {
        $('.custom-height').on('click', function () {
            $('.custom-height').removeClass('clicked-structure');
            $(this).addClass("clicked-structure");
            localStorage.setItem('structure-id', $(this).attr('structure-id'))
            alert(localStorage.getItem('structure-id'))
            getTemplateStructure(localStorage.getItem('structure-id'));

            $.ajax({
                url: `http://localhost/parashote/api/Stores/edit/${storeId}.json`,
                type: 'post',
                data: {
                    template_id: localStorage.getItem('structure-id')
                },
                accept: 'application/json',
                success: function (result) {
                    //getDefaultDesgin();
                }

            })
        })
    }
    scaleSelectedStructure();

    function getTemplateStructure(templateId) {
        $.ajax({
            url: 'http://localhost/parashote/api/Templates/data/' + templateId + '.json',
            type: 'get',
            accept: 'application/json',
            success: function (result) {
                $('#screens').empty();
                $('#screens').append(result.data[0].html);
                $('.mob-slider').slick({
                    arrows: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    rtl: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                });
                $('.most-rated-items').slick({
                    arrows: false,
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    rtl: true
                });
                $('.categories3').slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    rtl: true
                });


            }
        })
    }

    function headerMobile() {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                if (input.id === "favourite") {
                    reader.onload = function (e) {
                        $('.favourite img').attr('src', e.target.result);
                        autoSaveHeader(localStorage.getItem('header-color'));
                    }
                } else if (input.id === "chatting") {
                    reader.onload = function (e) {
                        $('.chat img').attr('src', e.target.result);
                        autoSaveHeader(localStorage.getItem('header-color'));
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function autoSaveHeader(hex) {
            var formdata = new FormData();
            var fileRight = $("#favourite")[0].files[0],
                fileLeft = $("#chatting")[0].files[0],
                readerRight,
                readerLeft;
            if ($("#favourite").val() != '') {
                if (!!fileRight.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerRight = new FileReader();
                    readerRight.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerRight.readAsDataURL(fileRight);
                }
                if (formdata) {
                    formdata.append("right_icon", fileRight);
                }

            }
            if ($("#chatting").val() != '') {
                if (!!fileLeft.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerLeft = new FileReader();
                    readerLeft.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerLeft.readAsDataURL(fileLeft);
                }
                if (formdata) {
                    formdata.append("left_icon", fileLeft);
                }
            }
            formdata.append("background", '#' + hex);
            formdata.append("red", '#' + rgb);
            $.ajax({
                url: `http://localhost/parashote/api/header/editdata/${headerId}.json`,
                type: "post",
                data: formdata,
                accept: "application/json",
                processData: false,
                contentType: false,
                success: function (result) {
                    $('.saveMsg').remove();
                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                    setTimeout(function () {
                        $('.saveMsg').fadeOut()
                    }, 2000)
                }
            })
        }


        $('#favourite,#chatting').on('change', function () {
            readURL(this);
        })
        $('#headerColor').ColorPicker({
            color: '#67236c',
            onShow: function (colpkr) {
                $(colpkr).css({
                    "top": "274px",
                    "right": "335px"
                })
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveHeader(localStorage.getItem('header-color'), localStorage.getItem('header-color-rgb'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.mobile-header').css('background', '#' + hex);
                $('#headerColor div').css('background', '#' + hex);
                localStorage.setItem('header-color', hex);
                localStorage.setItem('header-color-rgb', rgb)
                //console.log(localStorage.getItem('header-color-rgb'))
            }
        });
    }
    headerMobile();

    function footerMobile() {


        $('#homeIconLabel').on('blur', function () {
            $('#icon-title-home').html($(this).val());
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));

        })
        $('#myOrdersIconLabel').on('blur', function () {
            $('#icon-title-myorder').html($(this).val());
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));

        })
        $('#offersIconLabel').on('blur', function () {
            $('#icon-title-offer').html($(this).val());
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));

        })
        $('#notificationsIconLabel').on('blur', function () {
            $('#icon-title-notification').html($(this).val());
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));

        })
        $('#moreIconLabel').on('blur', function () {
            $('#icon-title-more').html($(this).val());
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));

        })


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                if (input.id === "homeIcon") {
                    reader.onload = function (e) {
                        $('#icon-img-home').attr('src', e.target.result);
                        autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                    }
                } else if (input.id === "myOrdersIcon") {
                    reader.onload = function (e) {
                        $('#icon-img-myorder').attr('src', e.target.result);
                        autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                    }
                } else if (input.id === "offersIcon") {
                    reader.onload = function (e) {
                        $('#icon-img-offer').attr('src', e.target.result);
                        autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                    }
                } else if (input.id === "notificationsIcon") {
                    reader.onload = function (e) {
                        $('#icon-img-notification').attr('src', e.target.result);
                        autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                    }
                } else if (input.id === "moreIcon") {
                    reader.onload = function (e) {
                        $('#icon-img-more').attr('src', e.target.result);
                        autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#inlineCheckbox1').on('change', function () {
            var value = $('#border .ui-switcher ').attr('aria-checked');

            if (value == 'true') {
                $('.icon').addClass('border');
            } else {
                $('.icon').removeClass('border');
            }
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
        })
        $('#inlineCheckbox2').on('change', function () {
            var value = $('#shadow .ui-switcher ').attr('aria-checked');
            if (value == 'true') {
                $('.mobile-footer').addClass('shadow');
            } else {
                $('.mobile-footer').removeClass('shadow');
            }
            autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
        })

        $(`
        #homeIcon,
        #myOrdersIcon,
        #offersIcon,
        #notificationsIcon,
        #moreIcon`).on('change', function () {
                readURL(this);
            })
        function autoSaveFooter(background, color) {
            var footerdata = new FormData();
            var fileFirst = $("#homeIcon")[0].files[0],
                fileSecond = $("#myOrdersIcon")[0].files[0],
                fileThird = $("#offersIcon")[0].files[0],
                fileFourth = $("#notificationsIcon")[0].files[0],
                fileFifth = $("#moreIcon")[0].files[0],
                readerFirst,
                readerSecond,
                readerThird,
                readerFourth,
                readerFifth;
            if ($("#homeIcon").val() != '') {
                if (!!fileFirst.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerFirst = new FileReader();
                    readerFirst.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerFirst.readAsDataURL(fileFirst);
                }
                if (footerdata) {
                    footerdata.append("first_icon", fileFirst);
                }

            }
            if ($("#myOrdersIcon").val() != '') {
                if (!!fileSecond.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerSecond = new FileReader();
                    readerSecond.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerSecond.readAsDataURL(fileSecond);
                }
                if (footerdata) {
                    footerdata.append("second_icon", fileSecond);
                }
            }
            if ($("#offersIcon").val() != '') {
                if (!!fileThird.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerThird = new FileReader();
                    readerThird.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerThird.readAsDataURL(fileThird);
                }
                if (footerdata) {
                    footerdata.append("third_icon", fileThird);
                }
            }
            if ($("#notificationsIcon").val() != '') {
                if (!!fileFourth.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerFourth = new FileReader();
                    readerFourth.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerFourth.readAsDataURL(fileFourth);
                }
                if (footerdata) {
                    footerdata.append("forth_icon", fileFourth);
                }
            }
            if ($("#moreIcon").val() != '') {
                if (!!fileFifth.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerFifth = new FileReader();
                    readerFifth.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerFifth.readAsDataURL(fileFifth);
                }
                if (footerdata) {
                    footerdata.append("fifth_icon", fileFifth);
                }
            }

            footerdata.append("background", '#' + background);
            footerdata.append("border", $('#border .ui-switcher ').attr('aria-checked'));
            footerdata.append("shadow", $('#shadow .ui-switcher ').attr('aria-checked'));
            footerdata.append("first_label", $('#homeIconLabel').val());
            footerdata.append("second_label", $('#myOrdersIconLabel').val());
            footerdata.append("third_label", $('#offersIconLabel').val());
            footerdata.append("fourth_label", $('#notificationsIconLabel').val());
            footerdata.append("fifth_label", $('#moreIconLabel').val());
            footerdata.append("font_color", '#' + color);
            $.ajax({
                url: `http://localhost/parashote/api/footer/editdata/${footerId}.json`,
                type: "post",
                data: footerdata,
                accept: "application/json",
                processData: false,
                contentType: false,
                success: function (result) {
                    $('.saveMsg').remove();
                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                    setTimeout(function () {
                        $('.saveMsg').fadeOut()
                    }, 2000)
                }
            })

        }

        $('#footerColor').ColorPicker({
            color: '#ffffff',
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                $(colpkr).css({
                    "top": "518px",
                    "right": "335px"
                })
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.mobile-footer').css('background', '#' + hex);
                $('#footerColor div').css('background', '#' + hex);
                localStorage.setItem('footer-color', hex);

            }
        });
        $('#fontFooterColor').ColorPicker({
            color: '#333333',
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                $(colpkr).css({
                    "top": "568px",
                    "right": "335px"
                })
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveFooter(localStorage.getItem('footer-color'), localStorage.getItem('font-footer-color'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.icon-title span').css('color', '#' + hex);
                $('#fontFooterColor div').css('background', '#' + hex);
                localStorage.setItem('font-footer-color', hex);

            }
        });

    }
    footerMobile();

    function bodyMobile() {
        $('#bodyColor').ColorPicker({
            color: '#e6eaed',
            onShow: function (colpkr) {

                $(colpkr).css({
                    "top": "274px",
                    "right": "335px"
                })
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.mobile-main .main').css('background', '#' + hex);
                $('#bodyColor div').css('background', '#' + hex);
                localStorage.setItem('body-color', hex);
            }
        });
        $('#bodyFontColor').ColorPicker({
            color: '#333333',
            onShow: function (colpkr) {
                $(colpkr).css({
                    "top": "336px",
                    "right": "335px"
                })

                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.mobile-main .main').css('color', '#' + hex);
                $('#bodyFontColor div').css('background', '#' + hex);
                localStorage.setItem('body-font-color', hex);

            }
        });
        $('#categoryColor').ColorPicker({
            color: '#fff',
            onShow: function (colpkr) {
                $(colpkr).css({
                    "top": "584px",
                    "right": "335px"
                })
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('.category').css('background', '#' + hex);
                $('#categoryColor div').css('background', '#' + hex);
                localStorage.setItem('category-color', hex);

            }
        });
        $('#title1').on('blur', function () {
            $('#section-title-1').html($(this).val());
            autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
        });
        $('#title2').on('blur', function () {
            $('#section-title-2').html($(this).val());
            autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
        })
        $('#title3').on('blur', function () {
            $('#section-title-3').html($(this).val());
            autoSaveBody(localStorage.getItem('body-color'), localStorage.getItem('category-color'), localStorage.getItem('body-font-color'));
        })

        function autoSaveBody(body, category, color) {
            var bodyData = {
                background: '#' + body,
                first_label: $('#title1').val(),
                second_label: $('#title2').val(),
                third_label: $('#title3').val(),
                categorybackground: '#' + category,
                font_color: '#' + color
            }

            $.ajax({
                url: `http://localhost/parashote/api/body/editbody/${bodyId}.json`,
                type: "post",
                data: bodyData,
                accept: "application/json",
                success: function (result) {
                    ;
                    $('.saveMsg').remove();
                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                    setTimeout(function () {
                        $('.saveMsg').fadeOut()
                    }, 2000)
                }
            })
        }
    }
    bodyMobile();

    function editStore() {
        function getPaymentMethods() {
            $.ajax({
                url: 'http://localhost/parashote/api/Payments/getallpayment.json',
                type: 'GET',
                accept: 'application/json',
                success: function (result) {
                    for (var i = 0; i < result.data.length; i++) {
                        $('#paymentMethods').append(
                            `<div class="checkbox row">
                            <label class="col-xs-2"> ${result.data[i].name}</label>
                            <input type="checkbox" value="1" class="col-xs-4" id="payment-${parseInt(i + 1)}" payment-id="${result.data[i].id}">
                        </div>`);
                        $('#payment-' + parseInt(i + 1)).on('change', function () {
                            $.ajax({
                                url: 'http://localhost/parashote/api/Paymentstores/add.json',
                                type: "POST",
                                data: {
                                    payment_id: $(this).attr('payment-id'),
                                    store_id: storeId
                                },
                                accept: 'application/json',
                                success: function (result) {
                                    $('.saveMsg').remove();
                                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                                    setTimeout(function () {
                                        $('.saveMsg').fadeOut()
                                    }, 2000)
                                }
                            })
                        })
                    }
                    $.switcher();



                }
            })
        }
        getPaymentMethods()

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var img = new Image();
                if (input.id === "appIcon") {
                    reader.onload = function (e) {
                        $('.app-icon-preview img').attr('src', e.target.result);
                    }
                } else if (input.id === "appCommericalRegisterImg") {
                    reader.onload = function (e) {
                        $('.app-commerical-register-preview img').attr('src', e.target.result);
                    }
                } else if (input.id === "splashOne") {
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.onload = function () {
                            if (this.width === 640 && this.height === 960) {
                                alert(`width=  ${this.width}  height= ${this.height}`);
                                $('#firstSplash').attr('src', e.target.result);
                                autoSaveStore()
                            } else {
                                alert("width & height Must 640x960");
                            }
                        }
                    }
                } else if (input.id === "splashTwo") {
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.onload = function () {
                            if (this.width === 1242 && this.height === 2208) {
                                alert("width=" + this.width + " height=" + this.height);
                                $('#secondSplash').attr('src', e.target.result);
                                autoSaveStore()
                            } else {
                                alert("width & height Must 1242x2208");
                            }
                        }

                    }
                } else if (input.id === "splashThree") {
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.onload = function () {
                            if (this.width === 1536 && this.height === 2048) {
                                alert("width=" + this.width + " height=" + this.height);
                                $('#thirdSplash').attr('src', e.target.result);
                                autoSaveStore()
                            } else {
                                alert("width & height Must 1536x2048");
                            }
                        }
                    }
                } else if (input.id === "splashFour") {
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.onload = function () {
                            if (this.width === 1600 && this.height === 2560) {
                                alert("width=" + this.width + " height=" + this.height);
                                $('#fourthSplash').attr('src', e.target.result);
                                autoSaveStore()
                            } else {
                                alert("width & height Must 1600x2560");
                            }
                        }
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#firstSplash').on('click', function () {
            $('#splashOne').click();
        })
        $('#splashOne,#splashTwo,#splashThree,#splashFour').on('change', function () {
            readURL(this)
        })

        $('#secondSplash').on('click', function () {
            $('#splashTwo').click();
        })
        $('#thirdSplash').on('click', function () {
            $('#splashThree').click();
        })

        $('#fourthSplash').on('click', function () {
            $('#splashFour').click();
        })


        $('#appFont').on('change', function () {
            $('.mobile-simualtion').children().css('font-family', $('#appFont option:selected').text());
            autoSaveStore();
        })

        //auto save store edit
        function autoSaveStore() {
            var storeSettingData = new FormData(),
                storeData = new FormData();

            //Store Data
            var fileCommerical = $("#appCommericalRegisterImg")[0].files[0],
                readerCommerical;
            //Store Setting Data 
            var fileLogo = $("#appIcon")[0].files[0],
                fileFirstSplash = $("#splashOne")[0].files[0],
                fileSecondSplash = $("#splashTwo")[0].files[0],
                fileThirdSplash = $("#splashThree")[0].files[0],
                fileFourthSplash = $("#splashFour")[0].files[0],
                readerLogo,
                readerFirstSplash,
                readerSecondSplash,
                readerThirdSplash,
                readerFourthSplash;
            if ($("#appIcon").val() != '') {
                if (!!fileLogo.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerLogo = new FileReader();
                    readerLogo.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerLogo.readAsDataURL(fileLogo);
                }
                if (storeSettingData) {
                    storeSettingData.append("logo", fileLogo);
                }

            }
            if ($("#splashOne").val() != '') {
                if (!!fileFirstSplash.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerFirstSplash = new FileReader();
                    readerFirstSplash.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerFirstSplash.readAsDataURL(fileFirstSplash);
                }
                if (storeSettingData) {
                    storeSettingData.append("first_splash", fileFirstSplash);
                }
            }
            if ($("#splashTwo").val() != '') {
                if (!!fileSecondSplash.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerSecondSplash = new FileReader();
                    readerSecondSplash.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerSecondSplash.readAsDataURL(fileSecondSplash);
                }
                if (storeSettingData) {
                    storeSettingData.append("second_splash", fileSecondSplash);
                }
            }
            if ($("#splashThree").val() != '') {
                if (!!fileThirdSplash.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerThirdSplash = new FileReader();
                    readerThirdSplash.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerThirdSplash.readAsDataURL(fileThirdSplash);
                }
                if (storeSettingData) {
                    storeSettingData.append("third_splash", fileThirdSplash);
                }
            }
            if ($("#splashFour").val() != '') {
                if (!!fileFourthSplash.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerFourthSplash = new FileReader();
                    readerFourthSplash.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerFourthSplash.readAsDataURL(fileFourthSplash);
                }
                if (storeSettingData) {
                    storeSettingData.append("forth_splash", fileFourthSplash);
                }
            }
            if ($('#appCommericalRegisterImg').val() != '') {
                if (!!fileCommerical.type.match(/image.*/)) {

                }
                if (window.FileReader) {
                    readerCommerical = new FileReader();
                    readerCommerical.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    readerCommerical.readAsDataURL(fileCommerical);
                }
                if (storeData) {
                    storeData.append("commercial_register_photo", fileCommerical);
                }
            }
            //Setting 
            //storeSettingData.append("payment_id", );
            storeSettingData.append("open_time", $('#appOpenStart').val());
            storeSettingData.append("close_time", $('#appOpenEnd').val());
            storeSettingData.append("longitude", $('#longitude').val());
            storeSettingData.append("latitude", $('#latitude').val());
            storeSettingData.append('address', $('#appLocation').val());
            storeSettingData.append('font', $('#appFont option:selected').text())
            //Store
            storeData.append("description", $('#appDescription').val());
            storeData.append("name", $('#appName').val());
            storeData.append("commercial_register_number", $('#appCommericalRegisterNo').val());
            storeData.append("branches", $('#appbranches').val());
            storeData.append("bank_accounts", $('#appBankAccount').val());
            storeData.append("visible", $('#visibility .ui-switcher').attr('aria-checked'));
            storeData.append("phone", $('#appPhone').val());
            storeData.append("alternative_phone", $('#appPhoneAlternative').val());
            storeData.append("link", $('#appWebsite').val());
            storeData.append("city_id", $('#appCity option:selected').attr("city-id"));
            console.log($('#appFont option:selected').text())
            $.ajax({
                url: 'http://localhost/parashote/api/Stores/edit/' + storeId + '.json',
                type: 'POST',
                data: storeData,
                accept: 'application/json',
                processData: false,
                contentType: false,
                success: function (result) {

                    $('.saveMsg').remove();
                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                    setTimeout(function () {
                        $('.saveMsg').fadeOut()
                    }, 2000)
                }
            });
            $.ajax({
                url: 'http://localhost/parashote/api/Storesettings/edit/' + storeSettingId + '.json',
                type: 'POST',
                data: storeSettingData,
                accept: 'application/json',
                processData: false,
                contentType: false,
                success: function (result) {

                    $('.saveMsg').remove();
                    $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
                    setTimeout(function () {
                        $('.saveMsg').fadeOut()
                    }, 2000)
                }
            });

        }
        //edit store name
        $(`
        #appName,
        #appBankAccount,
        #appDescription,
        #appCommericalRegisterNo,
        #appbranches,
        appBankAccount,
        #appPhone,
        #appPhoneAlternative,
        #appWebsite`).on('blur', function () {
                autoSaveStore();
            });
        $(`
        #visibility,
        #appCity,
        #appOpenStart,
        #appOpenEnd,
        #latitude,
        #longitude`).on('change', function () {
                autoSaveStore();
            });
        $('#appIcon,#appCommericalRegisterImg,#loadingAppIcon').on('change', function () {
            readURL(this);
            autoSaveStore()
        })
    }

    editStore();
}

homePage();

// function productPage() {
//     // function getTemplate(storeId) {
//     //     $.ajax({
//     //         url: `http://localhost/parashote/api/Stores/getallstoredesigndata/${storeId}.json`,
//     //         type: 'GET',
//     //         content: 'application/json',
//     //         success: function (result) {
//     //             //header
//     //             $('.mobile-header').css('background', result.data[0].design.header.background);
//     //             $('.favourite img').attr('src', `http://192.168.1.8:8080/parashote/library/headerrighticon/${result.data[0].design.header.right_icon}`);
//     //             $('.chat img').attr('src', `http://192.168.1.8:8080/parashote/library/headerlefticon/${result.data[0].design.header.left_icon}`)
//     //             //$('.logo img').attr('src', `http://192.168.1.8:8080/parashote/library/storesettinglogo/${result.data[0].storesettings[0].logo}`)
//     //             //footer
//     //             $('.mobile-footer').css('background', result.data[0].design.footer.background);
//     //             $('#icon-title-home').text(result.data[0].design.footer.first_label);
//     //             $('#icon-img-home').attr('src', `http://192.168.1.8:8080/parashote/library/footerfirsticon/${result.data[0].design.footer.first_icon}`);
//     //             $('#icon-title-myorder').text(result.data[0].design.footer.second_label);
//     //             $('#icon-img-myorder').attr('src', `http://192.168.1.8:8080/parashote/library/footersecondicon/${result.data[0].design.footer.second_icon}`);
//     //             $('#icon-title-offer').text(result.data[0].design.footer.third_label);
//     //             $('#icon-img-offer').attr('src', `http://192.168.1.8:8080/parashote/library/footerthirdicon/${result.data[0].design.footer.third_icon}`);
//     //             $('#icon-title-notification').text(result.data[0].design.footer.forth_label);
//     //             $('#icon-img-notification').attr('src', `http://192.168.1.8:8080/parashote/library/footerforthicon/${result.data[0].design.footer.forth_icon}`);
//     //             $('#icon-title-more').text(result.data[0].design.footer.fifth_label);
//     //             $('#icon-img-more').attr('src', `http://192.168.1.8:8080/parashote/library/footerfifthicon/${result.data[0].design.footer.fifth_icon}`);
//     //             if (result.data[0].design.footer.border === "false") {
//     //                 $('.icon').removeClass('border');
//     //             } else {
//     //                 $('.icon').addClass('border');

//     //             }
//     //             if (result.data[0].design.footer.shadow === "false") {
//     //                 $('.mobile-footer').removeClass('shadow');
//     //             } else {
//     //                 $('.mobile-footer').addClass('shadow');
//     //             }
//     //         }
//     //     })
//     // }
//     // getTemplate(1)
//     function scaleSelectedProductStructure() {
//         $('.custom-height').on('click', function () {
//             $('.custom-height').removeClass('clicked-structure');
//             $(this).addClass("clicked-structure");
//             localStorage.setItem('product-structure-id', $(this).attr('product-structure-id'))
//             getProductTemplateStructure(localStorage.getItem('product-structure-id'))
//         })
//     }
//     scaleSelectedProductStructure();
//     function getProductTemplateStructure(temp_id) {
//         $.ajax({
//             url: 'http://localhost/parashote/api/Productdesigns/getproducttemplatedata/' + temp_id + '.json',
//             type: 'GET',
//             accept: 'application/json',
//             success: function (result) {
//                 $('#screens').empty();
//                 $('#screens').append(result.data[0].product_template_id);
//                 $('.productimgList').slick({
//                     arrows: true,
//                     dots: false,
//                     slidesToShow: 1,
//                     slidesToScroll: 1,
//                     rtl: true,
//                     autoplay: true,
//                     autoplaySpeed: 3000,
//                     prevArrow: '<i class="fa fa-chevron-right"></i>',
//                     nextArrow: '<i class="fa fa-chevron-left"></i>',
//                 });
//                 getDefaultDesgin();
//             }
//         })
//     }
//     function autoSaveProductBody(
//         title,
//         fontColor,
//         arrowColor,
//         cartBackground,
//         cartColor,
//         msgBtnBackground,
//         msgBtnColor,
//         productBackground,
//         border,
//         addCartBackground,
//         addCartColor,
//         freeShippingBackground,
//         freeShippingColor
//     ) {
//         $.ajax({
//             url: 'http://localhost/parashote/api/productdesigns/edit/' + localStorage.getItem('product-structure-id') + '.json',
//             type: 'POST',
//             data: {
//                 header_color: '#' + title,
//                 fontcolor: '#' + fontColor,
//                 arrow_background: '#' + arrowColor,
//                 cart_background: '#' + cartBackground,
//                 cart_color_text: '#' + cartColor,
//                 shipping_text_color: '#' + msgBtnColor,
//                 shipping_button_color: '#' + msgBtnBackground,
//                 ceil_background: '#' + productBackground,
//                 bordercolor_ceil: '#' + border,

//                 add_cart_background_button: '#' + addCartBackground,
//                 add_cart_color_button: '#' + addCartColor,
//                 free_shipping_background: '#' + freeShippingBackground,
//                 free_shipping_color: '#' + freeShippingColor

//             },
//             accept: 'application/json',
//             success: function (result) {
//                 $('.saveMsg').remove();
//                 $('.publish').after('<div class="saveMsg">تم الحفظ ...</div>')
//                 setTimeout(function () {
//                     $('.saveMsg').fadeOut()
//                 }, 2000)
//             }
//         })
//     }
//     function productbody() {
//         $('#storeTitleFontColor').ColorPicker({
//             color: '#333',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "274px",
//                     "right": "240px"
//                 })

//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.store-title span').css('color', '#' + hex);
//                 $('#storeTitleFontColor div').css('background', '#' + hex);
//                 localStorage.setItem('title-color', hex);

//             }
//         });

//         $('#storeFontColor').ColorPicker({
//             color: '#333',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "274px",
//                     "right": "463px"
//                 })

//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.product').css('color', '#' + hex);
//                 $('#storeFontColor div').css('background', '#' + hex);
//                 localStorage.setItem('font-color', hex);

//             }
//         });
//         $('#storeArowColor').ColorPicker({
//             color: '#830157',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "312px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.border-right,.border-right span,.border-left,.border-left span').css('background', '#' + hex);
//                 $('#storeArowColor div').css('background', '#' + hex);
//                 localStorage.setItem('arrow-color', hex);

//             }
//         });
//         $('#msgColor').ColorPicker({
//             color: '#ffffff',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "312px",
//                     "right": "463px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('#notification').css('background', '#' + hex);
//                 $('#msgColor div').css('background', '#' + hex);
//                 localStorage.setItem('msg-color', hex);

//             }
//         });
//         $('#msgColorFont').ColorPicker({
//             color: '#b77f93',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "372px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.notification-msg span').css('color', '#' + hex);
//                 $('#msgColorFont div').css('background', '#' + hex);
//                 localStorage.setItem('msg-font-color', hex);

//             }
//         });
//         $('#btnMsgColor').ColorPicker({
//             color: '#ec466a',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "372px",
//                     "right": "463px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.notification-button button').css('background', '#' + hex);
//                 $('#btnMsgColor div').css('background', '#' + hex);
//                 localStorage.setItem('msg-button-background', hex);

//             }
//         });
//         $('#btnMsgColorFont').ColorPicker({
//             color: '#ffffff',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "422px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.notification-button button').css('color', '#' + hex);
//                 $('#btnMsgColorFont div').css('background', '#' + hex);
//                 localStorage.setItem('msg-button-color', hex);

//             }
//         });
//         $('#productColor').ColorPicker({
//             color: '#ffffff',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "422px",
//                     "right": "463px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.product').css('background', '#' + hex);
//                 $('#productColor div').css('background', '#' + hex);
//                 localStorage.setItem('product-background', hex);

//             }
//         });
//         $('#productBorderColor').ColorPicker({
//             color: '#aaa',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "471px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.product').css('border-color', '#' + hex);
//                 $('#productBorderColor div').css('background', '#' + hex);
//                 localStorage.setItem('product-border-color', hex);

//             }
//         });
//         $('#btnAddColor').ColorPicker({
//             color: '#ec466a',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "471px",
//                     "right": "463px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.buy-btn button').css('background', '#' + hex);
//                 $('#btnAddColor div').css('background', '#' + hex);
//                 localStorage.setItem('add-btn-background', hex);

//             }
//         });
//         $('#btnAddColorFont').ColorPicker({
//             color: '#aaa',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "533px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.buy-btn button').css('color', '#' + hex);
//                 $('#btnAddColorFont div').css('background', '#' + hex);
//                 localStorage.setItem('add-btn-color', hex);

//             }
//         });
//         $('#freeShippingBackground').ColorPicker({
//             color: '#f5c914',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "533px",
//                     "right": "463px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.product-price-shipping span:last-child').css('background', '#' + hex);
//                 $('#freeShippingBackground div').css('background', '#' + hex);
//                 localStorage.setItem('free-shipping-background', hex);

//             }
//         });
//         $('#freeShippingColor').ColorPicker({
//             color: '#333',
//             onShow: function (colpkr) {
//                 $(colpkr).css({
//                     "top": "594px",
//                     "right": "240px"
//                 })
//                 $(colpkr).fadeIn(500);
//                 return false;
//             },
//             onHide: function (colpkr) {
//                 $(colpkr).fadeOut(500);
//                 autoSaveProductBody(
//                     localStorage.getItem('title-color'),
//                     localStorage.getItem('font-color'),
//                     localStorage.getItem('arrow-color'),
//                     localStorage.getItem('msg-color'),
//                     localStorage.getItem('msg-font-color'),
//                     localStorage.getItem('msg-button-background'),
//                     localStorage.getItem('msg-button-color'),
//                     localStorage.getItem('product-background'),
//                     localStorage.getItem('product-border-color'),
//                     localStorage.getItem('add-btn-background'),
//                     localStorage.getItem('add-btn-color'),
//                     localStorage.getItem('free-shipping-background'),
//                     localStorage.getItem('free-shipping-color')
//                 );
//                 return false;
//             },
//             onChange: function (hsb, hex, rgb) {
//                 $('.product-price-shipping span:last-child').css('color', '#' + hex);
//                 $('#freeShippingColor div').css('background', '#' + hex);
//                 localStorage.setItem('free-shipping-color', hex);

//             }
//         });

//     }
//     productbody()
// }
// productPage();

// function menuPage(){
//     $.ajax({
//         url:`http://localhost/parashote/api/Templates/data/.json`,
//         type:'GET',
//         accept:'application/json',
//         success:function(){

//         }
//     })
    
// }
// menuPage()