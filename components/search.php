<div class="w-[80%] mx-auto mt-10">
    <form class="mx-auto space-y-4">
        <!-- カテゴリー選択 -->
        <div class="flex gap-4">
            <select id="categoryFilter" class="w-1/3 p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <option value="">全てのカテゴリー</option>
                <option value="結婚・新生活">結婚</option>
                <option value="妊娠・出産">妊娠・出産</option>
                <option value="子育て">子育て</option>
                <option value="教育">教育</option>
                <option value="住宅">住宅</option>
                <option value="老後">老後</option>
                <option value="老後">その他</option>
            </select>
            
            <!-- 検索ボックス -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" 
                    id="searchInput" 
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="補助金を検索..." 
                />
                <button type="submit" class="text-[#fefefe] absolute end-2.5 bottom-2.5 bg-slate-800 hover:bg-slate-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2">
                    検索
                </button>
            </div>
            <!-- 全て表示ボタン -->
            <button type="button" 
                onclick="showAllCategories()" 
                class="px-6 py-2 text-sm text-[#fefefe] bg-slate-800 rounded-lg hover:bg-slate-700 focus:ring-4 focus:outline-none">
                全て表示
            </button>
        </div>

        <!-- 検索キーワードヒント -->
        <div class="flex flex-wrap justify-start items-center gap-2">
            <span class="text-sm text-gray-600">検索キーワード：</span>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('出産')">出産</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('子育て')">子育て</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('住宅')">住宅</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('教育')">教育</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('大学生')">大学生</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('高校生')">高校生</button>
            <button type="button" class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" onclick="setSearchKeyword('中学生')">中学生</button>
        </div>
    </form>
</div>