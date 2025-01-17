DROP TABLE IF EXISTS money_search;

# create products table
CREATE TABLE money_search(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,     #主キー
    category   VARCHAR(100),                        # カテゴリー
    name       VARCHAR(255) NOT NULL,               # タイトル
    target     VARCHAR(255) NOT NULL,               # ターゲット
    subsidy    VARCHAR(255) NOT NULL,               # 助成金
    application_period VARCHAR(255) NOT NULL,       # 申請期間
    area       VARCHAR(255) NOT NULL,               # 対象地域

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, # 作成日時
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ON UPDATE CURRENT_TIMESTAMP         # 更新日時
)ENGINE = INNODB;

INSERT INTO money_search (category, name, target, subsidy, application_period, area) VALUES
-- 子育て
('子育て', '高校生学費補助金', '高校に通う生徒の保護者', '年間最大15万円', '年度ごと', '全国'),
('子育て', '大学生奨学金', '大学生の保護者', '月額2万円〜10万円', '常時', '全国'),
('子育て', '就学援助制度', '低所得家庭の子ども', '教材費や給食費を補助', '年度ごと', '全国'),
('子育て', '幼児教育・保育の無償化', '幼稚園・保育園児を持つ家庭', '無償化または一部補助', '常時', '全国'),
('子育て', '学用品購入助成金', '学用品を購入する家庭', '一律5千円〜1万円', '年度ごと', '各自治体'),
('子育て', '子供のインターネット利用補助金', '子供のための通信費を補助', '年間最大3万円', '年度ごと', '各自治体'),
('子育て', '読書推進費用補助金', '図書購入費用を補助', '一律5千円', '年度ごと', '各自治体'),
('子育て', '学習塾費用補助金', '学習塾を利用する家庭', '月額最大5千円', '年度ごと', '各自治体'),
('子育て', '特別支援教育助成金', '障害を持つ子供の教育費を補助', '年間最大10万円', '年度ごと', '全国'),
('子育て', '中高生留学支援金', '中高生の留学費用を補助', '一律20万円', '年度ごと', '全国'),
('子育て', '教育ローン利子補助金', '教育ローンを利用する家庭', '最大年間10万円', '年度ごと', '全国'),
('子育て', '通学交通費助成金', '学生の通学定期代を補助', '年間最大10万円', '年度ごと', '各自治体'),
('子育て', '自宅学習環境整備助成金', '自宅学習のための設備を補助', '最大20万円', '年度ごと', '全国'),
('子育て', '部活動参加費用補助金', '部活動に参加する学生', '最大5万円', '年度ごと', '各自治体'),
('子育て', '高等教育の修学支援新制度', '大学・短大・専門学校の学費減免', '最大70万円/年', '年度ごと', '全国'),
('子育て', '文化活動費用補助金', '文化活動を行う学生', '一律2万円', '年度ごと', '各自治体'),
('子育て', '学校給食費無償化', '小中学生の給食費を無償化', '全額', '年度ごと', '各自治体'),
('子育て', '通信教育支援金', '通信教育を受ける学生', '年間最大5万円', '年度ごと', '全国'),
('子育て', 'タブレット端末補助金', '学習用タブレット購入費を補助', '一律2万円', '年度ごと', '各自治体'),
('子育て', '中高一貫教育支援金', '中高一貫校に通う生徒の保護者', '最大15万円/年', '年度ごと', '全国'),

