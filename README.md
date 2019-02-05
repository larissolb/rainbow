# study
--Обновление на 06.02.19--
1. Поправлена мобильная верстка.
2. При авторизации переход на главную страницу в мобильной версии


--Обновление на 05.02.19--
1. Загрузка картинок в мобильной версии: верстка + отображение при ошибках загрузок со стороны пользователя(неверный формат/размер)
2. Добавлены типы файлов, кот. возможны для загрузки: png/jpeg/jpg
3. Пользователь остается на той же странице, с которой авторизовывался. 
4. При регистрации пользователь автоматическ оказывается на /share - доступной только авторизованным пользователям
5. Добавлены дата и пользователь к комментарию. Теперь видно, кто написал и когда :-)


--Обновление на 03.02.19--
1. Исправлена мобильная верстка для регистрации, авторизации и восстановления пароля
2. Поправлена мобильная верстка формы загрузки картинок 

--Обновление на 31.01.19--
1. Добавлена финальная картинка для перехода к размещению на Rating
2. Доделаны подразделы Pencils/Markers/Paints

--Обновление на 30.01.19--
1. Добавлена возможность на странице Rating перехода на следующую картинку при клике на текущую картинку
2. Доделано в комментариях: возможность написать текст только авторизованным пользователям, 
в противном случае - выскакивает предупреждение с необходимостью авторизоваться/зарегиться
3. Внесены корректировки в самом коде и немного поправлены стили

--Обновление на 29.01.19--
1. Внесены небольшие изменения на главной странице (/): перемещен слайдер js
2. На страницу Rating выводится последняя загруженная картинка из БД большого форма, без инфы, но с возможностью 
поставить лайк (при авторизации) и распечатать, а также перейти к подробной информации (открывается страница конкретной картинки
с описанием и возможностью оставить коммент (при авторизации).
3. Добавлена система лайков везде, где на данный момент есть картинки (Rating + Pic (где открывается конкретная картинка с подробным описанием
и возможностью комментариев) 
    3.1. Лайк появляется сразу при загрузке странице к конкретной картинке с показом текущего кол-ва из БД.
    3.2. Лайк может ставить только авторизованный пользователь, в противном случае появляется 
            alert-предупреждение с необходимостью авторизоваться или зарегистрироваться
    3.3. Если пользователь авторизован, лайк проставляется (что сразу видно на экране пользователю в виде увеличившегося кол-ва на один),
        и после записывается в БД

--Обновление на 27.01.19--
1. Доработана выгрузка картинок из БД для пользователя на сайте
  1.1. 2 последние загруженные в БД. Страницы Share и по категориям: Pencils/Markers/Paints
  1.2. Случайная картинка за исключением тех, кот.уже отобразились на сайте (по п.1.1.)
  1.3. Выгрузка картинки и всей информации по картинке при переходе на подробную инфо о картинке (more details)
  1.4. Выгрузка последней загруженной картинки на главную страницу оценки Rating


--Обновление на 26.01.19--
1. Доделаны комментарии (записываются в БД, отображаются в зависимости от выбранной картинки)


--Обновление на 24.01.19--
1. Добавление комментариев с сохранением в БД с учетом пользователя, кот. авторизован

--Обновление на 19.01.19--
=======
--Обновление на 20.01.19--
>>>>>>> bda809b9b7f20c5557d1d1789800dd921e6573cc
1. Доделана полностью авторизация/регистрация/восстановление пароля, включая вывод имени из сессии и выход (закрытие сессии) 
1.1. Для восстановления нужно сделать как-то отправку на емейл восстановительного письма

2. Доделана загрузка картинок с выбором пользователя, который зашел (из сессии)


--Обновление на 19.01.19--

Подключение к БД авторизации/регистрации/восстановления
Поиск по БД происходит, запись в БД при регистрации с хеш паролем происходит
Авторизация также работает

--Обновление на 17.01.19  upd--
1. Небольшие изменения в коде авторизации/регистрации/восстановления через ajax

--Обновление на 17.01.19--
1. Вывод авторизации/регистрации/восстановления в MVC модель
2. Соединение с ajax и БД (пока не совсем успешно)
3. Обновленные и новые файлы:
- config.json
- private/Controller/UserController.php
- private/Models/UserModel.php
- private/Views/share.php
- private/Controllers/ShareController.php

--Обновление на 14.01.19--

Доделана загрузка картинок пользователем в БД через ajax 
за исключением автоматического выбора пользователя, который загрузил картинки
(должен определяться при авторизации на сайте)

--Обновление на 13.01.19--
1. Подключение ajax с загрузкой в БД, обновленные файлы:
- config.json
- private/Base/Controller.php
- private/Base/DBConnection.php
- private/Base/Request.php
- private/Controllers/ShareController.php
- private/Models/PicModel.php
- private/Views/share.php
- public/js/collection.js

--Обновление на 11.01.19--

Обновленные файлы:
1. config.json (добавлен loadpics)
2. Controllers/ShareController(добавлен метод LoadPicsAction)
3. Models/PicModel (добавлен метод loadPics)
4. View/share.php (в action сейчас стоит /share/loadpics)

---про js и php----
в обновленных файлах share.php есть связь с js/collection.js. Как сделать так, чтобы после проверки js данные записывались?
внутри файла js писать команды для БД?..вроде бы так нельзя


--Обновление на 30.12.18--
1. Добавлены в Base Application, Request, Response, Router, Session
2. Обновлен index.php

--Обновление на 26.12.18--
1. Обновлен DBConnection.php
2. Обонвлен config.json
3. Обновлен index.php
4. Добавлена структура с базы данных (с workbench)

--Обновление 3 на 23.12.18---
Добавлен Cookies.php и перечисление таблиц для базы данных

--Обновление 2 на 23.12.18---
Добавлено подключение БД к проекту через PDO


--Обновление 23.12.18---
Полностью перенесен проект на MVC с FrontController
Инициализирован Composer c файлом composer.json
Создан файл config.json


--Обновление 20.12.18---
Создана структура проекта: public и private
Созданы Controllers и Models(пока один) и базовый Controller, добавлено пару страниц в View

--Обновление 10.12.18---
Страница share.html -> share.php 
Добавлен скрипт внутри файла, чтобы картинки в левом столбце (верхняя и нижняя) менялись случайным образом независимо друг от друга при перезагрузке страницы

--Обновление 05.12.18---
Добавлены две страницы на php - pencils.php и pic.php(открывается только при переходе на ссылку под картинкой "Подробнее")
