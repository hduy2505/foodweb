<div class="main">
    <h2>UPDATE PRODUCTS</h2>
    <form action="index.php?act=updateprodform&id_prod=<?=$prodct[0]['id_prod']?>" method="post" enctype="multipart/form-data">
        <select name="id_cate" id="">
            <option value="0">Category</option>
        <?php
            $cateidcur=$prodct[0]['id_cate'];
            if (isset($catelist)) {
                foreach ($catelist as $cate){
                    if($cate['id_cate']==$cateidcur)
                        echo '<option value="'.$cate['id_cate'].'" selected >'.$cate['name_cate'].'</option>';
                    else
                        echo '<option value="'.$cate['id_cate'].'">'.$cate['name_cate'].'</option>';
                }

            }
        ?>
        </select>
        <input type="text" name="name" id=""value="<?=$prodct[0]['name']?>">
        <input type="file" name="image" id="image">
        <img src="<?=$prodct[0]['image']?>" width=80 alt="">
        <input type="text" name="price" id=""value="<?=$prodct[0]['price']?>">
        <input type="hidden" name="id_prod" value="<?=$prodct[0]['id_prod']?>">
        <input type="submit" name="update" value="Update">
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
    </table>
</div> 