<div class="container mt-3">
    <h3 style="text-align: center; line-height: 2.5">Admin Wheystore Vietnam</h3>

    <table class="table item-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            ob_start();
                require_once('config.php');
                $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
                $sql = "SELECT * FROM admin";
                $result = $con->query($sql);
                if($result->num_rows>0) {
                    while($row=$result->fetch_assoc()) {
                        echo"<tr>";
                            echo"<td>".$row['id']."</td>";
                            echo"<td>".$row['email']."</td>";
                            echo"<td>".$row['username']."</td>";
                            echo"<td>".$row['fullname']."</td>";
                            echo"<td><a href='admin/admin_delete.php?id=".$row['id']."'><i class='fa fa-trash' style='color: #000000'></i></a></td>";
                            echo"<td></td>";
                        echo"</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <a href="admin.php?page=admin/add_admin.php">
        <button class="btn btn-outline-dark float-end">Thêm nhân viên</button>
    </a>

</div>
