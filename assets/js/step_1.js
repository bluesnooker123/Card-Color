var attract_count = 0;
var selected_attract_cards = [];

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
      revert: "invalid"
    });
    $( "#div_selected_attract_card" ).droppable({
      accept(draggable){
        // console.log("accept: " + draggable.context.id);
        if(check_is_selected(draggable.context.id) == true){
          return true;
        }
        else{
          if(attract_count >= 6){
            swal("You've already selected 6. If you would like to choose this one, please put one back");
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

        // console.log(event);
        // console.log(ui.draggable.context.id);
        // $(this).addClass( "ui-state-highlight" );
        if(check_is_selected(svg_item.id) == false){
          // console.log("new image");
          selected_attract_cards.push(svg_item.id);
          attract_count++;  
          // if (attract_count >= 7) {
          //   $(".svg-img").draggable({ revert: true });
          // } else {
          //   $(".svg-img").draggable({ revert: "invalid" }); // 
          // }
        } 
        else{
          console.log("already in the list");
          $(".svg-img").draggable({ revert: "invalid" });
        }
        $(".svg-img").draggable({ revert: "invalid" });

        console.log(selected_attract_cards);
      }
    });
    $('#div_svg').droppable({
      accept(draggable){
        // console.log("div_svg accept: " + draggable.context.id);
        $(".svg-img").draggable({ revert: "invalid" });
        return true;
      },
      drop: function(event, ui){
        var del_index = selected_attract_cards.indexOf(ui.draggable.context.id);
        if(del_index > -1){
            selected_attract_cards.splice(del_index,1);                
            attract_count--;
        }
        console.log(selected_attract_cards);
      }
    });

    $('#btn_next').click(function(){
      if(attract_count < 6){
        swal("Please select 6 cards!");
      }
      else{
        sessionStorage.setItem("selected_attract_cards", selected_attract_cards);
        sessionStorage.setItem("attract_count", attract_count);
        location.href="/step_2.php";
      }
    });
    $("#div_guide_text").fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
});
function check_is_selected(svg_item_id){
  for(i=0; i < selected_attract_cards.length; i++){
    if(selected_attract_cards[i] == svg_item_id){
      return true;
    }
  }
  return false;
}


