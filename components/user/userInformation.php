<div class="w-[80%] mx-auto p-4 mb-4 bg-gray-100 rounded">
    <h2 class="text-lg font-bold mb-2">取得データ確認</h2>
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div>
            <p>名前: <?= htmlspecialchars($profile['name']) ?></p>
            <p>年齢: <?= htmlspecialchars($profile['age']) ?>歳</p>
            <p>年収: <?= htmlspecialchars($profile['income']) ?>万円</p>
            <p>結婚: <?= htmlspecialchars($profile['marriage']) ?></p>
            <p>子供: <?= htmlspecialchars($profile['children']) ?></p>
            <p>住居: <?= htmlspecialchars($profile['housing']) ?></p>
        </div>
        <div>
            <p>取得した補助金データ: <?= count($moneySearch) ?>件</p>
            <p>フィルター条件: 年収<?= htmlspecialchars($profile['income']) ?>万円以下</p>
        </div>
    </div>
</div>