-- 児童手当や育児関係
('子育て', '児童手当', '中学生以下の子供を持つ家庭', '月額1万円〜1万5千円', '常時', '全国'),
('子育て', '出産育児一時金', '出産した家庭', '一律42万円', '出産後1年以内', '全国'),
('子育て', '子育て世帯特別給付金', '子育て世帯', '一律10万円', '年度ごと', '全国'),
('子育て', '乳幼児医療費助成金', '乳幼児の医療費を補助', '医療費全額または一部', '年度ごと', '各自治体'),
('子育て', '保育所費用助成金', '保育所に子供を預ける家庭', '月額最大3万円', '年度ごと', '各自治体'),
('子育て', '幼児教育支援助成金', '幼児教育プログラムを受講する家庭', '年間最大5万円', '年度ごと', '全国'),
('子育て', 'おむつ購入補助金', '乳幼児を持つ家庭', '月額5千円〜1万円', '年度ごと', '各自治体'),
('子育て', '子供のワクチン接種費用補助金', '必要なワクチン接種を受ける家庭', '一律5千円〜1万円', '年度ごと', '各自治体'),
('子育て', '未就学児健康診断補助金', '健康診断を受ける未就学児の家庭', '一律5千円〜1万円', '年度ごと', '各自治体'),
('子育て', '多子世帯支援金', '3人以上の子供を持つ家庭', '一律10万円〜20万円', '年度ごと', '各自治体'),
('子育て', '育児支援用品購入補助金', 'ベビーカーやチャイルドシート購入', '最大5万円', '年度ごと', '全国'),
('子育て', '子供の歯科治療費補助金', '小児歯科治療の費用を補助', '最大3万円', '年度ごと', '各自治体'),
('子育て', '一人親家庭支援金', '一人親家庭', '年間最大30万円', '年度ごと', '全国'),
('子育て', '学童保育利用補助金', '学童保育を利用する家庭', '月額5千円', '年度ごと', '各自治体'),
('子育て', '子供の食育活動費補助金', '子供向け食育プログラムを受講', '一律1万円', '年度ごと', '全国'),
('子育て', '乳児検診費用補助金', '乳児検診を受ける家庭', '一律5千円', '年度ごと', '各自治体'),
('子育て', '子供のスポーツ活動支援金', 'スポーツ活動費用を補助', '最大1万円', '年度ごと', '各自治体'),
('子育て', '子供の学童教材費補助金', '学童用教材の購入費を補助', '一律5千円', '年度ごと', '各自治体'),
('子育て', '地域子育て交流助成金', '地域イベント参加費用を補助', '一律3千円', '年度ごと', '各自治体'),
('子育て', '児童相談費用補助金', '専門家との相談費用を補助', '一律5千円〜1万円', '年度ごと', '全国');

-- 結婚・出産
('結婚・出産', '結婚新生活支援補助金', '新婚夫婦（年収要件あり）', '最大60万円', '婚姻届け提出後1年以内', '全国'),
('結婚・出産', '不妊治療費助成金', '不妊治療を受ける夫婦', '年間最大30万円', '年度ごと', '全国'),
('結婚・出産', '特定不妊治療費助成金', '高度不妊治療を受ける夫婦', '年間最大25万円', '年度ごと', '全国'),
('結婚・出産', '出産準備金支援金', '出産前の準備費用を補助', '一律5万円', '妊娠届提出後', '各自治体'),
('結婚・出産', '双子・三つ子支援金', '複数の子供を同時に出産した家庭', '一律10万円〜30万円', '出産後3ヶ月以内', '各自治体'),
('結婚・出産', '産後ケア事業補助金', '産後ケアサービスを利用する家庭', '最大10万円', '出産後1年以内', '各自治体'),
('結婚・出産', '出産祝い金', '出産した家庭', '一律5万円〜10万円', '出産後3ヶ月以内', '各自治体'),
('結婚・出産', '妊婦健康診断補助金', '妊婦検診の費用を補助', '最大15万円', '妊娠期間中', '全国'),
('結婚・出産', '育児休業給付金', '育児休業を取得した家庭', '月額賃金の67%', '育休期間中', '全国'),
('結婚・出産', '妊産婦タクシー利用補助金', '妊婦の移動にかかる交通費', '最大1万円', '妊娠期間中', '各自治体'),
('結婚・出産', '出産後訪問ケア助成金', '助産師による訪問ケア費用を補助', '一律2万円', '出産後6ヶ月以内', '各自治体'),
('結婚・出産', '子どもを守る保険料補助金', '子供の保険料負担を軽減', '年間最大3万円', '年度ごと', '各自治体'),
('結婚・出産', '乳児栄養補助金', '粉ミルクや育児用食品費を補助', '月額5千円〜1万円', '年度ごと', '各自治体'),
('結婚・出産', '里帰り出産交通費補助金', '出産のため里帰りする際の交通費', '一律5万円', '出産前後', '各自治体'),
('結婚・出産', '夫婦関係強化プログラム補助金', '新婚・妊娠中の夫婦', '一律2万円', '年度ごと', '各自治体'),
('結婚・出産', '妊娠中栄養サポート費用助成金', '妊婦の栄養相談費用を補助', '一律1万円', '妊娠期間中', '各自治体'),
('結婚・出産', '保育環境整備助成金', '保育スペースの改善費用を補助', '一律10万円', '年度ごと', '各自治体'),
('結婚・出産', '新生児検診費用補助金', '新生児検診を受ける家庭', '最大2万円', '出産後3ヶ月以内', '各自治体'),
('結婚・出産', '妊婦体調モニタリング支援金', '妊婦の健康デバイス購入費用', '一律2万円', '妊娠期間中', '各自治体'),
('結婚・出産', '産後エクササイズ補助金', '産後ケアプログラムの利用費用', '最大1万円', '出産後1年以内', '各自治体');

