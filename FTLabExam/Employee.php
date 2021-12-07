<?php
include 'db.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from employee where ID like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Update Employee</title>
<style type="text/css">
	.outter{
		position: center;
	}
</style>
</head>
 
<body>
	<h1>Update Employee</h1>
    <div>
    <br/><br/>
    <form action="#" method="post">
    <div class="outter">
        <div>
            <label><b>Search By ID:</b>:</label>
            <div>
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
            <div>
              <button type="submit" name="save">Submit</button>
            </div>
            <label><b>Name:</b>:</label>
            <div>
              <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>" >
            </div>
            <label><b>Department:</b>:</label>
            <div>
              <input type="text" class="form-control" name="dept">
            </div>
            <label><b>Joining Date::</b>:</label>
            <div>
              <input type="Date" class="form-control" name="joining">
            </div>
            <label><b>Salary:</b>:</label>
            <div>
              <input type="text" class="form-control" name="sal">
            </div>
            <div>
              <button type="submit" name="save">Update</button>
            </div>
        </div>
        <div>
            <span >* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Search Result</u></h3><br/>
    <div>          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Department</th>
            <th>JoiningDate</th>
            <th>Salary</th>
            
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$employee_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($employee_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['Name'];?></td>
                        <td><?php echo $value['Department'];?></td>
                        <td><?php echo $value['JoiningDate'];?></td>
                        <td><?php echo $value['Salary'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
</body>
</html>