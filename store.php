<?php
// store.php

require "./config.php";
// var_dump($_POST);



try{
    //送信データの取得
    $name     = filter_input(INPUT_POST, "name");
    $age      = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
    $income   = filter_input(INPUT_POST, "income", FILTER_VALIDATE_INT);
    $marriage = filter_input(INPUT_POST, "marriage", FILTER_VALIDATE_INT);
    $children = filter_input(INPUT_POST, "children", FILTER_VALIDATE_INT);
    $housing  = filter_input(INPUT_POST, "housing", FILTER_VALIDATE_INT);

    // 送信データの確認
    var_dump($name , $age , $income , $marriage , $children , $housing);

    // 未入力チェック
    if(!$name){
        throw new Exception("名前が未入力です");
    }
    if(!$age){
        throw new Exception("年齢が未入力です");
    }
    if(!$income){
        throw new Exception("年収が未入力です");
    }
    if(!$marriage){
        throw new Exception("婚姻の有無が未入力です");
    }
    if(!$children){
        throw new Exception("こどもの有無が未入力です");
    }
    if(!$housing){
        throw new Exception("住まいのタイプが未入力です");
    }

    // DB接続
    $db = new PDO(DB_DSN, DB_USER, DB_PASS );

    // トランザクション開始
    $db->beginTransaction();

    $resultTable = TB_RESULT;

    $resultSql ="
        INSERT INTO {$resultTable} (name, age, income, marriage, children, housing)
        VALUES (:name, :age, :income, :marriage, :children, :housing)
    ";

    $stmt = $db->prepare($resultSql);
    $stmt -> execute(
        [
            "name"     => $name,
            "age"      => $age,
            "income"   => $income,
            "marriage" => $marriage,
            "children" => $children,
            "housing"  => $housing
        ]
    );

    // コミット
    $db->commit();
}
catch(PDOException $error){
    print $error->getMessage() . ">>>" . $stmt->queryString;
    //ロールバック
    $db->rollBack();
}
catch(Exception $error){
    print $error->getMessage();
     //ロールバック
    $db->rollBack();
}