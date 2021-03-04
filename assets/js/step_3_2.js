var guidance_count = 0;
var selected_guidance_cards = [];

$(document).ready(function(){
    $('#btn_goto_firstpage').click(function(){
        console.log("btn_goto_firstpage clicked");
        swal({
            title: "Are you sure?",
            text: "Once backed, You have to input new code.\nContinue to back?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willgoBack) => {
            if (willgoBack) {
                location.href = "/"
            } 
          });
    });

    $('#btn_next').click(function(){
        location.href="/step_4.php";
    });
//    $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
    document.getElementById('div_guide_text').style.margin = "20% 0% 0% 0%";
    document.getElementById('div_guide_text').style.fontSize = "1.5em";
    document.getElementById('div_next_btn').style.margin = "0% 0% 0% 70%";
});
