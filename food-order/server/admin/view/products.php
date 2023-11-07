<div class="main">
    <h2>PRODUCTS</h2>
    <form action="index.php?act=addproduct" method="post" enctype="multipart/form-data">
        <select name="id_cate" id="">
            <option value="0">Category</option>
        <?php
            if (isset($catelist)) {
                foreach ($catelist as $cate){
                    echo '<option value="'.$cate['id_cate'].'">'.$cate['name_cate'].'</option>';
                }

            }
        ?>
        </select>
        <input type="text" name="name" id="">
        <input type="file" name="image" id="image">
        <input type="text" name="price" id="">
        <input type="submit" name="add" value="Add">
    </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
        <?php
            if(isset($kq)&&(count($kq)>0)){
                $i=1;
                foreach ($kq as $item){
                    echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$item['name'].'</td>
                    <td><img src="'.$item['image'].'"width="80px"></td>
                    <td>'.$item['price'].'</td>
                    <td> <a href="index.php?act=updateprodform&id_prod='.$item['id_prod'].'">Edit</a> | <a href="index.php?act=delprod&id_prod='.$item['id_prod'].'">DELETE</a></td>
                </tr>';
                $i++;
                }
            }
        ?>
    </table>
</div> 