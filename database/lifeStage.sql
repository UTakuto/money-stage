DROP TABLE IF EXISTS life_stages;

CREATE TABLE life_stages( 
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,    # 主キー
    stage_name VARCHAR(255) NOT NULL ,              # ステージ名
    main_taxes TEXT NOT NULL,                       # 主な税金（カンマ区切りで格納）
    tax_estimate INT NOT NULL,                      # 年間の税金目安（万円単位）
    living_cost_estimate INT NOT NULL,              # 生活費の年間目安（万円単位）
    expenses TEXT NOT NULL,                         # 生活費の詳細（カンマ区切りで格納）
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, # 作成日時
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ON UPDATE CURRENT_TIMESTAMP         # 更新日時
 ) ENGINE = INNODB;

INSERT INTO life_stages (stage_name, main_taxes, tax_estimate, living_cost_estimate, expenses) VALUES
('教育（子供～学生）', '住民税,所得税,消費税', 30, 120, '学費,教材費,通学費,塾や習い事'),
('子育て（乳児～未就学児）', '住民税,所得税,消費税', 40, 150, '保育費用,衣服費,食費,医療費'),
('結婚・新生活', '住民税,不動産取得税,所得税,消費税', 50, 240, '結婚式費用,新居費用,家具・家電購入費,引越し費用'),
('住宅購入', '不動産取得税,固定資産税,登録免許税', 70, 360, '住宅ローン返済,光熱費,メンテナンス費用'),
('就労・仕事', '所得税,住民税,社会保険料,消費税', 60, 180, '通勤費,食費,家賃,保険料'),
('出産・育児', '住民税,所得税,消費税,健康保険料', 35, 100, '出産準備費用,医療費,おむつ代,育児用品費'),
('老後・退職', '住民税,所得税,年金保険料,消費税', 50, 220, '医療費,介護費用,日常生活費,趣味・旅行費');