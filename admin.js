$("document").ready(function(){

    //Donor

    $("#donor").click(function(){
        $("#table1,.head1").css("display","block");
        $("#table2,.head2").css("display","none");
        $("#table3,.head3").css("display","none");
        $("#table4,.head4").css("display","none");
        $("#table5,.head5").css("display","none");
    });

    //donator

    $("#donator").click(function(){
        $("#table2,.head2").css("display","block");
        $("#table1,.head1").css("display","none");
        $("#table3,.head3").css("display","none");
        $("#table4,.head4").css("display","none");
        $("#table5,.head5").css("display","none");
    });

    //User

    $("#user").click(function(){
        $("#table3,.head3").css("display","block");
        $("#table1,.head1").css("display","none");
        $("#table2,.head2").css("display","none");
        $("#table4,.head4").css("display","none");
        $("#table5,.head5").css("display","none");
    });

    //Needer

    $("#needer").click(function(){
        $("#table4,.head4").css("display","block");
        $("#table1,.head1").css("display","none");
        $("#table2,.head2").css("display","none");
        $("#table3,.head3").css("display","none");
        $("#table5,.head5").css("display","none");
    });

    //Feedback
    $("#feed").click(function(){
        $("#table5,.head5").css("display","block");
        $("#table1,.head1").css("display","none");
        $("#table2,.head2").css("display","none");
        $("#table3,.head3").css("display","none");
        $("#table4,.head4").css("display","none");
    });
});