-- 住宅
('住宅', '住宅取得支援金', '住宅を購入する世帯', '最大50万円', '購入後1年以内', '全国'),
('住宅', '住宅リフォーム補助金', 'リフォームを行う家庭', '最大30万円', '年度ごと', '各自治体'),
('住宅', '省エネ住宅補助金', '省エネ設備を導入する家庭', '最大20万円', '年度ごと', '全国'),
('住宅', '賃貸住宅支援金', '賃貸住宅に住む低所得世帯', '月額5千円〜1万円', '年度ごと', '各自治体'),
('住宅', '子育て世帯住宅購入補助金', '子育て世帯が家を購入する場合', '最大50万円', '購入後1年以内', '全国'),
('住宅', '耐震補強工事助成金', '耐震改修を行う家庭', '最大30万円', '年度ごと', '各自治体'),
('住宅', '空き家改修補助金', '空き家を購入または改修する場合', '最大50万円', '年度ごと', '各自治体'),
('住宅', '定住促進住宅助成金', '地域移住をする家庭', '最大100万円', '年度ごと', '各自治体'),
('住宅', '長寿命住宅改修助成金', '高齢者向け住宅改修費用を補助', '最大30万円', '年度ごと', '全国'),
('住宅', '太陽光発電導入補助金', '太陽光パネル設置費用を補助', '最大20万円', '年度ごと', '全国'),
('住宅', '子供部屋リフォーム補助金', '子供専用の部屋を改修する場合', '一律10万円', '年度ごと', '各自治体'),
('住宅', '高齢者同居住宅改修助成金', '高齢者を同居する家庭の改修費用', '最大30万円', '年度ごと', '各自治体'),
('住宅', '室内空気質改善補助金', '空気清浄機設置費用を補助', '一律2万円', '年度ごと', '各自治体'),
('住宅', 'バリアフリー改修助成金', 'バリアフリー改修工事費用を補助', '最大20万円', '年度ごと', '全国'),
('住宅', '移住者住宅取得補助金', '地方移住者の住宅購入費用を補助', '最大100万円', '年度ごと', '各自治体'),
('住宅', '子育て住宅拡張助成金', '子育てのための家の拡張費用', '最大30万円', '年度ごと', '全国'),
('住宅', '防災リフォーム助成金', '防災対策リフォーム費用を補助', '最大20万円', '年度ごと', '各自治体'),
('住宅', '賃貸住宅バリアフリー補助金', '賃貸物件をバリアフリー化する場合', '最大10万円', '年度ごと', '各自治体'),
('住宅', '再生可能エネルギー補助金', '再生可能エネルギー設備導入費用', '最大50万円', '年度ごと', '全国'),
('住宅', '環境性能向上リフォーム補助金', '断熱材や省エネ窓導入費用を補助', '最大20万円', '年度ごと', '全国');

-- 医療
('医療', '小児医療費助成', '子供の医療費を補助', '医療費の自己負担分全額または一部', '年度ごと', '各自治体'),
('医療', '高額療養費制度', '医療費が一定額を超えた場合', '超過分を補助', '医療費発生後2年以内', '全国'),
('医療', '特定疾患治療研究事業助成金', '難病患者', '医療費の一部または全額', '年度ごと', '全国'),
('医療', '妊婦健診費用補助金', '妊婦検診費用を補助', '最大15万円', '妊娠期間中', '全国'),
('医療', '乳幼児健康診査費助成', '乳幼児の定期健診費用を補助', '一部または全額補助', '検診後一定期間内', '各自治体'),
('医療', 'がん検診助成金', 'がん検診費用を補助', '一律5千円〜1万円', '年度ごと', '全国'),
('医療', '障害者医療費助成', '障害者の医療費を補助', '自己負担分全額または一部', '年度ごと', '各自治体'),
('医療', '心療内科カウンセリング助成金', '心療内科のカウンセリング費用', '一律1万円〜3万円', '年度ごと', '各自治体'),
('医療', '予防接種費用助成金', '定期予防接種費用を補助', '一部または全額補助', '予防接種後一定期間内', '各自治体'),
('医療', '出産後検診費助成金', '出産後の健康診査費用を補助', '一律5千円〜1万円', '出産後1年以内', '各自治体'),
('医療', '障害児医療費助成', '障害児の医療費を補助', '自己負担分全額または一部', '年度ごと', '各自治体'),
('医療', '高齢者健康診査助成金', '高齢者の健康診査費用を補助', '一律5千円〜1万円', '年度ごと', '各自治体'),
('医療', '訪問看護費用助成金', '訪問看護サービス費用を補助', '最大5万円', 'サービス利用後1年以内', '各自治体'),
('医療', '在宅医療費補助金', '在宅療養にかかる費用を補助', '最大10万円', '年度ごと', '各自治体'),
('医療', '健康増進プログラム助成金', '健康教室や運動プログラム費用', '一律1万円〜2万円', '年度ごと', '各自治体'),
('医療', '医療機器購入助成金', '医療機器の購入費用を補助', '最大10万円', '年度ごと', '各自治体'),
('医療', '介護用品購入助成金', '高齢者介護用品購入費用を補助', '最大5万円', '年度ごと', '各自治体'),
('医療', '難病児支援金', '難病の子供を持つ家庭', '一律10万円〜20万円', '年度ごと', '各自治体'),
('医療', '産後体調モニタリング費用補助', '産後の健康モニタリング費用', '一律5千円〜1万円', '出産後1年以内', '各自治体'),
('医療', '健康保険特別給付金', '健康保険でカバーされない医療費', '一部または全額補助', '年度ごと', '健康保険組合');

