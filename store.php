<?php
require "./config.php";

try {
    //送信データの取得
    $name     = filter_input(INPUT_POST, "name");
    $age      = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
    $income   = filter_input(INPUT_POST, "income", FILTER_VALIDATE_INT);
    $marriage = filter_input(INPUT_POST, "marriage", FILTER_VALIDATE_INT);
    $children = filter_input(INPUT_POST, "children", FILTER_VALIDATE_INT);
    $housing  = filter_input(INPUT_POST, "housing", FILTER_VALIDATE_INT);

    // 未入力チェック
    if(!$name) throw new Exception("名前が未入力です");
    if(!$age) throw new Exception("年齢が未入力です");
    if(!$income) throw new Exception("年収が未入力です");
    if(!$marriage) throw new Exception("婚姻の有無が未入力です");
    if(!$children) throw new Exception("こどもの有無が未入力です");
    if(!$housing) throw new Exception("住まいのタイプが未入力です");

    // プロフィールデータの作成
    $profileData = [
        'name' => $name,
        'age' => $age,
        'income' => $income,
        'marriage' => $marriage,
        'children' => $children,
        'housing' => $housing
    ];
    
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->beginTransaction();

    $sql = "INSERT INTO money_profile (
        name, 
        age, 
        income, 
        marriage, 
        children, 
        housing
    ) VALUES (
        :name, 
        :age, 
        :income, 
        :marriage, 
        :children, 
        :housing
    )";
    
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($profileData);

    $db->commit();

    // セッションにデータを保存
    $_SESSION['user_data'] = $profileData;
        
    // デバッグログ追加
    error_log("Session data saved: " . print_r($_SESSION['user_data'], true));
    
    // リダイレクト前にバッファをクリア
    ob_clean();
    
    // 絶対パスでリダイレクト
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $redirectUrl = "{$protocol}://{$host}{$path}/result.php";
    
    error_log("Redirecting to: " . $redirectUrl);
    
    header("Location: " . $redirectUrl);
    exit();

} catch(PDOException $error) {
    error_log("PDO Error: " . $error->getMessage());
    if (isset($stmt)) {
        error_log("Query: " . $stmt->queryString);
    }
    if (isset($db)) {
        $db->rollBack();
    }
    header('Location: index.php?error=db');
    exit();
} catch(Exception $error) {
    error_log("General Error: " . $error->getMessage());
    header('Location: index.php?error=' . urlencode($error->getMessage()));
    exit();
}