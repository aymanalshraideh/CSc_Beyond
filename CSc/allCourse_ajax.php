<?php
require 'conn.php';
session_start(); 

$sql = "SELECT * FROM courses ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($rows as  $value) :

                                   
    ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['description'] ?></td>
             
                <!-- <?php if($value['activation']==1){ ?>
                <td>Active</td>
                <?php } else {?>
                    <td>Not Active</td>
                    <?php }?> -->
            
                <td>
                    <form action="editCourse.php" method="GET" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </form>
                    <!-- <form action="deleteCource.php" method="POST" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?php echo $value["id"] ?>">

                     
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> -->
                    <button type="button" class="btn btn-sm btn-danger" onclick="deletCourse(<?php echo $value['id'] ?>)">Delete</button>
                </td>



            </tr>
    <?php 
    endforeach; 


?>