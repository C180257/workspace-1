drop database if exists test_db;
-- データベースtest_dbを作成
create database test_db;
-- 作成したデータベースにアクセス
use test_db;
-- membersテーブルを作成
create table products (
	id         char(5)   unique   not null,
	name       varchar(50)        not null,
	price      mediumint unsigned not null,
	created_at timestamp default current_timestamp,
	primary key (id)
);

-- レコードの登録
insert into products (id, name, price) values ('I-001', 'デジタルカメラ', 39800);
insert into products (id, name, price) values ('I-002', 'デスクトップPC', 89800);
insert into products (id, name, price) values ('I-003', 'ノートPC', 120000);
insert into products (id, name, price) values ('I-004', 'プリンタ', 9800);

-- 以下のSQLはproductsテーブルのレコードについての処理として行う。
-- exercise-S1. すべてのレコードのすべてのフィールドを抽出する
select * from products;
-- select id,name,price,created_at from products;
-- exercise-S2. すべてのレコードの製品ID（idフィールド）と製品名（nameフィールド）を抽出する
select id,name from products;
-- exercise-S3. 価格が40000円を超える製品のすべてのフィールドを抽出する
select * from products where price>40000;
-- exercise-S4. 価格が3の倍数になっている製品の製品名（nameフィールド）と価格（priceフィールド）を抽出する
select name,price from products where price % 3 = 0;
-- exercise-S5. 製品名が「デ」で始まるレコードの製品名（nameフィールド）を抽出する
select name from products where name like 'デ%';
-- exercise-S6. 製品名が「PC」で終わるレコードのすべてのフィールドを抽出する
select * from products where name like '%PC';
-- exercise-S7. 製品名に「リン」が含まれているレコードのすべてのフィールドを抽出する
select * from products where name like '%リン%';
-- exercise-U1. 製品ID「I-004」の製品名を「インクジェットプリンタ」に変更する。
update products set name ='インクジェットプリンタ' where id = 'I-004';
select * from products;
-- exercise-U2. 製品IDが「I-004」の製品の価格を8800円に変更する。
update products set price = 8800 where id ='I-004' ;
select * from products;
-- exercise-U3. すべての製品の価格を25%OFFにする。
update products set price=price *0.75 ;
select * from products;
-- exercise-I1. 製品IDが「I-005」、製品名「タブレットPC」、価格「68000」のレコードを追加する
insert into products (id,name,price) values ('I-005','タブレットPC',68000);
select * from products;
-- exercise-D1. 製品IDが「I-005」の製品を削除する。
delete from products where id = 'I-005';
select * from products;
-- exercise-D2. すべての製品を削除する。
delete from products;
select * from products;

