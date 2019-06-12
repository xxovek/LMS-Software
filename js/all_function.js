
function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
  return true;
}

function Amountfloat(txt,e)
      {
        var char = (window.event) ? event.keyCode  : e.which ;
          if(char > 47 && char < 58 || char=== 46 || char  === 8 )
          {
             var txtbx=document.getElementById(txt);

             var amount = document.getElementById(txt).value;
             var present=0;
             var count=0;

             if(amount.indexOf(".",present)||amount.indexOf(".",present+1)){}
             do
             {
             present=amount.indexOf(".",present);
             if(present!=-1)
              {
               count++;
               present++;
               }
             }
             while(present!=-1);
             if(present==-1 && amount.length==0 && event.keyCode  === 46  )
             {
                  char=0;
                  return false;
             }

             if(count>=1 && char === 46)
             {
               char=0;
                  return false;
             }
             if(count==1)
             {
              var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
              if(lastdigits.length>=2 && char !=8)
                          {
                            char=0;
                            return false;
                            }
             }
                  return true;
          }
          else
          {
                char=0;
                return false;
          }
      }


function isAlphakey(e,t){
  var specialKeys = new Array();
specialKeys.push(8);
specialKeys.push(9);
specialKeys.push(46);
specialKeys.push(36);
specialKeys.push(35);
specialKeys.push(37);
specialKeys.push(39);

var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 32) || (keyCode == 0) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
return ret;
}

function IsAlphaNumericValue(e) {

          var specialKeys = new Array();
          specialKeys.push(8);
          specialKeys.push(9);
          specialKeys.push(46);
          specialKeys.push(36);
          specialKeys.push(35);
          specialKeys.push(37);
          specialKeys.push(39);
            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||(keyCode == 32)||(keyCode ==0)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            return ret;
        }


      // function isAlphakey(event) {
      //         var charCode = (event.which) ? event.which : event.keyCode;
      //     if (!(charCode >= 65 && charCode <= 120) && (charCode  != 32 && charCode != 0) && (charCode== 8) )
      //     return false;
      //     return true;
      // }
