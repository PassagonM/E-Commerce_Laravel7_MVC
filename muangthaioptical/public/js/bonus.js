$(document).ready(function(){
    $('.deleteForm').click(function(evt){
        var customer_name=$(this).data("customer_name");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title: `คุณต้องการจะลบข้อมูลของ ${customer_name} หรือไม่`,
            text: "หากลบแล้วไม่สามารถนำกลับมาได้",
            icon:"warning",
            buttons:true,
            dangerMode:true

        }).then((willDelete)=>{
            if(willDelete){
                form.submit();
            }
        });
    });

    $('.deleteorder').click(function(evt){
        var customer_name=$(this).data("customer_name");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title: `คุณต้องการจะลบข้อมูลของ ${customer_name} หรือไม่`,
            text: "หากลบแล้วไม่สามารถนำกลับมาได้",
            icon:"warning",
            buttons:true,
            dangerMode:true

        }).then((willDelete)=>{
            if(willDelete){
                form.submit();
            }
        });
    });

    $('.loginForm').click(function(evt){
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title: "คุณต้องการเข้าสู่ระบบ",
            icon:"success",
            buttons:["ยกเลิก", "ตกลง"],

        }).then((willgologin)=>{
            if(willgologin){
                swal("ยินดีต้นรับเข้าสู่ระบบ", {
                    icon: "success",
                  });
                form.submit();
            }
        });
    });

    $('.checkaddressForm').click(function(evt){
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title: "กรุณาเพิ่มที่อยู่ของท่าน",
            icon:"warning",
            buttons:"ฉันเข้าใจแล้ว",

        });
    });

});
