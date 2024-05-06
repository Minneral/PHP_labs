<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK 5</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="explorer">
        <div class="command">

        </div>

        <div class="content">
            <div class="files">
                <?php

                $directory = "D:/software/ospanel/domains/php/labs/LR_14";

                $img = array(
                    "php" => "https://cdn0.iconfinder.com/data/icons/files-98/32/Php-256.png",
                    "txt" => "https://cdn4.iconfinder.com/data/icons/file-extension-names-vol-6/512/12-1024.png",
                    "css" => "https://cdn3.iconfinder.com/data/icons/dompicon-flat-file-format/256/file-css-format-type-256.png",

                );

                $elements = scandir($directory);

                $files = array_filter($elements, function ($file) use ($directory) {
                    return is_file($directory . '/' . $file);
                });

                $dirs = array_filter($elements, function ($file) use ($directory) {
                    return is_dir($directory . '/' . $file) && $file != '.' && $file != '..';
                });

                $dir_ind = 1;
                $file_ind = 1;

                foreach ($dirs as $dir) {
                    echo "
                    <div class=\"file\" id=\"d" . $dir_ind++ . "\">
                    <img src=\"https://cdn3.iconfinder.com/data/icons/basic-colored/1024/folder-1024.png\" alt=\"icon\" class=\"icon\">
                    <div class=\"fileName\">" . $dir . "</div>
                </div>
                    ";
                }
                foreach ($files as $file) {
                    $fileSize = filesize($file);
                    $dataModify = filemtime($file);
                    $dataModify = date('d.m.Y H:i:s', $dataModify);

                    preg_match('/([^.]+)$/', $file, $type);
                    $type = $type[0];

                    echo "
                    <div class=\"file\" id=\"f" . $file_ind++ . "\" data-size=\"" . $fileSize . "\" data-modify=\"" . $dataModify . "\">
                    <img src=\"" . $img[$type] . "\" alt=\"icon\" class=\"icon\">
                    <div class=\"fileName\">" . $file . "</div>
                </div>
                    ";
                }

                ?>
                <!-- <div class="file">
                    <img src="https://cdn4.iconfinder.com/data/icons/file-extension-names-vol-6/512/12-1024.png" alt="icon" class="icon">
                    <div class="fileName">file.txt</div>
                </div> -->
            </div>

            <div class="info">
                <img src="https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/SamCopeland/phpZC7lK9.png" alt="icon" class="icon" id="i_img">
                <div class="fileName" id="i_name"></div>
                <div class="fileSize" id="i_size"></div>
                <div class="fileMDate" id="i_modify"></div>
            </div>
        </div>
    </div>

    <a href="lab14.php" class="goback">Назад</a>
</body>

<script>
    document.addEventListener('click', e => {
        const fileElement = e.target.closest('.file');

        if (fileElement) {
            Array.from(document.getElementsByClassName('file')).forEach(item => {
                item.classList.remove('active');
            });

            fileElement.classList.add('active');

            let children = fileElement.children;
            let img = children[0].getAttribute('src');
            let fileName = children[1].innerHTML;
            let fileSize;
            let fileModify;
            let flag = false;

            if (fileElement.id.includes('d')) {
                filesize = 'Каталог';
                fileModify = '';
                flag = true;
            } else {
                filesize = fileElement.getAttribute('data-size');
                fileModify = fileElement.getAttribute('data-modify');
                flag = false;
            }

            let i_img = document.getElementById('i_img');
            let i_name = document.getElementById('i_name');
            let i_size = document.getElementById('i_size');
            let i_modify = document.getElementById('i_modify');

            i_img.setAttribute('src', img);
            i_name.innerHTML = fileName;
            i_size.innerHTML = flag ? filesize : filesize + " байт";
            i_modify.innerHTML = fileModify;
        }
    });
</script>


</html>