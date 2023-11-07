<div class="main">
    <h2>CATEGORY</h2>
    <form action="index.php?act=addcate" method="post" enctype="multipart/form-data">
        <input type="text" name="name_cate" id="">
        <input type="submit" name="add" value="Add">
    </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <td>Name</td>
            <td>Action</td>
        </tr>
        <?php
            if(isset($kq)&&(count($kq)>0)){
                $i=1;
                foreach ($kq as $item){
                    echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$item['name_cate'].'</td>
                    <td> <a href="index.php?act=updatecateform&id_cate='.$item['id_cate'].'">Edit</a> | <a href="index.php?act=delcate&id_cate='.$item['id_cate'].'">DELETE</a></td>
                </tr>';
                $i++;
                }
            }
        ?>
    </table>
</div> 