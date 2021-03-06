# Требования к БД и приложению для работы с ней

  

## 0 – 15 баллов:

1. БД из не менее чем 5-ти таблиц, соответствующим образом связанных внешними ключами.
В соответствующих полях имеются: первичные ключи, запрет на нулевые значения (not null), значения по-умолчанию и т.п.

  

2. Таблицы заполнены данными (в среднем, не менее 10 строк в каждой таблице).

## 16 – 40 баллов:

  

1. В приложении реализована возможность просмотра, изменения, удаления, добавления данных (для всех таблиц).

  

2. При наличии в таблице внешних ключей она отображается максимально удобно для пользователя (например, вместо id-ключа должно быть указано соответствующее этому id значение из родительской таблицы).

3. Реализован поиск данных по ключевым полям (по одному или одновременно по нескольким полям).

  

4. Имеется возможность сортировки таблиц по одному и нескольким полям.

  

5. Имеется минимум 1 процедура и 1 триггер. В приложении должна быть предусмотрена возможность вызова процедуры, например, при нажатии на кнопку. Или же процедура может вызываться в коде при наступлении некого события. (Слишком простые процедуры, состоящие из одного-двух select-запросов, процедурами не считаются ).

6. Имеется поле для непосредственного ввода запроса к БД (рекомендуется сделать это поле доступным только для администратора вашего приложения).

7. При добавлении или изменении данных в таблице значения для полей, которые являются внешними ключами, заполняются не вручную, а выбираются из списка имеющихся значений в соответствующей родительской таблице.

## 41 – 50 баллов:

  

1. Авторизация (запрос логина, пароля) при запуске и разграничение полномочий пользователей (например, «гость» может только просматривать данные, не изменяя их, не добавляя новых, не удаляя).

2. При выполнении операций отслеживается их корректность (например, нельзя добавить сотрудника, не указав фамилию).

3. При неправильных действиях пользователя, каких-либо ошибках ввода и т.п., выводятся поясняющие сообщения.

4. Дополнительные усовершенствования приложения.

  

Кроме того:

  При оценивании будет учитываться сложность, удобство и функциональность интерфейса и отображения данных. (То есть, если у Вас выполнены все пункты, но интерфейс неудобный или слишком простой, максимальное количество баллов не ставится).

  При сдаче необходимо будет показать и объяснить основные части кода, обеспечивающие взаимодействие приложения и базы. Также уметь выполнять различные select-запросы, уметь объяснить код триггеров и процедур.