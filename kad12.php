<?php
/*
*作者：コウユウショウ
*クラス：SE1A
 */

header('charset=utf-8');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['sub'])){
        $updir = './upload/';
        
        switch ($_FILES['upfile']['error']){
            case 1: print'ファイルのサイズが大きすぎます(php.ini)。';
                exit;
            case 2: print'ファイルのサイズが大きすぎます。';
                exit;
            case 3: print'ファイルの一部しかアップロードされていません。';
                exit;
            case 4: print'ファイルが転送されませんでした。';
                exit;
        }
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            
            $fname = mb_convert_encoding($_FILES['upfile']['name'], 'UTF-8','auto');
            if(move_uploaded_file($_FILES['upfile']['tmp_name'],$updir.$fname) ==false){
                print'アップロード失敗';
                exit;
            }else{
                $message = 'アップロード成功';
            }
        }
    }
}
?>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>課題12</title>
        <link rel="stylesheet" href="../css/kad.css">
    </head>
    <body>
        <header>
            <h1><span>課題12 ファイル処理2(ファイルのアップロード)</span></h1>
        </header>
        <div id="contents">
            <p>
                <?php
                    if($message != ''){
                        print $message. "<br>\n";
                        print 'アップロードしたファイル名は<span style="color:tomato;">'.$fname.'</span>です。' ;
                    }else{
                        print 'アップロード失敗';
                    }
                ?>
            </p>
        </div>
    </body>
</html>
