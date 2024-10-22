﻿# Velora Project

## Работа с веткой frontend

Это руководство поможет вам скопировать ветку frontend, внести изменения и отправить их обратно в ту же ветку на GitHub.

### Шаги

1. **Клонирование репозитория**

Сначала клонируйте репозиторий на ваш локальный компьютер. Для этого используйте следующую команду в терминале:

` git clone https://github.com/kykyrudza/velora.git  `

Эта команда создаст локальную копию репозитория на вашем компьютере.

2. **Переход на ветку frontend**

После клонирования репозитория перейдите в каталог репозитория и переключитесь на ветку frontend. Выполните следующие команды:

` cd velora  `

`git checkout frontend`

Эти команды позволят вам переключиться на нужную ветку, где вы сможете вносить изменения.

3. **Внесение изменений**

Внесите необходимые изменения в файлы проекта. Используйте любой текстовый редактор или IDE по вашему выбору для редактирования кода. Убедитесь, что изменения соответствуют требованиям проекта
4. **Добавление и коммит изменений**

После внесения изменений добавьте их в индекс и выполните коммит с описанием изменений. Используйте следующие команды:

` git add .  `

`  git commit -m "Описание изменений"  `

Команда git add . добавляет все изменения, а git commit -m позволяет зафиксировать изменения с соответствующим сообщением. Постарайтесь сделать сообщение информативным, чтобы другие участники проекта могли понять, какие изменения были внесены.

5. **Отправка изменений на удаленный репозиторий**

После успешного коммита отправьте ваши изменения обратно в ветку frontend на удаленном репозитории, используя следующую команду:

` git push origin frontend  `


Эта команда обновит удаленную ветку frontend с вашими изменениями. Убедитесь, что у вас есть доступ для записи в репозиторий.