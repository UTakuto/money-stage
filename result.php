<?php
require_once __DIR__ . "/config.php";

try {
    // DB接続と初期データ取得
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    
    // プロフィールデータを取得
    $sql = "SELECT * FROM " . TB_PROFILE . " ORDER BY id DESC LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

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

} catch(PDOException $error) {
    echo "DBエラー: " . $error->getMessage();
    exit;
} catch(Exception $error) {
    echo "エラー: " . $error->getMessage();
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

    <div class="flex items-center justify-center gap-8 mb-4">
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-[#FF0000] rounded-full"></div>
            <span class="text-sm text-gray-600">現在のステージ</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-[#FFD700] rounded-full"></div>
            <span class="text-sm text-gray-600">将来のステージ</span>
        </div>
    </div>

    <div class="w-[80%] h-[50%] flex border border-[#9f9f9f] border-[1px] rounded-[10px] m-auto overflow-x-auto">
        <ol class="items-center sm:flex justify-center whitespace-nowrap min-w-max py-6 pl-6">
            <?php foreach ($lifeStages as $stageName => $stageInfo): ?>
                <li class="w-fit relative mb-6 sm:mb-0 <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'h-[55%]' : '' ?>">
                    <div class="w-full flex items-center">
                        <div class="z-10 flex items-center justify-center w-6 h-6 <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'bg-[#FF0000]' : 'bg-[#FFD700]' ?> rounded-full shrink-0"></div>
                        <div class="hidden sm:flex w-[100%] bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold <?= isset($stageInfo['current']) && $stageInfo['current'] ? 'text-[#FF0000]' : 'text-gray-900' ?> dark:text-white">
                            <?= htmlspecialchars($stageName) ?>
                            <?php if (isset($stageInfo['age'])): ?>
                                <span class="text-sm">(<?= htmlspecialchars($stageInfo['age']) ?>歳)</span>
                            <?php endif; ?>
                        </h3>
                        <div class="text-sm text-gray-600">
                            <?php if ($stageName === "現在"): ?>
                                <?= "想定税金: " . htmlspecialchars($stageInfo["age"]) . "万円/年" ?>
                                <br>主な支出: 生活費,交通費,娯楽費
                            <?php else: ?>
                                <?php
                                switch($stageName) {
                                    case "結婚":
                                        echo "想定税金: 50万円/年";
                                        echo "<br>主な支出: 結婚式費用,新居費用,家具・家電購入費,引越し費用";
                                        break;
                                    case "妊娠・出産":
                                        echo "想定税金: 35万円/年";
                                        echo "<br>主な支出: 出産準備費用,医療費,おむつ代,育児用品費";
                                        break;
                                    case "子育て":
                                        echo "想定税金: 40万円/年";
                                        echo "<br>主な支出: 保育費用,衣服費,食費,医療費";
                                        break;
                                    case "教育":
                                        echo "想定税金: 30万円/年";
                                        echo "<br>主な支出: 学費,教材費,通学費,塾や習い事";
                                        break;
                                    case "住宅":
                                        echo "想定税金: 70万円/年";
                                        echo "<br>主な支出: 住宅ローン返済,光熱費,メンテナンス費用";
                                        break;
                                    case "老後":
                                        echo "想定税金: 50万円/年";
                                        echo "<br>主な支出: 医療費,介護費用,日常生活費,趣味・旅行費";
                                        break;
                                }
                                ?>
                            <?php endif; ?>
                        </div>
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
    <?php require __DIR__ . "/components/search.php" ?>

    <div class="w-[80%] mx-auto p-4">
        <?php
        $groupedSearch = [];
        foreach($moneySearch as $search) {
            $groupedSearch[$search['category']][] = $search;
        }
        
        foreach($groupedSearch as $category => $items):?>
            <div id="category-<?= htmlspecialchars($category) ?>" class="mb-8">
                <h2 class="text-[30px] font-bold mb-4 text-gray-900 dark:text-white"><?= htmlspecialchars($category) ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach($items as $search): ?>
                        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <?= htmlspecialchars($search['name']) ?>
                            </h3>
                            <div class="font-normal text-gray-700 dark:text-gray-400">
                                <p class="mb-1">補助金額: <?= htmlspecialchars($search['subsidy']) ?></p>
                                <p class="mb-1">対象: <?= htmlspecialchars($search['target']) ?></p>
                                <p class="mb-1">申請期間: <?= htmlspecialchars($search['application_period']) ?></p>
                                <p class="mb-1">地域: <?= htmlspecialchars($search['area']) ?></p>
                                <?php if($search['limit_income']): ?>
                                    <p>所得制限: <?= htmlspecialchars($search['limit_income']) ?>万円以下</p>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="./js/result.js"></script>
</body>
</html>