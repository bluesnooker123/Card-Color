var selected_card = null;
var selected_attract_color = {};
var selected_attract_color_id = {};
var attract_color_count = 0;

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
    if(attract_color_count < 6){
        swal("Please select a color for every card");
    }
    else{
      sessionStorage.setItem("selected_attract_color", JSON.stringify(selected_attract_color));
      sessionStorage.setItem("selected_attract_color_id", JSON.stringify(selected_attract_color_id));
      location.href="/step_5.php";
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

    if(selected_attract_color[selected_card.id] == ''){
      attract_color_count++;
    }
    selected_attract_color[selected_card.id] = temp;
    var temp_id = selected_color.id;
    selected_attract_color_id[selected_card.id] = temp_id;

    console.log(selected_attract_color);
    console.log(selected_attract_color_id);
    selected_card.setAttribute('style',temp);
    $('#color_modal').modal('hide');
    show_attract_cards();
  });
  $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
  document.getElementById('div_guide_text').style.margin = "10% 0% 0% 0%";


  init_array();
  show_attract_cards();
  document.getElementById('div_next_btn').style.margin = "0% 0% 0% 70%";
});
function show_attract_cards(){
  var attract_card_id = sessionStorage.getItem('selected_attract_cards').split(',');
  // console.log(attract_card_id);
  // console.log(sessionStorage.getItem('attract_count'));
  for(i=0; i < sessionStorage.getItem('attract_count'); i ++){
    document.getElementById(attract_card_id[i]).style.display='inline';
    document.getElementById(attract_card_id[i]).style.width = '13%';
    document.getElementById(attract_card_id[i]).style.margin = '1.5%';
  }
}
function init_array(){
  var attract_card_id = sessionStorage.getItem('selected_attract_cards').split(',');
  for(i=0; i < sessionStorage.getItem('attract_count'); i ++){
    selected_attract_color[attract_card_id[i]] = '';
    selected_attract_color_id[attract_card_id[i]] = '';
  }
  console.log(selected_attract_color);
}
