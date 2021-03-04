var selected_card = null;
var selected_guidance_color = {};

var report_data = null;

var arr_card_always_white_text = ["svg_a","svg_ab","svg_cd","svg_d","svg_ef","svg_f","svg_h","svg_i","svg_l","svg_n",
                                  "svg_p","svg_q","svg_t","svg_uv","svg_v","svg_wx","svg_x","svg_z"];
var arr_color_always_white_text = ["101_Red","102_Dark_Red","202_Blue","203_Dark_Blue","204_Medium_Blue","302_Ochre",
                                  "401_Orange","402_Dark_Orange","501_Green","502_Dark_Green","601a_Purple","602a_Dark_Purple",
                                  "701_Red_Violet","702_Dark_Red_Violet","703_Magenta","801_Turquoise","802_Dark_Turquoise",
                                  "901_Yellow_Green","902_Dark_Yellow_Green","1001_Brown","1002_Dark_Brown","1501_Gray",
                                  "1502_Black","2004_Black_Sparkle","2006_Gold_Sparkle"];
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
  
  $('#btn_take_capture').click(function(){
    const canIRun  = navigator.mediaDevices.getDisplayMedia 
    
    if(canIRun){ 
      takeScreenShot().then(function(){
        make_report();
      });
      // setTimeout(() => {  console.log("delay 2 second!"); }, 2000);
    }
    else
      swal("Can not capture screen!");
  });

  $('#btn_next').click(function(){
    //  window.print();
    
    //capture();
    // PrintDiv();
    // get_screenshot();

    location.href="/step_9.php";
  });
  document.getElementById('div_next_btn').style.margin = "0% 0% 0% 65%";
  // document.getElementById('round_back').style.margin = "0% 0% 0% 20%";
  document.getElementById('div_svg').style.padding = "1% 0% 1% 22%";

  // console.log(  $('#svg_a').find("text").eq(0));
  // $('#svg_a').find("rect").eq(0).attr('fill',"");
  // $('#svg_a').find("rect").eq(1).attr('fill',"");
  // $('#svg_a').find("text").eq(0).get(0).firstChild.textContent = "";

  $('.svg-img').hide();

  show_cards(function(first, second){
    // console.log(first);
    // console.log(second);
  });

  Swal.fire({
    title: "<b class='font-blue guide-text-italic font-large'>PLEASE READ CAREFULLY</b>", 
    imageUrl: 'assets/image/screenshot_guide.png',
    imageWidth: 400,
    imageHeight: 280,
    imageAlt: 'Custom image',    customClass: 'swal-wide',
    html: 'Your coach needs a screen shot of your card results. When you click OK on this message, another message will pop up asking you to "share your screen". This allows the system to take a picture of your card and color choices and send it to your coach.<br><br>The 3 clicks you will need to make are written below and circled in red above. <br><b>You will not be able to come back to this instruction </b>so be sure to remember them.<br><br>In the next pop up, please&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>1) Select <b class="font-blue">"Chrome Tab"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><br>2) Select the tab called, <b class="font-blue">"Color Cards"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><br>3) Click <b class="font-blue">Share</b> at the bottom of the pop up.',  
    confirmButtonText: "OK", 
  }).then((value) => {
        $('#btn_take_capture').click();
      });
});

