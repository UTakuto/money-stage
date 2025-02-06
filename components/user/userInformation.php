<!-- トグルボタン -->
<button id="toggleUserInfo" class="w-[80%] mx-auto p-3 mb-5 flex items-center justify-between bg-gray-100 rounded-lg hover:bg-gray-200 transition-all duration-300 border border-gray-200 shadow-sm group">
    <span class="font-medium text-gray-800 group-hover:text-gray-900">あなたの情報を確認</span>
    <svg id="toggleIcon" class="w-5 h-5 transform transition-transform duration-300 text-gray-600 group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
</button>

<div id="userInfoContent" class="w-[80%] mx-auto p-6 mb-4 bg-white rounded-lg hidden transition-all duration-300 shadow-md border border-gray-200">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4 p-4 bg-gray-100 rounded-lg">
            <h3 class="font-semibold text-lg text-gray-800 border-b pb-2">基本情報</h3>
            <div class="space-y-3">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">名前:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['name']) ?></span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">年齢:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['age']) ?>歳</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">年収:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['income']) ?>万円</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">結婚:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['marriage']) ?></span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">子供:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['children']) ?></span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium min-w-[4rem]">住居:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['housing']) ?></span>
                </div>
            </div>
        </div>
        <div class="space-y-4 p-4 bg-gray-100 rounded-lg">
            <h3 class="font-semibold text-lg text-gray-800 border-b pb-2">検索条件</h3>
            <div class="space-y-3">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium">該当する補助金:</span>
                    <span class="text-gray-800 font-semibold"><?= count($moneySearch) ?>件</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium">収入条件:</span>
                    <span class="text-gray-800"><?= htmlspecialchars($profile['income']) ?>万円以下</span>
                </div>
            </div>
        </div>
    </div>
</div>