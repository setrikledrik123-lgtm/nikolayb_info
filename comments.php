<?php
declare(strict_types=1);

session_start();

const OWNER_PASSWORD = 'NikolayB_ChangeThis123!';
const COMMENTS_FILE = __DIR__ . '/comments.json';

header('Content-Type: application/json; charset=utf-8');

if (!file_exists(COMMENTS_FILE)) {
    file_put_contents(COMMENTS_FILE, '[]', LOCK_EX);
}

function get_comments(): array
{
    $data = json_decode(
        file_get_contents(COMMENTS_FILE),
        true
    );

    return is_array($data) ? $data : [];
}

function save_comments(array $comments): void
{
    file_put_contents(
        COMMENTS_FILE,
        json_encode(
            $comments,
            JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        ),
        LOCK_EX
    );
}

function response(bool $success, string $message = '', array $data = []): never
{
    echo json_encode([
        'success' => $success,
        'message' => $message,
        ...$data
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

/*
|--------------------------------------------------------------------------
| ВХОД ВЛАДЕЛЬЦА
|--------------------------------------------------------------------------
*/

if ($action === 'login') {
    $password = (string)($_POST['password'] ?? '');

    if (hash_equals(OWNER_PASSWORD, $password)) {
        $_SESSION['owner'] = true;

        response(true, 'Вход выполнен');
    }

    response(false, 'Неверный пароль');
}

/*
|--------------------------------------------------------------------------
| ВЫХОД
|--------------------------------------------------------------------------
*/

if ($action === 'logout') {
    $_SESSION = [];
    session_destroy();

    response(true, 'Вы вышли');
}

/*
|--------------------------------------------------------------------------
| ДОБАВЛЕНИЕ КОММЕНТАРИЯ
|--------------------------------------------------------------------------
*/

if ($action === 'add') {
    $name = trim((string)($_POST['name'] ?? ''));
    $text = trim((string)($_POST['text'] ?? ''));

    if ($name === '') {
        $name = 'Гость';
    }

    if ($text === '') {
        response(false, 'Напиши комментарий');
    }

    if (mb_strlen($name) > 30) {
        response(false, 'Имя слишком длинное');
    }

    if (mb_strlen($text) > 500) {
        response(false, 'Комментарий слишком длинный');
    }

    $comments = get_comments();

    $comments[] = [
        'id' => bin2hex(random_bytes(8)),
        'name' => $name,
        'text' => $text,
        'date' => date('d.m.Y H:i')
    ];

    save_comments($comments);

    response(true, 'Комментарий добавлен');
}

/*
|--------------------------------------------------------------------------
| УДАЛЕНИЕ
|--------------------------------------------------------------------------
*/

if ($action === 'delete') {

    // Удалять может только владелец
    if (empty($_SESSION['owner'])) {
        response(false, 'Нет доступа');
    }

    $id = (string)($_POST['id'] ?? '');

    if ($id === '') {
        response(false, 'Не указан комментарий');
    }

    $comments = get_comments();

    $newComments = [];

    foreach ($comments as $comment) {
        if ((string)($comment['id'] ?? '') !== $id) {
            $newComments[] = $comment;
        }
    }

    save_comments($newComments);

    response(true, 'Комментарий удалён');
}

/*
|--------------------------------------------------------------------------
| ПОЛУЧЕНИЕ КОММЕНТАРИЕВ
|--------------------------------------------------------------------------
*/

if ($action === 'get') {
    response(true, '', [
        'comments' => get_comments(),
        'owner' => !empty($_SESSION['owner'])
    ]);
}

response(false, 'Неизвестное действие');
