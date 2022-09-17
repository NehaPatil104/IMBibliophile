<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>ODBC Connectivity</title>
  <style type="text/css">
    body{margin:0; padding:0;}
    .content{height: 85vh;}
  </style>
</head>
<body>
  <div class="container-fluid text-center bg-dark text-white p-4">
    <h1>Employee Management</h1>
  </div>
  <div class="container-fluid">
      <div class="mx-5 my-4">
          <form method="POST" action="">
              <div class="form-group">
                  <label>Employee Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                  <label >Address</label>
                  <input type="text" name="address" class="form-control"placeholder="Enter address">
              </div>
              <div class="form-group">
                  <label >Department</label>
                  <select multiple class="form-control" name="department">
                      <option value="Finance">Finance</option>
                      <option value="Production">Production</option>
                      <option value="Designing">Designing</option>
                      <option value="HR">HR</option>
                  </select>
              </div>
              <div class="form-group">
                  <labe>DOB</label>
                  <input type="date" name="dob" class="form-control">
              </div>
              <div class="form-group">
                  <labe>Salary</label>
                  <input type="text" name="salary" class="form-control">
              </div>
              <input type="submit" name="submit" value="Add Employee" class="btn btn-secondary">
      </form>
    </div>
  </div>
    <?php 

         if(isset($_POST['submit'])){
             $name =$_POST['name'];
             $address =$_POST['address'];
             $department =$_POST['department'];
             $dob =$_POST['dob'];
             $salary =$_POST['salary'];            

             $dbh = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\\xampp\\htdocs\\phpPracticals\\empDB.accdb;');
             $sql = "INSERT INTO employee (empName, empAddress, empDepartment, empDOB, empSalary)
                    VALUES ('$name', '$address', '$department', '$dob', '$salary')";
             $result = $dbh->query($sql);

             header('location: http://localhost:8080/phpPracticals/odbcConn.php');
         }
    ?>