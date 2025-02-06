<?php 
require "./config.php";
?>
<!DOCTYPE html>
<html lang="ja">
<?php require __DIR__ . "/components/head.php" ?>
<body class="w-full min-h-screen bg-[#fffff5]">

    <?php require __DIR__ . "/components/header.php"  ?>

    <main class="w-full min-h-[calc(100vh-20vh)] pt-[5vh] flex flex-col items-center">
        <h1 class="font-bold">あなたのことを教えてください！</h1>
        <div class="w-full overflow-y-auto">
            <form action="store.php" method="POST" class="w-[200px] md:w-[300px] mx-auto">
                <div class="pt-[15px]">
                    <label for="name" class="block text-sm font-medium text-gray-900 w-[200px] md:w-[300px]">名前</label>
                    <input type="text" name="name" id="name" placeholder="山田太郎" required class="bg-[#fdfdfd] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="pt-[10px]">
                    <label for="age" class="block text-sm font-medium text-gray-900 w-[200px] md:w-[300px]">年齢</label>
                    <input type="text" name="age" id="age" placeholder="21" required class="bg-[#fdfdfd] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="pt-[10px]">
                    <div class="flex justify-start items-end w-[200px] md:w-[300px]">
                        <label for="income" class="block text-sm font-medium text-gray-900">年収</label>
                        <p class="text-[12px] text-gray-500 pl-[5px]">1万単位</p>
                    </div>
                    <input type="text" name="income" id="income" placeholder="300" required class="bg-[#fdfdfd] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="pt-[10px]">
                    <label for="marriage" class="block text-sm font-medium text-gray-900 w-[200px] md:w-[300px]">婚姻の有無</label>
                    <ul class="text-sm font-medium text-gray-900 bg-[#fdfdfd] border border-gray-300 rounded-lg w-[200px] md:w-[300px]">
                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                            <div class="flex items-center ps-3">
                                <input id="yes-marriage-radio" value="1" type="radio" name="marriage" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="yes-marriage-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">している</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200">
                            <div class="flex items-center ps-3">
                                <input id="no-marriage-radio" value="2" type="radio" name="marriage" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="no-marriage-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">していない</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pt-[10px]">
                    <label for="children" class="block text-sm font-medium text-gray-900 w-[200px] md:w-[300px]">こどもの有無</label>
                    <ul class="text-sm font-medium text-gray-900 bg-[#fdfdfd] border border-gray-300 rounded-lg w-[200px] md:w-[300px]">
                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                            <div class="flex items-center ps-3">
                                <input id="yes-children-radio" value="1" type="radio" name="children" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="yes-children-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">いる</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200">
                            <div class="flex items-center ps-3">
                                <input id="no-children-radio" value="2" type="radio" name="children" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="no-children-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">いない</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pt-[10px]">
                    <label for="housing" class="block text-sm font-medium text-gray-900 w-[200px] md:w-[300px]">住まいのタイプ</label>
                    <ul class="text-sm font-medium text-gray-900 bg-[#fdfdfd] border border-gray-300 rounded-lg w-[200px] md:w-[300px]">
                        <li class="w-full border-b border-gray-200 rounded-t-lg">
                            <div class="flex items-center ps-3">
                                <input id="rent-radio" value="1" type="radio" name="housing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="rent-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">賃貸</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200">
                            <div class="flex items-center ps-3">
                                <input id="owned-radio" value="2" type="radio" name="housing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="owned-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">持ち家</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200">
                            <div class="flex items-center ps-3">
                                <input id="company-radio" value="3" type="radio" name="housing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="company-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">社宅・寮</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200">
                            <div class="flex items-center ps-3">
                                <input id="other-radio" value="4" type="radio" name="housing" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="other-radio" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">その他</label>
                            </div>
                        </li>
                    </ul>
                </div> 
                <div class="flex justify-center">
                    <button type="submit" class="inline-block rounded-md bg-slate-800 py-2 px-6 my-8 text-center text-sm text-white transition-all hover:bg-slate-700 focus:bg-slate-700 active:bg-slate-700">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php require __DIR__ . "/components/footer.php"  ?>
</body>
</html>