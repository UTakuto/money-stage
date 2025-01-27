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