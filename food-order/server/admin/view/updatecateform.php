<div class="main">
    <h2>UPDATE CATEGORY</h2>
    <form action="index.php?act=updatecateform&id_cate=<?=$kqone[0]['id_cate']?>" method="post">
        <input type="text" name="name_cate" id="" value="<?=$kqone[0]['name_cate']?>">
        <input type="hidden" name="id_cate" value="<?=$kqone[0]['id_cate']?>">
        <input type="submit" name="update" value="Update">
    </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <td>Name</td>
            <td>Action</td>
        </tr>
    </table>
</div> 