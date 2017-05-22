<?php
  session_start();
  require 'condb.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="455049076375-71fdj13skbm38gvp3r8q7ab236npcjns.apps.googleusercontent.com">
<body>

<div class="wrap">
  <?php 
    if (@$_SESSION['name']!="") {
  ?>
  <label>ชื่อผู้ใช้ : <?=@$_SESSION['name']?></label> | <a class="logout" href="logout.php" onclick="signOut();">ออกจากระบบ</a>
  <?php
    }else{

   ?>
  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
  </fb:login-button>
  <div class="g-signin2" data-onsuccess="onSignIn"></div>
  <div id="status"></div>
  <hr>
  <form method="post" action="insert_user.php">
      <input type="text" name="name" placeholder="ชื่อ">
      <button>สมัคร</button>
  </form>
  <hr>
  <form method="post" action="login.php">
      <input type="text" name="name" placeholder="ชื่อผู้ใช้">
      <button>เข้าสู่ระบบ</button>
  </form>
  <?php 
    }
  ?>
</div>


<br><br><br><br>
<div class="wrap2">
  <table>
  <tr>
    <th colspan="3">ผู้ใช้งาน</th>
  </tr>
  <tr>
    <th width="50">รหัส</th>
    <th width="350">ID Social</th>
    <th width="400">ชื่อผู้ใช้งาน</th>
  </tr>
  <?php
    $query = mysqli_query($con,"SELECT * FROM user");
      while ($result = mysqli_fetch_array($query)) {
?>
  <tr>
    <td><?=$result['user_id']?></td>
    <td>
      <?php
      if($result['user_id_wface']==0){
        echo "-";
      }else{
        echo $result['user_id_wface'];
      }
      ?>
    </td>
    <td><?=$result['user_name']?></td>
  </tr>
<?php
      }
  ?>
</table>
</div>



</body>
</html>
<script type="text/javascript">
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  var name = profile.getName();
  var idface = profile.getId();
  window.location="http://mickymekick.hol.es/13550137/insert_user.php?name="+name+"&idface="+idface;
}
</script>

<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>







<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9&appId=1815554638764149";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

    if (response.status === 'connected') {
      testAPI();
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
      appId      : '1815554638764149',
      cookie     : true,  
      xfbml      : true, 
      version    : 'v2.9'
    });

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));



  function testAPI() {
    FB.api('/me', function(response) {
      document.getElementById('status').innerHTML =
        'Thanks for register in, ' + response.name + '<br>';
        window.location="http://mickymekick.hol.es/13550137/insert_user.php?name="+response.name+"&idface="+response.id;
    });
  }
</script>
<style type="text/css">
  body{
    margin: 0;
    padding: 0;
    background: #222;
    color :#fff;
    font-size: 24px;
  }
  .wrap{
    width: 400px;
    margin: 20px auto;
  }
  .wrap2{
    width: 800px;
    margin: 20px auto;
  }
  table{
    width: 800px;
  }
  table,tr,td{
    border: 2px solid #fff;
    text-align: center;
  }
  .logout{
    text-decoration: none;
    color: #fff;
  }
</style>