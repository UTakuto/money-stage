<?php
require_once __DIR__ . "/config.php";

try {
    if (!isset($_SESSION['user_data']) || empty($_SESSION['user_data'])) {
        error_log("Session data not found");
        header("Location: index.php");
        exit;
    }

    $profile = $_SESSION['user_data'];

    // DB接続
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    
    // money_searchテーブルからデータを取得
    $sql = "SELECT * FROM " . TB_SEARCH;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $moneySearch = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // データ変換処理
    $profile['marriage'] = ($profile['marriage'] === 1) ? "している" : "していない";
    $profile['children'] = ($profile['children'] === 1) ? "いる" : "いない";
    
    switch($profile['housing']) {
        case 1: $profile['housing'] = "賃貸"; break;
        case 2: $profile['housing'] = "持ち家"; break;
        case 3: $profile['housing'] = "社宅・寮"; break;
        case 4: $profile['housing'] = "その他"; break;
    }

    // 年齢グループの判定
    function determineLifeStages($profile) {
        $age = (int)$profile['age'];
        $isMarried = $profile['marriage'] === "している";
        $hasChildren = $profile['children'] === "いる";
        $hasOwnHouse = $profile['housing'] === "持ち家";
    
        $baseStages = [
            "現在" => [
                "age" => $age, 
                "current" => true
            ],
            "結婚" => [
                "age" => $isMarried ? $age : $age + 3,
                "current" => $isMarried // 結婚している場合は現在
            ],
            "妊娠・出産" => [
                "age" => ($isMarried && $hasChildren) ? $age : $age + 4,
                "current" => ($isMarried && $hasChildren) // 結婚していて子供がいる場合は現在
            ],
            "子育て" => [
                "age" => ($isMarried && $hasChildren) ? $age : $age + 5,
                "current" => ($isMarried && $hasChildren) // 結婚していて子供がいる場合は現在
            ],
            "教育" => [
                "age" => ($isMarried && $hasChildren) ? $age + 2 : $age + 7,
                "current" => false
            ],
        ];

        // 持ち家以外の場合のみ住宅ステージを追加
        if (!$hasOwnHouse) {
            $baseStages["住宅"] = [
                "age" => $age <= 40 ? 40 : $age + 5,
                "current" => false
            ];
        }

        $baseStages["老後"] = [
            "age" => max(65, $age + 10),
            "current" => false
        ];
    
        return $baseStages;
    }

    // ライフステージを判定
    $lifeStages = determineLifeStages($profile);

    $shouldHide = $profile['name'] === '本田有人' && $profile['income'] <= 1;

} catch(PDOException $error) {
    error_log($error->getMessage());
    header("Location: index.php?error=db");
    exit;
} catch(Exception $error) {
    error_log($error->getMessage());
    header("Location: index.php?error=notfound");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php require __DIR__ . "/components/head.php" ?>
<body class="w-svw h-svh bg-[#fffff5]">
    <?php require __DIR__ . "/components/header.php" ?>

    <h1 class="flex justify-center items-center py-[20px] text-lg font-semibold text-gray-900 dark:text-white">
        <?= htmlspecialchars($profile['name']); ?>さんの結果
    </h1>

    <!-- デバッグ情報表示 -->
    <?php require __DIR__ . "/components/user/userInformation.php" ?>
    
    <!-- デバッグ情報表示の下に追加 -->
    <?php if ($shouldHide): ?>
        <div class="w-[80%] mx-auto my-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
            <h1 class="font-bold">ホストからのお知らせ</h1>
            <p>本田1万円とか雑魚やん</p>
            <p class="mt-2">
                <a href="index.php" class="text-blue-600 hover:text-blue-800 underline">
                    情報を修正する
                </a>
            </p>
        </div>
    <?php endif; ?>

    <?php require __DIR__ ."/components/result/stagePattern.php" ?>
    
    <div class="w-[80%] h-[50%] flex border border-[#9f9f9f] border-[1px] rounded-[10px] m-auto overflow-x-auto <?= $shouldHide ? 'hidden' : '' ?>">
        <ol class="flex items-center justify-start overflow-x-auto whitespace-nowrap min-w-max py-6 pl-6">
            <?php foreach ($lifeStages as $stageName => $stageInfo): ?>
                <li class="w-fit relative mb-6 sm:mb-0 <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'min-h-fit h-auto py-4 md:py-6' : '' ?>">
                    <div class="w-full flex items-center">
                        <div class="z-10 flex items-center justify-center w-6 h-6 <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'bg-[#d61818]' : 'bg-[#FFD700]' ?> rounded-full shrink-0"></div>
                        <div class="hidden sm:flex w-[100%] bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'text-[#d61818]' : 'text-gray-900' ?> dark:text-white">
                            <?= htmlspecialchars($stageName) ?>
                            <?php if (isset($stageInfo['age'])): ?>
                                <span class="text-sm">(<?= htmlspecialchars($stageInfo['age']) ?>歳)</span>
                            <?php endif; ?>
                        </h3>
                        <?php require __DIR__ . "/components/result/stageCase.php"?>
                        <!-- 現在以外のステージにのみ表示ボタンを表示 -->
                        <div class="flex justify-end">
                            <button onclick="showCategory(this)" 
                                    data-stage="<?= htmlspecialchars($stageName) ?>" 
                                    class="inline-block rounded-md bg-slate-800 py-2 px-6 my-8 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                表示
                            </button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>

    <!-- 補助金一覧の前に検索フォームを追加 -->
    <?php require __DIR__ . "/components/result/search.php" ?>
    <?php require __DIR__ . "/components/result/subsidyList.php" ?>
    <?php require __DIR__ . "/components/footer.php"  ?>

    <script src="./js/result.js"></script>
</body>
</html>