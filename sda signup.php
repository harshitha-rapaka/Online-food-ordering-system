<?php include('partials-front/menu.php'); ?>

<html>
<head>
<h1 align="center">SIGNUP FORM</h1>
</head>
<body>
<form id="survey-form">
<table>
<tr>
 <td><label id="name" for="name"><b>Full Name:</b></label></td>
 <td><input type="text" name="name" id="name" class="form-control" placeholder="Enter 
your name" pattern="[a-zA-Z'-'\s]*" required/></td>
 <br>
 <tr>
 
 <tr>
 <td><label id="user" for="user"><b>User Name:</b></label></td>
 <td><input type="text" name="user" id="user" class="form-control" 
placeholder="Enter your user name" required /></td>
 <br>
 </tr>
 
 <tr>
 <td><label id="email" for="email" onsubmit="return 
email_funnction()"><b>Email:</b></label></td>
 <td><input type="text/number" name="email" id="email" class="form-control" 
placeholder="abcde@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required 
/></td>
 <br>
 </tr>
 
 <tr>
 <td><label id="password" for="password"><b>Password:</b></label></td>
 <td><input type="text/number" name="password" id="password" class="form-control" 
minlength="10" maxlength="10" placeholder="Enter your password" 
required /></td>
 <br>
</tr>

<tr>
<td><label id="address" for="name"><b>Address:</b></label></td>
 <td><input type="name" name="address" id="address" class="form-control" 
placeholder="Enter your address" rows="4" cols="80" required /></td>
 <br>
 </tr>

</table>
 
 <div align="center" class="form-group">
 <button value="Submit">Submit</button>
 </div>
 </form>
</body>
<style>
html{
background-image: url('https://images.pexels.com/photos/1660030/pexels-photo-1660030.jpeg');
background-repeat:no repeat;
background-size:cover;
}
background-repeat:no repeat;
background-size:cover;
}
label{
font-size:50px;
font-weight: bold;
}
h1{
margin-top:40px;
}
#survey-form {
 font-size:35px;
 margin-left:900px;
 margin-top:-180px;
}
input{
 font-size:18px;
text-align:justify;
}

button{
 width: 140px;
 height: 50px;
 background-color:Peru;
 font-size: 25px;
 color: white;
 border-radius:9px;
margin-right:200px; 
}
.form-control{
padding:8px;
margin:2px 0px 10px 9px;
}


</style>
</html>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with md5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
            //Redirect Page to index
            header("location:".SITEURL.'sda login.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add User.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'sda signup.php');
        }

    }
    
?>

<?php include('partials-front/footer.php'); ?>