<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('test.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["playlist"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('test.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["playlist"];
    $jsonfile = $jsonfile[$id];

    $post["title"] = isset($_POST["title"]) ? $_POST["title"] : "";
    $post["title_bg"] = isset($_POST["title_bg"]) ? $_POST["title_bg"] : "";
    $post["link"] = isset($_POST["link"]) ? $_POST["link"] : "";
    $post["description"] = isset($_POST["description"]) ? $_POST["description"] : "";



    if ($jsonfile) {
        unset($all["playlist"][$id]);
        $all["playlist"][$id] = $post;
        $all["playlist"] = array_values($all["playlist"]);
        file_put_contents("test.json", json_encode($all));
    }
    header("Location: http://localhost/test/index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="http://localhost/test/edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $jsonfile["title"] ?>" name="title"/>
        <input type="text" value="<?php echo $jsonfile["title_bg"] ?>" name="title_bg"/>
        <input type="text" value="<?php echo $jsonfile["link"] ?>" name="link"/>
        <input type="text" value="<?php echo $jsonfile["description"] ?>" name="description"/>
        <input type="submit"/>
    </form>
<?php endif; ?>