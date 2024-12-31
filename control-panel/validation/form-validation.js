/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 function onlyAlphabets(text) {

  var regex = /^[a-zA-Z]*$/;
  if (regex.test(text)) {

       return true;
  } else {
     
      return false;
  }


}
function isEmpty(text){
    if(text==""){
        return true;
    }else{
        return false;
    }
    
}

$(".numbers_only").keypress(function (e) {
      
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        
               return false;
    }
   });




