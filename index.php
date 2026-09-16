
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NikolayB — Профиль</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(88, 101, 242, 0.18),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 80% 80%,
                    rgba(102, 192, 244, 0.14),
                    transparent 35%
                ),
                #0b0d12;

            position: relative;
            overflow-x: hidden;
        }

        /* МУЗЫКА */

        .music-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            cursor: pointer;
            transition: 0.25s ease;
            z-index: 100;
        }

        .music-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.08);
        }

        .music-toggle:active {
            transform: scale(0.95);
        }

        .music-toggle svg {
            width: 21px;
            height: 21px;
            fill: #aeb4c2;
            transition: 0.25s ease;
        }

        .music-toggle.playing {
            background: rgba(35, 211, 102, 0.1);
            border-color: rgba(35, 211, 102, 0.35);
            box-shadow: 0 0 20px rgba(35, 211, 102, 0.15);
        }

        .music-toggle.playing svg {
            fill: #23d366;
            animation: musicSpin 4s linear infinite;
        }

        @keyframes musicSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* ПРОФИЛЬ */

        .profile {
            width: 100%;
            max-width: 430px;
            padding: 34px 28px 30px;
            text-align: center;

            background:
                linear-gradient(
                    rgba(15, 17, 23, 0.62),
                    rgba(15, 17, 23, 0.72)
                ),
                url("profile-bg.jpg");

            background-size: cover;
            background-position: center;

            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;

            box-shadow:
                0 25px 80px rgba(0, 0, 0, 0.6);

            backdrop-filter: blur(8px);

            position: relative;
            overflow: hidden;

            animation: profileAppear 0.6s ease;
        }

        @keyframes profileAppear {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* АВАТАР */

        .avatar-wrap {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            padding: 5px;
            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #5865f2,
                    #66c0f4
                );

            box-shadow:
                0 0 35px rgba(88, 101, 242, 0.25);

            overflow: hidden;
        }

        .avatar {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center 27%;
            border-radius: 50%;
            border: 4px solid #14171f;
            transition: transform 0.3s ease;
        }

        .avatar-wrap:hover .avatar {
            transform: scale(1.06);
        }

        /* ИМЯ */

        .name {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 0.2px;
            margin-bottom: 8px;

            text-shadow:
                0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* СТАТУС */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #d0d4dd;
            font-size: 14px;
            margin-bottom: 28px;

            text-shadow:
                0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #23d366;

            box-shadow:
                0 0 10px rgba(35, 211, 102, 0.65);

            animation: onlinePulse 2s infinite;
        }

        @keyframes onlinePulse {
            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.6;
            }
        }

        /* КНОПКИ */

        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            width: 100%;
            border: 0;
            border-radius: 14px;
            padding: 15px 18px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* DISCORD */

        .discord-button {
            background: #5865f2;

            box-shadow:
                0 10px 25px rgba(88, 101, 242, 0.28);
        }

        .discord-button:hover {
            background: #6975f5;

            box-shadow:
                0 14px 30px rgba(88, 101, 242, 0.38);
        }

        /* STEAM */

        .steam-button {
            background: #171a21;

            border:
                1px solid rgba(102, 192, 244, 0.2);

            box-shadow:
                0 10px 25px rgba(23, 26, 33, 0.45);
        }

        .steam-button:hover {
            background: #2a475e;
            border-color: #66c0f4;

            box-shadow:
                0 14px 30px rgba(102, 192, 244, 0.25);
        }

        /* ПОДСКАЗКА */

        .hint {
            margin-top: 16px;
            color: #b0b5c0;
            font-size: 12px;
            line-height: 1.5;

            text-shadow:
                0 2px 8px rgba(0, 0, 0, 0.6);
        }

        /* КОММЕНТАРИИ */

        .comments {
            margin-top: 30px;
            padding-top: 25px;

            border-top:
                1px solid rgba(255, 255, 255, 0.1);

            text-align: left;
        }

        .comments h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 18px;
        }

        #commentForm {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #commentForm input,
        #commentForm textarea {
            width: 100%;
            padding: 13px;

            border-radius: 12px;

            border:
                1px solid rgba(255, 255, 255, 0.1);

            background:
                rgba(255, 255, 255, 0.06);

            color: white;
            outline: none;

            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        #commentForm textarea {
            min-height: 90px;
            resize: vertical;
        }

        #commentForm input::placeholder,
        #commentForm textarea::placeholder {
            color: #8f96a3;
        }

        #commentForm input:focus,
        #commentForm textarea:focus {
            border-color: #5865f2;
        }

        #commentForm button {
            border: 0;
            border-radius: 12px;
            padding: 13px;

            background: #5865f2;

            color: white;
            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
            transition: 0.2s;
        }

        #commentForm button:hover {
            background: #6975f5;
            transform: translateY(-1px);
        }

        /* ВЛАДЕЛЕЦ */

        .owner-button {
            width: 100%;
            margin-top: 10px;
            padding: 9px;

            border:
                1px solid rgba(255, 255, 255, 0.08);

            border-radius: 10px;

            background:
                rgba(255, 255, 255, 0.03);

            color: #777f91;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .owner-button:hover {
            background:
                rgba(255, 255, 255, 0.08);

            color: white;
        }

        /* СПИСОК КОММЕНТАРИЕВ */

        #commentsList {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .comment {
            padding: 13px;
            border-radius: 12px;

            background:
                rgba(255, 255, 255, 0.05);

            border:
                1px solid rgba(255, 255, 255, 0.07);

            animation:
                commentAppear 0.25s ease;
        }

        @keyframes commentAppear {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 6px;
        }

        .comment-name {
            font-weight: 700;
            font-size: 14px;
        }

        .comment-date {
            color: #737986;
            font-size: 11px;
            white-space: nowrap;
        }

        .comment-text {
            color: #c4c8d1;
            font-size: 13px;
            line-height: 1.5;
            word-break: break-word;
            white-space: pre-wrap;
        }

        /* УДАЛЕНИЕ */

        .delete-comment {
            margin-top: 10px;

            border:
                1px solid rgba(220, 50, 50, 0.25);

            border-radius: 8px;

            padding: 7px 10px;

            background:
                rgba(220, 50, 50, 0.15);

            color: #ff7070;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .delete-comment:hover {
            background:
                rgba(220, 50, 50, 0.3);

            color: white;
        }

        .empty-comments {
            text-align: center;
            color: #737986;
            font-size: 13px;
            padding: 15px;
        }

        /* УВЕДОМЛЕНИЕ */

        .toast {
            position: fixed;
            left: 50%;
            bottom: 28px;

            transform:
                translate(-50%, 20px);

            width: min(90%, 430px);

            padding: 15px 18px;
            border-radius: 14px;

            background: #181c25;

            border:
                1px solid rgba(35, 211, 102, 0.3);

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.45);

            color: #fff;
            font-size: 14px;
            line-height: 1.45;

            opacity: 0;
            pointer-events: none;

            transition: 0.25s ease;
            z-index: 200;
        }

        .toast.show {
            opacity: 1;

            transform:
                translate(-50%, 0);
        }

        .toast strong {
            color: #23d366;
        }

        /* МОБИЛЬНАЯ ВЕРСИЯ */

        @media (max-width: 500px) {

            body {
                align-items: flex-start;
                padding-top: 80px;
            }

            .profile {
                padding: 30px 20px 26px;
            }

            .avatar-wrap {
                width: 130px;
                height: 130px;
            }

            .name {
                font-size: 26px;
            }

            .music-toggle {
                top: 15px;
                right: 15px;
            }
        }

    </style>

