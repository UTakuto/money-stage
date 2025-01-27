<div class="w-[80%] mx-auto p-4">
    <?php
    $groupedSearch = [];
    foreach($moneySearch as $search) {
        if (!$search['limit_income'] || (int)$profile['income'] <= (int)$search['limit_income']) {
            $groupedSearch[$search['category']][] = $search;
        }
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
                            <?php else: ?>
                                <p>所得制限: なし</p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>