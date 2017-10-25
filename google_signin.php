<?php

if (isset($_POST['password']) && isset($_POST['email'])) {
  echo '
<script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCalqAPEJ1MNkAqAUHRoTfb0rnl0QnKSTE",
    authDomain: "fbemotion.firebaseapp.com",
    databaseURL: "https://fbemotion.firebaseio.com",
    projectId: "fbemotion",
    storageBucket: "fbemotion.appspot.com",
    messagingSenderId: "682948532751"
  };
  firebase.initializeApp(config);
  var database = firebase.database(); 
  
  var email = "'.$_POST["email"].'"; 
  var password = "'.$_POST["password"].'"; 
    
  //signin user with email and password 
  firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    alert(errorMessage + " Please try again.");
     firebase.auth().signOut().then(function() {
        // Sign-out successful.
        }).catch(function(error) {
       // An error happened.
       alert("You have not been signed out of Firebase correctly. An email was sent to Jelani Denis");
     });
  });
  
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    window.location = "facebook_signin.html";
  }
});

</script>';
}
?>

