$(document).ready(function(){    
    Add_Data_To_Table();
    $('#input_email').val("");
    $('#generated_code').val("");
    $('#btn_generate_code').click(function(){
        var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        var email = $('#input_email').val();
        if(email == ""){
            swal("Please input identification information!");
            return;
        }
        // if(!ValidateEmail(email)){
        //     return;
        // }
        $('#generated_code').val(rString);
        var cur_datetime = new Date();
        var str_datetime = cur_datetime.getFullYear() + "-"
                            + (cur_datetime.getMonth()+1)  + "-" 
                            + cur_datetime.getDate() + " "  
                            + cur_datetime.getHours() + ":"  
                            + cur_datetime.getMinutes() + ":" 
                            + cur_datetime.getSeconds();
        // console.log(str_datetime);
        var data = {'email':email, 'rString':rString, 'cur_datetime':str_datetime};
        $.post("db/save_code.php", data, function(result){
            console.log(result);
            if(result == "saved code successfully"){
                swal("Saved code successfully!")
                .then((value) => {
                    Add_Data_To_Table();
                    $('#input_email').val("");
                    //location.href="/admin.php";             
               });
            }
            else
                swal("Save code failed!!!");
        });
    });     
    $('#btn_Index_LogOut').click(function(){
        // swal({
        //     title: "Are you sure?",
        //     text: "Return to First Page?",
        //     buttons: true,
        //   })
        //   .then((willgoBack) => {
        //     if (willgoBack) {
        //         location.href = "/"
        //     } 
        //   });
        location.href = "/";
    });
        
});
function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}
function ValidateEmail(mail) 
{
 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
  {
    return true;
  }
    swal("You have entered an invalid email address!")
    return false;
}
function Add_Data_To_Table() {
    $("#main_table tbody tr").remove(); 

    $.post("db/get_data.php", function(result){
        var result = JSON.parse(result);
        console.log(result);
        if(result[0]['status'] == 'success'){
            var my_table_tbody = document.getElementById("table_tbody");
                
            //console.log(result.length);
            for (var i=1; i<=result.length-1; i++){
                var tr = document.createElement('TR');
                tr.setAttribute('class','hover_effect');

                var td = document.createElement('TD');
                td.setAttribute('style','width: 40px; min-width:40px; height:48px; line-height:35px; overflow-x:auto;');
                td.innerHTML=i;
                tr.appendChild(td);

                var td = document.createElement('TD');
                td.setAttribute('style','width: 185px; min-width:150px; height:48px; line-height:35px; overflow-x:auto;');
                td.innerHTML = result[i]['email'];
                tr.appendChild(td);

                var td = document.createElement('TD');
                td.setAttribute('style','width: 436px; min-width:340px; height:48px; line-height:35px; overflow-x:auto;');
                td.innerHTML = result[i]['code'];
                tr.appendChild(td);


                var td = document.createElement('TD');
                td.setAttribute('style','width: 208px; min-width:180px; height:48px; line-height:35px; overflow-x:auto;');
                td.innerHTML = result[i]['date_time'];
                tr.appendChild(td);

                var td = document.createElement('TD');
                td.setAttribute('style','width: 222px; min-width:200px; height:48px; line-height:35px');
                td.innerHTML = '<input type="button" value = "Delete" class="btn btn-danger btn-block btn-large" onClick="Javascript:deleteRow(this)">';
                tr.appendChild(td);
                

                my_table_tbody.appendChild(tr);
            }
        }
        else if(result[0]['status'] == "no codes"){
            console.log("no codes!");
        }
        else if(result[0]['status'] == "load data fail"){
            swal("Fail to load data from Database!");
        }
  });

}
function deleteRow(obj) {
    // console.log("delete Row!!!!!!");
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("main_table");
    //console.log(table.rows[index].cells[2].innerHTML);

    var data = {'del_code':table.rows[index].cells[2].innerHTML};
    $.post("db/delete_code.php", data, function(result){
        //console.log(result);
        if(result == "Delete code successfully"){
            swal("Delete code successfully!")
            .then((value) => {
                //location.href="/admin.php";             
           });
        }
        else
            swal("Delete code failed!!!");
    });

    table.deleteRow(index);
}






// var td = document.createElement('TD');
// td.setAttribute('class','filterable-cell');
// var div = document.createElement('div');
// div.setAttribute('style','height:30px');
// div.appendChild(document.createTextNode(i));
// td.appendChild(div);
// tr.appendChild(td);

// td = document.createElement('TD');
// td.appendChild(document.createTextNode(result[i]['email']));
// td.setAttribute('class','filterable-cell');
// tr.appendChild(td);
// td = document.createElement('TD');
// td.appendChild(document.createTextNode(result[i]['code']));
// td.setAttribute('class','filterable-cell');
// tr.appendChild(td);
// td = document.createElement('TD');
// td.appendChild(document.createTextNode(result[i]['date_time']));
// td.setAttribute('class','filterable-cell');
// tr.appendChild(td);

// td = document.createElement('TD');
// td.setAttribute('class','filterable-cell');
// td.innerHTML = '<input type="button" value = "Delete" class="btn btn-danger btn-block btn-large" onClick="Javascript:deleteRow(this)">';
// tr.appendChild(td);
