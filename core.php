<?php
header('Content-Type: application/json');

$ballCount = isset($_GET['ballCount']) ? intval($_GET['ballCount']) : 50;

if ($ballCount < 0) {
    echo json_encode(['error' => '球數量不能小於0']);
    exit;
}

function initBingoBoard($totalNumbers = 60, $drawCount = 25) {
    $numbers = range(1, $totalNumbers);
    shuffle($numbers);
    return array_slice($numbers, 0, $drawCount);
}

$board = initBingoBoard();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $drawnNumbers = json_decode(file_get_contents('php://input'), true)['drawnNumbers'];
    $currentCount = isset(json_decode(file_get_contents('php://input'), true)['ballCount']) ? intval(json_decode(file_get_contents('php://input'), true)['ballCount']) : 50; // 接收球數

    // 檢查是否有符合的球
    $availableNumbers = range(1, 60);
    $availableNumbers = array_diff($availableNumbers, $drawnNumbers);

    if (count($availableNumbers) === 0) {
        echo json_encode(['error' => '所有球已抽完']);
        exit;
    }

    // 抽取新球
    $newBall = array_rand(array_flip($availableNumbers));
    $drawnNumbers[] = $newBall;

    echo json_encode(['newBall' => $newBall, 'drawnNumbers' => $drawnNumbers, 'currentCount' => $currentCount - 1]); // 返回減少的球數
    exit;
}

echo json_encode(['board' => $board]);
?>
