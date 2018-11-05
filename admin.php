<?php
require 'db.php';
session_start();


if(!isset($_SESSION["id"])){
    header("location:index.php");

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['edit'])) { //user logging in

        require 'edit.php';

        
    }
    }


?>
<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Dashboard</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Tokoberu Kenya</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Tokoberu Kenya</span>
			</div>
			<nav>
				<ul>
					
						
						
					<li class="active">
						<a href="#analytics">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>Analytics</span>
						</a>
					</li>


          <li class="active">
            <a href="#analytics">
              <span><i class="fa fa-bar-chart"></i></span>
              <span>Confirmed Payment</span>
            </a>
          </li>

										<li>
						<a href="logout.php">
							<span><i class="fa fa-user"></i></span>
							<span>Logout</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		
		<div class="main-content" id="analytics">
			<div class="title">
				Analytics
			</div>

			<div class="main">
				<div class="widget">
					<div class="title">Purchases</div>
					<?php	
				
				$query = "SELECT  product_id,user_id,quantity,price, total  FROM cart ";  
 $result4 = mysqli_query($mysqli, $query);  
   ?>
					    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = google.visualization.arrayToDataTable([  
                          ['Product_id','User_id', 'Quantity', 'Price','Total'],  
                          <?php  
                          while($row12 = mysqli_fetch_array($result4))  
                          {  
                               echo "['".$row12["product_id"]."', ".$row12["user_id"].", ".$row12["quantity"].", ".$row12["price"].", ".$row12["total"]."],";  
                          }  
                          ?>  
                     ]);  
       

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
  </script>



					<div id="table_div"></div>
				</div>



















				<div class="widget">
					<div class="title">Rate of Boxes to Cards Stock </div>
					<?php	
				
				$query1 = "SELECT id, count(*) as number FROM product GROUP BY category";  
 $result = mysqli_query($mysqli, $query1);  
   ?>

          <script>
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Id', 'Number'],  
                          <?php  
                          while($row1 = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row1["id"]."', ".$row1["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Rate of Gift Box to Gift Card Stock',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           </script>  
       
           <br ><br >  
            <h3 align="center" style="">Pie Chart Showing rate of Gift box to Gift Card Stock</h3>
           <div style="">  
                 
                <br />  
                <div id="piechart1" style="height: 70%;"></div>
					<div class="chart"></div>
				</div>
				</div>





























				<div class="widget">
					<div class="title">Number of Active Users</div>
				<?php	
				 
				$query3 = "SELECT id, count(*) as number FROM user GROUP BY active";  
 $result1 = mysqli_query($mysqli, $query3);  
   ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
          <script>
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Id', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["id"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Active users',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
       
           <br ><br >  
            <h3 align="center" style="">Pie Chart Showing percentage of active users</h3>
           <div style="">  
                 
                <br />  
                <div id="piechart" style="height: 70%;"></div>
					<div class="chart"></div>
				</div>
			</div>
		</div>
</div>
		


			<div class="main-content" id="update">
			<div class="title">
				Update Products
			</div>


    <div id="sp" class="login">
        
        <form method="POST" action="admin.php" enctype="multipart/form-data">
            <p>Product image</p>
            <input type="file" name="file" placeholder="image">
            <p>Category</p>
            <input type="text" name="category" placeholder="" value="" >
            <p>Type</p>
            <input type="text" name="type" placeholder="" value="">
            <p>Title</p>
            <input type="text" name="title" placeholder="">
            <p>Price</p>
            <input type="text" name="price" placeholder="" value="">
            <p>Description</p>
            <input type="text" name="description" placeholder="" value="">
            <input type="submit" name="edit" value="Edit">
        </form>
    </div>
</div>




		</div>
	</body>

	    <style type="text/css">
        
.login{
    width: 100%; 
    height: 100%;
    background: #fff;
    color: #000;
   
    
    box-sizing: border-box;
    padding-top: 0px;
    padding-bottom: 0px;

    z-index: 1;
}

.avatar{
    width: 500px;
    height: 200px;
    border-radius: 0%;
    position: absolute;
    top: -60%;
    left: calc(27% - 50px);
}

.login p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.login input{
    width: 100%;
    margin-bottom: 20px;
}

.login input[type="text"], input[type="password"]{
    border: none;
    border-bottom: 1px solid #000;
    background: transparent;
    outline: none;
    color: #000;
    height: 40px;
    width: 600px;
    font-size: 14px;
    }

.mg{
     width: 500px;
    height: 200px;
    border-radius: 0%;

  
}
.login input[type="submit"]{
    border: none;
    outline:none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;

}

.login input[type="submit"]:hover{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}
.widget{
	height: 500px;
}

    </style>
</html>

