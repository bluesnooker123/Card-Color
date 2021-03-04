var selected_card = null;
var selected_remedy_color = {};
var selected_remedy_color_id = {};

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
      // console.log(JSON.stringify(selected_reject_color));
      sessionStorage.setItem("selected_remedy_color", JSON.stringify(selected_remedy_color));
      sessionStorage.setItem("selected_remedy_color_id", JSON.stringify(selected_remedy_color_id));
      location.href="/step_7.php";
  });

  $('.svg-img').click(function(event){
    selected_card = document.getElementById(event.currentTarget.id);
    $('#color_modal').modal();
  });

  $('.color-img').click(function(event){
    var selected_color = document.getElementById(event.currentTarget.id);
    // console.log(selected_color.alt);
    var temp = "background-image: url('../assets/image/SVG/" + selected_color.alt + ".svg')";

    selected_remedy_color[selected_card.id] = temp;
    var temp_id = selected_color.id;
    selected_remedy_color_id[selected_card.id] = temp_id;

    console.log(selected_remedy_color);
    selected_card.setAttribute('style',temp);
    $('#color_modal').modal('hide');
    show_remedy_cards();
  });
  $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);

  init_array();
  show_remedy_cards();
  document.getElementById('div_next_btn').style.margin = "0% 0% 0% 70%";
});
function show_remedy_cards(){
  var reject_card_id = sessionStorage.getItem('selected_reject_cards').split(',');
  // console.log(reject_card_id);
  // console.log(sessionStorage.getItem('reject_count'));
  for(i=0; i < sessionStorage.getItem('reject_count'); i ++){
    document.getElementById(reject_card_id[i]).setAttribute('style',selected_remedy_color[reject_card_id[i]]);
    document.getElementById(reject_card_id[i]).style.display='inline';
    document.getElementById(reject_card_id[i]).style.width = '25%';
    document.getElementById(reject_card_id[i]).style.margin = '10.1%';
  }
  document.getElementById('div_svg').style.paddingLeft = "10%";
}
function init_array(){
  var reject_card_id = sessionStorage.getItem('selected_reject_cards').split(',');
  var selected_reject_color = JSON.parse(sessionStorage.getItem('selected_reject_color'));
  var selected_reject_color_id = JSON.parse(sessionStorage.getItem('selected_reject_color_id'));
  // console.log(selected_reject_color);
  // console.log(sessionStorage.getItem('selected_reject_color'));
  for(i=0; i < sessionStorage.getItem('reject_count'); i ++){
    selected_remedy_color[reject_card_id[i]] = selected_reject_color[reject_card_id[i]];
    selected_remedy_color_id[reject_card_id[i]] = selected_reject_color_id[reject_card_id[i]];
  }
  console.log(selected_remedy_color);
}
