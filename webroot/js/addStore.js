var URL = 'http://localhost/parashote/'
function scaleSelectedStructure() {
    $('.custom-height').on('click', function () {
        $('.custom-height').removeClass('clicked-structure');
        $(this).addClass("clicked-structure");
        $('.previewSelected').attr('src',$(this).attr('src'))
        localStorage.setItem('structure-id', $(this).attr('structure-id'))
    })
}
scaleSelectedStructure();
$('#steps li').text(`✔`).css('color','transparent');
$('.step').css('color',"#fff")
$('#store-info,#finish').hide();
$('.addStructure').on('click',function(){
    $('aside,main').fadeOut(500);
    $('#store-info').fadeIn(600);
    $('#steps li:nth-child(2)').addClass('step');
    $('.step').css('color',"#fff")
})

$('.addStoreInfo').on('click',function(){
    
    $.ajax({
        url:'http://localhost/parashote/api/users/addusers.json',
        type:'POST',
        data:{
            username:$('#userName').val(),
            email:$('#userEmail').val(),
            phone:$('#userPhone').val(),
            password:$('#userPassword').val(),
            template_id:localStorage.getItem('structure-id'),
            name:$('#store-name').val()
        },
        accept:'application/json',
        success:function(result){
            console.log(result)
            $('#store-info').fadeOut(400);
            $('#finish').fadeIn(1000);
            $('#steps li:nth-child(3)').addClass('step');
            $('.step').css('color',"#fff");
            localStorage.removeItem('user-id')
            localStorage.setItem('user-id',result.adduser.id)
            localStorage.setItem('store-id',result.store.id);
            localStorage.setItem('store-setting-id',result.storesetting.id);
            localStorage.setItem('body-id',result.body.id);
            localStorage.setItem('header-id',result.header.id);
            localStorage.setItem('footer-id',result.footer.id);
            alert(localStorage.getItem('store-id'));
            alert(localStorage.getItem('store-setting-id'))
        }
    })
})

$('.dashboard').on('click',function(){
    window.open(URL+'users/dashboard','_self')
})

$('#store-name').on('keyup',function(){
    $('.store-name h4').text($(this).val())
})



