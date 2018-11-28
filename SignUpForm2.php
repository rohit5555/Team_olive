<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$first_name = $last_name = $username = $dob = $password = $confirm_password = "" $email = ;
$first_name_err = $last_name_err = $username_err = $dob_err = $password_err = $confirm_password_err = "" $email_err = ;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate first_name
    if(empty(trim($_POST["first_name"]))){
        $username_err = 'Please enter first name.';
    } else{
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last_name
    if(empty(trim($_POST["last_name"]))){
        $username_err = 'Please enter last name.';
    } else{
        $last_name = trim($_POST["last_name"]);
    }

    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM Users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Username is already taken.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate dob
    if(empty(trim($_POST["dob"]))){
        $username_err = 'Please enter date of birth.';
    } else{
        $dob = trim($_POST["dob"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    }  elseif(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0){
            $password_err = "Password must be strong, must contain at least 8 characters, an uppercase letter, an lowercase letter and a digit.";
            
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        // Validate email_address
        if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email address.";
    }  elseif(preg_match("/^[a-zA-Z]w+(.w+)*@w+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0){
        $email_err = "This is not a vaild email address.";
        
} else{
    $email = trim($_POST["email"]);
}

// Check input errors before inserting in database
if(empty($first_name_err) && empty($last_name_err) && empty($username_err) && empty($dob_err) 
&& empty($password_err) && empty($confirm_password_err) && empty($email_err)){

    // Prepare an insert statement
    $sql = "INSERT INTO users (first_name, last_name, username, dob, password, email) VALUES (?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_first_name, $param_last_name, $param_username, $param_dob, $param_email, $param_password);

        // Set parameters
        $param_first_name = $first_name;
        $param_last_name = $last_name;
        $param_username = $username;
        $param_dob = $dob;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect to login page
            header("location: MyProfile.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2Sign-Up Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        #popupbox {
            margin: 0;
            margin-left: 40%;
            margin-right: 40%;
            margin-top: 50px;
            padding-top: 10px;
            width: 40%;
            height: 400px;
            position: center;
            background: #FDFEFE;
            border: none;
            z-index: 9;
            font-family: arial;
            visibility: visible;
        }
    </style>
</head>
<body>


    <div id="popupbox">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">  <h4>2Sign-Up</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">



                        </div>
                        <div class="box box-info">

                            <div class="box-body">





                                <div id="popupbox">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                
                                    
                                        <div class="form-group has-success has-feedback <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                        
                                        <label class="control-label col-" for="firstName"></label>
                                        <div class="col-md-14">
                                            <input type="text" class="form-control" id="firstName"  placeholder="First Name" required>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group has-success has-feedback <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                        <label class="control-label col-xs-2" for="lastName"></label>
                                        <div class="col-md-14">
                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group has-success has-feedback <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label class="col-xs-2 control-label" for="inputSuccess"></label>
                                        <div class="col-md-14">
                                        <input type="text" id="inputSuccess" class="form-control" placeholder="Username">
                                       
                                           
                                        </div>
                                    </div>

                                    <div class="form-group has-success has-feedback <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                                        <div class="col-md-14">
                                            <div style="width:800px; margin:0 auto; position:center;">
                                                <label class="col-xs-2 control-label" for="control-label"></label>

                                                <span class="help-block">
                                                    <span style="width:800px; margin:0 auto;margin-left:-223px; position:center;height: 60px;z-index: 15;top: 10%;left: 40%;">
                                                        You must be 18 years or older to use this service

                                                    </span>
                                                </span>
                                            </div>
                                            <div class="col-md-14">
                                                <div style="width:800px; margin:0 auto;margin-left:0px; position:center;height: 60px;z-index: 15;top: 10%;left: 20%;">


                                                    <select name="dob-day" id="dob-day">

                                                        <option value=""> Day</option>
                                                        <option value=""> ---</option>
                                                        <option value="01"> 01</option>
                                                        <option value="02"> 02</option>
                                                        <option value="03"> 03</option>
                                                        <option value="04"> 04</option>
                                                        <option value="05"> 05</option>
                                                        <option value="06"> 06</option>
                                                        <option value="07"> 07</option>
                                                        <option value="08"> 08</option>
                                                        <option value="09"> 09</option>
                                                        <option value="10"> 10</option>
                                                        <option value="11"> 11</option>
                                                        <option value="12"> 12</option>
                                                        <option value="13"> 13</option>
                                                        <option value="14"> 14</option>
                                                        <option value="15"> 15</option>
                                                        <option value="16"> 16</option>
                                                        <option value="17"> 17</option>
                                                        <option value="18"> 18</option>
                                                        <option value="19"> 19</option>
                                                        <option value="20"> 20</option>
                                                        <option value="21"> 21</option>
                                                        <option value="22"> 22</option>
                                                        <option value="23"> 23</option>
                                                        <option value="24"> 24</option>
                                                        <option value="25"> 25</option>
                                                        <option value="26"> 26</option>
                                                        <option value="27"> 27</option>
                                                        <option value="28"> 28</option>
                                                        <option value="29"> 29</option>
                                                        <option value="30"> 30</option>
                                                        <option value="31"> 31</option>
                                                    </select>
                                                    <select name="dob-month" id="dob-month">
                                                        <option value=""> Month</option>
                                                        <option value=""> -----</option>
                                                        <option value="01"> January</option>
                                                        <option value="02"> February</option>
                                                        <option value="03"> March</option>
                                                        <option value="04"> April</option>
                                                        <option value="05"> May</option>
                                                        <option value="06"> June</option>
                                                        <option value="07"> July</option>
                                                        <option value="08"> August</option>
                                                        <option value="09"> September</option>
                                                        <option value="10"> October</option>
                                                        <option value="11"> November</option>
                                                        <option value="12"> December</option>
                                                    </select>
                                                    <select name="dob-year" id="dob-year">
                                                        <option value=""> Year</option>
                                                        <option value=""> ----</option>
                                                        <option value="2012"> 2012</option>
                                                        <option value="2011"> 2011</option>
                                                        <option value="2010"> 2010</option>
                                                        <option value="2009"> 2009</option>
                                                        <option value="2008"> 2008</option>
                                                        <option value="2007"> 2007</option>
                                                        <option value="2006"> 2006</option>
                                                        <option value="2005"> 2005</option>
                                                        <option value="2004"> 2004</option>
                                                        <option value="2003"> 2003</option>
                                                        <option value="2002"> 2002</option>
                                                        <option value="2001"> 2001</option>
                                                        <option value="2000"> 2000</option>
                                                        <option value="1999"> 1999</option>
                                                        <option value="1998"> 1998</option>
                                                        <option value="1997"> 1997</option>
                                                        <option value="1996"> 1996</option>
                                                        <option value="1995"> 1995</option>
                                                        <option value="1994"> 1994</option>
                                                        <option value="1993"> 1993</option>
                                                        <option value="1992"> 1992</option>
                                                        <option value="1991"> 1991</option>
                                                        <option value="1990"> 1990</option>
                                                        <option value="1989"> 1989</option>
                                                        <option value="1988"> 1988</option>
                                                        <option value="1987"> 1987</option>
                                                        <option value="1986"> 1986</option>
                                                        <option value="1985"> 1985</option>
                                                        <option value="1984"> 1984</option>
                                                        <option value="1983"> 1983</option>
                                                        <option value="1982"> 1982</option>
                                                        <option value="1981"> 1981</option>
                                                        <option value="1980"> 1980</option>
                                                        <option value="1979"> 1979</option>
                                                        <option value="1978"> 1978</option>
                                                        <option value="1977"> 1977</option>
                                                        <option value="1976"> 1976</option>
                                                        <option value="1975"> 1975</option>
                                                        <option value="1974"> 1974</option>
                                                        <option value="1973"> 1973</option>
                                                        <option value="1972"> 1972</option>
                                                        <option value="1971"> 1971</option>
                                                        <option value="1970"> 1970</option>
                                                        <option value="1969"> 1969</option>
                                                        <option value="1968"> 1968</option>
                                                        <option value="1967"> 1967</option>
                                                        <option value="1966"> 1966</option>
                                                        <option value="1965"> 1965</option>
                                                        <option value="1964"> 1964</option>
                                                        <option value="1963"> 1963</option>
                                                        <option value="1962"> 1962</option>
                                                        <option value="1961"> 1961</option>
                                                        <option value="1960"> 1960</option>
                                                        <option value="1959"> 1959</option>
                                                        <option value="1958"> 1958</option>
                                                        <option value="1957"> 1957</option>
                                                        <option value="1956"> 1956</option>
                                                        <option value="1955"> 1955</option>
                                                        <option value="1954"> 1954</option>
                                                        <option value="1953"> 1953</option>
                                                        <option value="1952"> 1952</option>
                                                        <option value="1951"> 1951</option>
                                                        <option value="1950"> 1950</option>
                                                        <option value="1949"> 1949</option>
                                                        <option value="1948"> 1948</option>
                                                        <option value="1947"> 1947</option>
                                                        <option value="1946"> 1946</option>
                                                        <option value="1945"> 1945</option>
                                                        <option value="1944"> 1944</option>
                                                        <option value="1943"> 1943</option>
                                                        <option value="1942"> 1942</option>
                                                        <option value="1941"> 1941</option>
                                                        <option value="1940"> 1940</option>
                                                        <option value="1939"> 1939</option>
                                                        <option value="1938"> 1938</option>
                                                        <option value="1937"> 1937</option>
                                                        <option value="1936"> 1936</option>
                                                        <option value="1935"> 1935</option>
                                                        <option value="1934"> 1934</option>
                                                        <option value="1933"> 1933</option>
                                                        <option value="1932"> 1932</option>
                                                        <option value="1931"> 1931</option>
                                                        <option value="1930"> 1930</option>
                                                        <option value="1929"> 1929</option>
                                                        <option value="1928"> 1928</option>
                                                        <option value="1927"> 1927</option>
                                                        <option value="1926"> 1926</option>
                                                        <option value="1925"> 1925</option>
                                                        <option value="1924"> 1924</option>
                                                        <option value="1923"> 1923</option>
                                                        <option value="1922"> 1922</option>
                                                        <option value="1921"> 1921</option>
                                                        <option value="1920"> 1920</option>
                                                        <option value="1919"> 1919</option>
                                                        <option value="1918"> 1918</option>
                                                        <option value="1917"> 1917</option>
                                                        <option value="1916"> 1916</option>
                                                        <option value="1915"> 1915</option>
                                                        <option value="1914"> 1914</option>
                                                        <option value="1913"> 1913</option>
                                                        <option value="1912"> 1912</option>
                                                        <option value="1911"> 1911</option>
                                                        <option value="1910"> 1910</option>
                                                        <option value="1909"> 1909</option>
                                                        <option value="1908"> 1908</option>
                                                        <option value="1907"> 1907</option>
                                                        <option value="1906"> 1906</option>
                                                        <option value="1905"> 1905</option>
                                                        <option value="1904"> 1904</option>
                                                        <option value="1903"> 1903</option>
                                                        <option value="1901"> 1901</option>
                                                        <option value="1900"> 1900</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-warning has-feedback <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                                        <label class="col-xs-2 control-label" for="inputWarning"> </label>
                                        <div class="col-md-14">
                                            <input type="password" id="inputWarning" class="form-control" placeholder="Password">
                                            
                                            
                                            <span class="help-block"> Must be least 8 characters</span>
                                            <span class="help-block"> Must contain number of symbol and digit</span>
                                        </div>
                                        
                                        <div class="form-group has-warning has-feedback <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <label class="col-xs-2 control-label" for="inputError"> </label>
                                        <div class="col-md-14">
                                            <input type="Confirm password" id="inputError" class="form-control" placeholder="Confirm Password">
                                            
                                        </div>
                                        </div>
                                        






                                        <div class="form-group has-error has-feedback <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                                            <label class="col-xs-2 control-label" for="inputError"> </label>
                                            <div class="col-md-14">
                                                <input type="email" id="inputError" class="form-control" placeholder="Email Address">
                                                


                                                <div class="form-group has-error has-feedback">

                                                    <label class="col-xs-2 control-label" for="inputError"> </label>
                                                    <div class="col-md-14">
                                                       

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label class="col-xs-2 control-label" for="inputError"> </label>
                                                        <div class="col-md-14">
                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                    <input type="reset" class="btn btn-default" value="Reset">
                                                </div>
                                                <p>Already have an account? <a href="login.php">Login here</a>.</p>
                                                
                                                </div>
                                                </div>
                                                <div class="form-group has-error has-feedback">

                                                    
                                                            <div class="form-group has-error has-feedback">
            
                                                                <label class="col-xs-2 control-label" for="inputError"> </label>
                                                                <div class="col-md-14">
                                                                   
            
                                                                </div>
                                                            </div>

                                                </form>
                                            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>




</body>
                            </html >
