<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: MyProfile.php");
    exit;
}
 
// Include config file
require_once "config.php";












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style type="text/css">
        h1 {
            margin: 40px 0;
            padding: 0 200px 15px 0;
            border-bottom: 1px solid #E5E5E5;
        }

        .bs-example {
            margin: 20px;
        }
    </style>
</head>
<body>

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Profile</h4>
                        <hr>
                    </div>
                </div>
            </div>




            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="list-group ">
                            <a href="#" class="list-group-item list-group-item-action">User Profile</a>
                            <a href="H:\Year 3\Team Project\Learning BootStrap/Reviews.html" class="list-group-item list-group-item-action active">Edit Profile</a>

                            <a href="H:\Year 3\Team Project\Learning BootStrap/Reviews.html" class="list-group-item list-group-item-action">Reviews</a>

                            <a href="#" class="list-group-item list-group-item-action">Account Verfication</a>
                            <a href="H:\Year 3\Team Project\Learning BootStrap/Messages.html" class="list-group-item list-group-item-action">Messages</a>
                            <a href="H:\Year 3\Team Project\Learning BootStrap/Messages.html" class="list-group-item list-group-item-action">Saved Accomadation</a>
                            <a href="#" class="list-group-item list-group-item-action">Help</a>



                        </div>
                        </div>


                        <div class="col-md-7 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">  <h4>Edit Profile</h4></div>
                            <div class="panel-body">

                                <div class="box box-info">

                                    <div class="box-body">





                                    </div>
                            <form action="InsertUserData.php" method="post">
                                        <div class="box box-info">

                                        <div class="box-body">


                                            <div class="col-md-9">
                                                <div align="left">
                                                    <img alt="User Pic" src="H:\Year 3\Team Project\Learning BootStrap/Luffy-One-Piece.png" id="profile-image1" class="img-circle img-responsive">

                                                    <input id="profile-image-upload" class="hidden" type="file">
                                                    <div style="color:#999;"></div>
                                                    <!--Upload Image Js And Css-->


                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        
                                                            <div class="form-group row">
                                                                <label for="username" class="col-4 col-form-label">User Name</label>
                                                                <div class="col-8">
                                                                    <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name" class="col-4 col-form-label">First Name</label>
                                                                <div class="col-8">
                                                                    <input id="name" name="name" placeholder="First Name" class="form-control here" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                                                <div class="col-8">
                                                                    <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="gender" class="col-4 col-form-label">Gender:</label>
                                                                <div class="col-8">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="genderRadios" value="male" required> Male
                                                                    </label>
                                                                </div>
                                                                <div class="col-8">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="genderRadios" value="female" required> Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="dateOfBirth" class="col-4 col-form-label">Date Of Birth*</label>
                                                                <div class="col-8">
                                                                    <select class="form-control">
                                                                        <option>Date</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-8">
                                                                    <select class="form-control">
                                                                        <option>Month</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-8">
                                                                    <select class="form-control">
                                                                        <option>Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="select" class="col-4 col-form-label">Display Account type as</label>
                                                                <div class="col-8">
                                                                    <select id="select" name="select" class="custom-select">
                                                                        <option value="admin">Student</option>
                                                                        <option value="admin">Host</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-4 col-form-label">Email*</label>
                                                                <div class="col-8">
                                                                    <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-4 col-form-label">Postal Address</label>
                                                                <div class="col-8">
                                                                    <textarea rows="3" class="form-control" id="postalAddress" placeholder="Postal Address" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="publicinfo" class="col-4 col-form-label">About Yourself</label>
                                                                <div class="col-8">
                                                                    <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="offset-4 col-8">
                                                                    <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                     </form>






</body>
</html>                            
