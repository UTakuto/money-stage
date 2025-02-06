// カテゴリーとステージのマッピング
const stageToCategory = {
    現在: "現在",
    結婚: "結婚",
    子育て: "子育て",
    "妊娠・出産": "妊娠・出産",
    住宅: "住宅",
    医療: "医療",
    教育: "教育",
    老後: "老後",
};

document.addEventListener("DOMContentLoaded", function () {
    // 初期状態では全カテゴリーを表示
    document.querySelectorAll('[id^="category-"]').forEach((category) => {
        category.classList.remove("hidden");
    });
});

function showCategory(button) {
    console.log("Selected stage:", button.getAttribute("data-stage"));
    // 一旦全カテゴリーを非表示
    document.querySelectorAll('[id^="category-"]').forEach((category) => {
        category.classList.add("hidden");
    });

    // 選択されたステージに対応するカテゴリーを表示
    const stage = button.getAttribute("data-stage");
    const targetCategory = document.getElementById(`category-${stage}`);
    // 対応するカテゴリーを表示
    if (targetCategory) {
        targetCategory.classList.remove("hidden");
        targetCategory.scrollIntoView({ behavior: "smooth" });
    }
}

// 検索機能の追加
document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault(); // フォーム送信を防止
});

document.getElementById("searchInput").addEventListener("input", function (e) {
    const searchText = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('[id^="category-"] a');

    cards.forEach((card) => {
        const title = card.querySelector("h3").textContent.toLowerCase();
        const content = card.querySelector("div").textContent.toLowerCase();

        if (title.includes(searchText) || content.includes(searchText)) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });
});

function setSearchKeyword(keyword) {
    const searchInput = document.getElementById("searchInput");
    searchInput.value = keyword;
    searchInput.dispatchEvent(new Event("input"));
}

document.getElementById("categoryFilter").addEventListener("change", function (e) {
    const category = e.target.value;
    const sections = document.querySelectorAll('[id^="category-"]');

    sections.forEach((section) => {
        if (!category || section.id === `category-${category}`) {
            section.style.display = "";
        } else {
            section.style.display = "none";
        }
    });
});

function showAllCategories() {
    // 全てのカテゴリーを表示
    document.querySelectorAll('[id^="category-"]').forEach((category) => {
        category.classList.remove("hidden");
    });

    // 最初のカテゴリーまでスクロール
    const firstCategory = document.querySelector('[id^="category-"]');
    if (firstCategory) {
        firstCategory.scrollIntoView({ behavior: "smooth" });
    }

    // カテゴリーフィルターをリセット
    const categoryFilter = document.getElementById("categoryFilter");
    if (categoryFilter) {
        categoryFilter.value = "";
    }

    // 検索ボックスをクリア
    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
        searchInput.value = "";
    }
}

// トグル
document.getElementById("toggleUserInfo").addEventListener("click", function () {
    const content = document.getElementById("userInfoContent");
    const icon = document.getElementById("toggleIcon");

    content.classList.toggle("hidden");
    icon.classList.toggle("rotate-180");
});
