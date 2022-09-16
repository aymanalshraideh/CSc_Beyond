$("document").ready(function () {
  // get data
  getRealData();

  //edit user

  //add User
  $("#butsave").on("click", function () {
    $("#butsave").attr("disabled", "disabled");
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    var address = $("#address").val();
    var gender = $("#gender").val();
    var save = true;
    if (
      fname != "" &&
      lname != "" &&
      email != "" &&
      password != "" &&
      repassword != "" &&
      address != "" &&
      gender != ""
    ) {
      $.ajax({
        url: "register.php",
        type: "POST",
        data: {
          fname: fname,
          lname: lname,
          email: email,
          password: password,
          repassword: repassword,
          address: address,
          gender: gender,
          submit: save,
        },
        cache: false,
        success: function (dataResult) {
          getRealData();
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            // $("#butsave").removeAttr("disabled");
            $("#fupForm").find("input").val("");
            $("#success").show();
            $("#success").html("Data added successfully !");
          } else if (dataResult.statusCode == 201) {
            alert("Error occured !");
          }
        },
      });
    } else {
      document.getElementById("alert").innerHTML =
        '<div class="alert alert-danger" role="alert">' +
        "Please fill all the field !" +
        "</div>";

      document.getElementById("alert").style.backgroundColor = "red";
      //   alert("Please fill all the field !");
    }
  });

  //********************************* */
});

function getRealData() {
  // Show All User
  $.ajax({
    url: "allUsers.php",
    type: "POST",
    cache: false,
    success: function (data) {
      // alert(data);
      $("#table").html(data);
    },
  });
  // Show All Courses
  $.ajax({
    url: "allCourse_ajax.php",
    type: "POST",
    cache: false,
    success: function (data) {
      // alert(data);
      $("#course").html(data);
    },
  });
}

// updtae fun

//Delete User

var deletuser = function (id) {
  $.ajax({
    type: "GET",
    url: "deleteUser.php",
    data: { deleteId: id },
    dataType: "html",
    success: function (data) {
      //   $("#msg").html(data);
      $("#table-container").load("fetch-data.php");
      getRealData();
    },
  });
};

//active user
function activeuser(id, avtive) {
  $.ajax({
    type: "post",
    url: "activation.php",
    data: { id: id, avtive: avtive },
    dataType: "html",
    success: function (data) {
      // $("#msg").html(data);
      $("#table-container").load("fetch-data.php");

      getRealData();
    },
  });
  console.log(id);
}

// updtae

//Rejister User

// function onchang(){
// var fnameva=document.getElementById("fname").value;
// var fnameva=document.getElementById("lname").value;
// let nameReg = /[a-zA-Z]/;
// if(!fnameva.match(nameReg)){
// document.getElementById("fnamel").innerHTML ='<h6 class="alert alert-danger" role="alert">'+'Please Insert valid Name !'+'</h6>';

//     }else{ document.getElementById("fnamel").innerHTML ='';}

//     if(!fnameva.match(nameReg)){
//         document.getElementById("lnamel").innerHTML ='<h6 class="alert alert-danger" role="alert">'+'Please Insert valid Name !'+'</h6>';

//             }else{ document.getElementById("lnamel").innerHTML ='';}

// }
$(document).on("click", ".update", function (e) {
  var id = $(this).attr("data-id");
  var fname = $(this).attr("data-fname");
  var lname = $(this).attr("data-lname");
  var email = $(this).attr("data-email");
  var address = $(this).attr("data-address");
  var gender = $(this).attr("data-gender");
  $("#id_modal").val(id);
  $("#efname_modal").val(fname);
  $("#elname_modal").val(lname);
  $("#eemail_modal").val(email);
  $("#eaddress_modal").val(address);
  $("#egender_modal").val(gender);
});

$("#butsavee").on("click", function () {
  // $("#butsavee").attr("disabled", "disabled");

  var fname = $("#efname_modal").val();
  var lname = $("#elname_modal").val();
  var email = $("#eemail_modal").val();

  var address = $("#eaddress_modal").val();
  var gender = $("#egender_modal").val();
  var id = $("#id_modal").val();

  var save = true;
  if (
    fname != "" &&
    lname != "" &&
    email != "" &&
    address != "" &&
    gender != ""
  ) {
    $.ajax({
      url: "edit.php",
      type: "POST",
      data: {
        id: id,
        fname: fname,
        lname: lname,
        email: email,

        address: address,
        gender: gender,
        submit: save,
      },
      cache: false,
      success: function (dataResult) {
        getRealData();
        var dataResult = JSON.parse(dataResult);
        if (dataResult.statusCode == 200) {
          // $("#butsave").removeAttr("disabled");
          $("#fupForm").find("input").val("");
          $("#success").show();
          $("#success").html("Data added successfully !");
        } else if (dataResult.statusCode == 201) {
          alert("Error occured !");
        }
      },
    });
  } else {
    document.getElementById("alert").innerHTML =
      '<div class="alert alert-danger" role="alert">' +
      "Please fill all the field !" +
      "</div>";

    document.getElementById("alert").style.backgroundColor = "red";
    //   alert("Please fill all the field !");
  }
});

//addCourse

$("#subCourse").on("click", function () {
  var title = $("#title").val();
  var description = $("#description").val();

  var save = true;
  if (title != "" && description != "") {
    $.ajax({
      url: "addCourse.php",
      type: "POST",
      data: {
        title: title,
        description: description,

        submit: save,
      },
      cache: false,
      success: function (dataResult) {
        // getRealData();
      },
    });
  } else {
    document.getElementById("alert").innerHTML =
      '<div class="alert alert-danger" role="alert">' +
      "Please fill all the field !" +
      "</div>";

    document.getElementById("alert").style.backgroundColor = "red";
    //   alert("Please fill all the field !");
  }
});

//Delete Course

var deletCourse = function (id) {
  $.ajax({
    type: "GET",
    url: "deleteCource.php",
    data: { deleteId: id },
    dataType: "html",
    success: function (data) {
      //   $("#msg").html(data);
      // $("#table-container").load("fetch-data.php");
      getRealData();
    },
  });
};

//active user
function activeuser(id, avtive) {
  $.ajax({
    type: "post",
    url: "activation.php",
    data: { id: id, avtive: avtive },
    dataType: "html",
    success: function (data) {
      // $("#msg").html(data);
      $("#table-container").load("fetch-data.php");

      getRealData();
    },
  });
  console.log(id);
}
