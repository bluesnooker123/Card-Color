var reject_count = 0;
var selected_reject_cards = [];

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
    $( ".svg-img" ).draggable({
      drag: function(event, ui){
        // console.log("reject_count: " + reject_count);
      },
      revert: "invalid"
    });
    $( "#div_selected_reject_card" ).droppable({
      accept(draggable){
        // console.log("accept: " + draggable.context.id);
        if(check_is_selected(draggable.context.id) == true){
          return true;
        }
        else{
          if(reject_count >= 2){
            swal("You've already selected 2 cards. If you would like to choose this one, please put one back");
            $(".svg-img").draggable({ revert: true });
            return false;
          }
          else{
            return true;
          }
        }
      },
      drop: function( event, ui ) {
        var svg_item = document.getElementById(ui.draggable.context.id);
        if(check_is_selected(svg_item.id) == false){
          selected_reject_cards.push(svg_item.id);
          reject_count++;  
        } 
        else{
          $(".svg-img").draggable({ revert: "invalid" });
        }
        $(".svg-img").draggable({ revert: "invalid" });
      }
    });
    $('#div_svg').droppable({
      accept(draggable){
        $(".svg-img").draggable({ revert: "invalid" });
        return true;
      },
      drop: function(event, ui){
        var del_index = selected_reject_cards.indexOf(ui.draggable.context.id);
        if(del_index > -1){
            selected_reject_cards.splice(del_index,1);                
            reject_count--;
        }
        // console.log(selected_reject_cards);
      }
    });

    $('#btn_next').click(function(){
      if(reject_count < 2){
        swal("Please select 2 cards!");
      }
      else{
        sessionStorage.setItem("selected_reject_cards", selected_reject_cards);
        sessionStorage.setItem("reject_count", reject_count);
        location.href="/step_3.php";
      }
    });
    $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);

});
function check_is_selected(svg_item_id){
  for(i=0; i < selected_reject_cards.length; i++){
    if(selected_reject_cards[i] == svg_item_id){
      return true;
    }
  }
  return false;
}
