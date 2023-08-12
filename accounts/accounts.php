<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<div class="container mt-3">
    <h2>Bảng Accounts</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once('config.php');
        $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
        $sql = "SELECT * FROM accounts";
        $result = $con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['username']."</td>";
                echo"<td>".$row['email']."</td>";
                echo"<td>".$row['password']."</td>";
                echo"<td>";
                echo"<a href='accounts/accounts_delete.php?id=".$row['id']."'><i class='fa fa-trash '></i></a>";
                echo"</td>";
                echo"<td>";
                echo"<a href='admin.php?page=accounts/accounts_edit.php&id=".$row['id']."'><i class='fa fa-pen-to-square'></i></a>";
                echo"</td>";
                echo"</tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <br>
    <a href="admin.php?page=categories/categories_add.php">
        <button class="btn btn-outline-dark">Thêm dữ liệu</button>
    </a>

</div>



