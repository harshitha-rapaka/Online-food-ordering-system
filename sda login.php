
<?php include('partials-front/menu.php'); ?>

<html>
<head>
<h1 align="center">LOGIN FORM</h1>
</head>
<body>
<form id="survey-form">
<center><table>

<tr>
 <td><label id="user" for="user">User Name:</label></td>
 <td><input type="text" name="user" id="user" class="form-control" 
placeholder="Enter your user name" required /></td>
 <br>
 </tr>
 
 <tr>
 <td><label id="password" for="password">Password:</label></td>
 <td><input type="text/number" name="password" id="password" class="form-control" 
minlength="10" maxlength="10" placeholder="Enter your password" 
required /></td>
 <br>
</tr>

</table></center>
 
 <div align="center" class="form-group">
 <button value="Submit">Submit</button>
 </div>
 </form>
</body>
<style>
html{
background-image: url('https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60');
background-repeat:no repeat;
background-size:cover;
}
label{
font-size:28px;
font-weight: bold;
}
h1{
margin-top:40px;
}
#survey-form {
 font-size:35px;
}
input{
 font-size:18px;
text-align:justify;
}

button{
 justify-self: center;
 width: 140px;
 height: 50px;
 background-color:Crimson;
 font-size: 25px;
 color: white;
 border-radius:9px;
 margin-top:20px;
 margin-bottom:5px; 
}
.form-control{
padding:8px;
margin:2px 0px 10px 9px;
}
</style>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            //User not Available and Login Fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'sda login.php');
        }

    }
?>

<?php include('partials-front/footer.php'); ?>