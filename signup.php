<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url(improve-records-management-scaled.jpeg) no-repeat center center fixed;
            background-size: cover;
        }

        .signup-box {
            width: 380px;
            height: auto;
            background: rgba(0,0,0,0.75);
            color: white;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 35px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 25px;
            color: #00BFFF;
        }

        .textbox {
            position: relative;
            margin-bottom: 20px;
        }

        .textbox i {
            position: absolute;
            top: 10px;
            left: 10px;
            color: white;
        }

        .textbox input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            background: none;
            border: none;
            border-bottom: 1px solid #00BFFF;
            outline: none;
            color: white;
            font-size: 16px;
        }

        .button {
            width: 100%;
            background: darkblue;
            border: none;
            padding: 10px;
            color: white;
            font-size: 17px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
        }

        .button:hover {
            background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%);
        }

        .button:active {
            transform: translate(0em, 0.2em);
        }

        .ca {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #00BFFF;
            text-decoration: none;
        }

        .ca:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="admin_register_process.php" method="post">
        <div class="signup-box">
            <h1>Admin Account Registration</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>

            <div class="textbox">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <input class="button" type="submit" name="signup" value="SIGN UP">
            <a href="login.php" class="ca">Already have an admin account? Log in</a>
        </div>
    </form>
</body>
</html>
