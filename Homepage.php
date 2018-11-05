<Html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="/style.css">


</head>
<body>
    
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="head">
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <h1 class="muted">Housing App</h1>
                </div>

                <div class="span4 offset2" style="margin-top:15px;">
                    <div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> User	<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-share"></i> Logout</a></li>
					</ul>
					</div>
			
                </div>
            </div>
        </div>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li>
                            <a href="#">Housing Rent</a>
                        </li>

                        <li>
                            <a href="#">About</a>
                        </li>

                        <li>
                            <a href="#">Favourite</a>
                        </li>

                        <li>
                            <a href="#">Advertise</a>
                        </li>
                        
                        <li>
                            <a href="#">Help</a>
                        </li>
                        
                        <li>
                            <a href="#">Messages</a>
                        </li>
                    </ul>
                    &nbsp<form class="formsearch">
      <input class="search-form" type="text" placeholder="Search" aria-label="Search">
      <button class="button" type="submit">Search</button>
    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
 <!------ This is the accomodation slector  ---------->
<center>
		                                <div class="col-md-6">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="tab-pane active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home </a></li>
                                        <li role="presentation"><a href="#room" aria-controls="room" role="tab" data-toggle="tab">Shared Room</a></li>
                                        <li role="presentation"><a href="#couch" aria-controls="couch" role="tab" data-toggle="tab">couch</a></li>
                                        <li role="presentation"><a href="#car Parking" aria-controls="car parking" role="tab" data-toggle="tab">car Parking</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <form action="#.php">
                                              County: &nbsp&nbsp&nbsp&nbsp <input list="county" name="county">
                                              <datalist id="county">
                                                <option value="Dublin">
                                                <option value="kildare">
                                                <option value="Donegal">
                                                <option value="Cork">
                                                <option value="Kerry">
                                              </datalist>
                                              <br><br>
                                              Area: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input list="area" name="area">
                                               <datalist id="area">
                                                <option value="Dublin">
                                                <option value="Dublin 1">
                                                <option value="Dublin 2">
                                                <option value="Dublin 3">
                                                <option value="dublin 4">
                                              </datalist>
                                              <br><br>
                                              Bed Type: &nbsp<input type="text" name="bed type"><br>
                                              Guests: &nbsp&nbsp&nbsp&nbsp <input type="text" name="guests"><br>
                                              Min Rent: &nbsp&nbsp<input type="text" name="min rent"><br>
                                              Max Rent: &nbsp<input type="text" name="max rent"><br>
                                              <input type="submit" value="Search">
                                              </form>
                                            
					    </div>
                                         <div role="tabpanel" class="tab-pane" id="room">
                                             
                                             <form action="#.php">
                                              County: &nbsp&nbsp&nbsp&nbsp&nbsp <input list="county" name="county">
                                              <datalist id="county">
                                                <option value="Dublin">
                                                <option value="kildare">
                                                <option value="Donegal">
                                                <option value="Cork">
                                                <option value="Kerry">
                                              </datalist>
                                              <br><br>
                                              Area: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input list="area" name="area">
                                               <datalist id="area">
                                                <option value="Dublin">
                                                <option value="Dublin 1">
                                                <option value="Dublin 2">
                                                <option value="Dublin 3">
                                                <option value="dublin 4">
                                              </datalist>
                                              <br><br>
                                              Bed Type: &nbsp<input type="text" name="bed type"><br>
                                              Guests: &nbsp&nbsp&nbsp&nbsp <input type="text" name="guests"><br>
                                              Min Rent: &nbsp&nbsp<input type="text" name="min rent"><br>
                                              Max Rent: &nbsp<input type="text" name="max rent"><br>
                                              <input type="submit" value="Search">
                                              </form>
                                         </div>
                                          <div role="tabpanel" class="tab-pane" id="couch">couch for rent</div>
                                           <div role="tabpanel" class="tab-pane" id="car Parking">Book your car park</div>
                                       </div>
</div>
                                </div></center>
                                
                              
	</div>
	 <div class="col-sm-12" style="background-color:lavenderblush;"><h1 class="display-3">Explanation About Site</h1></div>
	<table class = "table">
	  <thead class="thead-dark">
      <tr>
        <th><a href ="#">Housing App.ie</a></th>
        <th><a href ="#">Useful Links</a></th>
        <th><a href ="#">Media/Sales</a></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href ="#">About us</a></td>
        <td><a href ="#">Email Alerts</a></td>
        <td><a href ="#">Display Adertising</a></td>
      </tr>
      </tbody>
      <tr>
        <td>contact us</td>
        <td>New Features</td>
        <td>Privacy</td>
      </tr>
      <tr>
        <td>Terms of use/Privacy</td>
        <td>Site Report</td>
        <td>Legal</td>
      </tr>
      <tr>
        <td>Data Request</td>
        <td>Site Blog</td>
        <td>Contact</td>
      </tr>
      </tbody>
	</table>
</div>


</body>
</html>
