<p align="center">
    <h1 align="center">Мануал к https://klisl.com/yii2-extension.html</h1>
    <br>
</p>

Порядок установки
-------------------
1. Создается расширение через gii
2. Переходите в папку расширения (/runtime/tmp-extension/your-folder)
3. Выполняете команды:
    ~~~
   $ composer u
   $ git init 
   $ git add -A
   $ git commit -m "your message"
    ~~~
 Вариант с GitHub
 -------------------
 4. Создаете новый репозитрий на GitHub, далее
    ~~~
    $ git git remote add origin <path-to-your-repo>
    git push -u origin master
    git tag -a 1.0 -m "New version"
    git push --tags
    ~~~
5. Открываете composer.json из корня проетка и добавляете ссылку SSH на свой репозиторий с расширением
    ~~~
    "repositories": [
           {
               "type": "composer",
               "url": "https://asset-packagist.org"
           },
           {
               "type": "git",
               "url": "git@github.com:dead142/lisl_demo.git"
           }
       ]
    ~~~
 6. Установите расширение
    ~~~
    composer require klisl/yii2-mytest
    ~~~
Вариант с локальным модулем
-------------------
    
   Открываете composer.json из корня проетка и добавляете ссылку SSH на свой репозиторий с расширением
   
 ~~~
      "repositories": [
             {
                 "type": "composer",
                 "url": "https://asset-packagist.org"
             },
              {
                        "type": "git",
                        "url": "C:\\Open Server 5.3.0\\OSPanel\\domains\\edu\\runtime\\tmp-extensions\\yii2-mytest"
                }
         ]
~~~