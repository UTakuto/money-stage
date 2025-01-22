#プロフィールテーブル

DROP TABLE IF EXISTS money_results;

CREATE TABLE money_results (
    id          SERIAL PRIMARY KEY,                            # 主キー
    name        VARCHAR(255) NOT NULL,                         # 名前
    age         TINYINT UNSIGNED NOT NULL,                     # 年齢
    income      INT UNSIGNED NOT NULL,                         # 収入
    marriage    TINYINT UNSIGNED DEFAULT 1,                    # 結婚(1:結婚, 2:未婚)
    children    TINYINT UNSIGNED DEFAULT 1,                    # 子供(1:有, 2:無)
    housing     TINYINT UNSIGNED DEFAULT 1,                    # 住宅(1:賃貸, 2:持ち家, 3:社宅・寮, 4:その他)
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,           # 作成日時
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ON UPDATE CURRENT_TIMESTAMP                    # 更新日時
)ENGINE = INNODB;