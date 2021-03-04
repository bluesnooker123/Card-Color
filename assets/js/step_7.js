var selected_card = null;
var selected_guidance_color = {};
var selected_guidance_color_id = {};
var guidance_color_count = 0;

$(document).ready(function(){

  $('.svg-img').hide();
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
    if(guidance_color_count < 2){
        swal("Please select a color for every card");
    }
    else{
      // console.log(JSON.stringify(selected_guidance_color));
      sessionStorage.setItem("selected_guidance_color", JSON.stringify(selected_guidance_color));
      sessionStorage.setItem("selected_guidance_color_id", JSON.stringify(selected_guidance_color_id));
      location.href="/step_8.php";
    }
  });

  $('.svg-img').click(function(event){
    selected_card = document.getElementById(event.currentTarget.id);
    $('#color_modal').modal();
  });

  $('.color-img').click(function(event){
    var selected_color = document.getElementById(event.currentTarget.id);
    // console.log(selected_color.alt);
    var temp = "background-image: url('../assets/image/SVG/" + selected_color.alt + ".svg')";

    if(selected_guidance_color[selected_card.id] == ''){
      guidance_color_count++;
    }
    selected_guidance_color[selected_card.id] = temp;
    var temp_id = selected_color.id;
    selected_guidance_color_id[selected_card.id] = temp_id;

    console.log(selected_guidance_color);
    console.log(selected_guidance_color_id);
    selected_card.setAttribute('style',temp);
    $('#color_modal').modal('hide');
    show_guidance_cards();
  });
  $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);

  init_array();
  show_guidance_cards();
  document.getElementById('div_next_btn').style.margin = "0% 0% 0% 70%";
});
function show_guidance_cards(){
  var guidance_card_id = sessionStorage.getItem('selected_guidance_cards').split(',');
  // console.log(guidance_card_id);
  // console.log(sessionStorage.getItem('guidance_count'));
  for(i=0; i < sessionStorage.getItem('guidance_count'); i ++){
    document.getElementById(guidance_card_id[i]).style.display='inline';
    document.getElementById(guidance_card_id[i]).style.width = '25%';
    document.getElementById(guidance_card_id[i]).style.margin = '10.1%';
  }
  document.getElementById('div_svg').style.paddingLeft = "10%";
}
function init_array(){
  var guidance_card_id = sessionStorage.getItem('selected_guidance_cards').split(',');
  for(i=0; i < sessionStorage.getItem('guidance_count'); i ++){
    selected_guidance_color[guidance_card_id[i]] = '';
    selected_guidance_color_id[guidance_card_id[i]] = '';
  }
  console.log(selected_guidance_color);
}
