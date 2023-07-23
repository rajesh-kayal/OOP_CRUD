$(document).ready(function () {
  $("form").submit(function (event) {
    let c = $("#phn").val();
    let a = $("#email").val();
    let Pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
    let b = $("#pass").val();
    let b1 = $("#pass1").val();

    // Mobile
    if (c === "") {
      $("#s2").html("**Please enter your mobile number");
      $("#s2").css("color", "red");
      return false;
    }
    if (c.length !== 10) {
      $("#s2").html("**Please enter a 10-digit mobile number");
      $("#s2").css("color", "red");
      return false;
    }
    if (isNaN(c)) {
      $("#s2").html("**Please enter a valid number");
      $("#s2").css("color", "red");
      return false;
    }
    if (c.charAt(0) < 6 || c.charAt(0) > 9) {
      $("#s2").html("**Number must start with 6, 7, 8, or 9");
      $("#s2").css("color", "red");
      return false;
    } else {
      $("#s2").html("**Success..!!");
      $("#s2").css("color", "green");
    }

    // Email
    if (a === "") {
      $("#s1").html("**Please enter your email address");
      $("#s1").css("color", "red");
      return false;
    }
    if (!Pattern.test(a)) {
      $("#s1").html("**Please enter a valid email address");
      $("#s1").css("color", "red");
      return false;
    } else {
      $("#s1").html("**Success..!!");
      $("#s1").css("color", "green");
    }

    // Password
    if (b === "") {
      $("#s3").html("**Please enter the password");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.length < 8) {
      $("#s3").html("**Minimum 8 characters allowed");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.length > 10) {
      $("#s3").html("**Maximum 10 characters allowed");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.search(/[A-Z]/) === -1) {
      $("#s3").html("**Please enter at least one uppercase letter");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.search(/[a-z]/) === -1) {
      $("#s3").html("**Please enter at least one lowercase letter");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.search(/[0-9]/) === -1) {
      $("#s3").html("**Please enter at least one number");
      $("#s3").css("color", "red");
      return false;
    }
    if (b.search(/[#$@&]/) === -1) {
      $("#s3").html("**Please enter at least one special character (#/$/@/&)");
      $("#s3").css("color", "red");
      return false;
    } else {
      $("#s3").html("**Success..!!");
      $("#s3").css("color", "green");
    }

    // Confirm Password
    if (b !== b1) {
      $("#s4").html("**Password and confirm password do not match!");
      $("#s4").css("color", "red");
      return false;
    } else {
      $("#s4").html("**Success..!!");
      $("#s4").css("color", "green");
    }
  });
});