function show_cards(callback)
{
  var attract_card_id = sessionStorage.getItem('selected_attract_cards').split(',');
  var reject_card_id = sessionStorage.getItem('selected_reject_cards').split(',');
  var guidance_card_id = sessionStorage.getItem('selected_guidance_cards').split(',');

  var selected_attract_color_id = JSON.parse(sessionStorage.getItem('selected_attract_color_id'));
  var selected_reject_color_id = JSON.parse(sessionStorage.getItem('selected_reject_color_id'));
  var selected_remedy_color_id = JSON.parse(sessionStorage.getItem('selected_remedy_color_id'));
  var selected_guidance_color_id = JSON.parse(sessionStorage.getItem('selected_guidance_color_id'));
  var selected_guidance_color = JSON.parse(sessionStorage.getItem('selected_guidance_color'));
  var identify_info = JSON.parse(sessionStorage.getItem('identify_info'));

  console.log("attract_card_id: " + attract_card_id);
  console.log("selected_attract_color_id: " + sessionStorage.getItem('selected_attract_color_id'));
  console.log("reject_card_id: " + reject_card_id);
  console.log("selected_reject_color_id: " + sessionStorage.getItem('selected_reject_color_id'));
  console.log("guidance_card_id: " + guidance_card_id);
  console.log("selected_guidance_color_id: " + sessionStorage.getItem('selected_guidance_color_id'));
  console.log("selected_guidance_color: " + sessionStorage.getItem('selected_guidance_color'));
  console.log("identify_info: " + sessionStorage.getItem('identify_info'));

  report_data = {'attract_card_id':attract_card_id, 'attract_color_id':selected_attract_color_id
  ,'reject_card_id':reject_card_id, 'reject_color_id':selected_reject_color_id, 'remedy_color_id':selected_remedy_color_id
  ,'guidance_card_id':guidance_card_id, 'guidance_color_id':selected_guidance_color_id
  ,'flag_duplicated':"not_duplicated",'screenshot_image':null,'identify_info':identify_info};
  
  for(i=0; i < 6; i ++){
    $('#' + attract_card_id[i]).find("rect").eq(1).attr('fill',"url(#" + selected_attract_color_id[attract_card_id[i]] + ")");
    $('#' + attract_card_id[i]).find("text").eq(0).get(0).firstChild.textContent = "A";
    change_textcolor_on_card(attract_card_id[i], selected_attract_color_id[attract_card_id[i]]);
  }
  for(i=0; i < 2; i ++){
    $('#' + reject_card_id[i]).find("rect").eq(0).attr('fill',"url(#" + selected_reject_color_id[reject_card_id[i]] + ")");
    $('#' + reject_card_id[i]).find("rect").eq(0).attr('stroke',"black");
    $('#' + reject_card_id[i]).find("rect").eq(0).attr('stroke-width',"3");

    $('#' + reject_card_id[i]).find("rect").eq(1).attr('fill',"url(#" + selected_remedy_color_id[reject_card_id[i]] + ")");
    $('#' + reject_card_id[i]).find("text").eq(0).get(0).firstChild.textContent = "R";
    change_textcolor_on_card(reject_card_id[i], selected_remedy_color_id[reject_card_id[i]]);
  }
  for(i=0; i < 2; i ++){
    flag_duplicated = false;
    for(j=0; j < 6; j++){
      if(guidance_card_id[i] == attract_card_id[j]){
        $('#duplicated_svg').find('#' + guidance_card_id[i]).attr('style',selected_guidance_color[guidance_card_id[i]]);
        $('#duplicated_svg').find('#' + guidance_card_id[i]).append('<text id="card_text_24" fill="white" xml:space="preserve" style="white-space: pre" font-family="Roboto" font-size="48" font-weight="bold" letter-spacing="0em"><tspan x="15" y="50">G</tspan></text>');
        $('#duplicated_svg').find('#' + guidance_card_id[i]).show();
        report_data['flag_duplicated'] = "duplicated";
        flag_duplicated = true;
        break;
      }
    }
    for(j=0; j < 2; j++){
      if(guidance_card_id[i] == reject_card_id[j]){
        $('#duplicated_svg').find('#' + guidance_card_id[i]).attr('style',selected_guidance_color[guidance_card_id[i]]);
        $('#duplicated_svg').find('#' + guidance_card_id[i]).append('<text id="card_text_24" fill="white" xml:space="preserve" style="white-space: pre" font-family="Roboto" font-size="48" font-weight="bold" letter-spacing="0em"><tspan x="15" y="50">G</tspan></text>');
        $('#duplicated_svg').find('#' + guidance_card_id[i]).show();
        report_data['flag_duplicated'] = "duplicated";
        flag_duplicated = true;
        break;
      }
    }
    if(flag_duplicated == false){
      $('#' + guidance_card_id[i]).find("rect").eq(1).attr('fill',"url(#" + selected_guidance_color_id[guidance_card_id[i]] + ")");
      $('#' + guidance_card_id[i]).find("text").eq(0).get(0).firstChild.textContent = "G";
      change_textcolor_on_card(guidance_card_id[i], selected_guidance_color_id[guidance_card_id[i]]); 
    }
  }
   document.getElementById("div_svg").innerHTML += "";


  // callback("a", "b");
}

function change_textcolor_on_card(card_id, color_id)
{
  if(arr_card_always_white_text.includes(card_id))
    return;
  if(arr_color_always_white_text.includes(color_id))
    return;
  $('#' + card_id).find("text").eq(0).get(0).attributes.fill.nodeValue = "black";
}

function make_report(){

  console.log(report_data);

  $.post("report.php", report_data, function(result){
      // $('#btn_next').show();
      console.log(result);
      location.href="/step_9.php";

      //   if(result == "Mail has been sent successfully"){
    //     swal("Mail has been sent successfully!");
    //   }
    //   else
    //     swal("make report failed!!!");
  });


}



const takeScreenShot = async () => {
      const stream = await navigator.mediaDevices.getDisplayMedia({
        video: { mediaSource: 'screen' },
      })
      // get correct video track
      const track = stream.getVideoTracks()[0]
      // init Image Capture and not Video stream
      const imageCapture = new ImageCapture(track)
      // take first frame only
      const bitmap = await imageCapture.grabFrame()
      // destory video track to prevent more recording / mem leak
      track.stop()

      const canvas = document.getElementById('canvas') 
      // this could be a document.createElement('canvas') if you want
      // draw weird image type to canvas so we can get a useful image
      canvas.width = bitmap.width
      canvas.height = bitmap.height
      const context = canvas.getContext('2d')
      context.drawImage(bitmap, 0, 0, bitmap.width, bitmap.height)
      const image = canvas.toDataURL()

      report_data['screenshot_image'] = image;

//      console.log(image);

      // this turns the base 64 string to a [File] object
      const res = await fetch(image)
      const buff = await res.arrayBuffer()
      // clone so we can rename, and put into array for easy proccessing
      const file = [
        new File([buff], `photo_${new Date()}.jpg`, {
          type: 'image/jpeg',
        }),
      ]

      // console.log(file);
      // return file 
}     