-- 老後
('老後', '介護用品購入助成金', '高齢者介護用品購入費用を補助', '最大5万円', '年度ごと', '各自治体'),
('老後', '高齢者健康診査助成金', '高齢者の健康診査費用を補助', '一律5千円〜1万円', '年度ごと', '各自治体'),
('老後', '老人医療費助成', '高齢者の医療費を補助', '自己負担分全額または一部', '年度ごと', '各自治体'),
('老後', '高齢者住宅改修助成金', '高齢者向け住宅改修費用を補助', '最大30万円', '年度ごと', '全国'),
('老後', '老人クラブ活動補助金', '高齢者団体の活動を補助', '一律10万円〜30万円', '年度ごと', '各自治体'),
('老後', '介護保険利用料補助金', '介護保険サービス利用料を補助', '一部または全額補助', '年度ごと', '各自治体'),
('老後', '認知症ケア費用助成金', '認知症ケアプログラム費用を補助', '一律1万円〜5万円', '年度ごと', '各自治体'),
('老後', '終活サポート助成金', 'エンディングノート作成費用や終活費用を補助', '一律5万円〜10万円', '年度ごと', '各自治体'),
('老後', '健康維持活動助成金', '高齢者向けの運動教室費用を補助', '一律1万円〜2万円', '年度ごと', '各自治体'),
('老後', '在宅介護用品購入補助金', '在宅介護に必要な用品購入費用を補助', '最大10万円', '年度ごと', '各自治体'),
('老後', '老人ホーム入居支援金', '老人ホーム入居費用を補助', '最大50万円', '入居後3ヶ月以内', '各自治体'),
('老後', '地域福祉活動助成金', '地域の高齢者支援活動費用を補助', '一律10万円〜30万円', '年度ごと', '各自治体'),
('老後', '老人用安全機器購入助成金', '高齢者向け安全機器購入費用を補助', '最大5万円', '年度ごと', '各自治体'),
('老後', '高齢者交通費助成金', '高齢者の移動費用を補助', '年間最大2万円', '年度ごと', '各自治体'),
('老後', '健康診査費用助成金', '高齢者の健康診査費用を補助', '一律1万円〜2万円', '年度ごと', '各自治体'),
('老後', '高齢者見守りサービス助成金', '高齢者向けの見守りサービス利用費用を補助', '年間最大5万円', '年度ごと', '各自治体'),
('老後', '介護リフト導入助成金', '介護用リフト購入費用を補助', '最大20万円', '年度ごと', '各自治体'),
('老後', '老人福祉施設改修助成金', '老人福祉施設の改修費用を補助', '最大50万円', '年度ごと', '各自治体'),
('老後', '介護予防プログラム助成金', '介護予防に特化したプログラム費用を補助', '一律1万円〜3万円', '年度ごと', '各自治体'),
('老後', '老後の住み替え助成金', '高齢者向けの住み替え費用を補助', '最大30万円', '年度ごと', '各自治体'),
('老後', '福祉用具レンタル助成金', '高齢者向け福祉用具のレンタル費用を補助', '月額1万円〜3万円', '年度ごと', '各自治体');