</head>

<body>

    <!-- МУЗЫКА -->

    <audio
        id="bgMusic"
        src="music.mp3"
        loop
        preload="auto">
    </audio>

    <!-- КНОПКА МУЗЫКИ -->

    <button
        class="music-toggle"
        id="musicToggle"
        title="Включить / Выключить музыку"
        aria-label="Управление музыкой">

        <svg viewBox="0 0 24 24">
            <path d="
                M12 3v10.55
                c-.59-.34-1.27-.55-2-.55
                -2.21 0-4 1.79-4 4
                s1.79 4 4 4
                4-1.79 4-4V7h4V3h-6z
            "/>
        </svg>

    </button>

    <!-- ПРОФИЛЬ -->

    <main class="profile">

        <!-- АВАТАР -->

        <div class="avatar-wrap">

            <img
                class="avatar"
                src="avatar.png"
                alt="Аватар NikolayB">

        </div>

        <!-- ИМЯ -->

        <h1 class="name">
            NikolayB
        </h1>

        <!-- СТАТУС -->

        <div class="status">

            <span class="dot"></span>

            Онлайн

        </div>

        <!-- КНОПКИ -->

        <div class="buttons-container">

            <!-- DISCORD -->

            <button
                class="btn discord-button"
                id="discordButton"
                type="button">

                <svg viewBox="0 0 127.14 96.36">

                    <path d="
                        M107.7,8.07
                        A105.15,105.15,0,0,0,77.26,0
                        a77.19,77.19,0,0,0-3.3,6.83
                        A96.67,96.67,0,0,0,53.22,6.83
                        A77.19,77.19,0,0,0,49.88,0
                        A105.15,105.15,0,0,0,19.44,8.07
                        C3.66,31.58-1.86,54.65,1,77.53
                        A105.73,105.73,0,0,0,32,96.36
                        a74.37,74.37,0,0,0,6.72-10.93
                        a68.6,68.6,0,0,1-10.64-5.12
                        c.91-.67,1.81-1.37,2.65-2.1
                        a75.22,75.22,0,0,0,72.78,0
                        c.84.73,1.74,1.43,2.65,2.1
                        a68.86,68.86,0,0,1-10.64,5.12
                        a74.74,74.74,0,0,0,6.72,10.93
                        a105.73,105.73,0,0,0,31-18.83
                        C129.72,49.52,123.82,26.69,107.7,8.07ZM42.45,65.69
                        C36.18,65.69,31,60,31,53S36.18,40.36,42.45,40.36
                        S53.88,46,53.79,53
                        S48.72,65.69,42.45,65.69Zm42.24,0
                        C78.41,65.69,73.24,60,73.24,53
                        S78.41,40.36,84.69,40.36
                        S96.12,46,96,53
                        S91,65.69,84.69,65.69Z
                    "/>

                </svg>

                Связаться в Discord

            </button>

            <!-- STEAM -->

            <a
                href="https://steamcommunity.com/profiles/76561199275441760/"
                target="_blank"
                rel="noopener noreferrer"
                class="btn steam-button">

                <svg viewBox="0 0 24 24">

                    <path d="
                        M12 .007
                        c-6.19 0-11.267 4.704-11.933 10.748
                        1.472-.942 3.327-1.35 5.176-.948
                        l4.475-6.505
                        c.23-.332.6-.533 1.002-.542
                        .404-.006.786.175 1.034.493
                        l4.57 5.865
                        c.983-.34 2.052-.405 3.087-.134
                        l.02-.008
                        c2.97-.833 6.074.912 6.908 3.882
                        .833 2.972-.913 6.075-3.884 6.908
                        -2.97.834-6.074-.912-6.907-3.883
                        l-.004-.015
                        c-.4-.1-.13-.485-.502-.485
                        l-5.696-2.45
                        c-.417.753-1.042 1.343-1.792 1.691
                        l-.116 4.764
                        c-.007.417-.225.8-.58 1.028
                        -.357-.222-.58-.61-.58-1.028
                        v-.07l.067-2.738
                        c2.148-.052 3.96-1.523 4.394-3.64
                        .516-2.52-1.12-4.95-3.64-5.467
                        -2.522-.517-4.953 1.12-5.47 3.64
                        -.326 1.594.333 3.176 1.536 4.116
                        l-2.99 4.326
                        C3.962 18.067,2 15.26,2 12.007
                        c0-5.523 4.477-10 10-10
                        s10 4.477 10 10-4.477 10-10 10
                        c-.966 0-1.9.137-2.784.393
                        -.16-.015-.32-.047-.482-.047
                        -.116 0-.23.013-.344.025
                        C9.444 23.774,10.692 24,12 24
                        c6.627 0 12-5.373 12-12S18.627.007 12 .007z
                    "/>

                </svg>

                Профиль Steam

            </a>

        </div>

        <!-- ПОДСКАЗКА -->

        <p class="hint">

            Музыка включается автоматически при входе.
            Если браузер заблокировал автозапуск —
            просто нажмите на страницу.

        </p>

        <!-- КОММЕНТАРИИ -->

        <section class="comments">

            <h2>
                Комментарии
            </h2>

            <form id="commentForm">

                <input
                    type="text"
                    id="commentName"
                    placeholder="Твоё имя"
                    maxlength="30"
                    required>

                <textarea
                    id="commentText"
                    placeholder="Напиши комментарий..."
                    maxlength="500"
                    required></textarea>

                <button type="submit">
                    Оставить комментарий
                </button>

            </form>

            <!-- ВХОД ВЛАДЕЛЬЦА -->

            <button
                type="button"
                id="ownerButton"
                class="owner-button">

                Вход владельца

            </button>

            <!-- СПИСОК КОММЕНТАРИЕВ -->

            <div id="commentsList"></div>

        </section>

    </main>

    <!-- УВЕДОМЛЕНИЕ -->

    <div
        class="toast"
        id="toast">

        <strong>
            ✓ Успешно скопировано!
        </strong>

        <br>

        Вставьте
        <b>niko_1352647832</b>
        во вкладку «Добавить в друзья»
        и ожидайте запроса.

    </div>

    <script>

        /* DISCORD */

        const discordUsername = "niko_1352647832";

        const discordButton =
            document.getElementById("discordButton");

        const toast =
            document.getElementById("toast");

        let toastTimeout = null;

        function showToast() {

            if (toastTimeout) {
                clearTimeout(toastTimeout);
            }

            toast.classList.add("show");

            toastTimeout = setTimeout(() => {
                toast.classList.remove("show");
            }, 4500);
        }

        discordButton.addEventListener(
            "click",
            async () => {

                try {

                    await navigator.clipboard.writeText(
                        discordUsername
                    );

                    showToast();

                } catch (error) {

                    const textarea =
                        document.createElement("textarea");

                    textarea.value =
                        discordUsername;

                    textarea.style.position = "fixed";
                    textarea.style.opacity = "0";

                    document.body.appendChild(textarea);

                    textarea.select();

                    try {
                        document.execCommand("copy");
                    } catch (copyError) {
                        console.log(copyError);
                    }

                    textarea.remove();

                    showToast();
                }
            }
        );

        /* МУЗЫКА */

        const audio =
            document.getElementById("bgMusic");

        const musicToggle =
            document.getElementById("musicToggle");

        function setMusicPlaying() {
            musicToggle.classList.add("playing");
        }

        function setMusicPaused() {
            musicToggle.classList.remove("playing");
        }

        async function startMusic() {

            try {

                await audio.play();

                setMusicPlaying();

                removeFirstInteraction();

            } catch (error) {

                console.log(
                    "Автозапуск заблокирован браузером."
                );
            }
        }

        async function firstInteraction() {

            if (!audio.paused) {
                return;
            }

            try {

                await audio.play();

                setMusicPlaying();

                removeFirstInteraction();

            } catch (error) {

                console.log(
                    "Не удалось запустить музыку."
                );
            }
        }

        function removeFirstInteraction() {

            document.removeEventListener(
                "click",
                firstInteraction
            );

            document.removeEventListener(
                "touchstart",
                firstInteraction
            );

            document.removeEventListener(
                "keydown",
                firstInteraction
            );
        }

        window.addEventListener(
            "load",
            startMusic
        );

        document.addEventListener(
            "click",
            firstInteraction
        );

        document.addEventListener(
            "touchstart",
            firstInteraction
        );

        document.addEventListener(
            "keydown",
            firstInteraction
        );

        musicToggle.addEventListener(
            "click",
            async (event) => {

                event.stopPropagation();

                if (audio.paused) {

                    try {

                        await audio.play();

                        setMusicPlaying();

                    } catch (error) {

                        console.log(error);

                    }

                } else {

                    audio.pause();

                    setMusicPaused();

                }
            }
        );

        /* КОММЕНТАРИИ */

        const commentForm =
            document.getElementById("commentForm");

        const commentsList =
            document.getElementById("commentsList");

        const ownerButton =
            document.getElementById("ownerButton");

        async function loadComments() {

            try {

                const response =
                    await fetch(
                        "comments.php?action=get",
                        {
                            credentials: "same-origin"
                        }
                    );

                const data =
                    await response.json();

                if (!data.success) {
                    throw new Error("Ошибка загрузки");
                }

                commentsList.innerHTML = "";

                if (
                    !data.comments ||
                    data.comments.length === 0
                ) {

                    commentsList.innerHTML = `
                        <div class="empty-comments">
                            Пока комментариев нет.
                        </div>
                    `;

                    updateOwnerButton(data.owner);

                    return;
                }

                data.comments
                    .slice()
                    .reverse()
                    .forEach(comment => {

                        const element =
                            document.createElement("div");

                        element.className = "comment";

                        const top =
                            document.createElement("div");

                        top.className = "comment-top";

                        const name =
                            document.createElement("div");

                        name.className = "comment-name";
                        name.textContent = comment.name;

                        const date =
                            document.createElement("div");

                        date.className = "comment-date";
                        date.textContent = comment.date;

                        top.appendChild(name);
                        top.appendChild(date);

                        const text =
                            document.createElement("div");

                        text.className = "comment-text";
                        text.textContent = comment.text;

                        element.appendChild(top);
                        element.appendChild(text);

                        if (data.owner) {

                            const deleteButton =
                                document.createElement("button");

                            deleteButton.className =
                                "delete-comment";

                            deleteButton.type = "button";
                            deleteButton.textContent = "Удалить";

                            deleteButton.addEventListener(
                                "click",
                                async () => {

                                    if (
                                        !confirm(
                                            "Удалить этот комментарий?"
                                        )
                                    ) {
                                        return;
                                    }

                                    const formData =
                                        new FormData();

                                    formData.append(
                                        "action",
                                        "delete"
                                    );

                                    formData.append(
                                        "id",
                                        comment.id
                                    );

                                    try {

                                        const response =
                                            await fetch(
                                                "comments.php",
                                                {
                                                    method: "POST",
                                                    body: formData,
                                                    credentials:
                                                        "same-origin"
                                                }
                                            );

                                        const result =
                                            await response.json();

                                        if (result.success) {

                                            loadComments();

                                        } else {

                                            alert(
                                                result.message ||
                                                "Не удалось удалить комментарий."
                                            );
                                        }

                                    } catch (error) {

                                        console.error(error);

                                        alert(
                                            "Ошибка удаления комментария."
                                        );
                                    }
                                }
                            );

                            element.appendChild(deleteButton);
                        }

                        commentsList.appendChild(element);

                    });

                updateOwnerButton(data.owner);

            } catch (error) {

                console.error(error);

                commentsList.innerHTML = `
                    <div class="empty-comments">
                        Не удалось загрузить комментарии.
                    </div>
                `;
            }
        }

        /* ДОБАВЛЕНИЕ */

        commentForm.addEventListener(
            "submit",
            async event => {

                event.preventDefault();

                const name =
                    document
                        .getElementById("commentName")
                        .value
                        .trim();

                const text =
                    document
                        .getElementById("commentText")
                        .value
                        .trim();

                if (!text) {

                    alert("Напиши комментарий.");

                    return;
                }

                const formData =
                    new FormData();

                formData.append("action", "add");
                formData.append(
                    "name",
                    name || "Гость"
                );

                formData.append("text", text);

                try {

                    const response =
                        await fetch(
                            "comments.php",
                            {
                                method: "POST",
                                body: formData,
                                credentials: "same-origin"
                            }
                        );

                    const result =
                        await response.json();

                    if (!result.success) {

                        alert(
                            result.message ||
                            "Не удалось добавить комментарий."
                        );

                        return;
                    }

                    commentForm.reset();

                    loadComments();

                } catch (error) {

                    console.error(error);

                    alert(
                        "Ошибка при добавлении комментария."
                    );
                }
            }
        );

        /* ВХОД ВЛАДЕЛЬЦА */

        async function ownerLogin() {

            const password =
                prompt(
                    "Введите пароль владельца:"
                );

            if (!password) {
                return;
            }

            const formData =
                new FormData();

            formData.append("action", "login");
            formData.append("password", password);

            try {

                const response =
                    await fetch(
                        "comments.php",
                        {
                            method: "POST",
                            body: formData,
                            credentials: "same-origin"
                        }
                    );

                const result =
                    await response.json();

                if (result.success) {

                    alert(
                        "Вы вошли как владелец."
                    );

                    loadComments();

                } else {

                    alert("Неверный пароль.");
                }

            } catch (error) {

                console.error(error);

                alert("Ошибка входа.");
            }
        }

        /* ВЫХОД */

        async function ownerLogout() {

            const formData =
                new FormData();

            formData.append("action", "logout");

            try {

                await fetch(
                    "comments.php",
                    {
                        method: "POST",
                        body: formData,
                        credentials: "same-origin"
                    }
                );

                loadComments();

            } catch (error) {

                console.error(error);
            }
        }

        function updateOwnerButton(isOwner) {

            if (isOwner) {

                ownerButton.textContent =
                    "Выйти из режима владельца";

                ownerButton.onclick =
                    ownerLogout;

            } else {

                ownerButton.textContent =
                    "Вход владельца";

                ownerButton.onclick =
                    ownerLogin;
            }
        }

        /* ЗАПУСК */

        loadComments();

    </script>

</body>

</html>

