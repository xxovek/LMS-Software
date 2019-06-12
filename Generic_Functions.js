function display_authors(){
  $.ajax({
      url: "get_authors_values.php",
      async: false,
      cache: false,
      method: "POST",
      success: function(data) {
          $("#author_name").html(data);
          $("#author_name1").html(data);

      }
  });

}

function select_options_StudTeacher(){
  $.ajax({
      url: "fetch_StudTeacher_Id.php",
      async: false,
      cache: false,
      method: "POST",
      success: function(data) {
        $("#student_name").html(data);
        //  $("#author_name").html(data);
      }
  });
}

function display_books(){
  $.ajax({
      url: "get_books_names.php",
      async: false,
      cache: false,
      method: "POST",
      success: function(data) {
        $("#select_book_name").html(data);
          $("#author_name").html(data);
      }
  });
}
// check category availability function
function ChkCategoryAvailability(param,flag){

  var tempVar = '0';
  var response = [];
  jQuery.ajax({
  url: "ChkCategoryAvailability.php",
  async: false,
  cache: false,
  //data:'category='+$("#Category_val").val(),
  data:({category:param}),
  type: "POST",
  success:function(data){
        //  alert(data);
   response = JSON.parse(data);
  if(response["success"] === 'true'){

    if(flag == 0)
    {
      //alert(flag);
      $("#category-availability-status").html("Category Already Exists");
      $("#Category_val").val("");

    }
    else{
      $('#CatName'+flag).html("");
         tempVar = '1';
    }
    }
    else{
      $("#category-availability-status").html("");
    }
  },
  error:function (){}
  });
 return tempVar;
}


// check category availability function
function ChkAuthorAvailability(param,flag){
  // alert(param);
  //var hiddenflag = document.getElementById('formHideVal').value;
  // alert(flag);
  var tempVar = '0';
  var response = [];
  jQuery.ajax({
  url: "ChkAuthorAvailability.php",
  async: false,
  cache: false,
  //data:'category='+$("#Category_val").val(),
  data:({author:param}),
  type: "POST",
  success:function(data){
        //  alert(data);
   response = JSON.parse(data);
  if(response["success"] === 'true'){

    if(flag == 0)
    {
      //alert(flag);
      $("#author-availability-status").html("Author Already Exists");
      $("#author_name").val("");

    }
    else{
      $('#AutName'+flag).html("");
         tempVar = '1';
    }
    }
    else{
      $("#author-availability-status").html("");
    }
  },
  error:function (){}
  });
 return tempVar;
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

// check student teacher roll number availability function
function ChkstudTechRollAvailability(rollNum){
  // alert(rollNum);
  var response = [];
      jQuery.ajax({
      url: "ChkStudTechRollNOAvailability.php",
      async: false,
      cache: false,
      data:({rollNum:rollNum}),
      type: "POST",
      success:function(data){
            //  alert(data);
       response = JSON.parse(data);
      if(response["success"] === 'true'){
          $("#id-availability-status").html("ID Not Registered");
          $("#receiverId").val("");
          $("#TeacherInfoDiv").hide();
          $("#StudInfoDiv").hide();
        }
        else{
          //alert(bookId);
          $("#id-availability-status").html("");
          // fetch_bookInfo_Id(bookId);
          fetch_StudTeacherInfo_Id(rollNum);
        }
      },
      error:function (){}
      });
}


function fetch_StudTeacherInfo_Id(rollNum){

  var response = [];
    $.ajax({
        type: "POST",
        url: "fetchStudTeacherInfo.php",
        data:{rollNum:rollNum},
    }).done(function(data) {
      if(!data){
        $("#TeacherInfoDiv").hide();
        $("#StudInfoDiv").hide();
      }

      response = JSON.parse(data);

      if(isNaN(rollNum)){

          $("#TeacherInfoDiv").hide();
          $("#StudInfoDiv").show();
          $('#s_name').html(response['FullName']);
          $('#s_class').html(response['class']);
          $('#s_roll').html(response['rollno']);
          $('#s_mob').html(response['mobilenumber']);
      }
      else {
          $("#StudInfoDiv").hide();
          $("#TeacherInfoDiv").show();
          $('#t_name').html(response['FullName']);
          $('#t_mob').html(response['mobilenumber']);
      }

  }).fail(function(jqXHR, textStatus) {
      alert('Request Failed');
  });

}

//book qty avilability
function ChkbookQtyAvailability(bookId){
  // alert(bookId);
  var response = [];
      jQuery.ajax({
      url: "ChkBookAvailability.php",
      async: false,
      cache: false,
      data:({bid:bookId}),
      type: "POST",
      success:function(data){
          //  alert(data);
       response = JSON.parse(data);
      if(response["success"] === 'true'){
          $("#book-availability-status").html("Book Not Available");
          $("#book_id").val("");
          $("#bookInfoDiv").hide();
        }
    else{
          $("#book-availability-status").html("");
          fetch_bookInfo_Id(bookId);
          }

      },
      error:function (){}
      });
  }


function fetch_bookInfo_Id(bid){

var response = [];
  $.ajax({
      type: "POST",
      url: "fetchBookInfo.php",
      data:({bid:bid}),
  }).done(function(data) {
    if(!data){
      alert('ok');
      $("#bookInfoDiv").hide();

    }
    response = JSON.parse(data);
    var book_id = document.getElementById("book_id").value;
    if(book_id != ""){
      $("#bookInfoDiv").show();
      $('#book_name').html(response['BookName']);
      $('#book_cat').html(response['CategoryName']);
      $('#book_aut').html(response['AuthorName']);
      $('#book_qty').html(response['book_qty']);
    }
    else{
      $("#bookInfoDiv").hide();
  }
    // tempVar = '1';
}).fail(function(jqXHR, textStatus) {
    alert('Request Failed');
});

}



//category select2 function:
function display_category() {
    $.ajax({
        url: "get_category_values.php",
        async: false,
        cache: false,
        method: "POST",
        success: function(data) {
            $("#book_cat").html(data);
            $("#book_cat1").html(data);
        }
    });
}

//author select2 function:
function display_authors1() {
    $.ajax({
        url: "get_authors_values.php",
        async: false,
        cache: false,
        method: "POST",
        success: function(data) {
            $("#book_author").html(data);
        }
    });
}
